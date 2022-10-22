
$(document).ready(function () {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.add_subject').click(function (e) {
        e.preventDefault();
        let sub_name = $('#sub_name').val();
        let sub_short_name = $('#sub_short_name').val();
        let class_name = $('#class_name').val();
        let url = $('#form').attr('action');
        $.ajax({
            url:url,
            method:'POST',
            data:{
                sub_name:sub_name,
                sub_short_name:sub_short_name,
                class_name:class_name,
            },
        success:function(res){
            if(res.status=='success'){
                $('#exampleModal').modal('hide');
                $('#form').trigger("reset");
                // $('table').load(location.href+'.table');
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
$(document).on('click','.update_class_from',function(){
    let id=$(this).data('id');
    let name=$(this).data('name');
    let sub_short_name=$(this).data('short_name');
    // let class_name=$(this).data('class_name');
    $('#up_sub_id').empty().val(id);
    $('#up_sub_name').empty().val(name);
    $('#up_sub_short_name').empty().val(sub_short_name);
    // $('#up_class_name').empty().val(class_name);
    
});
 // update subject name Value
$('.update_subject').click(function (e) {
     e.preventDefault();
    let up_sub_id = $('#up_sub_id').val();
    let up_sub_name = $('#up_sub_name').val();
    let up_sub_short_name = $('#up_sub_short_name').val();
    let url = $('#updateform').attr('action');
    $.ajax({
        url:url,
        method:'POST',
        data:{
            up_sub_id:up_sub_id,
            up_sub_name:up_sub_name,
            up_sub_short_name:up_sub_short_name,
              
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
    // delete subject name Value
    $('.delete_sub_name').click(function (e) {
        e.preventDefault();
        let del_sub_id = $(this).data('id');
        let url = $('#del').attr('href');
        if(confirm('Are you Sure Delete It')){
                $.ajax({
                    url:url,
                    method:'POST',
                    data:{
                        del_sub_id:del_sub_id,    
                    },
                    success:function(res){
                        if(res.status=='success'){
                            window.location.reload();
                            Command: toastr["success"]("Delete Data!")
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