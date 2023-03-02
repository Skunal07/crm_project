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
            alert("ddddddg");
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