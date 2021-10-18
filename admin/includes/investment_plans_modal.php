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
              <h4 class="modal-title"><b>Add New Investment plan</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="investment_plans_add.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name" class="col-sm-1 control-label">Name</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="name" name="name" required>
                  </div>

                  <label for="duration" class="col-sm-1 control-label">Duration</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="duration" placeholder="2" name="duration" required>
                  </div>



                </div>
                <div class="form-group">
                  <label for="rate" class="col-sm-1 control-label">Rate</label>

                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="rate" placeholder="10" name="rate" required>
                  </div>

                  <label for="min_invest" class="col-sm-1 control-label">Minimum Investment</label>

                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="min_invest" placeholder="100" name="min_invest" required>
                  </div>

                  <label for="max_invest" class="col-sm-1 control-label">Maximum Investment</label>

                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="max_invest" placeholder="999" name="max_invest" required>
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