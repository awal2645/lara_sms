
$(document).ready(function () {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.add_class_button').click(function (e) {
        e.preventDefault();
        let class_name = $('#class_name').val();
        let class_fees = $('#class_fees').val();
        let url = $('#form').attr('action');
        $.ajax({
            url:url,
            method:'POST',
            data:{
                class_name:class_name,
                class_fees:class_fees,
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
    // show update class name Value
    $(document).on('click','.update_class_from',function(){
        let id=$(this).data('id');
        let name=$(this).data('name');
        let price=$(this).data('price');
        $('#up_class_id').val(id);
        $('#up_class_name').val(name);
        $('#up_class_fees').val(price);
    });
    // update class name Value
    $('.update_class_button').click(function (e) {
        e.preventDefault();
        let up_class_id = $('#up_class_id').val();
        let up_class_name = $('#up_class_name').val();
        let up_class_fees = $('#up_class_fees').val();
        let url = $('#updateform').attr('action');
        $.ajax({
            url:url,
            method:'POST',
            data:{
                up_class_id:up_class_id,
                up_class_name:up_class_name,
                up_class_fees:up_class_fees,  
            },
            success:function(res){
                if(res.status=='success'){
                    $('#updateModal').modal('hide');
                    $('#updateform')[0].reset();
                    $('table').load(location.href+' .table');
                    window.location.reload();
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
    // delete class name Value
    $('.delete_class_name').click(function (e) {
        e.preventDefault();
        let del_class_id = $(this).data('id');
        let url = $('#del').attr('href');
        if(confirm('Are you Sure Delete It')){
                $.ajax({
                    url:url,
                    method:'POST',
                    data:{
                        del_class_id:del_class_id,    
                    },
                success:function(res){
                     if(res.status=='success'){
                         $('table').load(location.href+' .table');
                         window.location.reload();
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