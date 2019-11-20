<script>
    "use strict";
    var resize = $('#upload-demo').croppie({
        enableExif: true,
        enableOrientation: true,
        viewport: {// Default { width: 100, height: 100, type: 'square' } 
            width: 200,
            height: 200,
            type: 'circle' //square
        },
        boundary: {
            width: 300,
            height: 300
        }
    });


 
                   
     $('.btn-upload-image').on('click', function (ev) {
             if ($('#image').get(0).files.length === 0) {
                 var alert = $('#kt_form_1_msg_picture');
                 alert.removeClass('kt-hide').show();
                 //$('#error_message').text('Merci de choisir une image');
                 KTUtil.scrollTop();
             } else {
                 resize.croppie('result', {
                     type: 'canvas',
                     size: 'viewport'
                 }).then(function (img) {
                     $("#preview-crop-image").css('background-image', 'none');
                     $('#preview-crop-image').css('background-image', 'url('+img+')');
                     $('#image_src').val(img);
                     $('#change-pic').modal('toggle');
                     
                 });
             }

         });



    $('#image').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            resize.croppie('bind', {
                url: e.target.result
            }).then(function () {
                //console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
    });
// Class definition
    function show_details_id(id) {
        $("div[id^='hide_details_']").addClass("kt-hide");
        $('#hide_details_tabs').removeClass("kt-hide");
        //$("div").attr("data-bind", "show_details").addClass("kt-hide");
        $('#hide_details_' + id).removeClass("kt-hide");
    }

    function show_details_car(id) {
        $("div[id^='car_hide_details_']").addClass("kt-hide");
        $('#car_hide_details_tabs').removeClass("kt-hide");
        //$("div").attr("data-bind", "show_details").addClass("kt-hide");
        $('#car_hide_details_' + id).removeClass("kt-hide");
    }

    

    $('input[name="check_titulaire"]').click(function () {
        if ($(this).prop("checked") == false) {
            //$('#check_titu').addClass('kt-hide').show();
        } else if ($(this).prop("checked") == true) {
            //$('#check_titu').removeClass('kt-hide').show();
        }
    });

    $('#date_naissance').datepicker({
        format: 'yyyy-mm-dd'
    }).on('changeDate', function (e) {
        $(this).datepicker('hide');
    });

    $('#date_fin_validite_car_update').datepicker({
        format: 'yyyy-mm-dd'
    }).on('changeDate', function (e) {
        $(this).datepicker('hide');
    });


    $('#date_immatricule').datepicker({
        format: 'yyyy-mm-dd'
    }).on('changeDate', function (e) {
        $(this).datepicker('hide');
    });
    $('#categorie_a').datepicker({
        format: 'yyyy-mm-dd'
    }).on('changeDate', function (e) {
        $(this).datepicker('hide');
    });
    $('#categorie_b').datepicker({
        format: 'yyyy-mm-dd'
    }).on('changeDate', function (e) {
        $(this).datepicker('hide');
    });
    $('#date_imma').datepicker({
        format: 'yyyy-mm-dd'
    }).on('changeDate', function (e) {
        $(this).datepicker('hide');
    });

    $('#date').datepicker({
        format: 'yyyy-mm-dd'
    }).on('changeDate', function (e) {
        $(this).datepicker('hide');
    });

    $('#date_fin_validite_assurance').datepicker({
        format: 'yyyy-mm-dd'
    }).on('changeDate', function (e) {
        $(this).datepicker('hide');
    });

    $('#date_fin_validite').datepicker({
        format: 'yyyy-mm-dd'
    }).on('changeDate', function (e) {
        $(this).datepicker('hide');
    });



    $('#date_imma_id').datepicker({
        format: 'yyyy-mm-dd'
    }).on('changeDate', function (e) {
        $(this).datepicker('hide');
    });

    $("input[id^='date_imma_']").datepicker({
        format: 'yyyy-mm-dd'
    }).on('changeDate', function (e) {
        $(this).datepicker('hide');
    });

    $("input[id^='date_immatricule_update_']").datepicker({
        format: 'yyyy-mm-dd'
    }).on('changeDate', function (e) {
        $(this).datepicker('hide');
    });

    $("input[id^='date_fin_validite_car_update_']").datepicker({
        format: 'yyyy-mm-dd'
    }).on('changeDate', function (e) {
        $(this).datepicker('hide');
    });


    jQuery(document).ready(function () {
        KTFormControls.init();
        KTidControls.init();
        KTgerantControls.init();
        KTassuranceControls.init();
        KTcarControls.init();
        //KTcarUpdateControls.init();

        $('#new_gerant_popup').on('show.bs.modal', function (e) {
            var Id = $(e.relatedTarget).data('identification-personnelle-morale-id');
            $(e.currentTarget).find('input[id="identification_personnelle_morale_id"]').val(Id);
        });

        var hash = window.location.hash;
        hash && $('ul.nav a[href="' + hash + '"]').tab('show');

        $('.nav-tabs a').click(function (e) {
            $(this).tab('show');
            var scrollmem = $('body').scrollTop() || $('html').scrollTop();
            window.location.hash = this.hash;
            $('html,body').scrollTop(scrollmem);
        });
    });

    var KTFormControls = function () {
        $.validator.addMethod('filesize', function (value, element, param) {
            return this.optional(element) || (element.files[0].size <= param * 1000000)
        }, 'La taille du fichier doit être inférieure à {0}');
        var ctrl = function () {
            $("#form_update_driver").validate({
                lang: 'fr',
                rules: {
                    email: {
                        required: true,
                        email: true,
                        minlength: 10
                    },
                    telephone: {
                        required: true,
                        maxlength: 12
                    },
                    nom: {
                        required: true,
                    },
                    prenom: {
                        required: true,
                    },
                    avatar_driver: {
                        extension: "jpg,jpeg,png",
                        filesize: 1,
                    },
                    code_postal: {
                        number: true,
                        maxlength: 10
                    },
                    date_naissance: {
                        required: true,
                    }
                },
                messages: {
                    avatar_driver: {
                        extension: "Merci de télécharger une image valide (jpg,jpeg,png)",
                    }
                },
                invalidHandler: function (event, validator) {
                    var alert = $('#kt_form_1_msg');
                    alert.removeClass('kt-hide').show();
                    $('#error_message').text('Merci de remplir les champs obligatoires');
                    KTUtil.scrollTop();
                },

                submitHandler: function (form) {
                    if($('#image_src').val().length == 0){
                        
                    }else{
                       $.ajax({
                         url: "{{url('/admin/driver/updatePicture/')}}",
                         type: "POST",
                         data: {"image": $('#image_src').val(),
                                "id_user": $('#id').val()},
                         success: function (data) {
                             //$("#preview-crop-image").css('background-image', 'none');
                             //$('#preview-crop-image').css('background-image', 'url('+data.image+')');
                             //console.log(data);
                             //var alert = $('#kt_form_1_msg_picture');
                             //alert.addClass('kt-hide').show();
                             //$('#change-pic').modal('toggle');
                             //var html = '<img src="' + img + '" />';
                             //$("#preview-crop-image").html(html);
                             //$("#preview-crop-image").css("background-image",data);
                         }
                     }); 
                    }
                    
                    
                    var formData = new FormData(form);
                    formData.avatar_driver = ($('#avatar_driver').val());
                    $.ajax({
                        type: "POST",
                        url: "{{url('/admin/driver/update/')}}",
                        data: formData,
                        dataType: "json",
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            redirection(data);
                            if (data.content == true) {
                                var alert = $('#kt_form_1_msg');
                                alert.addClass('kt-hide').show();
                                swal.fire({
                                    title: 'Modification Ok !',
                                    text: 'Modification Ok !',
                                    timer: 1000,
                                    type: "success",
                                    onOpen: function () {
                                        swal.showLoading()
                                    }
                                }).then(function (result) {
                                    if (result.dismiss === 'timer') {
                                        console.log('I was closed by the timer')
                                    }
                                })
                            } else {
                                var alert = $('#kt_form_1_msg');
                                alert.removeClass('kt-hide').show();
                                $('#error_message').text('Erreur dans la modification');
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


    var KTassuranceControls = function () {
        var ctrl = function () {
            $("#form_update_assurances").validate({
                lang: 'fr',
                rules: {

                },
                invalidHandler: function (event, validator) {
                    var alert = $('#kt_form_assurance_msg');
                    alert.removeClass('kt-hide').show();
                    $('#error_message_assurance').text('Merci de remplir les champs obligatoires');
                    KTUtil.scrollTop();
                },

                submitHandler: function (form) {
                    $.ajax({
                        type: "POST",
                        url: "{{url('/admin/assurance/update')}}",
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function (data) {
                            redirection(data);
                            if (data.code == 200) {
                                swal.fire({
                                    title: 'Modification Ok !',
                                    text: 'Modification Ok !',
                                    timer: 1000,
                                    type: "success",
                                    onOpen: function () {
                                        swal.showLoading()
                                    }
                                }).then(function (result) {
                                    if (result.dismiss === 'timer') {
                                        console.log('I was closed by the timer')
                                    }
                                })

                            } else {
                                var alert = $('#kt_form_assurance_msg');
                                alert.removeClass('kt-hide').show();
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


    function update_car(id) {
        $("#form_update_car_" + id).validate({
            lang: 'fr',
            rules: {

            },
            invalidHandler: function (event, validator) {
                var alert = $('#kt_form_car_update_msg');
                alert.removeClass('kt-hide').show();
                $('#error_message_update_car').text('Merci de remplir les champs obligatoires');
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: "{{url('/admin/car/update')}}",
                    data: $(form).serialize(),
                    dataType: "json",
                    success: function (data) {
                        redirection(data);
                        if (data.code == 200) {
                            swal.fire({
                                title: 'Modification Ok !',
                                text: 'Modification Ok !',
                                timer: 1000,
                                type: "success",
                                onOpen: function () {
                                    swal.showLoading()
                                }
                            }).then(function (result) {
                                if (result.dismiss === 'timer') {
                                    console.log('I was closed by the timer')
                                }
                            })

                        } else {
                            var alert = $('#kt_form_car_update_msg');
                            alert.removeClass('kt-hide').show();
                            KTUtil.scrollTop();
                        }
                    }
                });
                return false; // required to block normal submit since you used ajax
            }
        });
    }




    var KTcarControls = function () {
        var ctrl = function () {
            $("#form_add_car").validate({
                lang: 'fr',
                rules: {
                    cat_local: {
                        required: true,
                    },
                    immatricule: {
                        required: true,
                    },
                    date_immatricule: {
                        required: true,
                    }
                },
                invalidHandler: function (event, validator) {
                    var alert = $('#kt_form_car_add_msg');
                    alert.removeClass('kt-hide').show();
                    $('#error_message_add_car').text('Merci de remplir les champs obligatoires');
                    KTUtil.scrollTop();
                },

                submitHandler: function (form) {
                    $.ajax({
                        type: "POST",
                        url: "{{url('/admin/car/add')}}",
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function (data) {
                            redirection(data);
                            if (data.code == 200) {
                                $('#new_car_popup').modal('toggle');
                                location.reload();

                            } else {
                                var alert = $('#kt_form_car_add_msg');
                                alert.removeClass('kt-hide').show();
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



    var KTidControls = function () {
        var ctrl = function () {
            $("#form_add_id").validate({
                lang: 'fr',
                rules: {
                    immatriculation_tcs: {
                        required: true,
                    },
                    forme_juridique: {
                        required: true,
                    },
                    date_imma: {
                        required: true,
                    },
                    denomination: {
                        required: true,
                    },
                },
                invalidHandler: function (event, validator) {
                    var alert = $('#kt_form_id_msg');
                    alert.removeClass('kt-hide').show();
                    $('#error_message').text('Merci de remplir les champs obligatoires');
                    KTUtil.scrollTop();
                },

                submitHandler: function (form) {
                    $.ajax({
                        type: "POST",
                        url: "{{url('/admin/identification/add')}}",
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function (data) {
                            redirection(data);
                            if (data.code == 200) {
                                $('#new_id_popup').modal('toggle');
                                location.reload();

                            } else {
                                var alert = $('#kt_form_id_msg');
                                alert.removeClass('kt-hide').show();
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

    var KTgerantControls = function () {
        var ctrl = function () {
            $("#form_add_gerant").validate({
                lang: 'fr',
                rules: {
                    nom: {
                        required: true,
                    },
                    prenom: {
                        required: true,
                    },
                },
                invalidHandler: function (event, validator) {
                    var alert = $('#kt_form_gerant_add_msg');
                    alert.removeClass('kt-hide').show();
                    $('#error_message_add_gerant').text('Merci de remplir les champs obligatoires');
                    KTUtil.scrollTop();
                },

                submitHandler: function (form) {
                    $.ajax({
                        type: "POST",
                        url: "{{url('/admin/gerant/add')}}",
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function (data) {
                            redirection(data);
                            if (data.code == 200) {
                                $('#new_id_popup').modal('toggle');
                                $('a[href="#identification_tabs"]').click();
                                location.reload();

                            } else {
                                var alert = $('#kt_form_gerant_add_msg');
                                alert.removeClass('kt-hide').show();
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


    function delete_id(id) {
        $.ajax({
            type: "POST",
            url: "{{url('/admin/identification/delete')}}" + '/' + id,
            data: {id: id},
            dataType: "json",
            context: this,
            success: function (data) {
                redirection(data);
                if (data.code == 200) {
                    $('a[href="#identification_tabs"]').click();
                    location.reload();

                } else {

                }

            }
        });
    }
    ;

    function delete_car(id) {
        $.ajax({
            type: "POST",
            url: "{{url('/admin/car/delete')}}" + '/' + id,
            data: {id: id},
            dataType: "json",
            context: this,
            success: function (data) {
                redirection(data);
                if (data.code == 200) {
                    $('a[href="#cars_tabs"]').click();
                    location.reload();

                } else {

                }

            }
        });
    }
    ;

    function delete_gerant(id) {
        $.ajax({
            type: "POST",
            url: "{{url('/admin/gerant/delete')}}" + '/' + id,
            data: {id: id},
            dataType: "json",
            context: this,
            success: function (data) {
                redirection(data);
                if (data.code == 200) {
                    $('a[href="#identification_tabs"]').click();
                    location.reload();

                } else {

                }

            }
        });
    }
    ;
    function update_id(id) {
        $("#form_update_id_" + id).validate({
            lang: 'fr',
            rules: {
                immatriculation_tcs: {
                    required: true,
                },
                forme_juridique: {
                    required: true,
                },
                date_imma: {
                    required: true,
                },
                denomination: {
                    required: true,
                },
            },
            invalidHandler: function (event, validator) {
                var alert = $("#kt_form_update_msg_" + id);
                alert.removeClass('kt-hide').show();
                $('#error_message_update_' + id).text('Merci de remplir les champs obligatoires');
                KTUtil.scrollTop();
            },

            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: "{{url('/admin/identification/update')}}",
                    data: $(form).serialize(),
                    dataType: "json",
                    success: function (data) {
                        redirection(data);
                        if (data.content == true) {
                            var alert = $("#kt_form_update_msg_" + id);
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
                            var alert = $("#kt_form_update_msg_" + id);
                            alert.removeClass('kt-hide').show();
                            $('#error_message_update_' + id).text('Erreur dans la modification');
                            KTUtil.scrollTop();
                        }
                    }
                });
                return false; // required to block normal submit since you used ajax
            }
        });

    }



</script>