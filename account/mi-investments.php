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
                    <div class="page-hero page-container" id="page-hero">
                        <div class="padding d-flex">
                            <div class="page-title">
                                <h2 class="text-md text-highlight">Available Investment Plans</h2>
                            </div>
                        </div>
                    </div>

                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="d-flex flex-wrap mb-4">

                                <?php
                                    foreach ($investment_plans as $investment_plan) : ?>



                                    <div class="dropdown mb-3 mx-3">
                                        <ul class="dropdown-menu pos-stc d-inline text-center" role="menu">
                                            <li class="dropdown-header invest-header"><?= $investment_plan->name; ?></li>
                                            <li class="dropdown-item below-header"><a href="#"><small>Duration: <?= $investment_plan->duration; ?> days</small></a></li>
                                            <li class="dropdown-divider"></li>
                                            <li class="dropdown-item invest-rate"><a href="#"><?= $investment_plan->rate; ?>%</a></li>
                                            <li class="dropdown-divider"></li>
                                            <li class="dropdown-item"><a href="#">Minimum Investment: &#36;<?= number_format($investment_plan->min_invest, 0); ?></a></li>
                                            <li class="dropdown-item"><a href="#">Maximum Investment: &#36;<?= number_format($investment_plan->max_invest, 0); ?></a></li>
                                            <li class="dropdown-item invest-last-item">
                                                <a data-toggle="modal" data-target="#modal" class="invest-btn">Invest Now</a>
                                            </li>
                                        </ul>
                                    </div>

                                <?php
                                   endforeach; ?>



                                  <!-- .modal -->
                                  <div id="modal" class="modal fade" data-backdrop="true">
                                      <div class="modal-dialog">
                                          <div class="modal-content bg-dark">
                                              
                                              <div class="modal-header">
                                                  <h5 class="modal-title">Investment Form</h5>
                                                  <button class="close" data-dismiss="modal">&times;</button>
                                              </div>
                                              <div class="modal-body p-4">
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
                                                      <button type="submit" name="invest" class="btn btn-primary mb-4">Invest</button>
                                                  </form>
                                              </div>
                                          </div>
                                          <!-- /.modal-content -->
                                      </div>
                                  </div>
                                    <!-- / .modal -->

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
