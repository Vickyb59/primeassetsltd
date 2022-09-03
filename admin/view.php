<?php
  include 'includes/session.php'; 
  include "../account/connect.php";

  $id = $_GET['i_id'];

  $sql0 = "SELECT * FROM users WHERE id=".$id;
  $result0 = $conne->query($sql0);
  $row0 = $result0->fetch_assoc();

  $sql1 = "SELECT * FROM transaction WHERE user_id = $id ORDER BY trans_id DESC LIMIT 1";
  $result1 = $conne->query($sql1);
  $row1 = $result1->fetch_assoc();


  $time = strtotime($row1["trans_date"]);
  $sanitized_time = date("Y-m-d, g:i A", $time);

  

  $sql0 = "SELECT * FROM transaction WHERE user_id = $id ORDER BY trans_id DESC";
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content">
      <div class="row">
         <div class="marbtm50 wdt-100">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
               <span class="portfolio-img-column image_hover">
               <img src="images/<?php echo $row0["photo"]; ?>" class="img-responsive zoom_img_effect" style="height: 24rem" alt="worker-image">
               </span>
            </div>


            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 project-desc">
               <ul class="profile_info list_none mb-4 pt-2 border-bottom">
                 <li>
                     <span class="title"><i class="fa fa-user"></i> Name:</span>
                     <p><?php echo $row0["full_name"] ?></p>
                 </li>
                 <li>
                     <span class="title"><i class="fa fa-envelope"></i> Username:</span>
                     <p> <?php echo $row0["uname"]; ?> </p>
                 </li>
                 <li>
                     <span class="title"><i class="fa fa-hourglass-end"></i> Email:</span>
                     <p> <?php echo $row0["email"]; ?> </p>
                 </li>
                 <li>
                     <span class="title"><i class="fa fa-flag"></i> Referral Code: </span>
                     <p> <?php echo $row0["uname"]; ?> </p>
                 </li>
                 <li>
                     <span class="title"><i class="fa fa-map-marker"></i> Wallet Balance:</span>
                     <p> &#36; <?php echo number_format($row1["balance"], 2) ?> </p>
                 </li>
             </ul>
            </div>
         </div>
         <div class="col-md-12 marbtm50 wdt-100">

            <section class="content-header">
              <h1>
                All Transactions
              </h1>
            </section>
            
            <div class="box-body">
              <?php
                  $result = $conne->query($sql0);

                  if ($result->num_rows > 0) {

                    ?>
                      <table id="example1" class="table table-bordered">
                      <thead>
                        <th>Trans. ID</th>
                        <th>Date & Time (IST)</th>
                        <th>Type</th>
                        <th>Remarks</th>
                        <th>Amount ($)</th>
                      </thead>
                      <tbody>
              <?php
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    if ($row["type"] == 1) {
                        $type = "credit";
                    }
                    else {
                        $type = "debit";
                    }?>
                          <tr>
                              <td><?php echo $row["trans_id"]; ?></td>
                              <td>
                                  <?php
                                      $time = strtotime($row["trans_date"]);
                                      $sanitized_time = date("d/m/Y, g:i A", $time);
                                      echo $sanitized_time;
                                   ?>
                              </td>
                              <td><?php echo $type; ?></td>
                              <td><?php echo $row["remark"]; ?></td>
                              <td>&#36; <?php echo number_format($row["amount"], 2); ?></td>
                          </tr>
                  <?php } ?>
                  </table>
                  <?php
                  } else {  ?>
                      <section class="content-header">
                        <h1>
                          No transaction info
                        </h1>
                      </section>
                  <?php }
                  $conne->close(); ?>
            </div>
         </div>
      </div>

    </section>
     
  </div>
    <?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
</body>
</html>