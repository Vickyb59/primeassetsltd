<?php
    include('../inc/config.php');

    include '../admin/session.php';

    $page_name = 'Dashboard';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = 'Manage Investment provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';

    include('inc/head.php');

    $id = $_SESSION['user'];

    if(!isset($_SESSION['user'])){
        header('location: ../login.php');
    }

    $sql0 = "SELECT * FROM users WHERE id=$id";
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

    

    $sql0 = "SELECT * FROM passbook".$id."";

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
                                <h2 class="text-md text-highlight">Welcome,</h2>
                                <small class="text-muted">
                                    <strong><?php echo $row0["full_name"] ?> (<?php echo $row0["uname"]; ?>)<br>
                                </strong></small>
                            </div>
                        </div>
                    </div>

                    
                    <?php
                        if (empty($row0['nationality'])) {
                            echo '  
                                    <div class="page-hero page-container" id="page-hero">
                                        <div class="action-padding">
                                            <a href="profile" class="btn mb-1 btn-primary">Click Here to Complete Your Profile Setup</a>
                                        </div>
                                    </div>
                                 ';
                        }else{echo '';}

                    ?>
                             

                    <div style="height:560px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38;padding:1px;padding: 0px; margin: 0px; width: 100%;"><div style="height:540px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=chart&theme=dark&coin_id=859&pref_coin_id=1505" width="100%" height="536px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe></div><div style="color: #626B7F; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="https://coinlib.io" target="_blank" style="font-weight: 500; color: #626B7F; text-decoration:none; font-size:11px">Cryptocurrency Prices</a>&nbsp;by Coinlib</div></div>
                </div>
                <!-- ############ Main END-->
            </div>
            <!-- ############ Content END--><!-- ############ Footer START-->
            <?php include('inc/footer.php'); ?>
    </body>
    <!-- Mirrored from flatfull.com/themes/basik/html/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Mar 2020 23:12:02 GMT -->
</html>
