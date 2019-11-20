<script>
    "use strict";

    $("#event-registration").validate({
        lang: 'fr',
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                minlength: 5,
                required: true,
            },
            password_verify: {
                minlength: 5,
                equalTo: "#password",
                required: true,
            },
            check_cgu: {
                //required:true,
            }

        },
        messages: {
            password_verify: "VEUILLEZ FOURNIR ENCORE LA MÊME VALEUR DE MOT DE PASSE.",
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
                url: "{{ url('/inscription') }}",
                data: $(form).serialize(),
                dataType: "json",
                success: function (data) {
                    redirection(data);
                    if(data.code==200){
                        var email = $("[name='email']").val();
                        window.location = '{{url("/activation/")}}' +'/'+ email; 
                    }
                    
                    if(data.code==500){
                        var alert = $('#error_div');
                        alert.removeClass('hidden').show();
                        $('#error_msg').text('');
                        $('#error_msg').append('Erreur d\'insertion');
                    }
                    
                    if(data.code==201){
                        var email = $("[name='email']").val();
                        var alert = $('#error_div');
                        alert.removeClass('hidden').show();
                        if(data.message=='phone found'){
                            $('#error_msg').text('');
                            $('#error_msg').append('<strong>Ce numéro de téléphone est déjà utilisée pour un compte Weekab</strong>');
                            //$( "#lien" ).attr( 'href', '{{url("/initialisation/")}}' +'/'+ email );
                        }else{
                            window.location = '{{url("/login/")}}'; 
                    
                        }
                    }
                    


                }
            });
            return false;
        }


    });
    $('#depart_date').datetimepicker({
        //format: 'yyyy-mm-dd'
    }).on('changeDate', function (e) {
        $(this).datetimepicker('hide');
    });

    $("#avance_radio").click(function () {
        $('#date_depart_form').addClass('hidden').show();
        $('#depart_date').removeClass('required');
        $('#depart_date').data("DateTimePicker").clear();
        $('#depart_date').text('');
    });

    $("#avance_radio_").click(function () {
        $('#date_depart_form').removeClass('hidden').show();
        $('#depart_date').addClass('required');
    });


    jQuery(document).ready(function () {
        $(function () {
            $("#processTabs").tabs({show: {effect: "fade", duration: 400}});
            $(".tab-linker").click(function () {
                $("#processTabs").tabs("option", "active", $(this).attr('rel') - 1);
                return false;
            });
        });
    });
    





    jQuery(document).ready(function () {

        $(".price-range-slider").ionRangeSlider({
            type: "double",
            prefix: "$",
            min: 200,
            max: 10000,
            max_postfix: "+"
        });

        $(".area-range-slider").ionRangeSlider({
            type: "double",
            min: 50,
            max: 20000,
            from: 50,
            to: 20000,
            postfix: " sqm.",
            max_postfix: "+"
        });

        jQuery(".bt-switch").bootstrapSwitch();

    });



</script>