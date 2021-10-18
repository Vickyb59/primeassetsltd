<?php
    include('../inc/config.php');

    include '../admin/session.php';

    $page_name = 'Customer Profile';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = 'Manage Investment provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';

    include('inc/head.php');

    $id = $_SESSION['user'];

    if(!isset($_SESSION['user'])){
        header('location: ../login.php');
    }

    $sql0 = "SELECT * FROM users WHERE id=".$id;
    $result0 = $conne->query($sql0);
    $row0 = $result0->fetch_assoc();

    $sql1 = "SELECT * FROM passbook".$id." WHERE trans_id=(
                    SELECT MAX(trans_id) FROM passbook".$id.")";
    $result1 = $conne->query($sql1);
    $row1 = $result1->fetch_assoc();

    if ($row1["debit"] == 0) {
        $transaction = $row1["credit"];
        $type = "credit";
    }
    else {
        $transaction = $row1["debit"];
        $type = "debit";
    }

    $time = strtotime($row1["trans_date"]);
    $sanitized_time = date("Y-m-d, g:i A", $time);

    

    $sql0 = "SELECT * FROM passbook".$_SESSION['user'];

?>

    <body class="layout-row">
        <!-- ############ Aside START-->
        <?php include('inc/sidebar.php'); ?>
        <!-- ############ Aside END-->
        <div id="main" class="layout-column flex">
            <!-- ############ Header START-->
            <?php include('inc/header.php'); ?>
            <!-- ############ Footer END--><!-- ############ Content START-->
            <div id="content" class="flex">
                <!-- ############ Main START-->
                <div>
                    <?php
                        if(isset($_SESSION['error'])){
                          echo "
                            <div class='alert bg-danger mb-5 py-4'>
                              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                              <h4><i data-feather='alert-circle' width='32' height='32'></i> Error!</h4>
                              ".$_SESSION['error']."
                            </div>
                          ";
                          unset($_SESSION['error']);
                        }
                        if(isset($_SESSION['success'])){
                          echo "
                            <div class='alert bg-success mb-5 py-4'>
                              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                              <h4><i data-feather='check-circle' width='32' height='32'></i> Success!</h4>
                              ".$_SESSION['success']."
                            </div>
                          ";
                          unset($_SESSION['success']);
                        }
                      ?>
                    <div class="page-hero page-container" id="page-hero">
                        <div class="padding d-flex">
                            <div class="page-title">
                                <h2 class="text-md text-highlight">Customer Profile</h2>
                            </div>
                        </div>
                    </div>
                    <div class="page-hero page-container" id="page-hero">
                        <div class="action-padding">
                            <?php
                                if (empty($row0['nationality'])) {
                                    echo '<button data-toggle="modal" data-target="#modal" class="btn mb-1 btn-primary">Complete Your Profile Setup</button>';
                                }
                                else{echo "Profile Setup Complete";}

                            ?>
                             
                        </div>
                    </div>
                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row row-sm sr">
                                <div class="col-md-12 col-lg-8">
                                    <div class="row row-sm">
                                        <div class="col-md-8">
                                            <div class="row row-sm">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row row-sm">
                                                                <div class="col-6">
                                                                    <small class="text-muted">Account Name</small>
                                                                    <div class="text-highlight mt-2 font-weight-500"><span class="text-info"><?php echo $row0["full_name"] ?></span></div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <small class="text-muted">Username</small>
                                                                    <div class="text-highlight mt-2 font-weight-500"><?php echo $row0["uname"]; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-sm">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row row-sm">
                                                                <div class="col-6">
                                                                    <small class="text-muted">Email</small>
                                                                    <div class="mt-2 font-weight-500"><?php echo $row0["email"]; ?></div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <small class="text-muted">Wallet Balance</small>
                                                                    <div class="text-highlight mt-2 font-weight-500"><span class="text-info">&#36; <?php echo number_format($row1["balance"], 2) ?></span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-sm">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row row-sm">
                                                                <div class="col-4">
                                                                    <small class="text-muted">Gender</small>
                                                                    <div class="mt-2 font-weight-500"><?php echo $row0["gender"]; ?></div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <small class="text-muted">Date of Birth</small>
                                                                    <div class="mt-2 font-weight-500"><span class="text-info"><?php echo $row0["dob"]; ?></span></div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <small class="text-muted">Nationality</small>
                                                                    <div class="mt-2 font-weight-500"><?php echo $row0["nationality"]; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-sm">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row row-sm">
                                                                <div class="col-4">
                                                                   <small class="text-muted">Referral Code</small>
                                                                    <div class="text-highlight mt-2 font-weight-500"><span class="text-info"><?php echo $row0["uname"]; ?></span></div> 
                                                                </div>
                                                                <div class="col-4">
                                                                    <small class="text-muted">Phone Number</small>
                                                                    <div class="mt-2 font-weight-500"><span class="text-info"><?php echo $row0["phone_no"]; ?></span></div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <small class="text-muted">Member Since</small>
                                                                    <div class="text-highlight mt-2 font-weight-500"><?php echo $row0["created_on"]; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex">
                                            <div class="card flex">
                                                <div class="card-body text-center">
                                                	<img src="../admin/images/<?php echo $row0["photo"]; ?>" alt="..." style="max-width: 166px;" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4 d-flex">
                                    <div class="card flex">
                                        <div class="card-body">

                                        	<!--- Calendar -->
                                            <div id="container" class="calendar-container"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <form class="" method="post" role="form" action="update-profile" enctype="multipart/form-data">

                                <!-- .modal -->
                                  <div id="modal" class="modal fade" data-backdrop="true">
                                      <div class="modal-dialog">
                                          <div class="modal-content bg-dark">
                                              
                                              <div class="modal-header">
                                                  <h5 class="modal-title">Complete Your Registration Now</h5>
                                                  <button class="close" data-dismiss="modal">&times;</button>
                                              </div>
                                              <div class="modal-body p-4">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6"><label class="text-muted">Gender</label>

                                                            <select name="gender"  class="custom-select">
                                                                <option selected disabled>Choose...</option>
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6"><label class="text-muted">Date of Birth</label><input name="dob" id="date-of-birth" type="date" class="form-control" placeholder="Date of Birth" /></div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6"><label class="text-muted">Nationality</label>
                                                            <select name="nationality" class="form-control">
                                                                <?php include('../inc/countries.php'); ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="text-muted">Phone Number</label>
                                                            <input type="text" name="phone_no" class="form-control" placeholder="Phone Number" />
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text">Profile Picture</span></div>
                                                        <div class="custom-file"><input type="file" class="custom-file-input" id="inputGroupFile01" name="photo" /><label class="custom-file-label" for="inputGroupFile01">Choose file</label></div>
                                                    </div>
                                                    <button type="submit" name="update" class="btn btn-primary">Update Now</button>

                                              </div>
                                          </div>
                                          <!-- /.modal-content -->
                                      </div>
                                  </div>
                                <!-- / .modal -->

                    </form>
                </div>
                <!-- ############ Main END-->
            </div>
            <!-- ############ Content END--><!-- ############ Footer START-->
            <?php include('inc/footer.php'); ?>
    </body>
    <!-- Mirrored from flatfull.com/themes/basik/html/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Mar 2020 23:12:02 GMT -->
</html>
