<?php
    include('../inc/config.php');
    include('../admin/includes/format.php');

    include '../admin/session.php';

    $page_name = 'Inbox';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = $settings->siteTitle.' provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';

    include('inc/head.php');

    $id = $_SESSION['user'];

    if(!isset($_SESSION['user'])){
        header('location: ../login.php');
    }

    $stmtQuery = $conn->query("SELECT * FROM direct_message WHERE user_id=$id || user_id=0 && status<2 order by 1 desc");
    if ($stmtQuery->rowCount()) {
       $dmrow = $stmtQuery->fetchAll(PDO::FETCH_OBJ);
    }

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
                                    <h4 class="page-title">Inbox</h4>
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
                    <div class="col-12">
                        <div class="card">                              
                            <div class="card-body">
                                <ul class="message-list">
                                        <?php
                                          if(!empty($dmrow)){ ?>

                                        <?php
                                            foreach ($dmrow as $dm) : ?>

                                            <li>                                           
                                                <div class="col-mail col-mail-1">
                                                    <a href="message.php?id=<?= $dm->msg_id; ?>&readmessage">
                                                        <p class="title">Admin</p><span class="star-toggle fas fa-external-link-alt"></span>
                                                    </a>                                                     
                                                </div>
                                                <div class="col-mail col-mail-2">
                                                    <?php if ($dm->status==0) {
                                                        echo "<strong>";
                                                    } ?>
                                                    <a href="message.php?id=<?= $dm->msg_id; ?>&readmessage" class="subject"><?= $dm->subject; ?> &nbsp;–&nbsp; <span class="teaser"><?= $dm->message; ?></span>
                                                    </a>

                                                    <?php if ($dm->status==0) {
                                                        echo "</strong>";
                                                    } ?>
                                                    
                                                    <div class="date"><?= $dm->date_sent; ?></div>
                                                </div>                                           
                                            </li>


                                        <?php
                                          endforeach;
                                        ?>

                                        <?php }else{
                                              echo "<p>You have no message.</p>";
                                            } 
                                        ?>
                                        
                                    </ul>
                            </div><!--end card-body-->          
                        </div> <!--end card-->    
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