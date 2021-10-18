<?php
    include('../inc/config.php');

    include '../admin/session.php';

    $page_name = 'Deposits';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = 'Manage Investment provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';

    include('inc/head.php');

    $id = $_SESSION['user'];

    if(!isset($_SESSION['user'])){
        header('location: ../login.php');
    }

    $sql0 = "SELECT * FROM users WHERE id=".$id;
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

    

    $sql0 = "SELECT * FROM passbook".$id." WHERE credit <> 0";

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
                                <h2 class="text-md text-highlight">All Your Deposits in One Place</h2>
                            </div>
                        </div>
                    </div>

                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row row-sm sr">
                                <div class="col-md-12 col-lg-8">
                                    <div class="row row-sm">
                                        <div class="col-md-8">
                                            <div class="row row-sm">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row row-sm">
                                                                <div class="col-6">
                                                                    <small class="text-muted">Member Since</small>
                                                                    <div class="mt-2 font-weight-500"><span class="text-info"><?php echo $row0["created_on"] ?></span></div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <small class="text-muted">Wallet Balance</small>
                                                                    <div class="text-highlight mt-2 font-weight-500">&#36; <?php echo number_format($row1["balance"], 2) ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-sm">
                                                <div class="col-12 d-flex">
                                                    <div class="card flex">
                                                        <div class="card-body">
                                                            <small>Latest Transaction: </small>
                                                            <div class="text-highlight mt-2 font-weight-500"><span style="text-transform: capitalize;"><?php echo $type; ?></span> of &#36; <?php echo number_format($transaction, 2); ?> on <?php echo $sanitized_time; ?><br> Description: <?php echo $row1["remarks"]; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex">
                                            <div class="card flex">
                                                <div class="card-body text-center">
                                                    <img src="../admin/images/<?php echo $row0["photo"]; ?>" alt="..." style="max-width: 166px;" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="p-3-4">
                                                    <div class="d-flex mb-3">
                                                        <div>
                                                            <div>All Deposits</div>
                                                        </div>
                                                    </div>

                                                    <?php
                                                        $result = $conne->query($sql0);

                                                        if ($result->num_rows > 0) {?>
                                                            <table
                                                            id="transactions"
                                                            class="table table-theme v-middle"
                                                            data-plugin="bootstrapTable"
                                                            data-toolbar="#toolbar"
                                                            data-search="true"
                                                            data-search-align="left"
                                                            data-show-export="true"
                                                            data-show-columns="true"
                                                            data-detail-view="false"
                                                            data-mobile-responsive="true"
                                                            data-pagination="true"
                                                            data-page-list="[10, 25, 50, 100, ALL]">
                                                                <tr>
                                                                    <th>Trans. ID</th>
                                                                    <th>Date & Time (IST)</th>
                                                                    <th>Remarks</th>
                                                                    <th>Amount ($)</th>
                                                                </tr>
                                                    <?php
                                                        // output data of each row
                                                        while($row = $result->fetch_assoc()) {?>
                                                                <tr>
                                                                    <td><?php echo $row["trans_id"]; ?></td>
                                                                    <td>
                                                                        <?php
                                                                            $time = strtotime($row["trans_date"]);
                                                                            $sanitized_time = date("d/m/Y, g:i A", $time);
                                                                            echo $sanitized_time;
                                                                         ?>
                                                                    </td>
                                                                    <td><?php echo $row["remarks"]; ?></td>
                                                                    <td>&#36; <?php echo number_format($row["credit"], 2); ?></td>
                                                                </tr>
                                                        <?php } ?>
                                                        </table>
                                                        <?php
                                                        } else {  ?>
                                                            <p id="none"> You have made no deposit </p>
                                                        <?php }
                                                        $conne->close(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4 d-flex">
                                    <div class="card flex">
                                        <div class="card-body">

                                            <!--- Calendar -->
                                            <div id="container" class="calendar-container"></div>

                                        </div>
                                    </div>
                                </div>
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
