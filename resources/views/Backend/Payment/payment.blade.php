@extends('layouts.admin-app')
@section('content')
<div class="card-body">
    <form action="" id="log">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Select Class</label>
          <select id="class" name="class_id"   class="form-control select2bs4" style="width: 100%;">
            <option selected="selected" >Select Class</option>
            <option value="1">Class 11</option>
            
          </select>
        </div>
        <!-- /.form-group -->
        <div class="form-group">
          <label>Payment Type</label>
          <select class="form-control select2bs4"  style="width: 100%;">
            <option selected="selected">Selelect payment Method</option>
            <option>Cash</option>
            <option>Online</option>
            
          </select>
        </div>
        <div class="form-group">
            <label> Pay Ammount</label>
            <input type="text" id="second_reading" class="form-control" placeholder="Enter Your Ammout">
        </div>
        <!-- /.form-group -->
      </div>
      <!-- /.col -->
      <div class="col-md-6">
      
        <div class="form-group">
          <label>Search Student</label>
          <select id="#student"   class="form-control select2bs4"  style="width: 100%;">
            <option selected="selected">Select Student</option>
            <option>Cash</option>
            <option>Online</option>
            
          </select>
        </div>
        <!-- /.form-group -->
        <div class="form-group">
            <label>Due Ammount:</label>
            <input type="text" class="form-control" name="first_reading" id="first_reading" value="8000" readonly>
        </div>
       
        <div class="form-group">
            <label>Total Due Ammount</label>
            <input type="text" class="form-control" name="total_reading" id="total_reading" value="8000" readonly>
        </div>
        <br>
        <!-- /.form-group -->
       
      </div>
      <button class="form-control btn btn-success">Submit</button>
      <!-- /.col -->
    </div>
    </form>
    <!-- /.row -->
  </div>
  {{-- <form name="log" id="log">

    <input type="text" name="first_reading" id="first_reading">
    <input type="text" name="second_reading" id="second_reading">
    
    <input type="text" name="total_reading" id="total_reading">
    
    </form> --}}

   <script>
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
   </script>
  <script>
    
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
  
      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()
  
      //Date picker
      $('#reservationdate').datetimepicker({
          format: 'L'
      });
  
      //Date and time picker
      $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
  
      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate  : moment()
        },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )
  
      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })
  
      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()
  
      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()
  
      $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      })
    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })
  
    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false
  
    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)
  
    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
      url: "/target-url", // Set the url
      thumbnailWidth: 80,
      thumbnailHeight: 80,
      parallelUploads: 20,
      previewTemplate: previewTemplate,
      autoQueue: false, // Make sure the files aren't queued until manually added
      previewsContainer: "#previews", // Define the container to display the previews
      clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })
  
    myDropzone.on("addedfile", function(file) {
      // Hookup the start button
      file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
    })
  
    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
      document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })
  
    myDropzone.on("sending", function(file) {
      // Show the total progress bar when upload starts
      document.querySelector("#total-progress").style.opacity = "1"
      // And disable the start button
      file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })
  
    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
      document.querySelector("#total-progress").style.opacity = "0"
    })
  
    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
      myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
      myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
 

  </script>
  <script> 
  $(document).ready(function() {
       

$('#class').change(function(){
let class_id=$(this).val();

alert('hi');
$.ajax({
  url:"{{route('search.view.page')}}",
  method:'POST',
  data:'class_id'=+class_id+'&_token={{csrf_token()}}',
  success:function(res){
    $('#student').html(res);
  }
 
});

})
  })

</script>
@endsection