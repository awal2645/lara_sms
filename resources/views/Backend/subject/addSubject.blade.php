@extends('layouts.admin-app')
@section('content')
        <!-- Button trigger modal -->
            <button type="button" class="btn  btn-info" data-toggle="modal" data-target="#exampleModal">
                Add Subject
            </button>
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
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Subject Name:-</label>

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
        <!--  card-body -->
            <div class="card card-info mt-4 row justify-content-center">
                <div class="card-header ">
                    <h3 class="card-title">Files</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0 justify-content-center col-6" style="display: block;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> subject </th>
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
                                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- {{!!$subject->links()!!}} --}}
            </div>
        <!-- /.card-body -->
        @include('components.editeSubject')
    <script>
        @if (Session::has('success'))
            toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                },
                toastr.success("{{ 'Data added Successfully' }}")
        @endif
    </script>
@endsection
