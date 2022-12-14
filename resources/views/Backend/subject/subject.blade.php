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
                Add Subject
            </button>
        </div>
    @endif
    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('add.subject') }}" method="POST" id="form">
                    @csrf
                    <div class="modal-body">
                        <div class="errMsgContainer">

                        </div>
                        <div class="form-group ">
                            <label for="sub_name" class="col-sm-12 col-form-label">Subject Name:</label>
                            <input type="text" name="sub_name" class="form-control" id="sub_name"
                                placeholder="Subject Name" required>
                            <label for="sub_short_name" class="col-sm-12 col-form-label">Subject Short Name:</label>
                            <input type="text" name="sub_short_name" class="form-control" id="sub_short_name"
                                placeholder="Subject Short Name" required>
                            <label for="class_id" class="col-sm-12 col-form-label"> Select Class:</label>
                            <select id="class_id" name="class_id" class="form-control" aria-label="Default select example">
                                <option value="0">Select class</option>
                                @foreach ($class as $item)
                                    <option value="{{ $item->id }}">{{ $item->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary add_subject">Save </button>
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
                        <h3 class="card-title"> Subject List </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped refresh">
                            <thead>
                                <tr class="text-center">
                                    <th> Serial No </th>
                                    <th> Subject </th>
                                    <th> Short Name </th>
                                    <th> Class </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subject as $key => $item)
                                    <tr class="text-center">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->sub_name }}</td>
                                        <td>{{ $item->sub_short_name }}</td>
                                        @if (empty($item->my_class->class_name))
                                            <td>{{ $item->class_id }}</td>
                                        @else
                                            <td>{{ $item->my_class->class_name }}</td>
                                        @endif
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" class="btn btn-info update_class_from" data-toggle="modal"
                                                    data-target="#updateModal" data-id="{{ $item->id }}"
                                                    data-name="{{ $item->sub_name }}"
                                                    data-short_name="{{ $item->sub_short_name }}"
                                                    data-class_id="{{ $item->class_id }}"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('delete.subject') }}" id="del"
                                                    class="btn btn-danger delete_sub_name" data-id="{{ $item->id }}"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th> Serial No </th>
                                    <th> Subject </th>
                                    <th> Short Name </th>
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
    @include('Backend.subject.updateSubject')
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
@endsection
