<?php
    include('inc/config.php');

    include 'admin/session.php';

    if(isset($_SESSION['user'])){
      header('location: account/dashboard.php');
   }

    $page_name = 'Account Activation';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = $settings->siteTitle.' provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';
    include('inc/head.php');

    $output = '';
    if(!isset($_GET['code']) OR !isset($_GET['user'])){
        $output .= '
            <h1 class="font-size-sl-72 font-weight-light mb-3">Error!</h1>
            <p class="text-gray-90 font-size-20 mb-0 font-weight-light">Code to activate account not found. Please <a href="register.php">Register</a></p>
        '; 
    }
    else{
        $conn = $pdo->open();

        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE activate_code=:code AND id=:id");
        $stmt->execute(['code'=>$_GET['code'], 'id'=>$_GET['user']]);
        $row = $stmt->fetch();

        if($row['numrows'] > 0){
            if($row['status']){
                $output .= '
                    <h1 class="font-size-sl-72 font-weight-light mb-3">Error!</h1>
                    <p class="text-gray-90 font-size-20 mb-0 font-weight-light">Account already activated. Please <a href="login.php">Login</a></p>
                ';
            }
            else{
                try{

                    $id = $_GET['user'];

                    $now = date('Y-m-d g:i A');

                    $sql4 = "INSERT INTO transaction VALUES(
                                NULL,
                                '$id',
                                '$now',
                                '1',
                                '5',
                                'Welcome Bonus',
                                '5'
                            )";

                            $conn->query($sql4);

                    $stmt = $conn->prepare("UPDATE users SET status=:status WHERE id=:id");
                    $stmt->execute(['status'=>1, 'id'=>$row['id']]);
                    $output .= '
                        <h1 class="font-size-sl-72 font-weight-light mb-3">Success!</h1>
                        <p class="text-gray-90 font-size-20 mb-0 font-weight-light">Account activated - Email: <b>'.$row['email'].'</b>. You may <a href="login.php">Login</a></p>
                    ';


                }
                catch(PDOException $e){
                    $output .= '
                        <h1 class="font-size-sl-72 font-weight-light mb-3">Error!</h1>
                        <p class="text-gray-90 font-size-20 mb-0 font-weight-light">'.$e->getMessage().' Please <a href="register.php">signup</a></p>
                    ';
                }

            }
            
        }
        else{
            $output .= '
                <h1 class="font-size-sl-72 font-weight-light mb-3">Error!</h1>
                <p class="text-gray-90 font-size-20 mb-0 font-weight-light">Cannot activate account. Wrong code. Please <a href="register.php">signup</a></p>
            ';
        }

        $pdo->close();
    }

?>

<body>
    <!--========== Preloader ==========-->
  <?php include('inc/pre-loader.php'); ?>
  <!--========== Preloader ==========-->

  <!-- scroll-to-top start -->
  <?php include('inc/scroll-to-top.php'); ?>  
  <!-- scroll-to-top end -->

  <!-- STAR ANIMATION -->
  <?php include('inc/star-animation.php'); ?>
  <!-- / STAR ANIMATION -->

  <div class="page-wrapper">
    <!-- header-section start  -->
    <?php include('inc/header.php'); ?>    
    <!-- header-section end  -->
    
    <!-- inner hero start -->
    <section class="inner-hero bg_img" data-background="assets/images/bg/bg-1.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="page-title">Account Activation</h2>
            <ul class="page-breadcrumb">
              <li><a href="<?= $baseurl ?>">Home</a></li>
              <li>Account Activation</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->

    <!-- contact section start -->
    <section class="pt-50 pb-120">
      <div class="container pt-120">
        <div class="row justify-content-center">
          <div class="col-lg-10 mb-50">
            <h2 class="font-weight-bold"><?php echo $output; ?></h2>
          </div>
        </div>
      </div>
    </section>
    <!-- contact section end -->
    
    <!-- footer section start -->
    <?php include('inc/footer.php') ?>
    <!-- footer section end -->
  </div> <!-- page-wrapper end -->
  <?php include('inc/scripts.php') ?>
  </body>

<!-- Mirrored from template.viserlab.com/hyiplab/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Oct 2021 16:37:40 GMT -->
</html>