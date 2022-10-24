
$(document).ready(function () {
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.add_section').click(function (e) {
    e.preventDefault();
    let section_name = $('#section_name').val();
    let class_id = $('#class_id').val();
    let url = $('#sectionForm').attr('action');
    console.log(section_name);
    $.ajax({
        url:url,
        method:'POST',
        data:{
            section_name:section_name,
            class_id:class_id,
        },
    success:function(res){
        if(res.status=='success'){
            $('#exampleModal').modal('hide');
            $('#form').trigger("reset");
            // $('table').load(location.href+'.table');
            swal({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "success",
                button: "Aww yiss!",
              });
              setTimeout(function(){
                window.location.reload(1);
             }, 5000);  
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
$('#up_section_id').empty().val(id);
$('#up_section_name').empty().val(name);
// $('#up_class_name').empty().val(class_name);

});
// update subject name Value
$('.update_section').click(function (e) {
 e.preventDefault();
let up_section_id = $('#up_section_id').val();
let up_section_name = $('#up_section_name').val();
let url = $('#updateform').attr('action');
$.ajax({
    url:url,
    method:'POST',
    data:{
        up_section_id:up_section_id,
        up_section_name:up_section_name,      
    },
    success:function(res){
        if(res.status=='success'){
            $('#updateModal').modal('hide');
            $('#updateform')[0].reset();
            $('table').load(location.href+' .table');
            swal({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "success",
                button: "Aww yiss!",
              });
              setTimeout(function(){
                window.location.reload(1);
             }, 5000); 
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
$('.delete_section_id').click(function (e) {
    e.preventDefault();
    let del_section_id = $(this).data('id');
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
                method:'POST',
                data:{
                    del_section_id:del_section_id,    
                },
                success:function(res){
                    if(res.status=='success'){
                        swal({
                            title: "Good job!",
                            text: "You clicked the button!",
                            icon: "success",
                            button: "Aww yiss!",
                          });
                          setTimeout(function(){
                            window.location.reload(1);
                         }, 5000);  
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
});