<?php
    include('inc/config.php');
    include('admin/includes/format.php');

    $page_name = 'About Us';
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
        <section class="hero-section bg_img" data-background="assets/images/about/hero-bg.png">
            <div class="container">
                <div class="hero-content">
                    <h1 class="title">About US</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="<?= $baseurl; ?>">Home</a>
                        </li>
                        <li>
                            About Us
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!--=======Banner-Section Ends Here=======-->


        <!--=======About-Section Starts Here=======-->
        <section class="about-section padding-top padding-bottom section-bg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 d-none d-lg-block rtl">
                        <img src="assets/images/about/about.png" alt="about">
                    </div>
                    <div class="col-lg-6">
                        <div class="section-header left-style">
                            <span class="cate">WELCOME TO <?= $settings->siteTitleCap ?></span>
                            <h2 class="title">about <?= $settings->siteTitle; ?></h2>
                            <p>
                                <?= $settings->siteTitleCap ?> is an investment company, whose team is working on making money from the volatility of cryptocurrencies and offer great returns to our clients.
                            </p>
                        </div>
                        <div class="about--content">
                            <div class="about-item">
                                <div class="about-thumb">
                                    <img src="assets/images/about/about01.png" alt="about">
                                </div>
                                <div class="about-content">
                                    <h5 class="title">Secure & Reliable</h5>
                                    <p>
                                        Secure assets fund for users
                                    </p>
                                </div>
                            </div>
                            <div class="about-item">
                                <div class="about-thumb">
                                    <img src="assets/images/about/about02.png" alt="about">
                                </div>
                                <div class="about-content">
                                    <h5 class="title">Fast Withdrawals</h5>
                                    <p>
                                        Quick money withdrawals for users
                                    </p>
                                </div>
                            </div>
                            <div class="about-item">
                                <div class="about-thumb">
                                    <img src="assets/images/about/about03.png" alt="about">
                                </div>
                                <div class="about-content">
                                    <h5 class="title">Guaranteed Profit</h5>
                                    <p>
                                        Your return on investment is guaranteed
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======About-Section Ends Here=======-->


        <!--=======CEO-Section Starts Here=======-->
        <section class="ceo-section padding-bottom padding-top bg_img" data-background="assets/images/about/ceo-bg.jpg">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-7 col-xl-6">
                        <div class="ceo-content">
                            <h3 class="title">Our goal is to be at the heart of the financial services industry</h3>
                            <div class="author">
                                <h6 class="subtitle"><a href="#0">Elizabeth Stones</a></h6>
                                <span class="info">CEO of <?= $settings->siteTitle ?></span>
                                <div class="sign">
                                    <img src="assets/images/about/sign-ceo.png" alt="about">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3">
                        <div class="ceo-thumb">
                            <img src="assets/images/about/certificate-ceo.png" alt="about">
                        </div>
                    </div>
                            
                    <div class="col-lg-6 col-xl-6">
                        <a target="_blank" href="assets/documents/certificate.pdf" class="custom-button">Open Certificate of Incorporation</a>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <a target="_blank" href="assets/documents/articles.pdf" class="custom-button">Open Articles of Incorporation</a>
                    </div>
                </div>
            </div>
        </section>
        <!--=======CEO-Section Ends Here=======-->


        <!--=======Mission-Section Starts Here=======-->
        <section class="mission-section padding-top padding-bottom">
            <div class="mission-shape">
                <img src="assets/images/mission/mission-shape.png" alt="about">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="section-header">
                            <span class="cate">Our Mission is to maximize profits </span>
                            <h2 class="title">
                                for our users
                            </h2>
                            <p class="mw-100">
                                We are worldwide investment company who are committed to the principle of revenue maximization and reduction of the financial risks at investing.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 rtl">
                        <div class="mission--thumb">
                            <img class="wow slideInLeft" src="assets/images/mission/mission.png" alt="about">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="mission-wrapper owl-theme owl-carousel">
                            <div class="mission-item">
                                <div class="mission-thumb">
                                    <img src="assets/images/mission/1.png" alt="mission">
                                </div>
                                <div class="mission-content">
                                    <h5 class="title">Reasonable Investment</h5>
                                    <p>
                                        We have investment plans for everybody
                                    </p>
                                    <a href="investment">Learn More <i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                            <div class="mission-item">
                                <div class="mission-thumb">
                                    <img src="assets/images/mission/2.png" alt="mission">
                                </div>
                                <div class="mission-content">
                                    <h5 class="title">One tap invest</h5>
                                    <p>
                                        Investment is as easy as possible
                                    </p>
                                    <a href="login">Login <i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                            <div class="mission-item">
                                <div class="mission-thumb">
                                    <img src="assets/images/mission/3.png" alt="mission">
                                </div>
                                <div class="mission-content">
                                    <h5 class="title">Maximum returns</h5>
                                    <p>
                                        Our high return rates is what builds our reputation
                                    </p>
                                    <a href="investment">Learn More <i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                            <div class="mission-item">
                                <div class="mission-thumb">
                                    <img src="assets/images/mission/4.png" alt="mission">
                                </div>
                                <div class="mission-content">
                                    <h5 class="title">Transparency</h5>
                                    <p>
                                        You see your investment as it grows daily
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Mission-Section Ends Here=======-->


        <!--=======Investor-Section Starts Here=======-->
        <section class="investor-section padding-bottom padding-top pt-max-lg-0">
            <div class="ball-group-1 ball-group-4" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60" data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="assets/images/balls/ball-group4.png" alt="balls">
            </div>
            <div class="ball-group-2 ball-group-3" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30" data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="assets/images/balls/ball-group3.png" alt="balls">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10 col-xl-6">
                        <div class="section-header">
                            <span class="cate">OUR TEAM</span>
                            <h2 class="title">
                                Our Board Members
                            </h2>
                            <p>
                                A look at the people at the top who motivates us to do more.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel owl-theme investor-slider">
                    <div class="investor-item">
                        <div class="investor-thumb">
                            <img src="assets/images/investor/investor1.png" alt="investor">
                        </div>
                        <div class="investor-content">
                            <h5 class="title"><a href="#0">Elizabeth Stones</a></h5>
                            <h3 class="amount">CEO</h3>
                        </div>
                    </div>
                    <div class="investor-item">
                        <div class="investor-thumb">
                            <img src="assets/images/investor/investor2.png" alt="investor">
                        </div>
                        <div class="investor-content">
                            <h5 class="title"><a href="#0">Patrick Lucas</a></h5>
                            <h3 class="amount">Head Sales/Marketing</h3>
                        </div>
                    </div>
                    <div class="investor-item">
                        <div class="investor-thumb">
                            <img src="assets/images/investor/investor3.png" alt="investor">
                        </div>
                        <div class="investor-content">
                            <h5 class="title"><a href="#0">Tami Oliver</a></h5>
                            <h3 class="amount">CTO</h3>
                        </div>
                    </div>
                    <div class="investor-item">
                        <div class="investor-thumb">
                            <img src="assets/images/investor/investor4.png" alt="investor">
                        </div>
                        <div class="investor-content">
                            <h5 class="title"><a href="#0">Taylor Johnny</a></h5>
                            <h3 class="amount">Head Procurement</h3>
                        </div>
                    </div>
                    <div class="investor-item">
                        <div class="investor-thumb">
                            <img src="assets/images/investor/investor5.png" alt="investor">
                        </div>
                        <div class="investor-content">
                            <h5 class="title"><a href="#0">Elena Maxwell</a></h5>
                            <h3 class="amount">CRO</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Investor-Section Ends Here=======-->
        

        <!--=======Check-Section Starts Here=======-->
        <?php include('inc/cta.php') ?>
        <!--=======Check-Section Ends Here=======-->

        
        <!-- ==========Footer-Section Starts Here========== -->
        <?php include('inc/footer.php') ?>
        <!-- ==========Footer-Section Ends Here========== -->

        
    </div>

    <?php include('inc/scripts.php') ?>
</body>


<!-- Mirrored from <?= $settings->siteTitle ?> by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Nov 2020 21:30:26 GMT -->
</html>