<script>
    "use strict";
// Class definition


    jQuery(document).ready(function () {
        $('#date_de').datetimepicker({
            //format: 'yyyy-mm-dd'
        }).on('changeDate', function (e) {
            $(this).datetimepicker('hide');
        });

        $('#date_a').datetimepicker({
            //format: 'yyyy-mm-dd'
        }).on('changeDate', function (e) {
            $(this).datetimepicker('hide');
        });


        var table_dt = null;
        function format(d) {
            return '<div class="row">' +
                    '<div class="col-lg-6">' +
                    '<div class="kt-portlet">' +
                    '<div class="">' +
                    '</div>' +
                    '<div class="kt-portlet__body">' +
                    '<div class="kt-section">' +
                    '<div class="kt-section__content">' +
                    '<table class="table table-bordered">' +
                    '<tbody>' +
                    '<tr>' +
                    '<td style="width: 30%;"  rowspan="2"><b>Address Source</b></td>' +
                    '<td >' + d.lagitude_depart + '</td>' +
                    '<td >' + d.longitude_depart + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td  colspan="2">' + d.lieu_depart + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td  rowspan="2"><b>Address Distination</b></td></td>' +
                    '<td >' + d.lagitude_arrive + '</td>' +
                    '<td >' + d.longitude_arrive + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td  colspan="2">' + d.lieu_arrive + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td ><b>Distance</b></td>' +
                    '<td colspan="2">' + d.distance + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td ><b>Duration</b></td>' +
                    '<td colspan="2">' + d.duration + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td ><b>Price HT</b></td>' +
                    '<td colspan="2">' + d.prix_ht + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td ><b>Price TTC</b></td>' +
                    '<td colspan="2">' + d.prix_ttc + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td ><b>Fees</b></td>' +
                    '<td colspan="2">' + d.fees + '</td>' +
                    '</tr>' +
                    '</tbody>' +
                    '</table>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-lg-3">' +
                    '<div class="kt-portlet">' +
                    '<div class="">' +
                    '</div>' +
                    '<div class="kt-portlet__body">' +
                    '<div class="kt-section">' +
                    '<div class="kt-section__content">' +
                    '<table class="table table-bordered">' +
                    '<thead>' +
                    '</thead>' +
                    '<tbody>' +
                    '<tr>' +
                    '<td style="width: 30%;"><strong>Nom et pr&eacute;nom</strong></td>' +
                    '<td>' + d.user.nom + ' ' + d.user.prenom + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td><strong>Compagnie</strong></td>' +
                    '<td>' + d.user.compagnie + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td><strong>Rue</strong></td>' +
                    '<td>' + d.user.adresse + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td><strong>Code postal&nbsp;</strong></td>' +
                    '<td>' + d.user.code_postal + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td><strong>ville</strong></td>' +
                    '<td>' + d.user.ville + '</td>' +
                    '</tr>' +
                    '</tbody>' +
                    '</table>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-lg-3">' +
                    '<div class="kt-portlet">' +
                    '<div class="">' +
                    '</div>' +
                    '<div class="kt-portlet__body">' +
                    '<div class="kt-section">' +
                    '<div class="kt-section__content">' +
                    '<table class="table table-bordered">' +
                    '<thead>' +
                    '<tbody>' +
                    '<tr>' +
                    '<td style="width: 30%;"><strong>Nom et pr&eacute;nom</strong></td>' +
                    '<td>' + d.driver.nom + ' ' + d.driver.prenom + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td><strong>Compagnie</strong></td>' +
                    '<td>' + d.driver.compagnie + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td><strong>Rue</strong></td>' +
                    '<td>' + d.driver.adresse + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td><strong>Code postal&nbsp;</strong></td>' +
                    '<td>' + d.driver.code_postal + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td><strong>ville</strong></td>' +
                    '<td>' + d.driver.ville + '</td>' +
                    '</tr>' +
                    '</tbody>' +
                    '</thead>' +
                    '<tbody>' +
                    '</tbody>' +
                    '</table>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
        }
        $.fn.dataTable.ext.errMode = 'none';

        $('#rides_datatables').on('error.dt', function (e, settings, techNote, message) {
            console.log('An error has been reported by DataTables: ', message);
        });

        table_dt = $('#rides_datatables').DataTable({

            "language": {"url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/French.json"},
            "autoWidth": true,
            "processing": true,
            "serverSide": true,
            "responsive": true,

            dom: `<'row'<'col-sm-12'tr>>
                        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            //"order": [[ 10, 'desc' ]],
            //"ajax": "{{url('/admin/getRides')}}",
            "ajax": {url: "{{url('/admin/getRides')}}", "contentType": "application/json",
                "data": function (data) {
                    data.ride_id = $('#ride_id').val();
                    data.driver_id = $('#driver_id').val();
                    data.date_de = $('#date_de').val();
                    data.date_a = $('#date_a').val();
                    data.statut_id = $('#statut_id').val();
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
                {
                    "class": "details-control",
                    "orderable": false,
                    "data": null,
                    "defaultContent": "",
                    "responsivePriority": -1,
                },
                {"data": "date_debut", "responsivePriority": -1, "name": "date_debut"},
                {"data": "status", "responsivePriority": -1, "name": "status"},
                {"data": "user.phones_valide.0.numero", "name": "ride.user.phones_valide.0.numero",
                    "render": function (data, type, full, meta) {

                        if (data) {
                            return data;

                        } else {
                            return '---'
                        }
                    }},
                {"data": "user.email", "name": "user.email"},
                {"data": "driver.phones_valide.0.numero", "name": "driver.phones_valide.numero",
                    "render": function (data, type, full, meta) {

                        if (data) {
                            return data;

                        } else {
                            return '---'
                        }
                    }
                },
                {"data": "id_ride", "name": "id_ride", "responsivePriority": -1,

                },
            ],

            columnDefs: [
                {
                    "targets": 0,
                    "orderable": false,
                    "render": function (data, type, row) {
                        var checkbox = '<i class="fa fa-angle-right" id="' + data.id_ride + '"></i>';
                        return checkbox;
                    },

                },
                {
                    "targets": 2,
                    "render": function (data, type, full, meta) {
                        var status = {
                            1: {'title': 'En cours', 'class': 'kt-badge kt-badge--warning kt-badge--inline kt-badge--pill kt-badge--rounded'},
                            2: {'title': 'Terminé', 'class': ' kt-badge kt-badge--success kt-badge--inline kt-badge--pill kt-badge--rounded'},
                            3: {'title': 'Annulé', 'class': ' kt-badge kt-badge--danger kt-badge--inline'},
                            4: {'title': 'Prochain', 'class': ' kt-badge kt-badge--dark kt-badge--inline kt-badge--pill kt-badge--rounded'},

                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
                    },

                },
                {
                    "targets": 3,
                    "orderable": false
                },
                {
                    "targets": 0,
                    "orderable": false
                },
                {
                    "targets": 5,
                    "orderable": false
                },
                {
                    "targets": 6,
                    "orderable": false,
                    "render": function (data, type, full, meta) {
                        var affect;
                        if (full.affecte == 0) {
                            affect = '<button data-toggle="modal" data-id=' + data + ' data-target="#modal_drivers" class="btn btn-primary btn-brand--icon" id="ride_id_btn"><span><i class="flaticon-user-add"></i><span>Affecter</span></span></button>';
                        } else {
                            affect = '<button data-toggle="modal" data-id=' + data + ' data-target="#modal_drivers" class="btn btn-success" id="ride_id_btn"><span><i class="flaticon2-checkmark"></i><span>Affecté</span></span></button>';
                        }
                        if (full.affecte_accept == 0) {
                            affect += '<button type="button" class="btn btn-warning btn-brand--icon"><i class="flaticon2-cross"></i></button>';
                        } else {
                            affect += '<button type="button" class="btn btn-success btn-icon"><i class="flaticon2-check-mark"></i></button>';
                        }
                        return affect;
                    },
                },
            ],
            "displayLength": 10,
            lengthMenu: [5, 10, 25, 50],

        });

        $(document).on("click", "#ride_id_btn", function () {
            var ride_id = $(this).attr('data-id');
            $("#ride_id_mod").val(ride_id);
        });

        var oTable = $('#rides_datatables').DataTable();

        $('#rides_datatables tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            //console.log(tr);
            var row = oTable.row(tr);
            if (row.data().driver === null) {
                row.data().driver = [];
                row.data().driver.nom = '';
                row.data().driver.prenom = '';
                row.data().driver.compagnie = '';
                row.data().driver.adresse = '';
                row.data().driver.code_postal = '';
                row.data().driver.ville = '';


            }

            if (row.data().user === null) {
                row.data().user = [];
                row.data().user.nom = '';
                row.data().user.prenom = '';
                row.data().user.compagnie = '';
                row.data().user.adresse = '';
                row.data().user.code_postal = '';
                row.data().user.ville = '';


            }
            //console.log(row.data());
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
                tr > $('#' + row.data().id_ride).removeClass('fa-angle-down').addClass('fa-angle-right');
            } else {
                // Open this row
                row.child(format(row.data())).show();
                tr > $('#' + row.data().id_ride).removeClass('fa-angle-right').addClass('fa-angle-down');
                tr.addClass('shown');
            }
        });



        $('#search_dt_rides').click(function () {
            table_dt.ajax.reload();
        });

        

        var rows_selected = [];
        var stocknro_dt = null;
        $.fn.dataTable.ext.errMode = 'none';

        $('#drivers_datatables').on('error.dt', function (e, settings, techNote, message) {
            console.log('An error has been reported by DataTables: ', message);
        });
        stocknro_dt = $('#drivers_datatables').DataTable({
            //"autoWidth": true,
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "language": {"url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/French.json"},
            dom: `<'row'<'col-sm-12'tr>>
                        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
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

                {"data": "nom", "responsivePriority": -1, "name": "",
                    
                },
                {"data": "email", "name": ""},
                {"data": "phones_valide.0.numero", "name": "",
                    "render": function (data, type, full, meta) {

                        if (data) {
                            return data;

                        } else {
                            return '---'
                        }
                    }},
                {"data": "id_users", "responsivePriority": -1, "name": "",

                },
            ],

            'columnDefs': [
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
                {
                    'targets': 3,
                    'checkboxes': {
                        'selectRow': true
                    }
                }
            ],
            'select': {
                'style': 'multi'
            },

        });


        //stocknro_dt.select.info( false);

        $("#nom_prenom").keypress(function () {
            stocknro_dt.ajax.reload();
        });

        $("#driver_id").keypress(function () {
            stocknro_dt.ajax.reload();
        });

        $("#email").keypress(function () {
            stocknro_dt.ajax.reload();
        });
        $('#affecter_btn').click(function () {
            var rows_selected = stocknro_dt.column(3).checkboxes.selected();
            console.log(rows_selected);
        });

    });
</script>
<style>
    .details-control{
        padding-left: 20px;
        font-size: 1.4rem;
        width: 12px;
    }
</style>