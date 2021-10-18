
<?php
    include('../inc/config.php');

    include '../admin/session.php';

    $page_name = 'Withdrawals';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = $settings->siteTitle.' provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';

    include('inc/head.php');

    

    $id = $_SESSION['user'];

    if(!isset($_SESSION['user'])){
        header('location: ../login.php');
    }

    if (isset($_POST['removeFund'])) {
        $withdrawal_amount = $_POST['withdrawal_amount'];
    }else{
        header("location: withdrawals.php");
    }

    $conn = $pdo->open();

    $withdrawal_madeQuery = $conn->query("SELECT * FROM request WHERE user_id=$id && type=2 order by 1 desc ");
    if ($withdrawal_madeQuery->rowCount()) {
       $withdrawal_made = $withdrawal_madeQuery->fetchAll(PDO::FETCH_OBJ);
    }

    $payment_methodQuery = $conn->query("SELECT * FROM payment_mode");
    if ($payment_methodQuery->rowCount()) {
       $payment_method = $payment_methodQuery->fetchAll(PDO::FETCH_OBJ);
    }

    $payment_completeQuery = $conn->query("SELECT * FROM payment_mode order by 1 asc Limit 1");
    if ($payment_completeQuery->rowCount()) {
       $payment_complete = $payment_completeQuery->fetchAll(PDO::FETCH_OBJ);
    }

    $withdrawalHistory = "SELECT * FROM transaction WHERE user_id = $id && type = 2";

?>

  <body>
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
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="card">

                            <div class="card-header">
                                <h4 class="card-title">Choose Payment Option</h4>
                                <p class="text-muted mb-0">Desired Payment Option </p>
                                
                            </div><!--end card-header--> 
                            <div class="card-body">

                              
                              <div class="card">
                                <div class="card-body"> 
                                    <form class="form-horizontal auth-form" method="post" action="withdrawals-complete-request">
                                        <input type="number" name="withdrawal_amount" value="<?php echo $withdrawal_amount; ?>" hidden>
                
                                        <div class="form-group mb-2">
                                            <label>Choose your desired payment option.</label>
                                                                      
                                        </div><!--end form-group--> 
                
                                        <div class="form-group mb-2">
                                            <div class="col-md-12">
                                                <select name="payment_mode" class="form-control">
                                                  <option selected disabled>Choose Mode of Payment</option>

                                                  <?php
                                                    foreach ($payment_method as $payment) : ?>

                                                    <option value="<?= $payment->name; ?>"><?= $payment->name; ?></option>

                                                  <?php
                                                     endforeach; ?>

                                                </select>
                                            </div>
                                                                      
                                        </div><!--end form-group-->                
                                                            
                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit" name="withdrawNow">Withdraw Now <i class="fas fa-money-bill ml-1"></i></button>
                                            </div><!--end col--> 
                                        </div> <!--end form-group-->                           
                                    </form><!--end form-->
                                </div>
                              </div>
                                                                    
                            </div><!--end card-body-->
                        </div><!--end card-->
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