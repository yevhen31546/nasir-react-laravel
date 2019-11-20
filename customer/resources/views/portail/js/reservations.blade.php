<script>
    "use strict";
    $(document).ready(function () {
        $('#datatable_reservation').DataTable({
            "language": {"url": "http://cdn.datatables.net/plug-ins/1.10.19/i18n/French.json"},
            
            "ajax": {url: "{{url('/reservations_user')}}", "contentType": "application/json",
                "data": function (data) {
                    
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
                "type": "POST", },
            "columns": [

                {"data": "id_ride", "name": ""},
                {"data": "date_debut", "responsivePriority": -1, "name": ""},
                {"data": "distance", "responsivePriority": -1, "name": ""},
            ],
        });
    });
</script>