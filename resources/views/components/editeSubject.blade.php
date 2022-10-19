 <!-- Modal -->
            <div class="modal fade " id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel"
                aria-hidden="true">
                
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Subject</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('update.subject')}}" method="POST" id="updateform">
                                @csrf
                                <input type="hidden" name="up_sub_id" id="up_sub_id">
                            <div class="modal-body">
                                <div class="errMsgContainer">
                                    
                                </div>
                                
                                <div class="form-group ">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label"> Update Subject Name:-</label>

                                    <input type="text" name="up_sub_name" id="up_sub_name" class="form-control" id="update_sub_name"
                                        placeholder=" Update Subject Name" required>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary update_subject">Save </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.Modal -->
