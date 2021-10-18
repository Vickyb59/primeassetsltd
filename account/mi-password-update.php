<?php
    include('../inc/config.php');
    include('../admin/session.php');

    $page_name = 'Password Update';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = 'Manage Investment provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';

    include('inc/head.php');

    $id = $_SESSION['user'];

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
                                <h2 class="text-md text-highlight">Change Account Password</h2>
                            </div>
                        </div>
                    </div>
                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row row-sm sr">
                                <div class="col-md-12 col-lg-8">
                                    <div class="row row-sm">                                                

                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form action="pass_change_action.php" method="post">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12"><label class="text-muted">Enter Old Password</label><input type="text" name="old_pwd" class="form-control" placeholder="Enter Old Password" /></div>
                                                            <div class="form-group col-md-12"><label class="text-muted">Enter New Password</label><input type="text" name="new_pwd" class="form-control" placeholder="Enter New Password" /></div>
                                                            <div class="form-group col-md-12"><label class="text-muted">Enter New Password Again</label><input type="text" name="check_pwd" class="form-control" placeholder="Enter New Password Again" /></div>
                                                        </div>
                                                        <button type="submit" name="password_update" class="btn btn-primary">Submit</button>
                                                    </form>
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
                </div>
                <!-- ############ Main END-->
            </div>
            <!-- ############ Content END--><!-- ############ Footer START-->
            <?php include('inc/footer.php'); ?>
    </body>
    <!-- Mirrored from flatfull.com/themes/basik/html/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Mar 2020 23:12:02 GMT -->
</html>
