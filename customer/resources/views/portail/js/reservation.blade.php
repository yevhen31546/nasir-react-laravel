<script src="{{asset('assets/js/masking-input.js')}}" type="text/javascript"></script>
<script>
    var stripe_key = "{{Config::get('services.stripe_public')}}";
    "use strict";
    function stripeResponseHandler(status, response) {
        if (response.error) {
            //console.log('errrror');
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            $.ajax({
                type: "POST",
                url: "{{ url('/checkCard') }}",
                data:
                        {'token': token,
                            'amount': $('#prix').val()

                        },
                //dataType: "json",
                success: function (data) {
                    data = $.parseJSON(data);
                    //console.log(data.code)
                    //redirection(data);
                    if (data.code != 200) {
                        setTimeout(function () {
                            var alert = $('#error_div');
                            alert.removeClass('hidden').show();
                            //$('#error_msg').append('<i class="icon-remove">');
                            $('#error_msg').text('Erreur de paiment merci saisi à nouveau');
                        }, 1000);
                    } else {
                        window.location = "{{ url('/reservation/facturation') }}";
                    }
                }
            });

        }
    }
    $("#event-order").validate({
        lang: 'fr',
        rules: {
            titulaire: {
                required: true,
            },
            number: {
                required: true,
            },
            csv: {
                required: true,
            },
        },
        invalidHandler: function (event, validator) {
            //alert('hda')
            //var alert = $('#error_div');
            //alert.removeClass('hidden').show();
        },
        submitHandler: function (form) {
            //console.log('oooooook')
            //e.preventDefault();
            Stripe.setPublishableKey(stripe_key);
            Stripe.createToken({
                number: $('#number').val(),
                cvc: $('#cvc').val(),
                exp_month: $('#exp_month').val(),
                exp_year: $('#exp_year').val()
            }, stripeResponseHandler);
            /*function stripeResponseHandler(status, response) {
             if (response.error) {
             console.log('errrror');
             } else {
             // token contains id, last4, and card type
             var token = response['id'];
             console.log(token);
             // insert the token into the form so it gets submitted to the server
             //$form.find('input[type=text]').empty();
             //$form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
             //$form.get(0).submit();
             }
             }
             $.ajax({
             type: "POST",
             url: "{{ url('/reservation/paiement') }}",
             data: $(form).serialize(),
             //dataType: "json",
             success: function (data) {
             data = $.parseJSON(data);
             //console.log(data.code)
             redirection(data);
             if (data.code != 200) {
             setTimeout(function () {
             var alert = $('#error_div');
             alert.removeClass('hidden').show();
             //$('#error_msg').append('<i class="icon-remove">');
             $('#error_msg').text('Erreur de paiment merci saisi à nouveau');
             }, 1000);
             }else{
             window.location = "{{ url('/reservation/facturation') }}";
             }
             }
             });
             return false;*/
        }


    });
</script>