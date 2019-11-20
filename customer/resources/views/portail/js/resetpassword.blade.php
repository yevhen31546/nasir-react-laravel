<script>
    "use strict";
    $("#event-login").validate({
        lang: 'fr',
        rules: {
            email: {
                required: true,
                email: true
            },

        },
        invalidHandler: function (event, validator) {

        },

        submitHandler: function (form) {
            $.ajax({
                type: "POST",
                url: "{{ url('/initialisation_password') }}",
                data: $(form).serialize(),
                dataType: "json",
                success: function (data) {
                    if (data.code == 200) {
                        var email = $('#email').val();
                        $('.successmsg').removeClass('hidden');
                        $('#msg_success').text('');
                        $('#msg_success').append('Un e-mail a été envoyé à votre adresse e-mail ' + email);


                        $('.errormsg').addClass('hidden');
                        $('#msg_txt').addClass('hidden');
                        $('#event-login').addClass('hidden');

                    }else if (data.code == 208) {

                        //var alert = $('#error_div');
                        $('.successmsg').addClass('hidden');
                        $('.errormsg').addClass('hidden');
                        $('#social_account').removeClass('hidden');
                        
                        
                        //alert.removeClass('hidden').show();
                        $('#social_account_msg').text('');
                        $('#social_account_msg').append('Impossible de modifier le mot de passe de compte ' + data.used);

                    } else {
                        $('.errormsg').removeClass('hidden');
                        $('.successmsg').addClass('hidden');
                    }

                }
            });
            return false;
        }


    });
</script>