<?php
    include('../inc/config.php');

    include '../admin/session.php';

    $page_name = 'Withdrawal Request';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = 'Manage Investment provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';

    include('inc/head.php');

    $id = $_SESSION['user'];

    if(!isset($_SESSION['user'])){
        header('location: ../login.php');
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


    function substrwords($text, $maxchar, $end='...') {
       if (strlen($text) > $maxchar || $text == '') {
           $words = preg_split('/\s/', $text);      
           $output = '';
           $i      = 0;
           while (1) {
               $length = strlen($output)+strlen($words[$i]);
               if ($length > $maxchar) {
                   break;
               } 
               else {
                   $output .= " " . $words[$i];
                   ++$i;
               }
           }
           $output .= $end;
       } 
       else {
           $output = $text;
       }
       return $output;
    }

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
                            <div class='alert bg-success'>
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
                                <h2 class="text-md text-highlight">Your Withdrawal Requests</h2>
                            </div>
                        </div>
                    </div>

                    <div class="page-hero page-container" id="page-hero">
                        <div class="action-padding">
                            <button data-toggle="modal" data-target="#modal1" class="btn mb-1 btn-primary">Withdraw Fund</button>
                        </div>
                    </div>

                    <div class="page-content page-container" id="page-content">
                        
                        <div class="padding">
                            <div class="table-responsive">

                                        <?php
                                          if(!empty($withdrawal_made)){ ?>
                                            <table id="datatable" class="table table-theme table-row v-middle" data-plugin="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th><span class="text-muted">Request ID</span></th>
                                                        <th><span class="text-muted">Date & Time (IST)</span></th>
                                                        <th><span class="text-muted">Amount</span></th>
                                                        <th><span class="text-muted">Status</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                            <?php
                                            foreach ($withdrawal_made as $withdraw_now) : ?>


                                            <tr class="" data-id="16">
                                              <td class="flex">
                                                  <a href="#" class="item-title text-color">MNIVSMNT<?= $withdraw_now->request_id; ?></a>
                                              </td>
                                              <td class="flex">
                                                  <a href="#" class="item-title text-color"><?= $withdraw_now->trans_date; ?></a>
                                              </td>
                                              <td class="flex">
                                                  <a href="#" class="item-title text-color">&#36; <?= number_format($withdraw_now->amount, 2); ?></a>
                                              </td>
                                              <td class="flex">
                                                  <a style="color: #fff;" href="#" class="item-title text-color badge badge-<?php if($withdraw_now->status=='pending'){echo 'info';}elseif($withdraw_now->status=='cancelled'){echo 'danger';}elseif($withdraw_now->status=='approved'){echo 'success';} ?>"><?= $withdraw_now->status; ?></a>
                                              </td>
                                            </tr>


                                          <?php
                                            endforeach;} 

                                          else{
                                          echo "<p>No Request Made</p>";
                                        } ?>




                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <form class="" method="post" role="form" action="withdraw-now">

                                <!-- .modal1 -->
                                  <div id="modal1" class="modal fade" data-backdrop="true">
                                      <div class="modal-dialog">
                                          <div class="modal-content bg-dark">
                                              
                                              <div class="modal-header">
                                                  <h5 class="modal-title">Withdraw Fund From Account</h5>
                                                  <button class="close" data-dismiss="modal">&times;</button>
                                              </div>
                                              <div class="modal-body p-4">
                                                      <div class="form-group">
                                                        <label>Withdrawal Limit: ($100 - $1,000,000)</label>
                                                      </div>
                                                      <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                            <input type="number" name="withdraw_amount" class="form-control" placeholder="Amount to Withdraw" aria-label="Amount (to the nearest dollar)" />
                                                            <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                                        </div>
                                                      </div>
                                                      <a data-toggle="modal" data-target="#modal2" class="btn btn-primary mb-4">Withdraw Now</a>
                                              </div>
                                          </div>
                                          <!-- /.modal-content -->
                                      </div>
                                  </div>
                                <!-- / .modal -->

                                <!-- .modal2 -->
                                  <div id="modal2" class="modal fade" data-backdrop="true">
                                      <div class="modal-dialog">
                                          <div class="modal-content bg-dark">
                                              
                                              <div class="modal-header">
                                                  <h5 class="modal-title">Choose Payment Option </h5>
                                                  <button class="close" data-dismiss="modal">&times;</button>
                                              </div>
                                              <div class="modal-body p-4">
                                                <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label">Mode of Payment</label>
                                                  <div class="col-sm-8">
                                                      <select name="payment_mode" class="form-control">
                                                        <option selected disabled>Choose Payment Method</option>

                                                        <?php
                                                          foreach ($payment_method as $payment) : ?>

                                                          <option value="<?= $payment->name; ?>"><?= $payment->name; ?></option>

                                                        <?php
                                                           endforeach; ?>

                                                      </select>
                                                  </div>
                                                </div>
                                                <a data-toggle="modal" data-target="#modal3" class="btn btn-primary mb-4">Withdraw Now</a>
                                              </div>
                                          </div>
                                          <!-- /.modal-content -->
                                      </div>
                                  </div>
                                <!-- / .modal2 -->

                                <!-- .modal3 -->
                                  <div id="modal3" class="modal fade" data-backdrop="true">
                                      <div class="modal-dialog">
                                          <div class="modal-content bg-dark">
                                              
                                              <div class="modal-header">
                                                  <h5 class="modal-title">Complete Your Request </h5>
                                                  <button class="close" data-dismiss="modal">&times;</button>
                                              </div>
                                              <div class="modal-body p-4">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Enter Payment Method Info</label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" placeholder="This could be a wallet address, bank account info...." /></div>
                                                </div>
                                                <button type="submit" name="complete" data-toggle="modal" data-target="#modal3" class="btn btn-primary mb-4">Complete Request</button>
                                              </div>
                                          </div>
                                          <!-- /.modal-content -->
                                      </div>
                                  </div>
                                <!-- / .modal3 -->
                    </form>
                    
                </div>
                <!-- ############ Main END-->
            </div>
            <!-- ############ Content END--><!-- ############ Footer START-->
            <?php include('inc/footer.php'); ?>
    </body>
    <!-- Mirrored from flatfull.com/themes/basik/html/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Mar 2020 23:12:02 GMT -->
</html>
