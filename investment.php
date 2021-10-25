<?php
    include('inc/config.php');
    include('admin/includes/format.php');

    $page_name = 'Investment Plan';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = $settings->siteTitle.' provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';
    include('inc/head.php');


   

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
            <h2 class="page-title">All Plans</h2>
            <ul class="page-breadcrumb">
              <li><a href="<?= $baseurl; ?>">Home</a></li>
              <li>Plan</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->


    <!-- package section start -->
    <section class="pt-120 pb-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <div class="section-header">
              <h2 class="section-title"><span class="font-weight-normal">Investment</span> <b class="base--color">Plans</b></h2>
              <p>To make a solid investment, you have to know where you are investing. Find a plan which is best for you.</p>
            </div>
          </div>
        </div><!-- row end -->
        <div class="row justify-content-center mb-none-30">
          <?php
              $index = 1;
              foreach ($investment_plans as $investment_plan) :

              if ($index == 2 || $index == 4) {
                  $fade_in = "fadeInDown";
                  $plan_focus = "pricing-active";
                  $icon_image = "BitcoinIcon5.png";
                  $btn_class = "btn--white";
              }else{
                  $fade_in = "fadeInUp";
                  $plan_focus = "";
                  $icon_image = "BitcoinIcon4.png";
                  $btn_class = "btn--secondary";
              }

              if ($investment_plan->max_invest >= 100000000) {
                  $max_invest = "Unlimited";
              }else{
                  $max_invest = "&#36;". number_format($investment_plan->max_invest, 0);

              }

              $days = $investment_plan->duration;

              $total_rate = number_format($investment_plan->rate * $investment_plan->duration, 0);

              if ($investment_plan->duration <= 4) {
                  
                  $duration = $days * 24 ." Hours";
              }else{
                  $duration = $days ." Days";

              }
              

              ?>

              <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                <div class="package-card text-center bg_img" data-background="assets/images/bg/bg-4.png">
                  <h4 class="package-card__title base--color mb-2"><?= $investment_plan->name; ?></h4>
                  <ul class="package-card__features mt-4">
                    <li>Return <?= $investment_plan->rate; ?>%</li>
                    <li>Daily</li>
                    <li>For <?= $duration; ?></li>
                    <li>Total <?= $total_rate; ?>% + <span class="badge base--bg text-dark">Capital</span></li>
                  </ul>
                  <div class="package-card__range mt-5 base--color">&#36;<?= number_format($investment_plan->min_invest, 0); ?> - <?= $max_invest; ?></div>
                  <a href="investment" class="cmn-btn btn-md mt-4">Invest Now</a>
                </div><!-- package-card end -->
              </div>

          <?php
              $index++;
             endforeach; ?>
        </div><!-- row end -->
      </div>
    </section>
    <!-- package section end  -->


    
    <!-- footer section start -->
    <?php include('inc/footer.php') ?>
    <!-- footer section end -->
  </div> <!-- page-wrapper end -->
  <?php include('inc/scripts.php') ?>
  </body>

<!-- Mirrored from template.viserlab.com/hyiplab/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Oct 2021 16:37:40 GMT -->
</html>