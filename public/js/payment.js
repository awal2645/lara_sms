$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // payment  insert script
    $('.add_payment').click(function (e) {
        e.preventDefault();
        let class_id = $('#class_id').val();
        let pay_type = $('#pay_type').val();
        let pay_amount = $('#pay_amount').val();
        let due_pay_date = $('#due_pay_date').val();
        let student_select_id = $('#student_select_id').val();
        let stu_due_amount = $('#stu_due_amount').val();
        let total_amount = $('#total_amount').val();
        let pay_date = $('#pay_date').val();
        let url = $('#paymentFrom').attr('action');
        $.ajax({
            url: url,
            method: 'POST',
            data:{
                class_id:class_id,
                pay_type:pay_type,
                pay_amount:pay_amount,
                due_pay_date:due_pay_date,
                student_select_id:student_select_id,
                stu_due_amount:stu_due_amount,
                total_amount:total_amount,
                pay_date:pay_date,
            },
            success: function (res) {
                if (res.status == 'success') {
                    $('#paymentFrom').trigger("reset");
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
            }, error: function (err) {
                let error = err.responseJSON;
                $.each(error.errors, function (index, value) {
                    $('.errMsgContainer').append('<span class="text-danger">' + value + '</span>' + '<br>');
                });
            }
        });
    });
    // class wise student value Chnage Scripts
    $('#class_id').change(function () {
        let class_id = $(this).val();
        let url = $('#class_id').data('url');
        $("#student_select_id").html('');
        $("#stu_due_amount").val('');
        $.ajax({
            url: url,
            method: "post",
            data: { class_id:class_id },
            dataType:'json',
            success: function (response) {
                var len = 0;
                        if (response.data != null) {
                            len = response.data.length;
                        }
                        $("#student_select_id").append("<option value=''selected='selected'>Select Student</option>");
                        if (len>0) {
                            for (var i = 0; i<len; i++) {
                                var id = response.data[i].id;
                                var name = response.data[i].stu_name;
                                $("#student_select_id").append("<option value='"+id+"'>"+name+"</option>");  
                            }
                        }
            },
            error: function () {
                alert("Fees not assigned");
                $('#student_select_id').val("");
            }
        });
    });
    // class wise fees value Chnage Scripts
    $('#student_select_id').change(function () {
        let student_select_id = $(this).val();
        let url = $('#student_select_id').data('url');
        $.ajax({
            url: url,
            method: "post",
            data: { student_select_id: student_select_id },
            success: function (data) {
                $('#stu_due_amount').val(data.total_ammount);
            },
            error: function () {
                alert("Fees not assigned");
                $('#stu_due_amount').val("");
            }
        })
    })
// payment calculation scripts
    if($("#paymentFrom").length){
        $( "#stu_due_amount" ).keyup(function() {
            $.sum();          
        }); 
        $( "#pay_amount" ).keyup(function() {
            $.sum();          
        }); 
    }   
    $.sum = function(){
            $("#total_amount").val(parseFloat($("#stu_due_amount").val()) - parseFloat($("#pay_amount").val()));
    } 
})