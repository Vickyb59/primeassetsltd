<?php
    include('inc/config.php');

    include 'admin/session.php';

    if(isset($_SESSION['user'])){
      header('location: account/dashboard.php');
   }

    $page_name = 'Register';
    $page_parent = 'Account';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = $settings->siteTitle.' provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';
    include('inc/head.php');

    if (isset($_GET["referral"]) && !empty(trim($_GET["referral"]))) {
      $referral = $_GET["referral"];

      $stmt = $conn->prepare("SELECT *, COUNT(*) AS num_of_referrals FROM users WHERE referral_code='$referral'");
      $stmt->execute();
      $prow =  $stmt->fetch();
      $num_of_referrals = $prow['num_of_referrals'];

      if ($num_of_referrals >= 2) {
        $ref_sentence = 'Already referred '.$num_of_referrals.' other Users';
      }elseif ($num_of_referrals == 1) {
        $ref_sentence = 'Referred '.$num_of_referrals.' other User';
      }else{
        $ref_sentence = 'You are the first to be referred by this User';
      }
      
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

    <!-- account section start -->
    <div class="account-section bg_img" data-background="assets/images/bg/bg-5.jpg">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-lg-7">
            <div class="account-card">
              <div class="account-card__header bg_img overlay--one" data-background="assets/images/bg/bg-6.jpg">
                <h2 class="section-title">Welcome to <span class="base--color">PRIME ASSETS</span></h2>
                <p>Fill in your details and you'll be on your way.</p>
                <?php
                    if(isset($_SESSION['error'])){
                      echo "
                        <div class='callout callout-danger text-center'>
                          <p>".$_SESSION['error']."</p> 
                        </div>
                      ";
                      unset($_SESSION['error']);
                    }
                    if(isset($_SESSION['success'])){
                      echo "
                        <div class='callout callout-success text-center'>
                          <p>".$_SESSION['success']."</p> 
                        </div>
                      ";
                      unset($_SESSION['success']);
                    }
                ?>
              </div>
              <div class="account-card__body">
                <h3 class="text-center">Create an Account</h2>
                <form class="mt-4" method="post" action="register_helper.php">
                  <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" placeholder="Enter your full name" name="full_name" required>
                  </div>
                  <div class="form-group">
                    <label>Userame</label>
                    <input type="text" class="form-control" placeholder="Enter your Username" name="username" required>
                  </div>
                  <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" class="form-control" placeholder="Enter email address" name="email" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Enter password" name="password" required>
                  </div>
                  <div class="form-group">
                    <label>Retype Password</label>
                    <input type="password" class="form-control" placeholder="Enter password again" name="repassword" required>
                  </div>
                  <div class="form-group">
                    <label>Referral</label>
                    <input type="text" class="form-control" placeholder="(Optional) Input a Referral Code if you have one" <?= isset($referral) ? "disabled" : ""; ?> name="referral" value="<?= isset($referral) ? $referral : '' ?>">
                    <?= isset($referral) ? '<p class="f-size-14">'.$ref_sentence.'</p>' : '' ?>
                  </div>
                  <div class="form-row">
                    <div class="col-sm-6">
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" for="exampleCheck1">I accept the <a href="terms" class="base--color">terms & conditions</a></label>
                      </div>
                    </div>
                    <div class="col-sm-6 text-sm-right">
                      <p class="f-size-14">Have an account? <a href="login" class="base--color">Login</a></p>
                    </div>
                  </div>
                  <div class="mt-3">
                    <button type="submit" name="signup" class="cmn-btn">SignUp Now</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- account section end -->

  </div> <!-- page-wrapper end -->
  <?php include('inc/scripts.php') ?>
  </body>

<!-- Mirrored from template.viserlab.com/hyiplab/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Oct 2021 16:37:40 GMT -->
</html>