<!-- Description -->
<div class="modal fade" id="description">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="name"></span></b></h4>
            </div>
            <div class="modal-body">
                <p id="desc"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Deposit Info</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="hp_deposits_add.php" enctype="multipart/form-data">
                <div class="form-group">

                  <label for="username" class="col-sm-1 control-label">Username</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
                  </div>


                  <label for="amount" class="col-sm-1 control-label">Amount</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="amount" placeholder="Amount" name="amount" required>
                  </div>

                </div>
                <div class="form-group">

                  <label for="payment_type" class="col-sm-2 control-label">Payment Method</label>

                  <div class="col-sm-5">
                    <select class="form-control" id="payment_type" name="payment_type" required>
                      <option value="" selected>- Select -</option>
                      <option value="bitcoin">- Bitcoin -</option>
                      <option value="etherum">- Etherum -</option>
                      <option value="paypal">- Paypal -</option>
                      <option value="cashapp">- Cashapp -</option>
                      <option value="perfectmoney">- Perfect Money -</option>
                      <option value="westernunion">- Western Union -</option>
                    </select>
                  </div>

                  <label for="date" class="col-sm-1 control-label">Date</label>

                  <div class="col-sm-4">
                    <input type="date" class="form-control" id="date" min="2015-12-20" max="2030-12-31" placeholder="dd-mm-yyyy" name="date" required>
                  </div>

                  
                  
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>