<?php
    include('inc/config.php');

    include 'admin/session.php';

    if(isset($_SESSION['user'])){
      header('location: account/dashboard.php');
   }

    $page_name = 'Sign In';
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
                    <h1 class="title">Sign In</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="<?= $baseurl ?>">Home</a>
                        </li>
                        <li>
                            Sign In
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
                        <div class="col-lg-8">
                            <div class="contact-header">
                                <h4 class="title">Enter Your Email and Password to Log In</h4>
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
                            <div class="contact-content">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <form class="contact-form" id="contact_form_submit" method="post" action="admin/verify.php">
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" id="name" placeholder="Enter your Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="surename">Password</label>
                                    <input type="password" id="surename" placeholder="Enter your password" name="password">
                                </div>
                                <h6 class="title">Forgot password? <a href="password_forgot" class="color-gold">Click Here <i class="flaticon-right-arrow"></i></a> to reset your password</h6>
                                <div class="form-group">
                                    <button type="submit" name="login" class="custom-button"> Login</button>
                                </div>
                            </form>
                            <h5 class="title">Don't have an account? <a href="register" class="color-gold">Click Here <i class="flaticon-right-arrow"></i></a> to sign up</h5>
                                
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