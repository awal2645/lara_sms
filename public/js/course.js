
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
        let url = $('#course-add-form').attr('action');
        $.ajax({
            url:url,
            method:'POST',
            data:{
                course_name:course_name,
                course_price:course_price
            },
            success:function(res){
                if(res.status=='success'){
                    $('#exampleModal').modal('hide');
                    $('#form')[0].reset();
                    $('table').load(location.href+'.table');
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
//     // show update subject name Value
//     $(document).on('click','.update_class_from',function(){
//         let id=$(this).data('id');
//         let name=$(this).data('name');
//         $('#up_sub_id').val(id);
//         $('#up_sub_name').val(name);
//     });
//     // update subject name Value
//     $('.update_subject').click(function (e) {
//         e.preventDefault();
//         let up_sub_name = $('#up_sub_name').val();
//         let up_sub_id = $('#up_sub_id').val();
//         let url = $('#updateform').attr('action');
//         $.ajax({
//             url:url,
//             method:'POST',
//             data:{
//                 up_sub_name:up_sub_name,
//                 up_sub_id:up_sub_id  
//             },
//             success:function(res){
//                 if(res.status=='success'){
//                     $('#updateModal').modal('hide');
//                     $('#updateform')[0].reset();
//                     $('table').load(location.href+' .table');
//                 }
//             },error:function(err){
//                 let error=err.responseJSON;
//                 $.each(error.errors,function(index,value){
//                     $('.errMsgContainer').append('<span clas="text-danger">'+value+'</span>'+'<br>');
//                 });
//             }
//         });
//     });
//     // delete subject name Value
//     $('.delete_sub_name').click(function (e) {
//         e.preventDefault();
//         let del_sub_id = $(this).data('id');
//         let url = $('#del').attr('href');
//         if(confirm('Are you Sure Delete It')){
//                 $.ajax({
//                     url:url,
//                     method:'POST',
//                     data:{
//                         del_sub_id:del_sub_id,    
//                     },
//                     success:function(res){
//                         if(res.status=='success'){
//                             $('table').load(location.href+' .table');
//                             Command: toastr["success"]("I do not think that means what you think it means.")
//                             toastr.options = {
//                                 "closeButton": true,
//                                 "debug": false,
//                                 "newestOnTop": true,
//                                 "progressBar": true,
//                                 "positionClass": "toast-top-right",
//                                 "preventDuplicates": true,
//                                 "onclick": null,
//                                 "showDuration": "300",
//                                 "hideDuration": "1000",
//                                 "timeOut": "5000",
//                                 "extendedTimeOut": "1000",
//                                 "showEasing": "swing",
//                                 "hideEasing": "linear",
//                                 "showMethod": "fadeIn",
//                                 "hideMethod": "fadeOut"
//                             }
//                         }
//                     },error:function(err){
//                         let error=err.responseJSON;
//                         $.each(error.errors,function(index,value){
//                             $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
//                         });
//                     }
//                 });
//         };
//     });
});