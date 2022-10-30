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
                <form action="{{ route('add.section') }}" method="POST" id="sectionForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                        <div class="errMsgContainer">

                        </div>
                        <div class="form-group col-3">
                            <label for="student_name" class="col-sm-12 col-form-label">Student Name:</label>
                            <input type="text" name="student_name" class="form-control" id="student_name"
                                placeholder="Student Name" required>
                            <label for="class_id" class="col-sm-12 col-form-label">Select Class:</label>
                            <select id="class_id" name="class_id" class="form-control" aria-label="Default select example">
                                <option selected>Select class</option>
                                @foreach ($class as $item)
                                    <option value="{{ $item->id }}">{{ $item->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="student_email" class="col-sm-12 col-form-label"> Student student_email:</label>
                            <input type="email" name="student_email" class="form-control" id="student_email"
                            placeholder="Section Name" required>
                            <label for="section_name" class="col-sm-12 col-form-label">Student Section:</label>
                            <select id="class_id" name="class_id" class="form-control" aria-label="Default select example">
                                <option selected>Student Section</option>
                                @foreach ($section as $item)
                                    <option value="{{ $item->id }}">{{ $item->section_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="student_number" class="col-sm-12 col-form-label">Student Phone Number:</label>
                            <input type="number" name="student_number" class="form-control" id="student_number"
                                placeholder="Phone Number" maxlength="10" required>
                            <label for="class_id" class="col-sm-12 col-form-label"> Student Gender:</label>
                            <select id="class_id" name="class_id" class="form-control" aria-label="Default select example">
                                <option selected> Gender</option>
                                @foreach ($gender as $item)
                                    <option value="{{ $item->id }}">{{ $item->gender_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="class_id" class="col-sm-12 col-form-label"> Student Admission ID:</label>
                            <input type="number" name="section_name" class="form-control" id="section_name"
                                placeholder="Section Name" required>
                            <label for="class_id" class="col-sm-12 col-form-label"> Student Age:</label>
                            <input type="number" name="section_name" class="form-control" id="section_name"
                                placeholder="Section Name" required>
                        </div>
                      </div> 
                      <div class="row">
                        <div class="col-6">
                            <div class="form-group ">
                                <label for="section_name" class="col-sm-12 col-form-label">Student Date Of Birth:</label>
                                <input type="date" name="section_name" class="form-control" id="section_name"
                                    placeholder="Section Name" required>
                                <label for="class_id" class="col-sm-12 col-form-label"> Student Blood Group:</label>
                                <select id="class_id" name="class_id" class="form-control" aria-label="Default select example">
                                    <option selected>Blood Group</option>
                                    @foreach ($blood as $item)
                                        <option value="{{ $item->id }}">{{ $item->blood_grp }}</option>
                                    @endforeach
                                </select>
                                <label for="section_name" class="col-sm-12 col-form-label">Student Nationlity:</label>
                                <input type="text" name="section_name" class="form-control" id="section_name"
                                    placeholder="Section Name" required>
                              
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="section_name" class="col-sm-12 col-form-label">Student Address:</label>
                                <input type="text" name="section_name" class="form-control" id="section_name"
                                    placeholder="Section Name" required>
                            </div>
                            <div class="form-group "><label for="Image" class="form-label"> Student Image  </label>
                                    <br>
                                    <input class=" form-contro btn btn-secondary" type="file" id="formFile" onchange="preview()">
                                    <img id="frame" src="" class="img-fluid mt-3"/>  
                                    <br>
                                    <button onclick="clearImage()" class="btn btn-danger mt-3">Reset</button>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary add_section">Save </button>
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
                                    <th> Student </th>
                                    <th> Class </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student as $key => $item)
                                    <tr class="text-center">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->section_name }}</td>
                                        @if (empty($item->my_class->class_name))
                                        <td>{{ $item->class_id}}</td> 
                                        @else
                                        <td>{{ $item->my_class->class_name}}</td>
                                        @endif
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" class="btn btn-info update_class_from" data-toggle="modal"
                                                    data-target="#updateModal" data-id="{{ $item->id }}"
                                                    data-name="{{ $item->section_name }}"
                                                    data-class_name="{{ $item->class_id }}"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('delete.section') }}" id="del"
                                                    class="btn btn-danger delete_section_id"
                                                    data-id="{{ $item->id }}"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th> Serial No </th>
                                    <th> Student </th>
                                    <th> Class </th>
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
    @include('Backend.Section.updateSection')
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
