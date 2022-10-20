@extends('layouts.admin-app')
@section('content')
@include('components.subject_head')
            
                <div class="mb-3">
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary  " data-toggle="modal" data-target="#exampleModal">
                            Add Subject
                        </button>
                </div>
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
                            <form action="{{route('add.subject')}}" method="POST" id="form">
                                @csrf
                            <div class="modal-body">
                                <div class="errMsgContainer">
                                    
                                </div>
                                
                                <div class="form-group ">
                                    <label for="inputEmail3" class="col-sm-12 col-form-label">Subject Name:-</label>

                                    <input type="text" name="sub_name" class="form-control" id="sub_name"
                                        placeholder="Subject Name" required>
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
                        <h3 class="card-title">DataTable   </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped refresh">
                            <thead>
                                <tr>
                                    <th> Serial No </th>
                                    <th> subject </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subject as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->sub_name }}</td>
                                    <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#"
                                             class="btn btn-info update_class_from"
                                             data-toggle="modal"
                                             data-target="#updateModal"
                                             data-id="{{$item->id}}"
                                             data-name="{{$item->sub_name}}"
                                             ><i class="fas fa-eye"></i></a>
                                            <a href="{{route('delete.subject')}}" 
                                            id="del" 
                                            
                                            class="btn btn-danger delete_sub_name"
                                            data-id="{{$item->id}}"
                                            ><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          <tfoot>
                            <tr>
                                <th> Serial No </th>
                                <th> subject </th>
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
        @include('components.updateSubject')  
        @include('components.subject_scrpit')
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
