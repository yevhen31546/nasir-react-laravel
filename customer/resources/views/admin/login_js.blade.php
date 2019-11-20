<script>
   $("#login_signin_submit").click(function () {
       $.ajax({
                type: 'POST',
                url: '{{url("admin/login")}}' ,
                dataType: "json",
                success: function (data) {
                    console.log(data);
                },

                error: function () {

                }
            });
   });
</script>