
$(document).ready(function () {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.add_course_button').click(function (e) {
        e.preventDefault();
        let course_name = $('#course_name').val();
        let course_price = $('#course_price').val();
        let url = $('#form').attr('action');
        $.ajax({
            url:url,
            method:'POST',
            data:{
                course_name:course_name,
                course_price:course_price,
            },
            success:function(res){
                if(res.status=='success'){
                    $('#exampleModal').modal('hide');
                    $('#form')[0].reset();
                    window.location.reload();
                    Command: toastr["success"]("Data Insert Done")
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": true,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                }
            },error:function(err){
                let error=err.responseJSON;
                $.each(error.errors,function(index,value){
                    $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                });
            }
        });
    });
    // show update subject name Value
    $(document).on('click','.update_course_from',function(){
        let id=$(this).data('id');
        let name=$(this).data('name');
        let price=$(this).data('price');
        $('#up_course_id').val(id);
        $('#up_course_name').val(name);
        $('#up_course_price').val(price);
    });
    // update subject name Value
    $('.course_name_button').click(function (e) {
        e.preventDefault();
        let up_course_id = $('#up_course_id').val();
        let up_course_name = $('#up_course_name').val();
        let up_course_price = $('#up_course_price').val();
        let url = $('#updateform').attr('action');
        $.ajax({
            url:url,
            method:'POST',
            data:{
                up_course_id:up_course_id,
                up_course_name:up_course_name,
                up_course_price:up_course_price,  
            },
            success:function(res){
                if(res.status=='success'){
                    $('#updateModal').modal('hide');
                    $('#updateform')[0].reset();
                    $('table').load(location.href+' .table');
                    Command: toastr["success"]("Delete Data");
                         toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": true,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                }
            },error:function(err){
                let error=err.responseJSON;
                $.each(error.errors,function(index,value){
                    $('.errMsgContainer').append('<span clas="text-danger">'+value+'</span>'+'<br>');
                });
            }
        });
    });
    // delete subject name Value
    $('.delete_course_name').click(function (e) {
        e.preventDefault();
        let del_course_id = $(this).data('id');
        let url = $('#del').attr('href');
        if(confirm('Are you Sure Delete It')){
                $.ajax({
                    url:url,
                    method:'POST',
                    data:{
                        del_course_id:del_course_id,    
                    },
                success:function(res){
                     if(res.status=='success'){
                         $('table').load(location.href+' .table');
                         Command: toastr["success"]("Delete Data");
                         toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": true,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },error:function(err){
                    let error=err.responseJSON;
                    $.each(error.errors,function(index,value){
                         $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                    });
                }
            });
        };
    });
});