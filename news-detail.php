<?php
    include('inc/config.php');
    $id = $_REQUEST['id'];

    $page_name = 'Post';
    $page_parent = 'News';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = $settings->siteTitle.' provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';
    include('inc/head.php');  

    $userQuery = $conn->prepare("SELECT * from news where id = ? LIMIT 1");
    $userQuery->execute(array($id));
    $user = $userQuery->fetch(PDO::FETCH_OBJ); 

    $post_id = $user->id;

    if ($post_id % 3 == 0) {
      $tag1 = "Crypto News";
      $tag2 = "Apps";
      
    }elseif ($post_id % 2 == 0) {
      $tag1 = "Cryptocurrency";
      $tag2 = "Tech";
    }elseif ($post_id % $post_id == 0) {
      $tag1 = "Bitcoin";
      $tag2 = "Tech";
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
            <h2 class="page-title">Post Details</h2>
            <ul class="page-breadcrumb">
              <li><a href="index.html">Home</a></li>
              <li>Post Details</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->


    <!-- blog-details-section start -->
    <section class="pt-150 pb-150">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="blog-details-wrapper">
              <div class="blog-details__thumb">
                <img src="admin/images/<?= $user->photo; ?>" alt="image">
                <div class="post__date">
                  <span class="date"><?= $user->posted; ?></span>
                </div>
              </div><!-- blog-details__thumb end -->
              <div class="blog-details__content">
                <h4 class="blog-details__title"><?= $user->title; ?></h4>
                <?= $user->details; ?>
              </div><!-- blog-details__content end -->
            </div><!-- blog-details-wrapper end -->
          </div>
        </div>
      </div>
    </section>
    <!-- blog-details-section end -->


    <!-- footer section start -->
    <?php include('inc/footer.php') ?>
    <!-- footer section end -->
  </div> <!-- page-wrapper end -->
  <?php include('inc/scripts.php') ?>
  </body>

<!-- Mirrored from template.viserlab.com/hyiplab/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Oct 2021 16:37:40 GMT -->
</html>