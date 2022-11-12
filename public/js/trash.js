$(document).ready(function () {
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// delete class name Value
$('.trash_class_name').click(function (e) {
    e.preventDefault();
    let del_trash_id = $(this).data('id');
    let url = $('#del').attr('href');
    swal({
        title: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        console.log(willDelete);
        if(willDelete){
            $.ajax({
                url:url,
                method:'get',
                data:{
                    del_trash_id:del_trash_id,    
                },
            success:function(res){
                 if(res.status=='success'){
                     $('table').load(location.href+' .table');
                     swal({
                        title: "Delete successfuly!",
                        text: "You clicked the button!",
                        icon: "success",
                        button: "OK !",
                      });
                      setTimeout(function(){
                        window.location.reload(1);
                     }, 3000); 
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

})