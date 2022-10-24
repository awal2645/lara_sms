@extends('layouts.admin-app')
@section('content')
@include('components.dataTable_head')
                <div class="mb-3 ml-2">
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary  " data-toggle="modal" data-target="#exampleModal">
                            Add Section
                        </button>
                </div>
            <!-- Modal -->
            <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Section</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('add.section')}}" method="POST" id="sectionForm">
                                @csrf
                            <div class="modal-body">
                                <div class="errMsgContainer">
                        
                                </div>
                                <div class="form-group ">
                                    <label for="section_name" class="col-sm-12 col-form-label">Section Name:</label>
                                    <input type="text" name="section_name" class="form-control" id="section_name"
                                        placeholder="Section Name" required>
                                    <label for="class_id" class="col-sm-12 col-form-label"> Select Class:</label>
                                    <select id="class_id" name="class_id" class="form-control" aria-label="Default select example">
                                        <option selected>Select class</option>
                                        @foreach ($class as $item)
                                        <option value="{{$item->id}}">{{$item->class_name}}</option>
                                        @endforeach
                                    </select>
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
                        <h3 class="card-title"> Section List </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped refresh">
                            <thead>
                                <tr class="text-center">
                                    <th> Serial No </th>
                                    <th> Section </th>
                                    <th> Class </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($section as $key=>$item)
                                <tr class="text-center">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->section_name }}</td>
                                    <td>{{ $item->my_class->class_name }}</td>
                                    <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#"
                                             class="btn btn-info update_class_from"
                                             data-toggle="modal"
                                             data-target="#updateModal"
                                             data-id="{{$item->id}}"
                                             data-name="{{$item->section_name}}"
                                             data-class_name="{{$item->class_id}}"
                                             ><i class="fas fa-eye"></i></a>
                                            <a href="{{route('delete.section')}}" 
                                            id="del" 
                                            class="btn btn-danger delete_section_id"
                                            data-id="{{$item->id}}"
                                            ><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          <tfoot>
                            <tr class="text-center">
                                <th> Serial No </th>
                                <th> Section </th>
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
   
@endsection
