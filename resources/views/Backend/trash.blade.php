@extends('layouts.admin-app')
@section('content')
@include('components.dataTable_head')
            <div class="mb-3 ml-2">
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary  " data-toggle="modal" data-target="#exampleModal">
                        Add Class
                    </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add class</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('add.class')}}" method="POST" id="form">
                                @csrf
                            <div class="modal-body">
                                <div class="errMsgContainer">
                                    
                                </div>
                                <div class="form-group ">
                                    <label for="class_name" class="col-sm-12 col-form-label pl-0">Class Name:</label>
                                    <input type="text" name="class_name" class="form-control " id="class_name"
                                        placeholder="Class Name" required>
                                    <label for="class_fees" class="col-sm-12 col-form-label pl-0">Class Fees:</label>
                                    <input type="number" name="class_fees" class="form-control" id="class_fees"
                                        placeholder="Class Fees" min="0" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary add_class_button">Save </button>
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
                        <h3 class="card-title"> Class List </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped refresh">
                            <thead>
                                <tr class="text-center">
                                    <th> Serial No </th>
                                    <th> Class </th>
                                    <th> Fees </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($class as $key=>$item)
                                <tr class="text-center">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->class_name }}</td>
                                    <td>{{ $item->class_fees }}</td>
                                    <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-smd-flex justify-content-center">
                                                <a href="{{route('restore.class')}}" 
                                                id="del" 
                                                class="btn btn-danger trash_class_name"
                                                data-id="{{$item->id}}"
                                                >
                                                <i class="fas fa-trash-can-undo">Restore</i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          <tfoot>
                            <tr class="text-center">
                            <th> Serial No </th>
                            <th> Class </th>
                            <th> Fees </th>
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
        @include('Backend.class.updateClass')
        @include('components.dataTable_scrpit')
        <script src="{{asset('js/trash.js')}}"></script>
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
