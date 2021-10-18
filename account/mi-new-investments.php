<?php
<?php
    include('../inc/config.php');

    include '../admin/session.php';

    $page_name = 'Current Investments';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = 'Manage Investment provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';

    include('inc/head.php');

    $id = $_SESSION['user'];

    if(!isset($_SESSION['user'])){
        header('location: ../login.php');
    }

    $conn = $pdo->open();

    $new_investment_planQuery = $conn->query("SELECT *, investment.status AS invest_status FROM investment LEFT JOIN investment_plans ON investment_plans.id=investment.invest_plan_id LEFT JOIN users ON users.id=investment.user_id WHERE user_id=$id order by 1 desc");
    if ($new_investment_planQuery->rowCount()) {
       $new_investment_plans = $new_investment_planQuery->fetchAll(PDO::FETCH_OBJ);
    }

    $now = date('Y-m-d');

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
                                <h2 class="text-md text-highlight">Ongoing Investments</h2>
                            </div>
                        </div>
                    </div>

                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="table-responsive">
                              <?php
                                if(!empty($new_investment_plans)){ ?>

                                <table id="datatable" class="table table-theme table-row v-middle" data-plugin="dataTable">
                                    <thead>
                                        <tr>
                                            <th><span class="text-muted">Plan</span></th>
                                            <th><span class="text-muted">Capital Investment</span></th>
                                            <th><span class="text-muted">Amount Yield</span></th>
                                            <th><span class="text-muted">Compound Interest</span></th>
                                            <th><span class="text-muted">Start Date</span></th>
                                            <th><span class="text-muted">End Date</span></th>
                                            <th><span class="text-muted">Status</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                          foreach ($new_investment_plans as $investment_plan) : ?>


                                          <tr class="" data-id="16">
                                            <td class="flex">
                                                <a href="#" class="item-title text-color"><?= $investment_plan->name; ?></a>
                                            </td>
                                            <td class="flex">
                                                <a href="#" class="item-title text-color">&#36; <?= number_format($investment_plan->capital, 2); ?></a>
                                            </td>
                                            <td class="flex">
                                                <a href="#" class="item-title text-color">&#36; <?= number_format($investment_plan->returns, 2); ?></a>
                                            </td>
                                            <td class="flex">
                                                <a href="#" class="item-title text-color">&#36; <?= number_format($investment_plan->current, 2); ?></a>
                                            </td>
                                            <td class="flex">
                                                <a href="#" class="item-title text-color"><?= $investment_plan->start_date; ?></a>
                                            </td>
                                            <td class="flex">
                                                <a href="#" class="item-title text-color"><?= $investment_plan->end_date; ?></a>
                                            </td>
                                            <td class="flex">
                                                <a style="color: #fff;" href="#" class="item-title text-color badge badge-<?php if($investment_plan->invest_status=='in progress'){echo 'info';}elseif($investment_plan->invest_status=='cancelled'){echo 'danger';}elseif($investment_plan->invest_status=='completed'){echo 'success';} ?>"><?php echo $investment_plan->invest_status; ?></a>
                                            </td>
                                          </tr>


                                        <?php
                                          endforeach;
                                        ?>

                                    </tbody>
                                </table>
                                <?php 
                                  }else{
                                  echo "<p>No Investments Yet</p>";
                                  }

                                ?>

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
