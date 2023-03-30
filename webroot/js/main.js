jQuery.validator.addMethod(
    "regex",
    function (value, element, param) {
        return value.match(new RegExp("^" + param + "$"));
    }
);
var ALPHA_REGEX = "[a-zA-Z_ ]*";
var ALPHA_REGEXn = /[0-9]/;

jQuery.validator.addMethod(
    'Uppercase',
    function (value) {
        return /[A-Z]/.test(value);
    },
    'Your password must contain at least one Uppercase Character.'
);
jQuery.validator.addMethod(
    'Lowercase',
    function (value) {
        return /[a-z]/.test(value);
    },
    'Your password must contain at least one Lowercase Character.'
);
jQuery.validator.addMethod(
    'Specialcharacter',
    function (value) {
        return /[!@#$%^&*()_-]/.test(value);
    },
    'Your password must contain at least one Special Character.'
);
jQuery.validator.addMethod(
    'Onedigit',
    function (value) {
        return /[0-9]/.test(value);
    },
    'Your password must contain at least one digit.'
);
jQuery.validator.addMethod(
    "noSpace",
    function (value, element) {
        return value == '' || value.trim().length != 0;
    },
    "No space please and don't leave it empty");

$(document).ready(function () {
    'use strict';

    $('.js-menu-toggle').click(function (e) {

        var $this = $(this);



        if ($('body').hasClass('show-sidebar')) {
            $('body').removeClass('show-sidebar');
            $this.removeClass('active');
        } else {
            $('body').addClass('show-sidebar');
            $this.addClass('active');
        }

        e.preventDefault();

    });

    // click outisde offcanvas
    // $(document).mouseup(function (e) {
    //     var container = $(".sidebar");
    //     if (!container.is(e.target) && container.has(e.target).length === 0) {
    //         if ($('body').hasClass('show-sidebar')) {
    //             $('body').removeClass('show-sidebar');
    //             $('body').find('.js-menu-toggle').removeClass('active');
    //         }
    //     }
    // });

    $(".contact-toggle").click(function () {
        $('.close-toggle').show();
        $(this).hide();
    });
    $(".close-toggle").click(function () {
        $('.contact-toggle').show();
        $(this).hide();
    });


});
var ALPHA_REGEX = "[a-zA-Z_ ]*";
$(document).ready(function () {

    $("#contactusform").validate({
        rules: {
            email: {
                required: true,
                noSpace: true,
                email: true,
            },
            name: {
                required: true,
                noSpace: true,
                regex: ALPHA_REGEX,
            },
            query_type: {
                noSpace: true,
                required: true,
            },
            'payment[priority]': {
                noSpace: true,
                required: true,
            },
            phone: {
                required: true,
                noSpace: true,
                digits: true,
                minlength: 10,
                maxlength: 10,
            },
       },
        messages: {
            email: {
                required: " Please enter email",
            },
            name: {
                required: "Please enter name ",
                regex: "Please enter characters only"
            },
            query_type: {
                required: "Please select query type ",
            },
            'payment[priority]': {
                required: "Please select priority",
            },
            phone: {
                required: " Please enter phone number ",
                digits: "Alphabates are not allowed",
                minlength: "phone number must be 10 digits",
                maxlength: "phone number must be 10 digits",
            },


        },
        submitHandler: function (form) {
            if (grecaptcha.getResponse() == "") {
                $('#cptcha-checkbox').html('please check this feild');
                $('#cptcha-checkbox').show();
                return false
            } else {
                $('#cptcha-checkbox').hide();
                $('#staticBackdrop').modal('show');
                var price = $('#payment_priority').val();
                $('#pay-now').html(price);
                $('#payment').val(price);
                // alert(price)
                // return false
                var formData = $(form).serialize();
                paymentval(formData);

                // $('#exampleModal').hide();
                // $('.modal-backdrop').hide();
                // $('.gif-loader').show();

                // $.ajax({
                //     headers: {
                //         "X-CSRF-TOKEN": csrfToken,
                //     },
                //     url: "/users/index",
                //     type: "JSON",
                //     method: "POST",
                //     data: formData,
                //     success: function (response) {
                //         var data = JSON.parse(response);
                //         console.log(data)
                //         swal("Submitted!", "Your details Has been Submitted Successfully!", "success");
                //         $('.gif-loader').hide();
                //         grecaptcha.reset();
                //         $('#contactusform')[0].reset();
                //     },
                // });
            }
        },
    });
});

function paymentval(formData) {
    $("#payment-form").validate({
        rules: {
            'card-name': {
                noSpace: true,
                required: true,
                regex: ALPHA_REGEX,
            },
            'card-no': {
                noSpace: true,
                required: true,
                digits: true,
                minlength: 16,
                maxlength: 16,
            },
            cvc: {
                noSpace: true,
                required: true,
                digits: true,
                minlength: 3,
                maxlength: 3,
            },
            month: {
                noSpace: true,
                required: true,
                digits: true,
                minlength: 02,
                maxlength: 02,
            },
            year: {
                noSpace: true,
                required: true,
                digits: true,
                minlength: 04,
                maxlength: 04,
            },



        },
        messages: {
            'card-name': {
                required: " Please enter name as per card",
                regex: "Please enter characters only"
            },
            'card-no': {
                required: "Please enter card number ",
                digits: "Alphabates are not allowed",
                minlength: "Please enter valid card number",
                maxlength: "Card must be 16 digits",
            },
            cvc: {
                required: "Please enter cvc ",
                digits: "Alphabates are not allowed",
                minlength: "Please enter valid cvc",
                maxlength: "Please enter valid cvc",
            },
            month: {
                required: "Please enter expiry month",
                digits: "Alphabates are not allowed",
                minlength: "Please enter valid month",
                maxlength: "Please enter valid month",
            },
            year: {
                required: " Please enter year ",
                digits: "Alphabates are not allowed",
                minlength: "Please enter valid year",
                maxlength: "Please enter valid year",
            },


        },
        submitHandler: function (form) {
            // alert("jjjjjjjjjjjjjj");
            // return false;
            $('#exampleModal').hide();
            $('.modal-backdrop').hide();
            $('.gif-loader').show();
            var formda = formData;
            // var formD = $(form).serialize();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/users/index",
                type: "JSON",
                method: "POST",
                data: formda,
                success: function (response) {
                    var data = JSON.parse(response);
                    console.log(data)
                    swal("Submitted!", "Your details has been submitted successfully!", "success");
                    $('.gif-loader').hide();
                    grecaptcha.reset();
                    $('#contactusform')[0].reset();
                },
            });
            return false;
        },
    });
}

