    <!-- Modal -->
    <div class="modal fade " id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update.student.payment') }}" method="POST" id="up_paymentFrom">
                    @csrf
                    <input type="hidden" name="up_payment_id" id="up_payment_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="errMsgContainer">

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="up_class_id"> Class</label>
                                    <input type="text" class="form-control" name="up_class_id" id="up_class_id"
                                        readonly>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="up_pay_type">Payment Type</label>
                                    <select class="form-control select2bs4" id="up_pay_type" name="up_pay_type"
                                        style="width: 100%;" required>
                                        <option selected="selected">Selelect Payment Method</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Online">Online</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="up_pay_amount"> Pay Amount</label>
                                    <input type="text" id="up_pay_amount" name="up_pay_amount" class="form-control"
                                        placeholder="Enter Your Ammout" required>
                                </div>
                                <div class="form-group">
                                    <label for="up_due_pay_date">Due Payment Date</label>
                                    <input type="date" class="form-control" name="up_due_pay_date"
                                        id="up_due_pay_date" required>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="up_stu_val"> Student Name</label>
                                    <input type="text" class="form-control" name="up_stu_val" id="up_stu_val"
                                        readonly>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="up_stu_due_amount">Due Amount:</label>
                                    <input type="text" class="form-control" name="up_stu_due_amount"
                                        id="up_stu_due_amount" value="" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="up_total_amount">Total Due Amount</label>
                                    <input type="text" class="form-control" name="up_total_amount"
                                        id="up_total_amount" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="up_pay_date">Payment Date</label>
                                    <input type="date" class="form-control" name="up_pay_date" id="up_pay_date"
                                    value="<?php echo date('Y-m-d'); ?>"  required>
                                </div>
                                <br>
                                <!-- /.form-group -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class=" btn btn-success up_payment">Save</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.Modal -->
