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
              <form class="form-horizontal" method="POST" action="investment_plans_delete.php">
                <input type="hidden" class="ipid" name="id">
                <div class="text-center">
                    <p>DELETE Investment Plan</p>
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
              <h4 class="modal-title"><b>Edit Investment Plan</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="investment_plans_edit.php">
                <input type="hidden" class="ipid" name="id">
                <div class="form-group">
                  <label for="edit_name" class="col-sm-1 control-label">Name</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="edit_name" name="name">
                  </div>

                  <label for="edit_duration" class="col-sm-1 control-label">Duration</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="edit_duration" placeholder="15" name="duration" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="edit_rate" class="col-sm-1 control-label">Rate</label>

                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="edit_rate" placeholder="25" name="rate" required>
                  </div>


                  <label for="edit_min_invest" class="col-sm-1 control-label">Minimum Investment</label>

                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="edit_min_invest" placeholder="25" name="min_invest" required>
                  </div>


                  <label for="edit_max_invest" class="col-sm-1 control-label">Maximum Investment</label>

                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="edit_max_invest" placeholder="25" name="max_invest" required>
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

