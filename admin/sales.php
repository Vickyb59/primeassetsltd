<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Approved Deposit(Sales)
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sales</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Username</th>
                  <th>Date</th>
                  <th>Amount</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT *, users.uname AS username, request.request_id AS id, users.id AS user_id FROM request LEFT JOIN users ON users.id=request.user_id WHERE request.type=1 AND request.status='approved' ORDER BY request_id DESC");
                      $stmt->execute();

                      $total = 0;

                      foreach($stmt as $row){
                        $amount = $row['amount'];
                        $total += $amount;
                        
                        echo "
                          <tr>
                            <td class='hidden'></td>
                            <td>".$row['username']."</td>
                            <td>".$row['trans_date']."</td>
                            <td>&#36; ".number_format($row['amount'], 2)."</td>
                          </tr>
                        ";
                      }

                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td><b>Total</b></td>
                          <td></td>
                          <td><b>&#36; ".number_format($total, 2)."</b></td>
                        </tr>
                      ";
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </section>
     
  </div>
    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/request_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.fund', function(e){
    e.preventDefault();
    $('#fund').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.msg', function(e){
    e.preventDefault();
    $('#msg').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.status', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'request_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.reqid').val(response.request_id);
      $('#edit_status').val(response.status);
    }
  });
}
</script>
</body>
</html>
