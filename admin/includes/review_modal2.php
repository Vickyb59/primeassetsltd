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
              <form class="form-horizontal" method="POST" action="review_delete.php">
                <input type="hidden" class="revid" name="id">
                <div class="text-center">
                    <p>DELETE REVIEW</p>
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
              <h4 class="modal-title"><b>Edit Review</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="review_edit.php">
                <input type="hidden" class="revid" name="id">
                <div class="form-group">
                  <label for="edit_name" class="col-sm-1 control-label">Name</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="edit_name" name="name">
                  </div>

                  <label for="edit_time" class="col-sm-1 control-label">Time</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="edit_timee" placeholder="1:33 pm" name="timee" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="edit_date" class="col-sm-1 control-label">Date</label>

                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="edit_datee" placeholder="DEC 5, 2013" name="datee" required>
                  </div>

                  
                  <label for="photo" class="col-sm-1 control-label">Customer Photo</label>

                  <div class="col-sm-5">
                    <input type="file" id="photo" name="photo">
                  </div>
                </div>

                <p><b>Comment</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="editor2" name="comment" rows="10" cols="80"></textarea>
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

