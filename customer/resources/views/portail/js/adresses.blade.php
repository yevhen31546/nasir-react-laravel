<script src="https://maps.googleapis.com/maps/api/js?key={{Config::get('services.google_maps')}}&libraries=places"
async defer></script>
<script>
    "use strict";
    
    $("#form_add_adresse").validate({
                lang: 'fr',
                rules: {
                    adresse: {
                        required: true,
                        
                    },
                },
                invalidHandler: function (event, validator) {
                    var alert = $('#error_div');
                    alert.removeClass('hidden').show();
                    
                },

                submitHandler: function (form) {
                    $.ajax({
                        type: "POST",
                        url: "{{url('/adresse/add')}}",
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function (data) {
                            if (data.code == 200) {
                                $('#modal_add_adresse').modal('toggle');
                                var oTable = $('#datatable_adresse').DataTable();
                                oTable.ajax.reload();
                            } else if (data.code == 201) {
                                var alert = $('#error_div');
                                alert.removeClass('hidden').show();
                                if (data.message.indexOf("home") >= 0){
                                    $('#error_msg').text('Vous avez le nombre maximal des adresses domiciles');
                                }
                                if (data.message.indexOf("favoris") >= 0){
                                    $('#error_msg').text('Vous avez le nombre maximal des adresses favorites');
                                }
                                if (data.message.indexOf("work") >= 0){
                                    $('#error_msg').text('Vous avez le nombre maximal des adresses de travail');
                                }
                            } 
                        }
                    });
                    return false; // required to block normal submit since you used ajax
                }
            });
    
    $(document).ready(function () {
        
        $('#datatable_adresse').DataTable({
            bFilter: false, bInfo: false, paging: false,
            "language": {"url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/French.json"},

            "ajax": {url: "{{url('/adresses_user')}}", "contentType": "application/json",
                "data": function (data) {

                },
                dataFilter: function (res) {
                    var response = $.parseJSON(res);
                    if (response.code) {
                        window.location = "{{ url('/login') }}";
                    } else {
                        return res;
                    }
                    //return res;
                },
                "type": "POST", },
            "columns": [

                {"data": "adresse", "name": ""},
                {"data": "type", "responsivePriority": -1, "name": ""},
                {"data": "id_adresse", "responsivePriority": -1, "name": ""},
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
                        return '<a href="#" data-id=' + data + ' id="click_delete_adresse" data-toggle="modal" data-target="#delete-modal-sm" class="button button-mini button-circle button-red"><i class="icon-off"></i>Supprimer</a>';
                    }
                }
            ],
        });
    });
    $(document).on("click", "#click_delete_adresse", function () {
        var adresse_id = $(this).attr('data-id');
        $("#adresse_id_mod").val(adresse_id);
    });
    
    function delete_adresse_id() {
            var id = $('#adresse_id_mod').val();
            //console.log(id);
            $.ajax({
                type: "POST",
                url: "{{url('/adresse/delete')}}",
                data: {id: id},
                dataType: "json",
                context: this,
                success: function (data) {
                    //redirection(data);
                    if (data.code == 200) {
                        $('#datatable_adresse').DataTable().ajax.reload();
                        $('#delete-modal-sm').modal('toggle');

                    } else {

                    }

                }
            });
        }
        ;
</script>