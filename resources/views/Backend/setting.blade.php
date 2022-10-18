@extends('layouts.admin-app')
@section('content')
<div class="row">
            <div class="col-md-6">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Update System Setting</h3>
    
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputName"> Name of School </label>
                    <input type="text" id="inputName" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="inputDescription">School Acronym</label>
                    <input type="text" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="inputStatus">Current Session</label>
                    <select id="inputStatus" class="form-control custom-select">
                      <option selected="" disabled="">Select one</option>
                      <option>On Hold</option>
                      <option>Canceled</option>
                      <option>Success</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="inputClientCompany">Phone</label>
                    <input type="text" id="inputClientCompany" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="inputProjectLeader">Email</label>
                    <input type="text" id="inputProjectLeader" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="inputProjectLeader">School Address</label>
                    <input type="text" id="inputProjectLeader" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="inputProjectLeader">This Term Ends</label>
                    <input type="text" id="inputProjectLeader" class="form-control">
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <div class="col-md-6">
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Next Term Fees</h3>
    
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  @foreach ($subjects as $subject)
                      
                  
                  <div class="form-group">
                    <label for="inputEstimatedBudget">{{$subject->sub_name}}</label>
                    <input type="number" id="inputEstimatedBudget" class="form-control">
                  </div>
                  @endforeach
                  <div class="form-group">
                    <div class="mb-5">
                        <label for="Image" class="form-label">Set Your School Logo</label>
                        <input class="form-control btn " type="file" id="formFile" onchange="preview()">
                       
                    </div>
                    <img id="frame" src="" class="img-fluid" />
                    <button onclick="clearImage()" class="btn btn-danger mt-3">Reset</button>
                </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              {{-- <a href="#" class="btn btn-secondary">Cancel</a> --}}
              <input type="submit" value=" update setting " class="btn btn-success float-right">
            </div>
          </div>
<script>
    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
    function clearImage() {
        document.getElementById('formFile').value = null;
        frame.src = "";
    }
</script>
@endsection