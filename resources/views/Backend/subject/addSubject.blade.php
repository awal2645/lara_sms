@extends('layouts.admin-app')
@section('content')
        <!-- Button trigger modal -->
            <button type="button" class="btn  btn-info" data-toggle="modal" data-target="#exampleModal">
                Add Subject
            </button>
            <!-- Modal -->
            <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <form action="">

                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

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
                                <button type="submit add_subject" class="btn btn-primary">Save </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.Modal -->
        <!--  card-body -->
            <div class="card card-info mt-4">
                <div class="card-header">
                    <h3 class="card-title">Files</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0" style="display: block;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> subject </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subject as $item)
                            <tr>
                                <td>{{ $item->sub_name }}</td>
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        <!-- /.card-body -->
    <script>
        $(document).ready(function() {
            $(document).on('click', '.add_subject', function(e) {
                e.preventDefault();
                let name = $('#sub_name').val();
                console.log(name);
            });
        })
    </script>

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
