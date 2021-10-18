<?php
    include('../inc/config.php');

    include '../admin/session.php';

    $m_id = $_REQUEST['id'];

    $page_name = 'Message';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = 'Manage Investment provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';

    include('inc/head.php');

    $id = $_SESSION['user'];

    if(!isset($_SESSION['user'])){
        header('location: ../login.php');
    }

    $conn = $pdo->open();

    $stmtQuery = $conn->query("SELECT * FROM direct_message WHERE msg_id = $m_id LIMIT 1");
    if ($stmtQuery->rowCount()) {
       $msgs = $stmtQuery->fetchAll(PDO::FETCH_OBJ);
    }

    $mquery = $conn->prepare("UPDATE direct_message SET status=:m_status WHERE msg_id=$m_id");
    $mquery->execute(['m_status'=>1]);


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


                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <?php
                               foreach ($msgs as $msg) : ?>


                                <div class="d-flex flex" id="content-body">
                                    <div class="d-flex flex-column flex" data-plugin="mail">
                                        <div class="navbar">
                                            <div class="d-none d-md-flex align-items-center">
                                                <span class="avatar w-32"><img class="circle w-32" src="../admin/dist/img/favicon.png" alt="." /></span>
                                                <span class="mx-2"><span class="text-muted">from </span>Admin <span class="text-xs text-muted">on <?= $msg->date_sent; ?></span></span>
                                            </div>
                                        </div>
                                        <div class="scroll-y mx-3 mb-3 card">
                                            <div class="p-3 px-md-5 py-md-4">
                                                <h2 class="mb-3 text-highlight"><?= $msg->subject; ?></h2>
                                                <div class="text-sm l-h-2x">
                                                    <p><?= $msg->message; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <?php
                               endforeach; ?>
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
