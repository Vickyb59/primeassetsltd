<?php
    include('inc/config.php');

    include 'admin/session.php';

    if(isset($_SESSION['user'])){
      header('location: account/dashboard.php');
   }

    $page_name = 'Password Reset';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = $settings->siteTitle.' provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';
    include('inc/head.php');  

?>

<body>
    <div class="main--body">
        <!--========== Preloader ==========-->
        <?php include('inc/pre-loader.php'); ?>
        <!--========== Preloader ==========-->        

        <!--=======Header-Section Starts Here=======-->
        <?php include('inc/header.php'); ?>
        <!--=======Header-Section Ends Here=======-->


        <!--=======Banner-Section Starts Here=======-->
        <section class="bg_img hero-section-2 left-bottom-lg-max" data-background="assets/images/about/hero-bg5.png">
            <div class="container">
                <div class="hero-content text-white">
                    <h1 class="title">Password Reset</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="<?= $baseurl ?>">Home</a>
                        </li>
                        <li>
                            Password Reset
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!--=======Banner-Section Ends Here=======-->


        <!--=======Contact-Section Starts Here=======-->
        <section class="contact-section padding-bottom padding-top">
            <div class="container">
                <div class="contact-wrapper padding-top">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-xl-4 offset-xl-1">
                            <div class="contact-header">
                                <h4 class="title">Enter email associated with account</h4>
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
                                <p>
                                   Don't have an account? <a href="register">Sign Up Here</a>
                                </p>
                                <p>I remember my password <a href="login">Click Here</a></p>
                                
                            </div>
                            <div class="contact-content">
                            </div>
                        </div>
                        <div class="col-lg-5 offset-xl-1">
                            <form class="contact-form" id="contact_form_submit" method="post" action="reset.php">
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" id="name" placeholder="Enter your Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="reset" class="custom-button"> Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Contact-Section Ends Here=======-->
        

        <!-- ==========Footer-Section Starts Here========== -->
        <?php include('inc/footer.php') ?>
        <!-- ==========Footer-Section Ends Here========== -->

        
    </div>

    <?php include('inc/scripts.php') ?>
</body>


<!-- Mirrored from <?= $settings->siteTitle ?> by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Nov 2020 21:30:26 GMT -->
</html>