<script>
    "use strict";
    $("#event-login").validate({
        lang: 'fr',
        rules: {
             password: {
                minlength: 5,
                required: true,
            },
            password_verify: {
                minlength: 5,
                equalTo: "#password",
                required: true,
            },

        },
        messages: {
            password_verify: "VEUILLEZ FOURNIR ENCORE LA MÊME VALEUR DE MOT DE PASSE.",
            //check_cgu: "VALIDER LES CONDITIONS générales d'utilisation",
            
        },
        invalidHandler: function (event, validator) {
            //alert('hda')
            var alert = $('#error_div');
            alert.removeClass('hidden').show();
        },

        submitHandler: function (form) {
            $.ajax({
                type: "POST",
                url: "{{ url('/changePassword') }}",
                data: $(form).serialize(),
                dataType: "json",
                success: function (data) {
                    if(data.code==200){
                       $('.successmsg').removeClass('hidden'); 
                       $('.errormsg').addClass('hidden');
                    }else{
                        $('.errormsg').removeClass('hidden'); 
                        $('.successmsg').addClass('hidden');
                    }
                }
            });
            return false;
        }


    });
</script>