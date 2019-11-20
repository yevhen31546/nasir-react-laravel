<script>
    
    
    $("#event-activation").validate({
        lang: 'fr',
        rules: {
            code_activation: {
                required: true,
            }

        },
        messages: {
            code_activation: "VEUILLEZ FOURNIR LE CODE D'ACTIVATION.",
            //check_cgu: "VALIDER LES CONDITIONS générales d'utilisation",
            
        },

        invalidHandler: function (event, validator) {
            //alert('hda')
            //var alert = $('#error_div');
            //alert.removeClass('hidden').show();
        },

        submitHandler: function (form) {
            $.ajax({
                type: "POST",
                url: "{{ url('/activation') }}",
                data: $(form).serialize(),
                dataType: "json",
                success: function (data) {
                    if(data.code==500){
                        
                        var alert = $('#error_div');
                        alert.removeClass('hidden').show();
                        $('#error_msg').text('');
                        $('#error_msg').append('Error de modification dans le code d\'activation');
                    }
                    
                    if(data.code==404){
                        
                        var alert = $('#error_div');
                        alert.removeClass('hidden').show();
                        $('#error_msg').text('');
                        $('#error_msg').append('Utilisateur non existe merci se connecter à nouveau');
                    }
                    
                    if(data.code==202){
                        var alert = $('#error_div');
                        alert.removeClass('hidden').show();
                        $('#error_div').removeClass('successmsg');
                        $('#error_div').addClass('errormsg');
                        $('#error_msg').text('');
                        $('#error_msg').append('Votre code d\'activation est erroné !!!');
                    }
                    if(data.code==200){
                        
                        
                        
                        
                        //alert.removeClass('errormsg').show();
                        //alert.addClass('successmsg').show();
                        //$('#event-activation').addClass('hidden');
                        if(data.email=='true'){
                            //$('#formemail').addClass('hidden');
                            //$('#sms1').addClass('hidden');
                            //$('#sms2').addClass('hidden');
                        }else{
                            //$('#formemail').removeClass('hidden');
                            //$('#sendemail').addClass('hidden');
                            //$('#sms2').removeClass('hidden');
                        }
                        
                        
                    }

                }
            });
            return false;
        }


    });
    
    $("#sms-activation").validate({
        lang: 'fr',
        rules: {
            telephone: {
                required: true,
            }

        },
        messages: {
            code_activation: "VEUILLEZ FOURNIR LE CODE D'ACTIVATION.",
            //check_cgu: "VALIDER LES CONDITIONS générales d'utilisation",
            
        },

        invalidHandler: function (event, validator) {
            //alert('hda')
            //var alert = $('#error_div');
            //alert.removeClass('hidden').show();
        },

        submitHandler: function (form) {
            var email = $('#email').val();
            var pre = $('#pre').val();
            var telephone = $('#telephone').val();
            $.ajax({
                type: "POST",
                url: "{{ url('/sendSms') }}",
                data: {email: email,pre:pre,telephone:telephone},
                dataType: "json",
                success: function (data) {
                        var alert = $('#error_div');
                        alert.addClass('hidden').show();
                    if(data.code==200){
                       var alert = $('#error_div');
                        alert.removeClass('hidden').show();
                        $('#error_div').removeClass('errormsg');
                        $('#error_div').addClass('successmsg');
                        $('#error_msg').text('');
                        $('#error_msg').append('Votre sms est bien envoyé');
                    }else{
                        var alert = $('#error_div');
                        alert.removeClass('hidden').show();
                        
                        $('#error_msg').text('');
                        $('#error_msg').append('Votre sms est mal envoyé');
                    }
                }
            });
            return false;
        }


    });
    function sendsms(){
        var email = $('#email').val();
        $('#code_activation').val('');
            //console.log(id);
            $.ajax({
                type: "POST",
                url: "{{url('/sendSms')}}",
                data: {email: email},
                dataType: "json",
                context: this,
                success: function (data) {
                        var alert = $('#error_div');
                        alert.addClass('hidden').show();
                    if(data.code==200){
                       $('#11').removeClass('hidden'); 
                       $('#12').addClass('hidden');
                    }else{
                        $('#12').removeClass('hidden'); 
                        $('#11').addClass('hidden');
                    }

                }
            });
        }
        
        function sendemail(){
        var email = $('#email').val();
            //console.log(id);
            $.ajax({
                type: "POST",
                url: "{{url('/sendEmail')}}",
                data: {email: email},
                dataType: "json",
                context: this,
                success: function (data) {
                        var alert = $('#error_div');
                        alert.addClass('hidden').show();
                    if(data.code==200){
                       var alert = $('#error_div');
                        alert.removeClass('hidden').show();
                        $('#error_div').removeClass('errormsg');
                        $('#error_div').addClass('successmsg');
                        $('#error_msg').text('');
                        $('#error_msg').append('L\'email est bien envoyé');
                    }else{
                        var alert = $('#error_div');
                        alert.removeClass('hidden').show();
                        $('#error_msg').text('');
                        $('#error_msg').append('L\'email est mal envoyé');
                    }

                }
            });
        }
    
    jQuery(document).ready(function () {
        var array_url =  $(location).attr('href').split('/');
        var email = array_url[array_url.length-1];
        $('#email').val(email);
        
        
        //console.log(email); 
    });
</script>