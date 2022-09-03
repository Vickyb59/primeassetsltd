<?php
    include('../inc/config.php');

    include '../admin/session.php';

    $page_name = 'Investments';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = 'Manage Investment provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';

    include('inc/head.php');

    $id = $_SESSION['user'];

    if(!isset($_SESSION['user'])){
        header('location: ../login.php');
    }

    $conn = $pdo->open();

    $investment_planQuery = $conn->query("SELECT * from investment_plans order by 1 asc");
    if ($investment_planQuery->rowCount()) {
       $investment_plans = $investment_planQuery->fetchAll(PDO::FETCH_OBJ);
    }

    $new_investment_planQuery = $conn->query("SELECT *, investment.status AS invest_status FROM investment LEFT JOIN investment_plans ON investment_plans.id=investment.invest_plan_id LEFT JOIN users ON users.id=investment.user_id WHERE user_id=$id order by 1 desc");
    if ($new_investment_planQuery->rowCount()) {
       $new_investment_plans = $new_investment_planQuery->fetchAll(PDO::FETCH_OBJ);
    }

    $now = date('Y-m-d H:i:s');

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
                                    <h4 class="page-title">Investments</h4>
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
                                <h4 class="card-title">Plans and Investments</h4>
                                <p class="text-muted mb-0">All your investments in one place.
                                </p>
                            </div><!--end card-header--> 
                            <div class="card-body">
                              <?php
                                if(!empty($deposit_made)){ 
                                  
                                foreach ($new_investment_plans as $investment_plan) : 
                                $date_ivstart = strtotime($investment_plan->start_date);
                                $date_ivend = strtotime($investment_plan->end_date);
                                $date_now = strtotime($now);

                                $invest_id = $investment_plan->invest_id;

                                $secs = $date_ivend - $date_now;// == <seconds between the two times>
                                if ($secs < 0) {
                                  $time_left = "Elapsed";
                                }elseif ($secs < 3600) {
                                  $time_left = "Some Minutes Left";
                                }elseif ($secs <= 216000) {
                                  $time_left = round($secs / 3600, 0) ." Hours Left";
                                }else{
                                  $time_left = round($secs / 86400, 0) ." Days Left";
                                }
                                

                                if ($investment_plan->status == 'completed') {
                                  $percent = 100;
                                }else{ $percent = round(($date_now - $date_ivstart)*100/($date_ivend - $date_ivstart), 0);

                                  if ($date_now >= $date_ivend) {
                                    $stmt = $conn->prepare("UPDATE investment SET status=:c_status WHERE invest_id=:c_id");
                                    $stmt->execute(['c_status'=>'completed', 'c_id'=>$invest_id ]);
                                  }

                                }

                                if ($percent > 100) {
                                  $percent = 100;
                                }


                              ?>
                              <div class="card">
                                <div class="card-body"> 
                                  <div class="task-box">
                                    <div class="task-priority-icon"><i class="fas fa-circle text-<?php if($investment_plan->invest_status=='in progress'){echo 'info';}elseif($investment_plan->invest_status=='cancelled'){echo 'danger';}elseif($investment_plan->invest_status=='completed'){echo 'success';} ?>"></i></div>
                                    <p class="text-muted float-right">
                                        <span class="badge badge-<?php if($investment_plan->invest_status=='in progress'){echo 'info';}elseif($investment_plan->invest_status=='cancelled'){echo 'danger';}elseif($investment_plan->invest_status=='completed'){echo 'success';} ?> mr-2"><?php echo $investment_plan->invest_status; ?></span>
                                        <span class="mx-1">·</span> 
                                        <span><i class="far fa-fw fa-clock"></i> <?php if ($investment_plan->invest_status == 'in progress') {
                                          echo $time_left;
                                        }else{ echo "Elapsed";}  ?></span>
                                    </p>
                                    <h5 class="mt-0"><?= $investment_plan->name; ?></h5>
                                    <table class="table mb-0">
                                        <thead class="thead-light">
                                          <tr>
                                              <th>Plan</th>
                                              <th>Capital</th>
                                              <th>ROI</th>
                                              <th>Start Date</th>
                                              <th>End Date</th>
                                              <th>Status</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          

                                              <tr>
                                                  <td><?= $investment_plan->name; ?></td>
                                                  <td>&#36; <?= number_format($investment_plan->capital, 2); ?></td>
                                                  <td>&#36; <?= number_format($investment_plan->returns, 2); ?></td>
                                                  <td><?= $investment_plan->start_date; ?></td>
                                                  <td><?= $investment_plan->end_date; ?></td>
                                                  <td><span class="badge badge-boxed  badge-outline-<?php if($investment_plan->invest_status=='in progress'){echo 'info';}elseif($investment_plan->invest_status=='cancelled'){echo 'danger';}elseif($investment_plan->invest_status=='completed'){echo 'success';} ?>"><?php echo $investment_plan->invest_status; ?></span></td>
                                              </tr>
                                          
                                          
                                        </tbody>
                                    </table><!--end /table-->
                                    <p class="text-muted text-right mb-1"><?php if ($investment_plan->invest_status == 'in progress') {
                                          echo $percent."% Complete";
                                        }elseif ($investment_plan->invest_status == 'completed') {
                                          echo "Completed";
                                        }else{ echo "On Hold";}  ?></p>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-<?php if($investment_plan->invest_status=='in progress'){echo 'info progress-bar-animated';}elseif($investment_plan->invest_status=='cancelled'){echo 'danger';}elseif($investment_plan->invest_status=='completed'){echo 'success';} ?> progress-bar-striped" role="progressbar" style="width: <?= $percent; ?>%; " aria-valuenow="<?= $percent; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                  </div><!--end task-box-->
                                </div>
                              </div>
                              <?php
                                endforeach;
                              
                              }else{
                                    echo "<p>No Transaction Made</p>";
                                  } 
                              ?>

                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->

                </div><!--end row-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Plans</h4>
                                <p class="text-muted mb-0">Select from the plans below to invest now.
                                </p>
                            </div><!--end card-header--> 
                            <div class="row mt-3">

                                <?php
                                    foreach ($investment_plans as $investment_plan) : 
                                      if ($investment_plan->max_invest >= 100000000) {
                                        $max_invest = "Unlimited";
                                      }else{
                                        $max_invest = "&#36;". number_format($investment_plan->max_invest, 0);

                                      }

                                      if ($investment_plan->min_invest >= 1000 && $investment_plan->min_invest < 10000) {
                                        $span = '<span class="badge badge-pink a-animate-blink mt-0">POPULAR</span>';
                                      }else{
                                        $span = '';
                                      }

                                      ?>

                                      <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <?= $span; ?>
                                                <div class="pricingTable1 text-center">
                                                    <h6 class="title1 pt-3 pb-2 m-0"><?= $investment_plan->name; ?></h6>
                                                    
                                                    <div class="p-3">
                                                        <h3 class="amount amount-border d-inline-block"><?= $investment_plan->rate; ?>%</h3>
                                                    </div>
                                                   <hr class="hr-dashed">
                                                   <h6 class="amount pt-3 pb-2" style="font-size: 16px; color: #563d07; font-weight: 500">Duration: <?= $investment_plan->duration; ?> days</h6>
                                                    <h6 class="amount pt-3 pb-2" style="font-size: 16px">From &#36;<?= number_format($investment_plan->min_invest, 0); ?> to <?= $max_invest; ?></h6>
                                                        
                                                    <a data-toggle="modal" data-target="#modal" class="btn btn-dark py-2 px-5 font-16"><span>Invest</span></a>
                                                </div><!--end pricingTable-->
                                            </div><!--end card-body-->
                                        </div> <!--end card-->                                   
                                      </div><!--end col-->


                                <?php
                                   endforeach; ?>


                                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalDark1" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-dark">
                                                <h6 class="modal-title m-0 text-white" id="exampleModalDark1">Investment Form</h6>
                                                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="la la-times text-white"></i></span>
                                                </button>
                                            </div><!--end modal-header-->
                                            <div class="modal-body">
                                                <form class="" method="post" role="form" action="invest-now">
                                                      <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Investment Plan</label>
                                                        <div class="col-sm-8">
                                                            <select name="plan_id" class="form-control" required>
                                                              <option selected disabled>Choose Investment Plan</option>

                                                              <?php
                                                                foreach ($investment_plans as $investment_plan) : ?>

                                                                <option value="<?= $investment_plan->id; ?>"><?= $investment_plan->name; ?></option>

                                                              <?php
                                                                 endforeach; ?>

                                                            </select>
                                                        </div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Principal Investment</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                            <input type="number" name="invest_amount" class="form-control" placeholder="Amount to Invest" aria-label="Amount (to the nearest dollar)" />
                                                            <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                                        </div>
                                                      </div>
                                                      
                                                                                                      
                                            </div><!--end modal-body-->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                <button type="submit" name="invest" class="btn btn-dark btn-sm">Invest</button>
                                              </form> 
                                            </div><!--end modal-footer-->
                                        </div><!--end modal-content-->
                                    </div><!--end modal-dialog-->
                                </div><!--end modal-->


                            </div><!--end row-->
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