$(document).ready(function () {
    // alert('nhjhbncjhsjknc');
    //====================== add company in modal through ajax =================
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
            // alert("dddd");
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
$(document).ready(function () {
    // alert('nhjhbncjhsjknc');
    //====================== add company in modal through ajax =================
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
$(document).ready(function () {
    //====================== add company in modal through ajax =================
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