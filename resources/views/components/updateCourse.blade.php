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
            <form action="{{route('update.course')}}" method="POST" id="updateform">
                @csrf
                <input type="hidden" name="up_course_id" id="up_course_id">
            <div class="modal-body">
                <div class="errMsgContainer">
                    
                </div>
                <div class="form-group ">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"> Update Subject Name:-</label>
                    <input type="text" name="up_course_name" id="up_sub_name" class="form-control" id="up_course_name"
                        placeholder=" Update Course Name" required>
                    <input type="text" name="up_course_price" id="up_course_price" class="form-control" id="up_course_price"
                        placeholder=" Update Course price" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary course_name_button">Update </button>
            </div>
        </div>
    </div>
</form>
</div>
<!-- /.Modal -->
