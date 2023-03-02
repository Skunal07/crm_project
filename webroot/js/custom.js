
//----------------------------------- Add Company Using ajax -------------------------//

$(document).ready(function () {
    // alert('nhjhbncjhsjknc');
    $("#newcompany").validate({
        rules: {
            company_name: {
                required: true,
            },
        },
        messages: {
            company_name: {
                required: "Please enter company name ",
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
                        $('.company').load('/companies/index .company')
                    }
                },
            });
            return false;
        },
    });
});

//----------------------------------- Add Category Using ajax -------------------------//

$(document).ready(function () {
    // alert('nhjhbncjhsjknc');
    $("#newcategory").validate({
        rules: {
            category_name: {
                required: true,
            },
        },
        messages: {
            category_name: {
                required: "Please enter category name ",
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
                        $('.category').load('/categories/index .category')
                    }
                },
            });
            return false;
        },
    });
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
        },
        messages: {
            product_name: {
                required: "Please enter company name ",
            },
            category_id: {
                required: "Please select category name ",
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


//----------------------------------- Add Staff using ajax -------------------------//

$(document).ready(function () {

  
   $("#staffAdd").validate({
     ules: {
       email: {
           required: true,
       },
      
   },
   messages: {
       email: {
           required: " Please enter your Email",
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
                   if(data['status'] == '1'){
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


$(document).on("click", ".btn-delete-student", function(){
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
           url: "/users/deletestatus/"+postdata,
           data: postdata,
           type: "JSON",
           method: "post",
           success:function(response){
               
              $('#data'+postdata).hide();
              swal("Data Deleted Succesfully!", "You clicked the button!", "success");
           }
       });
   }
})

});



 //---------------------------Gettingn Data modal through ajax-----------------------//

$(document).on("click", ".editUser", function () {
    var user_id = $(this).data("id");
    // console.log(user_id);
    $.ajax({
        url: "/users/updateProfile",
        data: { id: user_id },
        type: "JSON",
        method: "get",
        success: function (response) {
            user = $.parseJSON(response);
            console.log(user["email"]);
            // return false;

            // hidden input for image and id
            $("#iddd").val(user["id"]);
            // hidden input for image and id

          
            $("#firstname").val(user["user_profile"]["first_name"]);
            $("#lastname").val(user["user_profile"]["last_name"]);
            $("#contact").val(user["user_profile"]["contact"]);
            $("#address").val(user["user_profile"]["address"]);
            $("#editemail").val(user["email"]);
        },
    });
});






 //---------------------------update data in modal through ajax-----------------------//

                $(document).ready(function(){
                    $("#useredit").validate({
                    rules: {
                        email: {
                            required: true,
                        },
                    
                    },
                    messages: {
                        email: {
                            required: " Please enter your Email",
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
                                    
                                $(".table-responsive").load("/users/users_list .table-responsive");
                                    swal("Good job!", "User details Has been updated!", "success");
                                    $('#exampleModalCenter').hide();
                                    $('.modal-backdrop').hide();
                                    
                            },
                        });
                        return false;
                    },
                });
                });



 //---------------------------Edit Profile Details through ajax-----------------------//

 $(document).ready(function(){
    $("#useredit").validate({
       rules: {
           email: {
               required: true,
           },
     
       },
       messages: {
           email: {
               required: " Please enter your Email",
           },
        
       },
       submitHandler: function (form) {
           var formData = $(form).serialize();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            url: "/users/profileEdit",
            type: "JSON",
            method: "POST",
            data: formData,
            success: function (response) {
                   var data = JSON.parse(response);               
                   $(".table-responsive").load("/users/users_list .table-responsive");
                       swal("Good job!", "User details Has been updated!", "success");
                       $('#exampleModalCenter').hide();
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
            },
        },
        messages: {
            email: {
                required: "Please enter category name ",
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
                        $('.contact').load('/contacts/index .contact')
                    }
                },
            });
            return false;
        },
    });
});

