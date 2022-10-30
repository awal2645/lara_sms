$(document).ready(function () {
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#stu_img').change(function(){    
    let reader = new FileReader();
    reader.onload = (e) => { 
        $('#frame').attr('src', e.target.result); 
    }   
    reader.readAsDataURL(this.files[0]); 
});
$('.add_student').click(function(e) {
    e.preventDefault();
    let stu_name = $('#stu_name').val();
    let stu_class_id = $('#stu_class_id').val();
    let stu_email = $('#stu_email').val();
    let stu_phone = $('#stu_phone').val();
    let stu_gender = $('#stu_gender').val();
    let stu_age = $('#stu_age').val();
    let stu_birth = $('#stu_birth').val();
    let stu_blood = $('#stu_blood').val();
    let stu_adm_roll = $('#stu_adm_roll').val();
    let stu_section = $('#stu_section').val();
    let stu_nationality = $('#stu_nationality').val();
    let stu_address = $('#stu_address').val();
    let stu_admitted_year = $('#stu_admitted_year').val();
    let stu_img = $('#stu_img').val();
    let url = $('#studentForm').attr('action');
    console.log(stu_name);
    $.ajax({
        url:url,
        method:'POST',
        data: 
        {
            stu_name:stu_name,
            stu_class_id:stu_class_id,
            stu_email:stu_email,
            stu_phone:stu_phone,
            stu_gender:stu_gender,
            stu_age:stu_age,
            stu_birth:stu_birth,
            stu_blood:stu_blood,
            stu_adm_roll:stu_adm_roll,
            stu_section:stu_section,
            stu_nationality:stu_nationality,
            stu_address:stu_address,
            stu_admitted_year:stu_admitted_year,
            stu_img:stu_img,
        },
        contentType: false,
        processData: false,
    success:function(res){
        if(res.status=='success'){
            $('#exampleModal').modal('hide');
            $('#form').trigger("reset");
            // $('table').load(location.href+'.table');
            swal({
                title: "Good job!",
                icon: "success",
                button: "Aww yiss!",
              });
              setTimeout(function(){
                window.location.reload(1);
             }, 2000);  
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
                icon: "success",
                button: "Aww yiss!",
              });
              setTimeout(function(){
                window.location.reload(1);
             }, 2000); 
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
                            icon: "success",
                            button: "Aww yiss!",
                          });
                          setTimeout(function(){
                            window.location.reload(1);
                         }, 2000);  
                    }
                },error:function(err)
                {
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