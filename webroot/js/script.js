jQuery.validator.addMethod(
    "noSpace",
    function (value, element) {
        return value == '' || value.trim().length != 0;
    },
    "No space please and don't leave it empty");


function imgSelect() {
    document.querySelector("#imageName").click();
}

function showImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document
                .querySelector("#imgdisplay")
                .setAttribute("src", e.target.result);
        };
        reader.readAsDataURL(e.files[0]);
    }
}

//====================== getting User Image in modal Using ajax =================
$(document).on("click", "#imgUpload", function () {
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
                .querySelector("#imgdisplay")
                .setAttribute("src", "/img/" + image);
            $("#iddd").val(user["id"]);
        },
    });
});

$(document).ready(function () {
    //====================== update User Image in modal Using ajax =================
    $("#updateImage").validate({
        rules: {
            "user_profile[profile_image]": {
                required: true,
                noSpace: true,
            },
        },
        messages: {
            "user_profile[profile_image]": {
                required: " Please Select Image",
            },
        },
        submitHandler: function (form) {
            var formData = new FormData(form);
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/users/updateImage",
                type: "JSON",
                method: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: formData,
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data["status"] == 0) {
                        console.log(data["message"]);
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                            footer: "<p>Image is Not Updated</p>",
                        });
                    } else {
                        swal(
                            "Updated Successfully!",
                            "Image Has Been Updated SuccessFully!",
                            "success"
                        );
                        $(".card-profile").load("/users/user_profile .card-profile");
                        $(".avatar-pic").load("/users/user_profile .avatar-pic");
                        $("#ProfileImage").hide();
                        $("div.modal-backdrop").remove();
                    }
                },
            });
            return false;
        },
    });


    //====================== update User Details in modal Using ajax =================
    $("#updateInfo").validate({
        rules: {
            "user_profile[first_name]": {
                required: true,
                noSpace: true,
            },
            "user_profile[last_name]": {
                required: true,
                noSpace: true,
            },
            "email": {
                required: true,
                noSpace: true,
            },
            "user_profile[contact]": {
                required: true,
                noSpace: true,
            },
            "user_profile[address]": {
                required: true,
                noSpace: true,
            },
        },
        messages: {
            "user_profile[first_name]": {
                required: "Please Enter First Name",
            },
            "user_profile[last_name]": {
                required: "Please Enter Last Name",
            },
            "email": {
                required: "Please Enter Your Email",
            },
            "user_profile[contact]": {
                required: "Please Enter Your Mobile Number",
            },
            "user_profile[address]": {
                required: "Please Enter Your Address",
            },
        },
        submitHandler: function (form) {
            var formData = new FormData(form);
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/users/updateInfo",
                type: "JSON",
                method: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: formData,
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data["status"] == 0) {
                        console.log(data["message"]);
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                            footer: "<p>Image is Not Updated</p>",
                        });
                    } else {
                        swal(
                            "Updated Successfully!",
                            "User Details has Been Updated SuccessFully!",
                            "success"
                        );
                        $("#loadDetails").load("/users/user_profile #loadDetails");
                        $(".my-name").load("/users/user_profile .my-name");
                        $(".user-name").load("/users/user_profile .user-name");
                        $("#updateDetails").hide();
                        $("div.modal-backdrop").remove();
                    }
                },
            });
            return false;
        },
    });
});


//====================== getting User Details in modal Using ajax =================
$(document).on("click", "#editUser", function () {
    var user_id = $(this).data("id");
    $.ajax({
        url: "/users/updateProfile",
        data: { id: user_id },
        type: "JSON",
        method: "get",
        success: function (response) {
            user = $.parseJSON(response);
            $("#user-profile-first-name").val(user['user_profile']['first_name']);
            $("#user-profile-last-name").val(user['user_profile']['last_name']);
            $("#email").val(user['email']);
            $("#user-profile-contact").val(user['user_profile']['contact']);
            $("#user-profile-address").val(user['user_profile']['address']);
            $("#userpid").val(user["id"]);
        },
    });
});
