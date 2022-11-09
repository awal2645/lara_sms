@extends('layouts.admin-app')
@section('content')
    @include('components.dataTable_head')
    @if (empty($class))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Class list is empty</strong> Please add a <a href="{{ route('class.view.page') }}">class</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @else
        <div class="mb-3 ml-2">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary  " data-toggle="modal" data-target="#exampleModal">
                Add Student
            </button>
        </div>
    @endif
    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('add.student') }}" method="POST" id="studentForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                        <div class="errMsgContainer">

                        </div>
                        <div class="form-group col-3">
                            <label for="stu_name" class="col-sm-12 col-form-label">Student Name:</label>
                            <input type="text" name="stu_name" class="form-control" id="stu_name"
                                placeholder="Student Name" required>
                                @error('stu_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            <label for="stu_class_id" class="col-sm-12 col-form-label">Select Class:</label>
                            <select id="stu_class_id"  data-url="{{route('search.fees')}}"  name="stu_class_id" class="form-control" aria-label="Default select example" required>
                                <option selected>Select class</option>
                                @foreach ($class as $item)
                                    <option value="{{ $item->id }}">{{ $item->class_name }}</option>
                                @endforeach
                            </select>
                            <label for="d_ammount" class="col-sm-12 col-form-label">Total Fees:</label>
                            <input type="number" class="form-control" name="d_ammount"  id="d_ammount" readonly>
                        </div>
                        <div class="form-group col-3">
                            <label for="stu_email" class="col-sm-12 col-form-label"> Student Email:</label>
                            <input type="email" name="stu_email" class="form-control" id="stu_email"
                            placeholder=" Enter Email" required>
                            @error('stu_email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            <label for="stu_section" class="col-sm-12 col-form-label">Student Section:</label>
                            <select id="stu_section" name="stu_section" class="form-control" aria-label="Default select example" required>
                                <option selected>Student Section</option>
                                @foreach ($section as $item)
                                    <option value="{{$item->id }}" >{{ $item->section_name }}</option>
                                @endforeach
                            </select>
                            <label for="stu_gender" class="col-sm-12 col-form-label"> Student Gender:</label>
                            <select id="stu_gender" name="stu_gender" class="form-control" aria-label="Default select example" required>
                                <option selected> Gender</option>
                                @foreach ($gender as $item)
                                    <option value="{{ $item->id }}">{{ $item->gender_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="stu_phone" class="col-sm-12 col-form-label">Student Phone Number:</label>
                            <input type="number" name="stu_phone" class="form-control" id="stu_phone"
                                placeholder="Enter Phone Number" maxlength="10" required>
                            <label for="class_fees" class="col-sm-12 col-form-label">Class Fees:</label>
                            <input type="number" name="class_fees" class="form-control" id="class_fees" value="" readonly>
                            <label for="stu_blood" class="col-sm-12 col-form-label"> Student Blood Group:</label>
                            <select id="stu_blood" name="stu_blood" class="form-control" aria-label="Default select example" required>
                                <option selected>Blood Group</option>
                                @foreach ($blood as $item)
                                    <option value="{{ $item->id }}">{{ $item->blood_grp }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="stu_adm_roll" class="col-sm-12 col-form-label"> Student Admission Roll<span class="text-danger">*</span></label>
                            <input type="number" name="stu_adm_roll" class="form-control" id="stu_adm_roll"
                                placeholder="Enter Addmison Roll" required>
                            <label for="discount" class="col-sm-12 col-form-label">Disscount Ammount :</label>
                            <input type="number" name="discount" class="form-control" id="discount">
                            <label for="stu_age" class="col-sm-12 col-form-label"> Student Age:</label>
                            <input type="number" name="stu_age"  class="form-control" id="stu_age"
                                placeholder="Enter Age" required> 
                        </div>
                      </div> 
                      <div class="row">
                        <div class="col-6">
                            <div class="form-group ">
                                <label for="stu_parents" class="col-sm-12 col-form-label">Student Parents Name:</label>
                                <input type="text" name="stu_parents" class="form-control" id="stu_parents"
                                    placeholder="Enter Parents " required>
                                <label for="stu_admitted_year" class="col-sm-12 col-form-label">Student Admit Year:</label>
                                <input type="text" name="stu_admitted_year" class="form-control" id="stu_admitted_year"
                                    placeholder="Enter Year " value="<?php echo date("Y");?>" required>
                                <label for="stu_pay_date" class="col-sm-12 col-form-label">Due Fees  Payment Date :</label>
                                <input type="date" name="stu_pay_date" class="form-control" id="stu_pay_date" value="" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="stu_address" class="col-sm-12 col-form-label">Student Address:</label>
                                <input type="text" name="stu_address" class="form-control" id="stu_address"
                                    placeholder="Enter Address" required>
                                    
                            </div>
                            <div class="form-group ">
                                <label for="stu_img" class="form-label"> Student Image  </label>
                                <br>
                                <input class=" form-control btn btn-secondary" name="stu_img" type="file" id="stu_img"> 
                                <br>
                                {{-- <button onclick="clearImage()" class="btn btn-danger mt-3">Reset</button> --}}
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ">Save</button>
                    </div>
            </div>
        </div>
        </form>
    </div>
    <!-- /.Modal -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Student List </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped refresh">
                            <thead>
                                <tr class="text-center">
                                    <th> Serial No </th>
                                    <th> Name </th>
                                    <th> Roll </th>
                                    <th> Class </th>
                                    <th> Section </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student as $key => $item)
                                    <tr class="text-center">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->stu_name }}</td>
                                        <td>{{ $item->stu_adm_roll}}</td>
                                        @if (empty($item->my_class->class_name))
                                        <td>{{ $item->class_id}}</td> 
                                        @else
                                        <td>{{ $item->my_class->class_name}}</td>
                                        @endif
                                        <td>{{ $item->my_section->section_name}}</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" class="btn btn-info update_student_from" data-toggle="modal"
                                                    data-target="#updateModal" 
                                                    data-stu_id="{{ $item->id }}"
                                                    data-stu_name="{{ $item->stu_name }}"
                                                    data-stu_email="{{ $item->stu_email }}"
                                                    data-stu_age="{{ $item->stu_age }}"
                                                    data-stu_phone="{{ $item->stu_phone }}"
                                                    data-stu_address="{{ $item->stu_address }}"
                                                    data-stu_admitted_year="{{ $item->stu_admitted_year }}"
                                                >
                                                    <i class="fas fa-eye"></i></a>
                                                <a href="{{ route('delete.student') }}" id="del"
                                                    class="btn btn-danger delete_student_id"
                                                    data-stu_id="{{ $item->id }}"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th> Serial No </th>
                                    <th> Name </th>
                                    <th> Roll </th>
                                    <th> Class </th>
                                    <th> Section </th>
                                    <th> Action </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <!-- /.card-body -->
    @include('Backend.Student.updateStudent')
    @include('components.dataTable_scrpit')
    {{-- <script>
        @if (Session::has('success'))
            toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                },
                toastr.success("{{ 'Data added Successfully' }}")
        @endif
    </script> --}}
    {{-- <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
        function clearImage() {
            document.getElementById('stu_img').value = null;
            frame.src = "";
        }
    </script> --}}
@endsection
