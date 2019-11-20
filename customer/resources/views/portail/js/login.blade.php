<script>
    "use strict";
    $("#event-login").validate({
        lang: 'fr',
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
            },

        },
        invalidHandler: function (event, validator) {
            //alert('hda')
            var alert = $('#error_div');
            alert.removeClass('hidden').show();
        },

        submitHandler: function (form) {
            $.ajax({
                type: "POST",
                url: "{{ url('/user/login') }}",
                data: $(form).serialize(),
                dataType: "json",
                success: function (data) {
                    //console.log(data)
                    //response = $.parseJSON(data);
                    redirection(data);
                    if (data.code != 200 && data.role != 'user') {
                        setTimeout(function () {
                            
                            if(data.code == 202){
                                var email = $("[name='email']").val();
                                window.location = '{{url("/activation_login/")}}' +'/'+ email;
                                
                            }else if(data.code == 204){
                                var email = $("[name='email']").val();
                                window.location = '{{url("/activation_login/")}}' +'/'+ email;
                                
                            }else if(data.code == 206){
                                var email = $("[name='email']").val();
                                window.location = '{{url("/activation_login_email/")}}' +'/'+ email;
                                
                            }else if(data.code == 208){
                                
                                    $('#event-login').addClass('hidden');
                                    $('#social1').addClass('hidden');
                                    $('#social2').removeClass('hidden');
                                    $('#social_'+data.used).removeClass('hidden');
                                    var alert = $('#error_div');
                                    alert.removeClass('hidden').show();
                                    $('#error_msg').text('');
                                    $('#error_msg').append('Cette adresse email est utilisée pour un compte '+data.used);
              
                            }else{
                                var alert = $('#error_div');
                                alert.removeClass('hidden').show();
                                $('#error_msg').text('');
                                $('#error_msg').append('Email ou mot de passe incorrect, essayer de nouveau');
                                $( "#lien" ).attr( 'href', '{{url("/initialisation/")}}' +'/'+ email );
                            }
                            
                           }, 1000);
                    }else{
                        window.location = "{{ url('/course') }}";
                    }
                }
            });
            return false;
        }


    });
</script>