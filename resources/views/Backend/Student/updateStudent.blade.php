    <!-- Modal -->
    <div class="modal fade " id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update.student') }}" method="POST" id="upstudentForm">
                    @csrf
                    <input type="hidden" name="up_stu_id" id="up_stu_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="errMsgContainer">

                            </div>
                            <div class="form-group col-3">
                                <label for="up_stu_name" class="col-sm-12 col-form-label">Student Name:</label>
                                <input type="text" name="up_stu_name" class="form-control" id="up_stu_name"
                                    placeholder="Student Name" required>
                            </div>
                            <div class="form-group col-3">
                                <label for="up_stu_email" class="col-sm-12 col-form-label"> Student Email:</label>
                                <input type="email" name="up_stu_email" class="form-control" id="up_stu_email"
                                    placeholder=" Enter Email" required>
                            </div>
                            <div class="form-group col-3">
                                <label for="up_stu_phone" class="col-sm-12 col-form-label">Student Phone Number:</label>
                                <input type="number" name="up_stu_phone" class="form-control" id="up_stu_phone"
                                    placeholder="Enter Phone Number" maxlength="10" required>

                            </div>
                            <div class="form-group col-3">
                                <label for="up_stu_age" class="col-sm-12 col-form-label"> Student Age:</label>
                                <input type="number" name="up_stu_age" class="form-control" id="up_stu_age"
                                    placeholder="Enter Age" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group ">
                                    <label for="up_stu_admitted_year" class="col-sm-12 col-form-label">Student Admit
                                        Year:</label>
                                    <input type="text" name="up_stu_admitted_year" class="form-control"
                                        id="up_stu_admitted_year" placeholder="Enter Year " required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="up_stu_address" class="col-sm-12 col-form-label">Student
                                        Address:</label>
                                    <input type="text" name="up_stu_address" class="form-control" id="up_stu_address"
                                        placeholder="Enter Address" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary update_student ">Update</button>
                    </div>
            </div>
        </div>
        </form>
    </div>
    <!-- /.Modal -->
