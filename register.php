<?php
    include('inc/config.php');

    include 'admin/session.php';

    if(isset($_SESSION['user'])){
      header('location: account/dashboard.php');
    }

    $page_name = 'Sign Up';
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
                    <h1 class="title">Register</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="<?= $baseurl ?>">Home</a>
                        </li>
                        <li>
                            Register
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
                                <h4 class="title">Fill in your details and you'll be on your way.</h4>
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
                            <form class="contact-form" id="contact_form_submit" method="post" action="register_helper.php">
                                <div class="form-group">
                                    <label for="name">Full name</label>
                                    <input type="text" id="name" placeholder="Enter your full name" name="full_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input type="text" id="name" placeholder="Enter your username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" id="name" placeholder="Enter your Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="surename">Password</label>
                                    <input type="password" id="surename" placeholder="Enter your password" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="surename">Retype Password</label>
                                    <input type="password" id="surename" placeholder="Enter your password again" name="repassword">
                                </div>
                                <div class="form-group">
                                    <label for="name">Referral</label>
                                    <input type="text" id="name" placeholder="(Optional) Input a Referral Code if you have one" name="referral">
                                </div>
                                <div class="form-group">
                                    <p>By clicking register, you agree to the terms & conditions</p>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="signup" class="custom-button"> Register</button>
                                </div>
                            </form>
                            <h5 class="title">Already Have an Account? <a href="login">Sign In <i class="flaticon-right-arrow"></i></a></h5>
                                
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