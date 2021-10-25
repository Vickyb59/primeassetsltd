
<?php
    include('../inc/config.php');

    include '../admin/session.php';

    $page_name = 'Referrals';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = $settings->siteTitle.' provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';

    include('inc/head.php');

    $id = $_SESSION['user'];

    if(!isset($_SESSION['user'])){
        header('location: ../login.php');
    }

    $conn = $pdo->open();

    $referral_linkQuery = $conn->prepare("SELECT * FROM users WHERE id=$id");
    $referral_linkQuery->execute();
    $referral_link = $referral_linkQuery->fetch();
    $referrals = $referral_link['uname'];

    $referral_madeQuery = $conn->query("SELECT * FROM users WHERE referral_code='$referrals' order by 1 asc");
    if ($referral_madeQuery->rowCount()) {
       $referral_made = $referral_madeQuery->fetchAll(PDO::FETCH_OBJ);
    }

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
                                    <h4 class="page-title">Withdrawals</h4>
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
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-header">
                                <h4 class="card-title">Meet Your Downlines</h4>
                                <p class="text-muted mb-0">All your referrals in one place.
                                </p>

                            </div><!--end card-header--> 
                            <div class="card-body">

                              
                              <div class="card">
                                <div class="card-body"> 
                                    <?php
                                          if(!empty($referral_made)){ ?>

                                    <table class="table mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Date Joined</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                            <?php
                                            foreach ($referral_made as $referral) : ?>
                                              
                                            <tr>
                                                  <td><?= $referral->full_name; ?></td>
                                                  <td><?= $referral->uname; ?></td>
                                                  <td><?= $referral->created_on; ?></td>         
                                              </tr>

                                            <?php
                                            endforeach; ?>
                                          
                                          
                                        </tbody>
                                    </table><!--end /table-->

                                    <?php }else{
                                          echo "<p>You have no downlines. Share your referral link to earn now</p>";
                                        } 
                                    ?>
                                </div>
                              </div>
                                                                    
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->

                </div><!--end row-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Your referral link.</h4>
                                <p class="text-muted mb-0">Your Referral Link is: https://<?php echo "$sweet_url"; ?>/register.php?referral=<?php echo "$referrals"; ?>
                                </p>
                            </div><!--end card-header-->
                    </div><!--end col-->

                </div><!--end row-->


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