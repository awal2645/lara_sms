@extends('layouts.side_menu_layout')
@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content ">

<div class="row justify-content-center">
    <div class="col-8">
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">ADD SUBJECT</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form  action="{{route('add.subject')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Subject Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="sub_name" class="form-control"  placeholder="Subject Name" required>
                  </div>
                </div>
                
             
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                {{-- <button type="submit" class="btn btn-default float-right">Cancel</button> --}}
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
        </div>
    </div>

    </section>
    <!-- /.content -->
    </div>
   
	<script>
        @if(Session::has('success'))
        toastr.options={
            "closeButton":true,
            "progressBar":true
        },
        toastr.success("{{'Data added Successfully'}}")
        @endif
    </script>
    
 
    @endsection