@extends('layouts.admin-app')
@section('content')
@include('components.dataTable_head')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Transation History </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped refresh">
                            <thead>
                                <tr class="text-center">
                                    <th> Serial No </th>
                                    <th> Trx ID </th>
                                    <th> Name </th>
                                    <th> Roll </th>
                                    <th> Amount </th>
                                    <th> Date </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pay_history as $key => $item)
                                    <tr class="text-center">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->pay_trx }}</td>
                                        <td>{{ $item->my_student->stu_name }}</td>
                                        <td>{{ $item->my_student->stu_adm_roll }}</td>
                                        <td>{{$item->pay_amount}}</td>
                                        <td>{{$item->pay_date}}</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" class="btn btn-info update_student_from"
                                                    data-toggle="modal" data-target="#updateModal"
                                                    data-stu_id="{{ $item->id }}">
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
                                    <th> Trx ID </th>
                                    <th> Name </th>
                                    <th> Roll </th>
                                    <th> Amount </th>
                                    <th> Date </th>
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
    </script> 
    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
        function clearImage() {
            document.getElementById('stu_img').value = null;
            frame.src = "";
        }
    </script> --}}
@endsection
