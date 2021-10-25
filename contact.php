<?php
    include('inc/config.php');
    include('admin/includes/format.php');

    $page_name = 'Contact Us';
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
            <h2 class="page-title">Contact Us</h2>
            <ul class="page-breadcrumb">
              <li><a href="<?= $baseurl ?>">Home</a></li>
              <li>Contact</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->


    <!-- contact section start -->
    <section class="pt-120 pb-120">
      <div class="container">
        <div class="contact-wrapper">
          <div class="row">
            <div class="col-lg-6 contact-thumb bg_img" data-background="assets/images/bg/bg-1.jpg"></div>
            <div class="col-lg-6 contact-form-wrapper">
              <h2 class="font-weight-bold">Contact.</h2>
              <h2 class="font-weight-bold">Get in touch.</h2>
              <span>Leave us a message</span>
              <form class="contact-form mt-4">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="contact-name" placeholder="Full Name" class="form-control">
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" name="contact-name" placeholder="Email Address" class="form-control">
                  </div>
                  <div class="form-group col-lg-12">
                    <textarea class="form-control" placeholder="Message"></textarea>
                  </div>
                  <div class="col-lg-12">
                    <button type="submit" class="cmn-btn">Send Message</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div><!-- contact-wrapper end -->
      </div>
      <div class="container pt-120">
        <div class="row justify-content-center">
          <div class="col-lg-10 mb-50">
            <h2 class="font-weight-bold">Quick</h2>
            <h2 class="font-weight-bold">Support.</h2>
            <span>You can get all information</span>
          </div>
          <div class="col-lg-10">
            <div class="row mb-none-30">
              <div class="col-md-4 col-sm-6 mb-30">
                <div class="contact-item">
                  <i class="fas fa-phone-alt"></i>
                  <h5 class="mt-2">Call Us</h5>
                  <div class="mt-4">
                    <p><?= $settings->phoneNumber; ?></p>
                  </div>
                </div><!-- contact-item end -->
              </div>
              <div class="col-md-4 col-sm-6 mb-30">
                <div class="contact-item">
                  <i class="fas fa-envelope"></i>
                  <h5 class="mt-2">Mail Us</h5>
                  <div class="mt-4">
                    <p><?= $settings->email; ?><br/>
                       <?= $settings->email2; ?><br/> 
                       <?= $settings->email3; ?><br/>
                    </p>
                  </div>
                </div><!-- contact-item end -->
              </div>
              <div class="col-md-4 col-sm-6 mb-30">
                <div class="contact-item">
                  <i class="fas fa-map-marker-alt"></i>
                  <h5 class="mt-2">Visit Us</h5>
                  <div class="mt-4">
                    <p><?= $settings->address; ?></p>
                  </div>
                </div><!-- contact-item end -->
              </div>
            </div>
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