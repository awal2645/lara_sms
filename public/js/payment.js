$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
// class wise student value Chnage Scripts
$('#class_id').change(function () {
    let class_id = $(this).val();
    let url = $('#class_id').data('url');
    $("#student_slect").html('');
    $.ajax({
        url: url,
        method: "post",
        data: { class_id: class_id },
        dataType:'json',
        success: function (response) {
            var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }
                    $("#student_slect").append("<option value=''selected='selected'>Select Student</option>");
                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.data[i].id;
                             var name = response.data[i].stu_name;
                             $("#student_slect").append("<option value='"+id+"'>"+name+"</option>");  
                        }
                       
                    }
        },
        error: function () {
            alert("Fees not assigned");
            $('#student_slect').val("");
        }

    });
});
// payment calculation scripts
$(document).ready(function() {
    if($("#log").length){
        $( "#first_reading" ).keyup(function() {
            $.sum();          
        }); 
        $( "#second_reading" ).keyup(function() {
            $.sum();          
        }); 
     }   
        $.sum = function(){
            $("#total_reading").val(parseInt($("#first_reading").val()) - parseInt($("#second_reading").val()));
        } 
});

})