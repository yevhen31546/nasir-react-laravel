<script>
    "use strict";
// Class definition
    var KTFormControls = function () {
        var ctrl = function () {
            $("#save_coef").validate({
                lang: 'fr',
                rules: {
                    
                },
                invalidHandler: function (event, validator) {
                    
                },

                submitHandler: function (form) {
                    $.ajax({
                        type: "POST",
                        url: "{{url('/admin/coef/update')}}",
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function (data) {
                            if (data.code == 200) {
                                swal.fire({
                                    title: 'Modification Ok !',
                                    text: 'Modification Ok !',
                                    timer: 1000,
                                    type: "success",
                                    onOpen: function () {
                                        swal.showLoading()
                                    }
                                }).then(function (result) {
                                    if (result.dismiss === 'timer') {
                                        console.log('I was closed by the timer')
                                    }
                                })
                            }else {
                                swal.fire({
                                    title: 'Modification Not Ok !',
                                    text: 'Modification Not Ok !',
                                    timer: 1000,
                                    type: "error",
                                    onOpen: function () {
                                        swal.showLoading()
                                    }
                                }).then(function (result) {
                                    if (result.dismiss === 'timer') {
                                        console.log('I was closed by the timer')
                                    }
                                })
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

        $('#drivers_datatables').on('error.dt', function (e, settings, techNote, message) {
            console.log('An error has been reported by DataTables: ', message);
        });
        stocknro_dt = $('#drivers_datatables').DataTable({
            "autoWidth": true,
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "language": {"url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/French.json"},
            dom: `<'row'<'col-sm-12'tr>>
                        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            //"order": [[ 10, 'desc' ]],
            //"ajax": "{{url('/admin/getRides')}}",
            "ajax": {url: "{{url('/admin/getDrivers')}}", "contentType": "application/json",
                "data": function (data) {
                    data.driver_id = $('#driver_id').val();
                    data.nom_prenom = $('#nom_prenom').val();
                    data.phone = $('#phone').val();
                    data.email = $('#email').val();
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

                {"data": "civilite", "name": ""},
                {"data": "nom", "responsivePriority": -1, "name": ""},
                {"data": "prenom", "responsivePriority": -1, "name": ""},
                {"data": "email", "responsivePriority": -1, "name": ""},
                {"data": "phones_valide.0.numero", "name": "",
                    "render": function (data, type, full, meta) {

                        if (data) {
                            return data;

                        } else {
                            return '---'
                        }
                    }},
                {"data": "id_users", "name": ""},
                {
                    "data": "id_users", "name": "",
                    "responsivePriority": -1,
                },
            ],

            columnDefs: [
                {
                    "targets": 6,
                    "width": "10%",
                    "render": function (data, type, row) {
                        var checkbox = '<a href="{{url("/admin/driver/")}}' + '/' + data + '" class="button"><button type="button" class="btn btn-primary btn-sm">Détails</button></a>';
                        return checkbox;
                    },
                },
                {
                    targets: 0,
                    title: 'Agent',
                    render: function (data, type, full, meta) {
                        //var number = KTUtil.getRandomInt(1, 14);
                        //.'media/images/drivers/'
                        var user_img = "{{config('globals.url_api')}}"+'/media/images/drivers/'+full.id_users+'/' + full.id_users + '.png';
                        //return user_img;
                        var output;
                        if (full.image_profile == 1) {
                            output = `
                                <div class="kt-user-card-v2">
                                    <div class="kt-user-card-v2__pic">
                                        <img src="` + user_img + `" class="m-img-rounded kt-marginless" alt="photo">
                                    </div>
                                    <div class="kt-user-card-v2__details">
                                        <span class="kt-user-card-v2__name">` + full.nom + `</span>
                                        <a href="#" class="kt-user-card-v2__email kt-link">` + full.prenom + `</a>
                                    </div>
                                </div>`;
                        } else {
                            

                            output = `
                                <div class="kt-user-card-v2">
                                    <div class="kt-user-card-v2__pic">
                                        <div class="kt-badge kt-badge--xl kt-badge--primary"><span>` + full.prenom.substring(0, 1) + `</div>
                                    </div>
                                    <div class="kt-user-card-v2__details">
                                        <span class="kt-user-card-v2__name">` + full.nom + `</span>
                                        <a href="#" class="kt-user-card-v2__email kt-link">` + full.prenom + `</a>
                                    </div>
                                </div>`;
                        }

                        return output;
                    },
                },
                        /*{
                         "targets": 0,
                         "render": function (data, type, full, meta) {
                         var status = {
                         1: {'title': 'M.'},
                         2: {'title': 'Mr'},
                         3: {'title': 'Mm'},
                         
                         };
                         if (typeof status[data] === 'undefined') {
                         return data;
                         }
                         return status[data].title;
                         },
                         
                         },*/
            ],
            "displayLength": 10,
            lengthMenu: [5, 10, 25, 50],

        });
        $('#search_dt_drivers').click(function () {
            stocknro_dt.ajax.reload();
        });
    });
</script>
