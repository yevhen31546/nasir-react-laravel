<script>
    "use strict";
// Class definition
    var KTFormControls = function () {
        var ctrl = function () {
            $("#password_form").validate({
                lang: 'fr',
                rules: {
                    password: {
                        minlength : 5,
                        required: true,
                    },
                    password_verify: {
                        minlength : 5,
                        equalTo: "#password",
                        required: true,
                    }
                    
                },
                invalidHandler: function (event, validator) {
                    var alert = $('#kt_form_update_password_msg');
                    alert.removeClass('kt-hide').show();
                    $('#error_message_update_password').text('Merci de remplir les champs obligatoires');
                    KTUtil.scrollTop();
                },

                submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: "{{url('/admin/updatePassword')}}",
                    data: $(form).serialize(),
                    dataType: "json",
                    success: function (data) {
                        redirection(data);
                        if (data.code == 200) {
                            var alert = $("#kt_form_update_password_msg");
                            alert.addClass('kt-hide').show();
                            swal.fire({
                                title: 'Modification Ok !',
                                text: 'Modification Ok !',
                                timer: 1000,
                                type: "success",
                                onOpen: function () {
                                    swal.showLoading();
                                }
                            }).then(function (result) {
                                if (result.dismiss === 'timer') {
                                    console.log('I was closed by the timer')
                                }
                            })
                        } else {
                            var alert = $("#kt_form_update_password_msg");
                            alert.removeClass('kt-hide').show();
                            $('#error_message_update_password').text('Erreur dans la modification');
                            KTUtil.scrollTop();
                        }
                    }
                });
                return false; // required to block normal submit since you used ajax
            }
            });
        }
        return {
            // public functions
            init: function () {
                ctrl();
            }
        };
    }();

    var KTFormPasswordControls = function () {
        var ctrl = function () {
            $("#form_update_profile").validate({
                lang: 'fr',
                rules: {
                    prenom: {
                        required: true,
                    },
                    nom: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },

                },
                invalidHandler: function (event, validator) {
                    var alert = $('#kt_form_update_profile_msg');
                    alert.removeClass('kt-hide').show();
                    $('#error_message').text('Merci de remplir les champs obligatoires');
                    KTUtil.scrollTop();
                },

                submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: "{{url('/admin/updateProfile')}}",
                    data: $(form).serialize(),
                    dataType: "json",
                    success: function (data) {
                        redirection(data);
                        if (data.code == 200) {
                            var alert = $("#kt_form_update_profile_msg");
                            alert.addClass('kt-hide').show();
                            swal.fire({
                                title: 'Modification Ok !',
                                text: 'Modification Ok !',
                                timer: 1000,
                                type: "success",
                                onOpen: function () {
                                    swal.showLoading();
                                }
                            }).then(function (result) {
                                if (result.dismiss === 'timer') {
                                    console.log('I was closed by the timer')
                                }
                            })
                            location.reload();
                        } else {
                            var alert = $("#kt_form_update_profile_msg");
                            alert.removeClass('kt-hide').show();
                            $('#error_message_update_profile').text('Erreur dans la modification');
                            KTUtil.scrollTop();
                        }
                    }
                });
                return false; // required to block normal submit since you used ajax
            }
            });
        }
        return {
            // public functions
            init: function () {
                ctrl();
            }
        };
    }();

    jQuery(document).ready(function () {
        KTFormControls.init();
        KTFormPasswordControls.init();

    });
</script>
