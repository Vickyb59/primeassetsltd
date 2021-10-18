<?php
    include('inc/config.php');
    include('admin/includes/format.php');

    $page_name = 'FAQ';
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
        <section class="bg_img hero-section-2" data-background="assets/images/about/hero-bg3.jpg">
            <div class="container">
                <div class="hero-content text-white">
                    <h1 class="title">faq</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="<?= $baseurl ?>">Home</a>
                        </li>
                        <li>
                            faq
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hero-shape">
                <img class="wow slideInUp" src="assets/images/about/hero-shape1.png" alt="about" data-wow-duration="1s">
            </div>
        </section>
        <!--=======Banner-Section Ends Here=======-->


        <!--=======Feature-Section Starts Here=======-->
        <section class="faq-section padding-top padding-bottom mb-xl-5">
            <div class="ball-group-1" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
            data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="assets/images/balls/ball-group7.png" alt="balls">
            </div>
            <div class="ball-group-2 rtl" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30"
            data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="assets/images/balls/ball-group8.png" alt="balls">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="section-header">
                            <span class="cate">You have questions</span>
                            <h2 class="title">
                                we have answers
                            </h2>
                            <p class="mw-100">
                                Do not hesitate to send us an email or chat with us online if you can't find what you're looking for.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab faq-tab">
                    <ul class="tab-menu">
                        <li>BASIC </li>
                        <li class="active">FINANCIAL</li>
                        <li>AFFILIATE</li>
                    </ul>
                    <div class="tab-area">
                        <div class="tab-item">
                            <div class="faq-wrapper">
                                <div class="faq-item">
                                    <div class="faq-title">
                                        <h5 class="title">What is the minimum percentage that an investor can earn on <?= $settings->siteTitle ?>?</h5>
                                        <span class="right-icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>
                                            The minimum percentage which is tied to the most basic plan is 10%
                                        </p>
                                    </div>
                                </div>
                                <div class="faq-item active open">
                                    <div class="faq-title">
                                        <h5 class="title">Can i invest using cryptocurrency?</h5>
                                        <span class="right-icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>
                                            Yes you can invest using cryptocurrency.
                                        </p>
                                    </div>
                                </div>
                                <div class="faq-item">
                                    <div class="faq-title">
                                        <h5 class="title">What are the minimum and maximum deposit amounts?</h5>
                                        <span class="right-icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>
                                            Minimum deposit amount at a time is $100 while the maximum deposit amount is $100,000
                                        </p>
                                    </div>
                                </div>
                                <div class="faq-item">
                                    <div class="faq-title">
                                        <h5 class="title">How long will the money arrive in my account after the withdrawal process?</h5>
                                        <span class="right-icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>
                                            We process withdrawal within 24 hours of initiation
                                        </p>
                                    </div>
                                </div>
                                <div class="faq-item">
                                    <div class="faq-title">
                                        <h5 class="title">What payment system can i use to withdraw?</h5>
                                        <span class="right-icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>
                                            You can use any of the payment methods convenient for you
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-item active">
                            <div class="faq-wrapper">
                                <div class="faq-item">
                                    <div class="faq-title">
                                        <h5 class="title">What is the minimum percentage that an investor can earn on <?= $settings->siteTitle ?>?</h5>
                                        <span class="right-icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>
                                            The minimum percentage which is tied to the most basic plan is 10%
                                        </p>
                                    </div>
                                </div>
                                <div class="faq-item active open">
                                    <div class="faq-title">
                                        <h5 class="title">Can i invest using cryptocurrency?</h5>
                                        <span class="right-icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>
                                            Yes you can invest using cryptocurrency.
                                        </p>
                                    </div>
                                </div>
                                <div class="faq-item">
                                    <div class="faq-title">
                                        <h5 class="title">What are the minimum and maximum deposit amounts?</h5>
                                        <span class="right-icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>
                                            Minimum deposit amount at a time is $100 while the maximum deposit amount is $100,000
                                        </p>
                                    </div>
                                </div>
                                <div class="faq-item">
                                    <div class="faq-title">
                                        <h5 class="title">How long will the money arrive in my account after the withdrawal process?</h5>
                                        <span class="right-icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>
                                            We process withdrawal within 24 hours of initiation
                                        </p>
                                    </div>
                                </div>
                                <div class="faq-item">
                                    <div class="faq-title">
                                        <h5 class="title">What payment system can i use to withdraw?</h5>
                                        <span class="right-icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>
                                            You can use any of the payment methods convenient for you
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-item">
                            <div class="faq-wrapper">
                                <div class="faq-item">
                                    <div class="faq-title">
                                        <h5 class="title">What is the minimum percentage that an investor can earn on <?= $settings->siteTitle ?>?</h5>
                                        <span class="right-icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>
                                            The minimum percentage which is tied to the most basic plan is 10%
                                        </p>
                                    </div>
                                </div>
                                <div class="faq-item active open">
                                    <div class="faq-title">
                                        <h5 class="title">Can i invest using cryptocurrency?</h5>
                                        <span class="right-icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>
                                            Yes you can invest using cryptocurrency.
                                        </p>
                                    </div>
                                </div>
                                <div class="faq-item">
                                    <div class="faq-title">
                                        <h5 class="title">What are the minimum and maximum deposit amounts?</h5>
                                        <span class="right-icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>
                                            Minimum deposit amount at a time is $100 while the maximum deposit amount is $100,000
                                        </p>
                                    </div>
                                </div>
                                <div class="faq-item">
                                    <div class="faq-title">
                                        <h5 class="title">How long will the money arrive in my account after the withdrawal process?</h5>
                                        <span class="right-icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>
                                            We process withdrawal within 24 hours of initiation
                                        </p>
                                    </div>
                                </div>
                                <div class="faq-item">
                                    <div class="faq-title">
                                        <h5 class="title">What payment system can i use to withdraw?</h5>
                                        <span class="right-icon"></span>
                                    </div>
                                    <div class="faq-content">
                                        <p>
                                            You can use any of the payment methods convenient for you
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Feature-Section Ends Here=======-->
        
        <!-- ==========Footer-Section Starts Here========== -->
        <?php include('inc/footer.php') ?>
        <!-- ==========Footer-Section Ends Here========== -->

        
    </div>

    <?php include('inc/scripts.php') ?>
</body>


<!-- Mirrored from <?= $settings->siteTitle ?> by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Nov 2020 21:30:26 GMT -->
</html>