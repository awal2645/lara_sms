@extends('layouts.admin-app')
@section('content')
            <div class="row justify-content-center ">
                <div class=" col-9 ">
                    <!-- Button trigger modal -->
                        <button type="button" class="btn  btn-info" data-toggle="modal" data-target="#exampleModal">
                            Add Course
                        </button>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('add.course')}}" method="POST" id="course-add-form">
                                @csrf
                            <div class="modal-body">
                                <div class="errMsgContainer">
                                    
                                </div>
                                <input type="hidden" name="redirect" value="{{route('add.course')}}">
                                <div class="form-group ">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Course Name:-</label>

                                    <input type="text" name="course_name" class="form-control " id="course_name"
                                        placeholder="Course Name" required>
                                        <input type="number" name="course_price" class="form-control mt-3" id="course_price"
                                        placeholder="Course Price" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary add_course_button">Save </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.Modal -->
        <!--  card-body -->
        <div class="row justify-content-center ">
            <div class="card card-info mt-4 col-9">
                <div class="card-header ">
                    <h3 class="card-title">Course list</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0 justify-content-center " style="display: block;">
                    <table class="table text-center ">
                        <thead>
                            <tr>
                                <th> Serial No </th>
                                <th> Course </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->sub_name }}</td>
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <a href="#"
                                         class="btn btn-info update_course_from"
                                         data-toggle="modal"
                                         data-target="#updateModal"
                                         data-id="{{$item->id}}"
                                         data-name="{{$item->sub_name}}"
                                         ><i class="fas fa-eye"></i></a>
                                        <a href="{{route('delete.course')}}" 
                                        id="del"
                                        class="btn btn-danger delete_sub_name"
                                        id=""
                                        data-id="{{$item->id}}"
                                        ><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- {{!!$subject->links()!!}} --}}
            </div>
        </div>
        <!-- /.card-body -->
        @include('components.updatecourse')
        
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
