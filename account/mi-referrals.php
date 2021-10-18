<?php
    include('../inc/config.php');

    include '../admin/session.php';

    $page_name = 'Referrals';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = 'Manage Investment provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';

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
                            <div class='alert alert-danger alert-dismissible'>
                              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                              <h4><i data-feather='alert-circle' width='32' height='32'></i> Error!</h4>
                              ".$_SESSION['error']."
                            </div>
                          ";
                          unset($_SESSION['error']);
                        }
                        if(isset($_SESSION['success'])){
                          echo "
                            <div class='alert alert-success alert-dismissible'>
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
                                <h2 class="text-md text-highlight">Your Referrals</h2>
                            </div>
                        </div>
                    </div>

                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="table-responsive">

                                        <?php
                                          if(!empty($referral_made)){ ?>
                                            <table id="datatable" class="table table-theme table-row v-middle" data-plugin="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th><span class="text-muted">Name</span></th>
                                                        <th><span class="text-muted">Username</span></th>
                                                        <th><span class="text-muted">Date Joined</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                            <?php
                                            foreach ($referral_made as $referral) : ?>


                                            <tr class="" data-id="16">
                                              <td class="flex">
                                                  <a href="#" class="item-title text-color"><?= $referral->full_name; ?></a>
                                              </td>
                                              <td class="flex">
                                                  <a href="#" class="item-title text-color"><?= $referral->uname; ?></a>
                                              </td>
                                              <td class="flex">
                                                  <a href="#" class="item-title text-color"><?= $referral->created_on; ?></a>
                                              </td>
                                            </tr>


                                          <?php
                                            endforeach;} 

                                          else{
                                          echo "<p>No Referrals Yet</p>";
                                        } ?>




                                        
                                    </tbody>
                                </table>
                                <p>Your Referral Link is: www.manage-investment.com/register.php?referral=<?php echo "$referrals"; ?></p>
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
