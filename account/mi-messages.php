<?php
    include('../inc/config.php');

    include '../admin/session.php';

    $page_name = 'Messages';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = 'Manage Investment provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';

    include('inc/head.php');

    $id = $_SESSION['user'];

    if(!isset($_SESSION['user'])){
        header('location: ../login.php');
    }

    $conn = $pdo->open();


    $stmtQuery = $conn->query("SELECT * FROM direct_message WHERE user_id=$id || user_id=0 && status<2 order by 1 desc");
    if ($stmtQuery->rowCount()) {
       $dmrow = $stmtQuery->fetchAll(PDO::FETCH_OBJ);
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
                                <h2 class="text-md text-highlight">All Your Messages in One Place</h2>
                            </div>
                        </div>
                    </div>


                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="table-responsive">


                                <table id="datatable" class="table table-theme table-row v-middle" data-plugin="dataTable">
                                    <thead>
                                        <tr>
                                            <th><span class="text-muted">Date Received</span></th>
                                            <th><span class="text-muted">Subject</span></th>
                                            <th><span class="text-muted">Sender</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                          foreach ($dmrow as $dm) : ?>


                                          <tr class="" data-id="16">
                                            <td class="flex">
                                                <a href="message.php?id=<?= $dm->msg_id; ?>&readmessage" class="item-title text-color"><?= $dm->date_sent; ?></a>
                                            </td>
                                            <td class="flex">
                                                <?php if ($dm->status==0) {
                                                    echo "<strong>";
                                                } ?>
                                                <a href="message.php?id=<?= $dm->msg_id; ?>&readmessage" class="item-title text-color"><?= $dm->subject; ?></a>

                                                <?php if ($dm->status==0) {
                                                    echo "</strong>";
                                                } ?>
                                            </td>
                                            <td class="flex">
                                                <a href="message.php?id=<?= $dm->msg_id; ?>&readmessage" class="item-title text-color">Admin</a>
                                            </td>
                                          </tr>


                                        <?php
                                          endforeach;
                                        ?>

                                    </tbody>
                                </table>
                                

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
