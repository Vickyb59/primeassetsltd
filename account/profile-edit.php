<?php
    include('../inc/config.php');
    include('../admin/includes/format.php');

    include '../admin/session.php';

    $page_name = 'Profile';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = $settings->siteTitle.' provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';

    include('inc/head.php');

    $id = $_SESSION['user'];

    if(!isset($_SESSION['user'])){
        header('location: ../login.php');
    }

    $sql0 = "SELECT * FROM users WHERE id=".$id;
    $result0 = $conne->query($sql0);
    $row0 = $result0->fetch_assoc();

    $referrals = $row0['uname'];

    $sql1 = "SELECT * FROM transaction WHERE user_id = $id ORDER BY trans_id DESC LIMIT 1";
    $result1 = $conne->query($sql1);
    $row1 = $result1->fetch_assoc();

    if ($row1["type"] == 1) {
        $transaction = $row1["amount"];
        $type = "credit";
    }
    else {
        $transaction = $row1["amount"];
        $type = "debit";
    }

    $time = strtotime($row1["trans_date"]);
    $sanitized_time = date("Y-m-d, g:i A", $time);

    

    $sql2 = "SELECT *, COUNT(*) AS numrows FROM users WHERE referral_code='$referrals' ";
    $result2 = $conne->query($sql2);
    $row2 = $result2->fetch_assoc();
    $no_of_referrals = $row2['numrows'];

?>

     <body class="dark-topbar">
    <!-- Left Sidenav -->
    <?php include('inc/sidebar.php'); ?>
    <!-- end left-sidenav-->
    

    <div class="page-wrapper">
        <!-- Top Bar Start -->
        <?php include('inc/header.php'); ?>
        <!-- Top Bar End -->

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col">
                                    <h4 class="page-title">Profile Completion</h4>
                                </div><!--end col-->
                                <div class="col-auto align-self-center">
                                    <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                        <span class="day-name" id="Day_Name">Today:</span>&nbsp;
                                        <span class="" id="Select_date">Jan 11</span>
                                        <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
                                    </a>
                                </div><!--end col-->  
                            </div><!--end row-->                                                              
                        </div><!--end page-title-box-->
                    </div><!--end col-->
                </div><!--end row-->
                <!-- end page title end breadcrumb -->

                <?php
                    if(isset($_SESSION['error'])){
                      echo "
                        <div class='alert alert-danger border-0' role='alert'>
                            <i class='la la-skull-crossbones alert-icon text-danger align-self-center font-30 mr-3'></i>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'><i class='mdi mdi-close align-middle font-16'></i></span>
                            </button>
                            <strong>Oh snap!</strong> ".$_SESSION['error']."
                        </div>
                      ";
                      unset($_SESSION['error']);
                    }
                    if(isset($_SESSION['success'])){
                      echo "
                        <div class='alert alert-success border-0' role='alert'>
                            <i class='mdi mdi-check-all alert-icon'></i>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'><i class='mdi mdi-close align-middle font-16'></i></span>
                            </button>
                            <strong>Well done!</strong> ".$_SESSION['success']."
                        </div>
                      ";
                      unset($_SESSION['success']);
                    }
                ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col">                      
                                                    <h4 class="card-title">Complete Your Registration Now</h4>                      
                                                </div><!--end col-->                                                       
                                            </div>  <!--end row-->                                  
                                        </div><!--end card-header-->
                                        <form method="post" action="profile-edit-action" enctype="multipart/form-data">
                                            <div class="card-body">                       
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 text-right mb-lg-0 align-self-center">Gender</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <select name="gender" class="form-control">
                                                            <option selected disabled>Choose...</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 text-right mb-lg-0 align-self-center">Date of Birth</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control" type="date" name="dob"  placeholder="DD-MM-YYYY">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 text-right mb-lg-0 align-self-center">Nationality</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-globe"></i></span></div>
                                                            <select name="nationality" class="form-control">
                                                                <?php include('../inc/countries.php'); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                    
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 text-right mb-lg-0 align-self-center">Contact Phone</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="las la-phone"></i></span></div>
                                                            <input type="text" name="phone_no" class="form-control" placeholder="Enter Phone Number" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 text-right mb-lg-0 align-self-center">Profile Picture</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="las la-file-upload"></i></span></div>
                                                            
                                                            <div class="custom-file">
                                                                <input type="file" name="photo" class="custom-file-input" id="customFile">
                                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                        <button type="submit" name="update" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>                                                    
                                            </div>   
                                        </form>
                                                                                 
                                    </div>
                                </div> <!--end col--> 
                                
                                                                      
                            </div><!--end row-->
                        </div>
                    </div>


            </div><!-- container -->

            <?php include('inc/footer.php'); ?><!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    
    <?php include('inc/scripts.php'); ?>

      
      
  </body>


<!-- Mirrored from mannatthemes.com/dastone/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Dec 2020 21:59:40 GMT -->
</html>