<script>
    "use strict";
// Class definition


    jQuery(document).ready(function () {
        $("#simulation_form").validate({
            lang: 'fr',
            rules: {

            },
            invalidHandler: function (event, validator) {

            },

            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: "{{url('/admin/coef/simulation')}}",
                    data: $(form).serialize(),
                    dataType: "json",
                    success: function (data) {
                        if (data.kilometres) {
                            swal.fire({
                                title: 'Modification Not Ok !',
                                text: 'Modification Not Ok !',
                                timer: 1000,
                                type: "error",
                                onOpen: function () {
                                    swal.showLoading()
                                }
                            }).then(function (result) {
                                if (result.dismiss === 'timer') {
                                    console.log('I was closed by the timer')
                                }
                            })
                        } else {
                            $("#0_WB_00").val(data['1']['00']+' €');
                            $("#0_WE_00").val(data['0']['00']+' €');
                            $("#0_WB_06").val(data['1']['06']+' €');
                            $("#0_WE_06").val(data['0']['06']+' €');
                            $("#0_WB_22").val(data['1']['22']+' €');
                            $("#0_WE_22").val(data['0']['22']+' €');
                            
                            $("#1_WB_00").val(data['3']['00']+' €');
                            $("#1_WE_00").val(data['2']['00']+' €');
                            $("#1_WB_06").val(data['3']['06']+' €');
                            $("#1_WE_06").val(data['2']['06']+' €');
                            $("#1_WB_22").val(data['3']['22']+' €');
                            $("#1_WE_22").val(data['2']['22']+' €');
                        }
                    }
                });
                return false; // required to block normal submit since you used ajax
            }
        });
    });
</script>
