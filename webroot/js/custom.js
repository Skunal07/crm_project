jQuery.validator.addMethod(
    "regex",
    function (value, element, param) {
        return value.match(new RegExp("^" + param + "$"));
    }
);
var ALPHA_REGEX = "[a-zA-Z_ ]*";
var ALPHA_REGEXn = "/^[0-9]+$/";

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
//----------------------------------- Add Company Using ajax -------------------------//

$(document).ready(function () {
    $("#newcompany").validate({
        rules: {
            company_name: {
                required: true,
                regex: ALPHA_REGEX,
                noSpace:true,
            },
        },
        messages: {
            company_name: {
                required: "Please enter company name ",
                regex: "Please enter characters only",

            },
        },
        submitHandler: function (form) {

            var formData = $(form).serialize();

            // console.log(formData);
            // return false;
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/companies/addcompany",
                type: "JSON",
                method: "POST",
                data: formData,
                success: function (response) {

                    var data = JSON.parse(response);
                    if (data["status"] == 0) {
                        alert(data["message"]);
                    } else {
                        $('#AddModal').modal('hide');
                        $('#company').load('/companies/index #company')
                    }
                },
            });
            return false;
        },
    });
});

//----------------------------------- Fetch Details For Company Edit Using ajax -------------------------//

$(document).on("click", ".editCompany", function () {
    var user_id = $(this).data("id");
    $.ajax({
        url: "/companies/editCompany",
        data: { id: user_id },
        type: "JSON",
        method: "get",
        success: function (response) {

            user = $.parseJSON(response);
            // console.log(user["email"]);

            $("#companyiddd").val(user["id"]);
            $("#companyname").val(user["company_name"]);



        },
    });
});


//-----------------------------------  Company Edit Using ajax -------------------------//

$(document).ready(function () {
    $("#companyEdits").validate({
        rules: {
            company_name: {
                required: true,
                regex: ALPHA_REGEX,
            },

        },
        messages: {
            company_name: {
                required: " Please enter your Company name",
                regex: "Please enter characters only"
            },

        },
        submitHandler: function (form) {
            var formData = $(form).serialize();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/companies/companyEdit",
                type: "JSON",
                method: "POST",
                data: formData,
                success: function (response) {
                    var data = JSON.parse(response);

                    $(".table-responsive").load("/companies/index .table-responsive");
                    swal("Good job!", "User details Has been updated!", "success");
                    $('#companyEdit').hide();
                    $('.modal-backdrop').hide();

                },
            });
            return false;
        },
    });
});


//------------------------------------- Delete Company using ajax ---------------------------------------//


$(document).on("click", ".btn-delete-company", function () {
    // alert('dgkhdfhg');

    var csrfToken = $('meta[name="csrfToken"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
        }
    });
    var postdata = $(this).attr("data-id");

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                // alert(postdata);
                $.ajax({
                    url: "/companies/deleteCompany/" + postdata,
                    data: postdata,
                    type: "JSON",
                    method: "post",
                    success: function (response) {

                        $('#data' + postdata).hide();
                        swal("Data Deleted Succesfully!", "You clicked the button!", "success");
                    }
                });
            }
        })

});


//----------------------------------- Add Category Using ajax -------------------------//

$(document).ready(function () {
    // alert('nhjhbncjhsjknc');
    $("#newcategory").validate({
        rules: {
            category_name: {
                required: true,
                regex: ALPHA_REGEX,
            },
        },
        messages: {
            category_name: {
                required: "Please enter category name ",
                regex: "Please enter characters only"
            },
        },
        submitHandler: function (form) {
            // alert("dddd");
            var formData = $(form).serialize();
            // console.log(formData);
            // return false;
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/categories/addcategory",
                type: "JSON",
                method: "POST",
                data: formData,
                success: function (response) {

                    var data = JSON.parse(response);
                    if (data["status"] == 0) {
                        alert(data["message"]);
                    } else {
                        $('#AddcategoryModal').modal('hide');
                        $('#category').load('/categories/index #category')
                    }
                },
            });
            return false;
        },
    });
});

//----------------------------------- Fetch Details For Categories Edit Using ajax -------------------------//
$(document).on("click", ".editCategories", function () {
    var user_id = $(this).data("id");
    $.ajax({
        url: "/categories/editCategories",
        data: { id: user_id },
        type: "JSON",
        method: "get",
        success: function (response) {

            user = $.parseJSON(response);
            // console.log(user["email"]);

            $("#catiddd").val(user["id"]);
            $("#name").val(user["category_name"]);



        },
    });
});

//-----------------------------------  Categories Edit Using ajax -------------------------//

$(document).ready(function () {
    $("#editcat").validate({
        rules: {
            category_name: {
                required: true,
                regex: ALPHA_REGEX,
            },

        },
        messages: {
            category_name: {
                required: " Please enter your Category name",
                regex: "Please enter characters only"
            },

        },
        submitHandler: function (form) {
            var formData = $(form).serialize();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/categories/editCategory",
                type: "JSON",
                method: "POST",
                data: formData,
                success: function (response) {
                    var data = JSON.parse(response);

                    $("#category").load("/categories/index #category");
                    swal("Good job!", "User details Has been updated!", "success");
                    $('#editcategoryModal').hide();
                    $('.modal-backdrop').hide();

                },
            });
            return false;
        },
    });
});


//------------------------------------- Delete Categories using ajax ---------------------------------------//


$(document).on("click", ".btn-delete-category", function () {


    var postdata = $(this).attr("data-id");

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                // alert(postdata);
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                    },
                    url: "/categories/deleteStatus/" + postdata,
                    data: postdata,
                    type: "JSON",
                    method: "post",
                    success: function (response) {

                        $('#data' + postdata).hide();
                        swal("Data Deleted Succesfully!", "You clicked the button!", "success");
                    }
                });
            }
        })

});


//----------------------------------- Add Product Using ajax -------------------------//

$(document).ready(function () {
    $("#newproduct").validate({
        rules: {
            product_name: {
                required: true,

            },
            category_id: {
                required: true,
            },
            product_tags: {
                required: true,
            },
            short_discription: {
                required: true,
            },
            description: {
                required: true,
            },
            product_image: {
                required: true,
            },
        },
        messages: {
            product_name: {
                required: "Please enter company name ",

            },
            category_id: {
                required: "Please select category name ",
            },
            product_tags: {
                required: "Please enter Product tags name ",
            },
            short_discription: {
                required: "Please enter short discription  ",
            },
            description: {
                required: "Please select description",
            },
            product_image: {
                required: "Please enter company name ",
            },

        },
        submitHandler: function (form) {
            var formData = new FormData(form);
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/products/addproduct",
                type: "JSON",
                method: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: formData,
                success: function (response) {

                    var data = JSON.parse(response);
                    if (data["status"] == 0) {
                        alert(data["message"]);
                        $('#AddProductModal').modal('hide');
                    } else {
                        $('#AddProductModal').modal('hide');
                        $('.product').load('/products/index .product')
                    }
                },
            });
            return false;
        },
    });
});

//============================ view Category details ===================
$(document).on("click", ".viewCategories", function () {
    var category_id = $(this).data("id");
    $.ajax({
        url: "/categories/editCategories",
        data: { id: category_id },
        type: "JSON",
        method: "get",
        success: function (response) {
            category = $.parseJSON(response);
            var image = category["user"]["user_profile"]["profile_image"];
            document
            .querySelector("#userPic")
                .setAttribute("src", "/img/" + image);
            $("#addedby").html(category['user']['user_profile']['first_name']+' '+category['user']['user_profile']['last_name']);
            $("#category-name").html(category['category_name']);
            $("#created").html(category['created_date']);
        },
    });
});

//============================ view User details ===================
$(document).on("click", ".viewUser", function () {
    var user_id = $(this).data("id");
    $.ajax({
        url: "/users/updateProfile",
        data: { id: user_id },
        type: "JSON",
        method: "get",
        success: function (response) {
            user = $.parseJSON(response);
            var image = user["user_profile"]["profile_image"];
            document
            .querySelector("#userPic")
            .setAttribute("src", "/img/" + image);
            $("#userName").html(user['user_profile']['first_name']+' '+user['user_profile']['last_name']);
            $("#userPhone").html(user['user_profile']['contact']);
            $("#userEmail").html(user['email']);
            $("#usercreated").html(user['created_date']);
            $("#userAddress").html(user['user_profile']['address']);
            if (user['role'] == 0) {
                $("#userRole").html('Staff Member');
            } else {
                $("#userRole").html('Admin');
            }
        },
    });
});


//============================ view product details ===================
$(document).on("click", ".productView", function () {
    var product_id = $(this).data("id");
    $.ajax({
        url: "/products/view",
        data: { id: product_id },
        type: "JSON",
        method: "get",
        success: function (response) {
            product = $.parseJSON(response);
            var image = product["product_image"];
            document
                .querySelector("#productImage")
                .setAttribute("src", "/img/" + image);
            $("#cardTitle").html(product['product_name']);
            $("#categoryName").html(product['category']['category_name']);
            $("#userName").html(product['user']['user_profile']['first_name']);
            $("#created").html(product['created_date']);
            $("#short").html(product['short_discription']);
            $("#description").html(product['description']);
        },
    });
});

//========================== getting product details for edit ===================
$(document).on("click", ".productEdit", function () {
    var product_id = $(this).data("id");
    $.ajax({
        url: "/products/view",
        data: { id: product_id },
        type: "JSON",
        method: "get",
        success: function (response) {
            Product = $.parseJSON(response);
            // console.log(Product);
            $("#product_name").val(Product["product_name"]);
            $("#short_discription").val(Product["short_discription"]);
            $("#long_description").val(Product["description"]);
            $("#product_tags").val(Product["product_tags"]);
            var p_image = Product["product_image"];
            document
                .querySelector("#productImg")
                .setAttribute('src', "/img/" + p_image);
            
            $("#imagedd").val(Product["product_image"]);
            $("#iddd").val(Product["id"]);
            $("#useridd").val(Product['user']['id'])
        },
    });
});

//====================== update product =================
$(document).ready(function () {
    $("#productDetails").validate({
        rules: {
            product_name: {
                required: true,
            },
            short_discription: {
                required: true,
            },
            description: {
                required: true,
            },
            product_tags: {
                required: true,
            },
        },
        messages: {
            product_name: {
                required: " Please Enter Your Name",
            },
            short_discription: {
                required: "Please enter Short Description",
            },
            description: {
                required: "Please enter Description",
            },
            product_tags: {
                required: "Please enter Tags",
            },
        },
        submitHandler: function (form) {
            var formData = new FormData(form);
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/products/edit",
                type: "JSON",
                method: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: formData,
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data["status"] == 0) {
                        alert(data["message"]);
                    } else {
                        swal(
                            "Updated Successfully!",
                            "Details has been saved!",
                            "success"
                        );
                        //==== reload table data ====
                        $(".product").load("/products/index .product");
                        $("#EditProduct").hide();
                        $("div.modal-backdrop").remove();
                    }
                },
            });
            return false;
        },
    });
});

//============================== Delete Products ================
$(document).on("click", ".deleteProducts", function () {
    var csrfToken = $('meta[name="csrfToken"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
        }
    });
    var postdata = $(this).attr("data-id");

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                // alert(postdata);
                $.ajax({
                    url: "/products/delete/" + postdata,
                    data: postdata,
                    type: "JSON",
                    method: "post",
                    success: function (response) {

                        $('#data' + postdata).hide();
                        swal("Data Deleted Succesfully!", "You clicked the button!", "success");
                    }
                });
            }
        })

});

//----------------------------------- Add Staff using ajax -------------------------//

$(document).ready(function () {


    $("#staffAdd").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                Uppercase: true,
                Lowercase: true,
                Specialcharacter: true,
                Onedigit: true,
                maxlength: 18,
                minlength: 8,
            },
            'user_profile[first_name]': {
                required: true,
                minlength: 2,
                regex: ALPHA_REGEX,
                noSpace: true,
            },
            'user_profile[last_name]': {
                required: true,
                minlength: 2,
                regex: ALPHA_REGEX,
                noSpace: true,
            },
            'user_profile[address]': {
                required: true,
            },
            'user_profile[contact]': {
                required: true,
                minlength: 10,
                maxlength: 10,
                noSpace: true,
            },

        },
        messages: {
            email: {
                required: " Please enter Email",
            },
            password: {
                required: "Please enter your password",
                minlength: "Password need to be at least 8 characters long",
                maxlength: "Password need to be atleast  18 characters long",
            },
            'user_profile[first_name]': {
                required: " Please enter first Name",
                minlength: "Name need to be at least 2 characters long",
            },
            'user_profile[last_name]': {
                required: " Please enter last Name",
                regex: "Please enter characters only"
            },
            'user_profile[address]': {
                required: " Please enter address ",
            },
            'user_profile[contact]': {
                required: " Please enter phone no ",
                minlength: "phone number must be 10 digits",
                maxlength: "phone number must be 10 digits",
                regexno: "please enter digits only"
            },

        },
        submitHandler: function (form) {
            var formData = $(form).serialize();
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/users/staffAdd",
                type: "JSON",
                method: "POST",
                data: formData,
                success: function (response) {
                    console.log(response);
                    var data = JSON.parse(response);
                    if (data['status'] == '1') {
                        $('#addstaff').hide();
                        $('.modal-backdrop').remove();
                        $('#staff_update').load('/users/users_list  #staff_update');
                    }
                },
            });
            return false;
        },
    });
});


//------------------------------------- Delete Staff using ajax ---------------------------------------//


$(document).on("click", ".response", function () {
    // alert('dgkhdfhg');
    var user_id = $(this).data("id");
  
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        url: "/contactUs/response/" + user_id,
        data: {user_id },
        type: "JSON",
        method: "post",
        success: function (response) {
            console.log(response)
            $('.productss').load('/contactUs/index .productss')

        }
    });
})

$(document).on("click", ".delete", function () {
    // alert('dgkhdfhg');
    var user_id = $(this).data("id");
    alert(user_id)
  
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        url: "/contactUs/deleteContactus/" + user_id,
        data: {user_id },
        type: "JSON",
        method: "post",
        success: function (response) {
            console.log(response)
            $('.productss').load('/contactUs/index .productss')

        }
    });
})
$(document).on("click", ".reject", function () {
    // alert('dgkhdfhg');
    var user_id = $(this).data("id");
    
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        url: "/contactUs/reject/" + user_id,
        data: { user_id },
        type: "JSON",
        method: "post",
        success: function (response) {
            console.log(response)
            $('.productss').load('/contactUs/index .productss')
        }
    });
})

//------------------------------------- Delete Staff using ajax ---------------------------------------//


$(document).on("click", ".btn-delete-student", function () {
    // alert('dgkhdfhg');

    var csrfToken = $('meta[name="csrfToken"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
        }
    });
    var postdata = $(this).attr("data-id");

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                // alert(postdata);
                $.ajax({
                    url: "/users/deletestatus/" + postdata,
                    data: postdata,
                    type: "JSON",
                    method: "post",
                    success: function (response) {

                        $('#data' + postdata).hide();
                        swal("Data Deleted Succesfully!", "You clicked the button!", "success");
                    }
                });
            }
        })

});



//--------------------------- Users Gettingn Data modal through ajax-----------------------//

$(document).on("click", ".editUser", function () {
    var user_id = $(this).data("id");
    $.ajax({
        url: "/users/updateProfile",
        data: { id: user_id },
        type: "JSON",
        method: "get",
        success: function (response) {
            user = $.parseJSON(response);
            console.log(user["email"]);
            $("#iddd").val(user["id"]);
            $("#firstname").val(user["user_profile"]["first_name"]);
            $("#lastname").val(user["user_profile"]["last_name"]);
            $("#contact").val(user["user_profile"]["contact"]);
            $("#address").val(user["user_profile"]["address"]);
            $("#editemail").val(user["email"]);
        },
    });
});



//---------------------------Users update data in modal through ajax-----------------------//

$(document).ready(function () {
    $("#useredit").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
        },
        messages: {
            email: {
                required: " Please enter Email",
            },

        },
        submitHandler: function (form) {
            var formData = $(form).serialize();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/users/editProfile",
                type: "JSON",
                method: "POST",
                data: formData,
                success: function (response) {
                    var data = JSON.parse(response);
                    swal("Updated!", "User details Has been updated Successfully!", "success");
                    $("#staff_update").load("/users/users_list #staff_update");
                    $('#updateDetails').hide();
                    $('.modal-backdrop').hide();
                },
            });
            return false;
        },
    });
});





//----------------------------------- Add Contact Using ajax -------------------------//

$(document).ready(function () {
    // alert('nhjhbncjhsjknc');
    $("#newcontact").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            address: {
                required: true,
            },
            phone: {
                required: true,
                minlength: 10,
                maxlength: 10,
                noSpace: true,
            },
        },
        messages: {
            email: {
                required: "Please enter email  ",
            },
            address: {
                required: "Please enter email  ",
            },
            phone: {
                required: " Please enter phone no ",
                minlength: "phone number must be 10 digits",
                maxlength: "phone number must be 10 digits",
            },
        },
        submitHandler: function (form) {
            // alert("dddd");
            var formData = $(form).serialize();
            // console.log(formData);
            // return false;
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/contacts/addcontact",
                type: "JSON",
                method: "POST",
                data: formData,
                success: function (response) {

                    var data = JSON.parse(response);
                    if (data["status"] == 0) {
                        alert(data["message"]);
                    } else {
                        $('#AddContact').modal('hide');
                        $('#contact').load('/contacts/index #contact')
                    }
                },
            });
            return false;
        },
    });
});



//--------------------------- Contact Gettingn Data modal through ajax-----------------------//

$(document).on("click", ".editcontact", function () {
    var user_id = $(this).data("id");
    $.ajax({
        url: "/contacts/editContact",
        data: { id: user_id },
        type: "JSON",
        method: "get",
        success: function (response) {

            user = $.parseJSON(response);
            // console.log(user["email"]);

            $("#contiddd").val(user["id"]);
            $("#addresss").val(user["address"]);
            $("#emails").val(user["email"]);
            $("#phones").val(user["phone"]);



        },
    });
});



//---------------------------Edit Contact Details through ajax-----------------------//

$(document).ready(function () {
    $("#editContact").validate({
        rules: {
            email: {
                required: true,
                email: true
            },

        },
        messages: {
            email: {
                required: " Please enter your Lead Name",
            },

        },
        submitHandler: function (form) {
            var formData = $(form).serialize();
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/contacts/contactEdit",
                type: "JSON",
                method: "POST",
                data: formData,
                success: function (response) {
                    var data = JSON.parse(response);
                    $(".contact").load("/contacts/index .contact");
                    swal("Good job!", "User details Has been updated!", "success");
                    $('#contactEdit').hide();
                    $('.modal-backdrop').hide();

                },
            });
            return false;
        },
    });
});


//------------------------------------- Delete Contact using ajax ---------------------------------------//


$(document).on("click", ".btn-delete-contact", function () {
    // alert('dgkhdfhg');

    var csrfToken = $('meta[name="csrfToken"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
        }
    });
    var postdata = $(this).attr("data-id");

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                // alert(postdata);
                $.ajax({
                    url: "/contacts/deleteContact/" + postdata,
                    data: postdata,
                    type: "JSON",
                    method: "post",
                    success: function (response) {

                        $('#data' + postdata).hide();
                        swal("Data Deleted Succesfully!", "You clicked the button!", "success");
                    }
                });
            }
        })

});


//----------------------------------- Add Lead Using ajax -------------------------//

$(document).ready(function () {
    // alert('nhjhbncjhsjknc');
    $("#newlead").validate({
        rules: {
            name: {
                required: true,
                regex: ALPHA_REGEX,
            },
            price: {
                required: true,
            },
            work_title: {
                required: true,
            },
            'lead_contact[contact]': {
                required: true,
                minlength: 10,
                maxlength: 10,
                noSpace: true,
            },
        },
        messages: {
            name: {
                required: "Please enter name ",
                regex: "Please enter characters only"
            },
            price: {
                required: "Please enter price",
            },
            work_title: {
                required: "Please enter work title ",
            },
            'lead_contact[contact]': {
                required: " Please enter phone no ",
                minlength: "phone number must be 10 digits",
                maxlength: "phone number must be 10 digits",
                regexno: "please enter digits only"
            },
        },
        submitHandler: function (form) {
            // alert("dddd");
            var formData = $(form).serialize();
            // console.log(formData);
            // return false;
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/leads/addLead",
                type: "JSON",
                method: "POST",
                data: formData,
                success: function (response) {

                    var data = JSON.parse(response);
                    if (data["status"] == 0) {
                        alert(data["message"]);
                    } else {
                        $('#AddLeadModal').modal('hide');
                        $('#lead').load('/leads/index #lead')
                    }
                },
            });
            return false;
        },
    });
});
//--------------------------- Lead Gettingn Data modal through ajax-----------------------//

$(document).on("click", ".editLead", function () {
    var user_id = $(this).data("id");
    $.ajax({
        url: "/leads/editLead",
        data: { id: user_id },
        type: "JSON",
        method: "get",
        success: function (response) {

            user = $.parseJSON(response);
            // console.log(user["email"]);

            $("#leadid").val(user["id"]);
            $(".name").val(user["name"]);
            $(".price").val(user["price"]);
            $(".work_title").val(user["work_title"]);
            $(".contact").val(user["lead_contact"]["contact"]);


        },
    });
});



//---------------------------Edit Lead Details through ajax-----------------------//

$(document).ready(function () {
    $("#editLead").validate({
        rules: {
            name: {
                required: true,
            },

        },
        messages: {
            name: {
                required: " Please enter your Lead Name",
            },

        },
        submitHandler: function (form) {
            var formData = $(form).serialize();
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/leads/leadEdit",
                type: "JSON",
                method: "POST",
                data: formData,
                success: function (response) {
                    var data = JSON.parse(response);
                    $("#lead").load("/leads/index #lead");
                    swal("Good job!", "User details Has been updated!", "success");
                    $('#editLeadModal').hide();
                    $('.modal-backdrop').hide();

                },
            });
            return false;
        },
    });
});

//------------------------------------- Delete Lead using ajax ---------------------------------------//


$(document).on("click", ".btn-delete-lead", function () {
    // alert('dgkhdfhg');

    var csrfToken = $('meta[name="csrfToken"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
        }
    });
    var postdata = $(this).attr("data-id");

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                // alert(postdata);
                $.ajax({
                    url: "/leads/deleteStatus/" + postdata,
                    data: postdata,
                    type: "JSON",
                    method: "post",
                    success: function (response) {

                        $('#data' + postdata).hide();
                        swal("Data Deleted Succesfully!", "You clicked the button!", "success");
                    }
                });
            }
        })

});




//-------------------------------------Serch function---------------------------------------//

$(document).ready(function () {
    // alert('dfgfdg');
    $("#key").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});


