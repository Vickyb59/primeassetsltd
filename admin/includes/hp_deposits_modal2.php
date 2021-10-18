<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="hp_deposits_delete.php">
                <input type="hidden" class="did" name="id">
                <div class="text-center">
                    <p>DELETE Latest Deposit Info</p>
                    <h2 class="bold name"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Latest Deposit Info</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="hp_deposits_edit.php">
                <input type="hidden" class="did" name="id">
                <div class="form-group">
                  <label for="edit_payment_type" class="col-sm-1 control-label">Payment Type</label>

                  <div class="col-sm-5">
                    <select class="form-control" id="edit_payment_type" name="payment_type" required>
                      <option value="">- Select -</option>
                      <option value="bitcoin">- Bitcoin -</option>
                      <option value="etherum">- Etherum -</option>
                      <option value="paypal">- Paypal -</option>
                      <option value="cashapp">- Cashapp -</option>
                      <option value="perfectmoney">- Perfect Money -</option>
                      <option value="westernunion">- Western Union -</option>
                    </select>
                  </div>

                  <label for="edit_username" class="col-sm-1 control-label">Username</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="edit_username" placeholder="Username" name="username" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="edit_amount" class="col-sm-1 control-label">Amount</label>

                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="edit_amount" placeholder="Amount" name="amount" required>
                  </div>


                  
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

