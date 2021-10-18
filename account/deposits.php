
<?php
    include('../inc/config.php');

    include '../admin/session.php';

    $page_name = 'Deposits';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = $settings->siteTitle.' provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';

    include('inc/head.php');

    $id = $_SESSION['user'];

    if(!isset($_SESSION['user'])){
        header('location: ../login.php');
    }

    $conn = $pdo->open();

    $deposit_madeQuery = $conn->query("SELECT * FROM request WHERE user_id=$id && type=1 order by 1 desc ");
    if ($deposit_madeQuery->rowCount()) {
       $deposit_made = $deposit_madeQuery->fetchAll(PDO::FETCH_OBJ);
    }

    $payment_methodQuery = $conn->query("SELECT * FROM payment_mode");
    if ($payment_methodQuery->rowCount()) {
       $payment_method = $payment_methodQuery->fetchAll(PDO::FETCH_OBJ);
    }

    $payment_completeQuery = $conn->query("SELECT * FROM payment_mode order by 1 asc Limit 1");
    if ($payment_completeQuery->rowCount()) {
       $payment_complete = $payment_completeQuery->fetchAll(PDO::FETCH_OBJ);
    }

    $depositHistory = "SELECT * FROM transaction WHERE user_id = $id && type = 1";

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
                                    <h4 class="page-title">Deposits</h4>
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
                                <h4 class="card-title">Deposit Requests</h4>
                              <p class="text-muted mb-0">To fund your account, click the <b>Make a Deposit</b> button below.
                                </p>
                                <a href="deposits-add-fund" style="width: 20%" type="button" class="btn btn-primary btn-square btn-outline-dashed waves-effect waves-light mt-3 mb-3">Make a Deposit</a>
                            </div><!--end card-header--> 
                            <div class="card-body">

                              
                              <div class="card">
                                <div class="card-body"> 
                                    <?php
                                          if(!empty($deposit_made)){ ?>

                                    <table class="table mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Request ID</th>
                                                <th>Date & Time (IST)</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                            <?php
                                            foreach ($deposit_made as $deposit_now) : ?>
                                              
                                            <tr>
                                                  <td>DIDTXCRT<?= $deposit_now->request_id; ?></td>
                                                  <td><?= $deposit_now->trans_date; ?></td>
                                                  <td>&#36; <?= number_format($deposit_now->amount, 2); ?></td>
                                                  <td><span class="badge badge-boxed  badge-outline-<?php if($deposit_now->status=='pending'){echo 'info';}elseif($deposit_now->status=='cancelled'){echo 'danger';}elseif($deposit_now->status=='approved'){echo 'success';} ?>"><?= $deposit_now->status; ?></span></td>
                                              </tr>

                                            <?php
                                            endforeach; ?>
                                          
                                          
                                        </tbody>
                                    </table><!--end /table-->

                                    <?php }else{
                                          echo "<p>No Request Made</p>";
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
                                <h4 class="card-title">Deposit History</h4>
                                <p class="text-muted mb-0">All your deposit in one place.
                                </p>
                            </div><!--end card-header--> 

                            <div class="card-body">

                              
                              <div class="card">
                                <div class="card-body"> 
                                    <?php
                                        $result = $conne->query($depositHistory);

                                        if ($result->num_rows > 0) {?>

                                    <table class="table mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Request ID</th>
                                                <th>Date & Time (IST)</th>
                                                <th>Amount</th>
                                                <th>Remark</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                            <?php
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {?>
                                              
                                            <tr>
                                                  <td>DIDTXCRT<?= $row['trans_id']; ?></td>
                                                  <td><?= $row['trans_date']; ?></td>
                                                  <td>&#36; <?= number_format($row['amount'], 2); ?></td>
                                                  <td><?= $row['remark']; ?></td>
                                              </tr>

                                            <?php } ?>
                                          
                                          
                                        </tbody>
                                    </table><!--end /table-->

                                    <?php }else{
                                          echo "<p>You have made no deposit</p>";
                                        } $conne->close();
                                    ?>
                                </div>
                              </div>
                                                                    
                            </div><!--end card-body-->
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