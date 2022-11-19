$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    // $('#stu_img').change(function(){
    //     let reader = new FileReader();
    //     reader.onload = (e) => {
    //         $('#frame').attr('src', e.target.result);
    //     }
    //     reader.readAsDataURL(this.files[0]);
    // });
    $("#studentForm").submit(function (e) {
        e.preventDefault();
        let fromData = new FormData(this);
        console.log(fromData);
        let url = $("#studentForm").attr("action");
        $.ajax({
            url: url,
            method: "POST",
            data: fromData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (res) {
                if (res.status == "success") {
                    $("#exampleModal").modal("hide");
                    $("#form").trigger("reset");
                    // $('table').load(location.href+'.table');
                    swal({
                        title: "Record Inserted Successfuly!",
                        icon: "success",
                        button: "OK !",
                    });
                    setTimeout(function () {
                        window.location.reload(1);
                    }, 2000);
                }
            },
            error: function (err) {
                let error = err.responseJSON;
                $.each(error.errors, function (index, value) {
                    $(".errMsgContainer").append(
                        '<span class="text-danger">' +
                            value +
                            "</span>" +
                            "<br>"
                    );
                });
            },
        });
    });
    // show update subject name Value
    $(document).on("click", ".update_student_from", function () {
        let stu_id = $(this).data("stu_id");
        let stu_name = $(this).data("stu_name");
        let stu_email = $(this).data("stu_email");
        let stu_age = $(this).data("stu_age");
        let stu_phone = $(this).data("stu_phone");
        let stu_address = $(this).data("stu_address");
        let stu_admitted_year = $(this).data("stu_admitted_year");
        $("#up_stu_id").empty().val(stu_id);
        $("#up_stu_name").empty().val(stu_name);
        $("#up_stu_email").empty().val(stu_email);
        $("#up_stu_age").empty().val(stu_age);
        $("#up_stu_phone").empty().val(stu_phone);
        $("#up_stu_address").empty().val(stu_address);
        $("#up_stu_admitted_year").empty().val(stu_admitted_year);
    });
    // update subject name Value
    $(".update_student").click(function (e) {
        e.preventDefault();
        let up_stu_id = $("#up_stu_id").val();
        let up_stu_name = $("#up_stu_name").val();
        let up_stu_email = $("#up_stu_email").val();
        let up_stu_age = $("#up_stu_age").val();
        let up_stu_phone = $("#up_stu_phone").val();
        let up_stu_address = $("#up_stu_address").val();
        let up_stu_admitted_year = $("#up_stu_admitted_year").val();
        let url = $("#upstudentForm").attr("action");
        $.ajax({
            url: url,
            method: "POST",
            data: {
                up_stu_id: up_stu_id,
                up_stu_name: up_stu_name,
                up_stu_email: up_stu_email,
                up_stu_age: up_stu_age,
                up_stu_phone: up_stu_phone,
                up_stu_address: up_stu_address,
                up_stu_admitted_year: up_stu_admitted_year,
            },
            success: function (res) {
                if (res.status == "success") {
                    $("#updateModal").modal("hide");
                    $("#upstudentForm")[0].reset();
                    $("table").load(location.href + " .table");
                    swal({
                        title: "Update successfuly!",
                        icon: "success",
                        button: "OK !",
                    });
                    setTimeout(function () {
                        window.location.reload(1);
                    }, 2000);
                }
            },
            error: function (err) {
                let error = err.responseJSON;
                $.each(error.errors, function (index, value) {
                    $(".errMsgContainer").append(
                        '<span clas="text-danger">' + value + "</span>" + "<br>"
                    );
                });
            },
        });
    });
    // delete subject name Value
    $(".delete_student_id").click(function (e) {
        e.preventDefault();
        let del_stu_id = $(this).data("stu_id");
        let url = $("#del").attr("href");
        swal({
            title: "Are you sure?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            console.log(willDelete);
            if (willDelete) {
                $.ajax({
                    url: url,
                    method: "POST",
                    data: {
                        del_stu_id: del_stu_id,
                    },
                    success: function (res) {
                        if (res.status == "success") {
                            swal({
                                title: "Delete successfuly!",
                                icon: "success",
                                button: "OK !",
                            });
                            setTimeout(function () {
                                window.location.reload(1);
                            }, 2000);
                        }
                    },
                    error: function (err) {
                        let error = err.responseJSON;
                        $.each(error.errors, function (index, value) {
                            $(".errMsgContainer").append(
                                '<span class="text-danger">' +
                                    value +
                                    "</span>" +
                                    "<br>"
                            );
                        });
                    },
                });
            }
        });
    });
    // disscount Scripts
    $(document).on("change keyup blur", "#discount", function () {
        var main = $("#class_fees").val();
        var disc = $("#discount").val();
        // var dec = (disc / 100).toFixed(2); //its convert 10 into 0.10
        // var mult = main * dec; // gives the value for subtract from main value
        var discont = main - disc;
        $("#total_ammount").val(discont);
    });
    // class wise fees value Chnage Scripts
    $("#stu_class_id").change(function () {
        let stu_class_id = $(this).val();
        let url = $("#stu_class_id").data("url");
        $.ajax({
            url: url,
            method: "post",
            data: { stu_class_id: stu_class_id },
            success: function (data) {
                $("#class_fees").val(data.class_fees);
            },
            error: function () {
                alert("Fees not assigned");
                $("#class_fees").val("");
            },
        });
    });
});
