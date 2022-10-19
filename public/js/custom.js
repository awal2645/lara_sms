
$(document).ready(function () {
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $('.add_subject').click(function (e) {
        e.preventDefault();
        let sub_name = $('#sub_name').val();
        let url = $('#form').attr('action');
       
        $.ajax({
            url:url,
            method:'POST',
            data:{
                sub_name:sub_name,
                
            },
            success:function(res){
                if(res.status=='success'){
                    $('#exampleModal').modal('hide');
                    $('#form')[0].reset();
                    $('table').load(location.href+' .table');
                }
            },error:function(err){
                let error=err.responseJSON;
                $.each(error.errors,function(index,value){
                    $('.errMsgContainer').append('<span clas="text-danger">'+value+'</span>'+'<br>');
                });
            }
        });
    });
    // show update subject name Value
    $(document).on('click','.update_class_from',function(){
        let id=$(this).data('id');
        let name=$(this).data('name');
        $('#up_sub_id').val(id);
        $('#up_sub_name').val(name);
    });

    // update subject name Value
    $('.update_subject').click(function (e) {
        e.preventDefault();
        let up_sub_name = $('#up_sub_name').val();
        let up_sub_id = $('#up_sub_id').val();
        let url = $('#updateform').attr('action');
       
        $.ajax({
            url:url,
            method:'POST',
            data:{
                up_sub_name:up_sub_name,
                up_sub_id:up_sub_id,
                
            },
            success:function(res){
                if(res.status=='success'){
                    $('#updateModal').modal('hide');
                    $('#updateform')[0].reset();
                    $('table').load(location.href+' .table');
                }
            },error:function(err){
                let error=err.responseJSON;
                $.each(error.errors,function(index,value){
                    $('.errMsgContainer').append('<span clas="text-danger">'+value+'</span>'+'<br>');
                });
            }
        });
    });
});