<?php
    include('inc/config.php');
    include('admin/includes/format.php');

    $page_name = 'Affiliate';
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
        <section class="bg_img hero-section-2 " data-background="assets/images/about/hero-bg4.png">
            <div class="container">
                <div class="hero-content text-white">
                    <h1 class="title">Affiliates</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="<?= $baseurl ?>">Home</a>
                        </li>
                        <li>
                            Affiliates
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!--=======Banner-Section Ends Here=======-->


        <!--=======Affiliate-Section Starts Here=======-->
        <section class="affiliate-programe padding-top pt-max-lg-0">
            <div class="ball-3" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30"
            data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="assets/images/balls/ball4.png" alt="balls">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 padding-bottom padding-top">
                        <div class="section-header left-style">
                            <span class="cate">What You’ll Get In The</span>
                            <h2 class="title fz-md-49">Affiliate Program</h2>
                            <p>
                                We give you the opportunity to earn money by recommending our website to others. You can start earning money even if you do not invest.
                            </p>
                        </div>
                        <div class="affiliate-wrapper">
                            <div class="affiliate-item">
                                <div class="affiliate-inner">
                                    <div class="affiliate-thumb">
                                        <h3 class="title">10</h3>
                                        <span class="remainder">%</span>
                                        <span class="cont">1st</span>
                                    </div>
                                </div>
                            </div>
                            <div class="affiliate-item cl-two">
                                <div class="affiliate-inner">
                                    <div class="affiliate-thumb">
                                        <h3 class="title">5</h3>
                                        <span class="remainder">%</span>
                                        <span class="cont">2nd</span>
                                    </div>
                                </div>
                            </div>
                            <div class="affiliate-item cl-three">
                                <div class="affiliate-inner">
                                    <div class="affiliate-thumb">
                                        <h3 class="title">2</h3>
                                        <span class="remainder">%</span>
                                        <span class="cont">3rd</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="affiliate-bottom">
                            <h6 class="title">Make money with <?= $settings->siteTitle; ?></h6>
                            <a href="register" class="custom-button">
                                register<i class="flaticon-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 d-lg-block d-none">
                        <div class="afiliate-thumb">
                            <img src="assets/images/affiliate/affiliate.png" alt="affiliate">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Affiliate-Section Ends Here=======-->
        

        <!--=======Check-Section Starts Here=======-->
        <?php include('inc/cta.php') ?>
        <!--=======Check-Section Ends Here=======-->
        
        
        <!-- ==========Total-Affiliate-Section Starts Here========== -->
        <section class="total-affiliate-section padding-bottom padding-top">
            <?php
                 
                $now = date('Y-m-d H:i:s');
                $random_number = strtotime($now);

                $total_accounts = number_format($random_number / 1000000000, 1);
                $total_amount = number_format($random_number / 300, 2);
                $active_members = number_format(rand(604,981));

                $current_time = time(); // or your date as well
                $site_creation_date = strtotime("2015-10-20");
                $datediff = $current_time - $site_creation_date;

                $running_days = number_format(round($datediff / (60 * 60 * 24)), 0);

                $happy_clients = number_format(round($random_number / (86400000)), 0);

                $total_payout = number_format($random_number / 52000000, 1);
            ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-header">
                            <span class="cate">You’re Part of something Big</span>
                            <h2 class="title">$<?= $total_amount ?></h2>
                            <p>Total Commissions Paid to Our Affiliates</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 d-lg-block d-none">
                        <div class="total-thumb rtl">
                            <img src="assets/images/affiliate/total-1.png" alt="affiliate">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="total-content">
                            <div class="total-bg">
                                <img src="assets/images/affiliate/affiliate-bg2.png" alt="affiliate">
                            </div>
                            <div class="tot-wrapper">
                                <div class="tot-area">
                                    <div class="tot-item">
                                        <div class="tot-thumb">
                                            <img src="assets/images/affiliate/tot1.png" alt="affiliate">
                                        </div>
                                        <div class="tot-content">
                                            <div class="counter--item">
                                                <div class="counter-header">
                                                    <h2 class="title odometer" data-odometer-final="170">0</h2>
                                                </div>
                                                <p>
                                                    Supported Languages
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tot-item">
                                        <div class="tot-thumb">
                                            <img src="assets/images/affiliate/tot3.png" alt="affiliate">
                                        </div>
                                        <div class="tot-content">
                                            <div class="counter--item">
                                                <div class="counter-header">
                                                    <h2 class="title odometer" data-odometer-final="<?= $total_accounts ?>">0</h2>
                                                    <h2 class="title">M</h2>
                                                </div>
                                                <p>
                                                    Users Worldwide
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tot-area">
                                    <div class="tot-item">
                                        <div class="tot-thumb">
                                            <img src="assets/images/affiliate/tot3.png" alt="affiliate">
                                        </div>
                                        <div class="tot-content">
                                            <div class="counter--item">
                                                <div class="counter-header">
                                                    <h2 class="title odometer" data-odometer-final="<?= $active_members ?>">0</h2>
                                                    <h2 class="title">k</h2>
                                                </div>
                                                <p>
                                                    Members Online
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==========Total-Affiliate-Section Ends Here========== -->


        <!-- ==========How-Section Starts Here========== -->
        <section class="how-section bg_img padding-top padding-bottom pt-max-md-0" data-background="assets/images/affiliate/affiliate-bg.png">
            <div class="ball-3" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
            data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="assets/images/balls/ball-group9.png" alt="balls">
            </div>
            <div class="ball-2" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30"
            data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="assets/images/balls/ball-group10.png" alt="balls">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-header">
                            <span class="cate">Here’s how it works</span>
                            <h2 class="title">Getting  started? It’s simple</h2>
                            <p>
                                The affiliate program is our special feature for loyal Investors. Invite users and earn upto 10% of the fee on their exchange transactions!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mb-30-none">
                    <div class="col-md-6 col-lg-4 col-sm-10">
                        <div class="how-item">
                            <div class="how-thumb-area">
                                <div class="how-thumb">
                                    <img src="assets/images/how/how4.png" alt="how">
                                </div>
                            </div>
                            <div class="how-content">
                                <h5 class="title">Join Program</h5>
                                <a href="register">Join Now <i class="flaticon-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-sm-10">
                        <div class="how-item active">
                            <div class="how-thumb-area">
                                <div class="how-thumb">
                                    <img src="assets/images/how/how5.png" alt="how">
                                </div>
                            </div>
                            <div class="how-content">
                                <h5 class="title">Promote</h5>
                                <a href="#0">Tracking Link <i class="flaticon-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-sm-10">
                        <div class="how-item">
                            <div class="how-thumb-area">
                                <div class="how-thumb">
                                    <img src="assets/images/how/how6.png" alt="how">
                                </div>
                            </div>
                            <div class="how-content">
                                <h5 class="title">Earn</h5>
                                <a href="#0">Commission <i class="flaticon-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==========How-Section Ends Here========== -->


        <!-- ==========Why-Affiliate-Section Starts Here========== -->
        <section class="why-affiliate-section padding-bottom padding-top pt-max-lg-0">
            <div class="why--thumb">
                <img src="assets/images/why/how.png" alt="why">
            </div>
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <div class="why-affiliate-content">
                            <div class="section-header left-style">
                                <span class="cate">Why Should You</span>
                                <h2 class="title">Join affiliate?</h2>
                                <p>
                                    The affiliate program is our special feature for loyal Investors.
                                </p>
                            </div>
                            <div class="why-area">
                                <div class="why-item">
                                    <div class="why-inner">
                                        <div class="why-thumb">
                                            <img src="assets/images/why/why1.png" alt="why">
                                        </div>
                                        <div class="why-content">
                                            <h6 class="title">Joining free </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="why-item">
                                    <div class="why-inner">
                                        <div class="why-thumb">
                                            <img src="assets/images/why/why2.png" alt="why">
                                        </div>
                                        <div class="why-content">
                                            <h6 class="title">Instant Payout</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="why-item">
                                    <div class="why-inner">
                                        <div class="why-thumb">
                                            <img src="assets/images/why/why3.png" alt="why">
                                        </div>
                                        <div class="why-content">
                                            <h6 class="title">Performance Bonuses</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="why-item">
                                    <div class="why-inner">
                                        <div class="why-thumb">
                                            <img src="assets/images/why/why4.png" alt="why">
                                        </div>
                                        <div class="why-content">
                                            <h6 class="title">Unlimited affiliates</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="register" class="custom-button">join Now!</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==========Why-Affiliate-Section Ends Here========== -->


        <!-- ==========Footer-Section Starts Here========== -->
        <?php include('inc/footer.php') ?>
        <!-- ==========Footer-Section Ends Here========== -->

        
    </div>

    <?php include('inc/scripts.php') ?>
</body>


<!-- Mirrored from <?= $settings->siteTitle ?> by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Nov 2020 21:30:26 GMT -->
</html>