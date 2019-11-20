<script>
    "use strict";
    function delete_user_id() {
            var id = $('#users_id_mod').val();
            console.log(id);
            $.ajax({
                type: "POST",
                url: "{{url('/admin/user/delete')}}" + '/' + id,
                data: {id: id},
                dataType: "json",
                context: this,
                success: function (data) {
                    redirection(data);
                    if (data.code == 200) {
                        $('#users_datatables').DataTable().ajax.reload();
                        $('#modal_drivers').modal('toggle');

                    } else {

                    }

                }
            });
        }
        ;
// Class definition
    var KTFormControls = function () {
        var ctrl = function () {
            $("#form_add_driver").validate({
                lang: 'fr',
                rules: {
                    email: {
                        required: true,
                        email: true,
                        minlength: 10
                    },
                    telephone: {
                        required: true,
                    },
                    nom: {
                        required: true,
                    },
                    prenom: {
                        required: true,
                    },
                },
                invalidHandler: function (event, validator) {
                    var alert = $('#kt_form_1_msg');
                    alert.removeClass('kt-hide').show();
                    $('#error_message').text('Merci de remplir les champs obligatoires');
                    KTUtil.scrollTop();
                },

                submitHandler: function (form) {
                    $.ajax({
                        type: "POST",
                        url: "{{url('/admin/driver/add')}}",
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function (data) {
                            if (data.code == 200) {
                                $('#new_ride_popup').modal('toggle');
                                var oTable = $('#drivers_datatables').DataTable();
                                oTable.ajax.reload();
                            } else if (data.code == 201) {
                                var alert = $('#kt_form_1_msg');
                                alert.removeClass('kt-hide').show();
                                $('#error_message').text('Utilisateur déja exist');
                                KTUtil.scrollTop();
                            } else {
                                var alert = $('#kt_form_1_msg');
                                alert.removeClass('kt-hide').show();
                                KTUtil.scrollTop();
                            }
                        }
                    });
                    return false; // required to block normal submit since you used ajax
                }
            });
        }
        return {
            // public functions
            init: function () {
                ctrl();
            }
        };
    }();

    jQuery(document).ready(function () {
        KTFormControls.init();
        var stocknro_dt = null;
        $.fn.dataTable.ext.errMode = 'none';

        $('#users_datatables').on('error.dt', function (e, settings, techNote, message) {
            console.log('An error has been reported by DataTables: ', message);
        });
        stocknro_dt = $('#users_datatables').DataTable({
            "autoWidth": true,
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "language": {"url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/French.json"},
            dom: `<'row'<'col-sm-12'tr>>
                        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            //"order": [[ 10, 'desc' ]],
            //"ajax": "{{url('/admin/getRides')}}",
            "ajax": {url: "{{url('/admin/getUsers')}}", "contentType": "application/json",
                "data": function (data) {
                    data.nom_prenom = $('#nom_prenom').val();
                    data.email = $('#email').val();
                    data.type_id = $('#type_id').val();
                },
                dataFilter: function (res) {
                    var response = $.parseJSON(res);
                    if (response.code) {
                        window.location = "{{ url('/admin/login') }}";
                    } else {
                        return res;
                    }
                    //return res;
                },
                "type": "GET", },
            "columns": [

                {"data": "nom", "responsivePriority": -1, "name": ""},
                {"data": "prenom", "responsivePriority": -1, "name": ""},
                {"data": "email", "responsivePriority": -1, "name": "",
                    "render": function (data, type, full, meta) {

                        if (data) {
                            if(full.active_email=='1'){
                                return '<span class="kt-badge kt-badge--success kt-badge--dot"></span>'+' '+data;
                            }else{
                                return '<span class="kt-badge kt-badge--danger kt-badge--dot"></span>'+' '+data;
                            }
                            

                        } else {
                            return '---'
                        }
                    }
            },
                {"data": "phones_valide.0.numero", "name": "",
                    "render": function (data, type, full, meta) {

                        if (data) {
                            if(full.active_sms=='1'){
                                return '<span class="kt-badge kt-badge--success kt-badge--dot"></span>'+' '+data;
                            }else{
                                return '<span class="kt-badge kt-badge--danger kt-badge--dot"></span>'+' '+data;
                            }
                            

                        } else {
                            return '---'
                        }
                    }},
                {"data": "type_inscription", "responsivePriority": -1, "name": ""},
                {"data": "id_users", "name": ""},
            ],
            "columnDefs": [
                {
                    "targets": 4,
                    "render": function (data, type, full, meta) {
                        var status = {
                            0: {'title': 'Standard'},
                            1: {'title': 'Facebook'},
                            1: {'title': 'Google'}

                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return status[data].title;
                    },
                },
                {
                    "targets": 5,
                    "orderable": false,
                    "render": function (data, type, full, meta) {
                        var affect;
                        affect = '<button data-toggle="modal" data-id=' + data + ' data-target="#modal_drivers" class="btn btn-warning btn-brand--icon" id="user_id_btn"><span><i class="flaticon-user-add"></i><span>Supprimer</span></span></button><button data-toggle="modal" data-id=' + data + ' data-target="#modal_adresses" class="btn btn-default btn-brand--icon" id="user_id_btn_adresse"><span><i class="flaticon2-maps"></i><span>Adresses</span></span></button>';

                        return affect;
                    },
                },
            ],

            "displayLength": 10,
            lengthMenu: [5, 10, 25, 50],

        });
        $('#search_dt_users').click(function () {
            stocknro_dt.ajax.reload();
        });

        $(document).on("click", "#user_id_btn", function () {
            var users_id = $(this).attr('data-id');
            $("#users_id_mod").val(users_id);
        });
        
        $(document).on("click", "#user_id_btn_adresse", function () {
        var adresse_id = $(this).attr('data-id');
        $("#user_id_adresse").val(adresse_id);
        load_adresses();
        $('#adresses_users_datatables').DataTable().ajax.reload();
    });
        
    });
    
    
    function load_adresses(){
    $('#adresses_users_datatables').DataTable({
            bFilter: false, bInfo: false, paging: false,
            "autoWidth": true,
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "language": {"url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/French.json"},

            "ajax": {url: "{{url('/adresses_user_by_user')}}", "contentType": "application/json",
                "data": function (data) {
                    data.id = $('#user_id_adresse').val();
                },
                dataFilter: function (res) {
                    var response = $.parseJSON(res);
                    if (response.code) {
                        //window.location = "{{ url('/login') }}";
                    } else {
                        return res;
                    }
                    //return res;
                },
                "type": "GET", },
            "columns": [

                {"data": "adresse", "name": ""},
                {"data": "type", "responsivePriority": -1, "name": ""},
                {"data": "state", "responsivePriority": -1, "name": ""},
            ],
            "columnDefs": [
                {
                    "targets": 1,
                    "render": function (data, type, full, meta) {
                        var status = {
                            'f': {'title': 'Favoris'},
                            'w': {'title': 'Work'},
                            'h': {'title': 'Home'}

                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return status[data].title;
                    },
                },
                {
                    "targets": 2,
                    "render": function (data, type, full, meta) {
                        var status = {
                            '0': {'title': 'passive'},
                            '1': {'title': 'Active'},

                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return status[data].title;
                    },
                },
                {
                    "targets": 2,
                    "render": function (data, type, full, meta) {
                        //return '<a href="#" data-id=' + data + ' id="click_delete_adresse" data-toggle="modal" data-target="#delete-modal-sm" class="button button-mini button-circle button-red"><i class="icon-off"></i>Supprimer</a>';
                    }
                }
            ],
        });
    }
</script>
