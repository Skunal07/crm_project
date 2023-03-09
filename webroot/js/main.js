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

  $('.js-menu-toggle').click(function(e) {

  	var $this = $(this);

  	

  	if ( $('body').hasClass('show-sidebar') ) {
  		$('body').removeClass('show-sidebar');
  		$this.removeClass('active');
  	} else {
  		$('body').addClass('show-sidebar');	
  		$this.addClass('active');
  	}

  	e.preventDefault();

  });

  // click outisde offcanvas
	$(document).mouseup(function(e) {
    var container = $(".sidebar");
    if (!container.is(e.target) && container.has(e.target).length === 0) {
      if ( $('body').hasClass('show-sidebar') ) {
				$('body').removeClass('show-sidebar');
				$('body').find('.js-menu-toggle').removeClass('active');
			}
    }
	}); 

    

});
var ALPHA_REGEX = "[a-zA-Z_ ]*";
$(document).ready(function () {

    $("#contactusform").validate({
        rules: {
            email: {
				email: true,
				required: true,
			},
			name: {
				required: true,
                regex: ALPHA_REGEX,
			},
			query_type: {
				noSpace: true,
				required: true,
			},
			phone: {
				 required: true,
				 minlength: 10,
				 maxlength: 10,
				},
				checkbox: {
					required: true,
			}

        },
        messages: {
            email: {
                required: " Please enter Email",
			},
			name: {
				required: "Please enter Name ",
				regex: "Please enter characters only"
			},
			query_type: {
				required: "Please srlect Query Type ",
			},
			phone: {
			   required: " Please enter Phone Number ",
                minlength: "phone number must be 10 digits",
                maxlength: "phone number must be 10 digits",
			},
			checkbox: {
				required: "Please Accept Terms & Condition",
			}
          
        },
        submitHandler: function (form) {
            $('.gif-loader').show();
            var formData = $(form).serialize();
            
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/users/index",
                type: "JSON",
                method: "POST",
                data: formData,
                success: function (response) {
                    var data = JSON.parse(response);
					console.log(data)
                    swal("Submitted!", "Your details Has been Submitted Successfully!", "success");
                    $('.gif-loader').hide();
                    // $("#staff_update").load("/users/users_list #staff_update");
                    // $('#updateDetails').hide();
                    // $('.modal-backdrop').hide();
                },
            });
        },
    });
});