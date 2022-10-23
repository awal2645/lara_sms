<!-- Modal -->
<div class="modal fade " id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('update.class')}}" method="POST" id="updateform">
                @csrf
                <input type="hidden" name="up_class_id" id="up_class_id">
            <div class="modal-body">
                <div class="errMsgContainer">
                    
                </div>
                <div class="form-group ">
                    <label for="up_class_name" class="col-sm-12 col-form-label"> Update Class Name:</label>
                    <input type="text" name="up_class_name" id="up_class_name" class="form-control" 
                        placeholder=" Update Class Name" required>
                        <label for="up_class_price" class="col-sm-12 col-form-label"> Update Class Fees:</label>
                    <input type="text" name="up_class_fees" id="up_class_fees" class="form-control" 
                        placeholder=" Update Class Fees" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_class_button">Update </button>
            </div>
        </div>
    </div>
</form>
</div>
<!-- /.Modal -->
