<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New User</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="users_add.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="full_name" class="col-sm-3 control-label">Fullname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="full_name" name="full_name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="uname" class="col-sm-3 control-label">Username</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="uname" name="uname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nationality" class="col-sm-3 control-label">Nationality</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="nationality" name="nationality"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone_no" class="col-sm-3 control-label">Phone Number</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="phone_no" name="phone_no">
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>

                <label for="type" class="col-sm-1 control-label">User Type</label>

                <div class="col-sm-5">
                    <select class="form-control" id="type" name="type" required>
                      <option value="">- Select -</option>
                      <option value="1">- Admin -</option>
                      <option value="0">- Investor -</option>
                    </select>
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

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit User</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="users_edit.php">
                <input type="hidden" class="userid" name="id">
                <div class="form-group">
                    <label for="edit_email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="edit_email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="edit_password" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_full_name" class="col-sm-3 control-label">Fullname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_full_name" name="full_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_uname" class="col-sm-3 control-label">Username</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_uname" name="uname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_nationality" class="col-sm-3 control-label">Nationality</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="edit_nationality" name="nationality"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_phone_no" class="col-sm-3 control-label">Phone Number</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_phone_no" name="phone_no">
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

<!-- fund -->
<div class="modal fade" id="fund">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>fund User</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="users_fund.php">
                <input type="hidden" class="userid" name="id">
                <div class="form-group">
                    <label for="amount" class="col-sm-3 control-label">Amount</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="200" id="amount" name="amount">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="fund"><i class="fa fa-money"></i> Fund User</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- msg -->
<div class="modal fade" id="msg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Message User</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="users_msg.php">
                <input type="hidden" class="userid" name="id">
                <div class="form-group">
                  <label for="subject" class="col-sm-2 control-label">Subject</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="subject" placeholder="Subject of the Message" name="subject" required>
                  </div>
                </div>
                <p><b>Message Body</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="editor1" name="message" rows="10" cols="80" required></textarea>
                  </div>
                  
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="msg"><i class="fa fa-envelope"></i> Message User</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!-- msg -->
<div class="modal fade" id="msg_all">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Send General Message</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="users_msg_all.php">
                <input type="hidden" name="id" value="0">
                <div class="form-group">
                  <label for="subject" class="col-sm-2 control-label">Subject</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="subject" placeholder="Subject of the Message" name="subject" required>
                  </div>
                </div>
                <p><b>Message Body</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="editor1" name="message" rows="10" cols="80" required></textarea>
                  </div>
                  
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="msg_all"><i class="fa fa-envelope"></i> Message User</button>
              </form>
            </div>
        </div>
    </div>
</div>

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
              <form class="form-horizontal" method="POST" action="users_delete.php">
                <input type="hidden" class="userid" name="id">
                <div class="text-center">
                    <p>DELETE USER</p>
                    <h2 class="bold fullname"></h2>
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

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="users_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="userid" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div> 


<!-- Activate -->
<div class="modal fade" id="activate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Activating...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="users_activate.php">
                <input type="hidden" class="userid" name="id">
                <div class="text-center">
                    <p>ACTIVATE USER</p>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="activate"><i class="fa fa-check"></i> Activate</button>
              </form>
            </div>
        </div>
    </div>
</div> 


     