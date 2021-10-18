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
    <div class="main--body">
        <!--========== Preloader ==========-->
        <?php include('inc/pre-loader.php'); ?>
        <!--========== Preloader ==========-->        

        <!--=======Header-Section Starts Here=======-->
        <?php include('inc/header.php'); ?>
        <!--=======Header-Section Ends Here=======-->


        <!--=======Banner-Section Starts Here=======-->
        <section class="bg_img hero-section-2" data-background="assets/images/about/hero-bg2.jpg">
            <div class="container">
                <div class="hero-content text-white">
                    <h1 class="title">Plan</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="<?= $baseurl; ?>">Home</a>
                        </li>
                        <li>
                            Plan
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hero-shape">
                <img class="wow slideInUp" src="assets/images/about/hero-shape1.png" alt="about" data-wow-duration="1s">
            </div>
        </section>
        <!--=======Banner-Section Ends Here=======-->


        <!--=======Offer-Section Stars Here=======-->
        <section class="offer-section padding-top padding-bottom">
            <div class="ball-group-1" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
            data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="assets/images/balls/ball-group1.png" alt="balls">
            </div>
            <div class="ball-group-2" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30"
            data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="assets/images/balls/ball-group2.png" alt="balls">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <div class="section-header">
                            <span class="cate">INVESTMENT OFFER</span>
                            <h2 class="title">OUR INVESTMENT PLANS</h2>
                            <p>
                                <?= $settings->siteTitle ?> provides a straightforward and transparent mechanism to attract investments and make more profits.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="offer-wrapper">
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

                        if ($investment_plan->duration <= 4) {
                            
                            $duration = $days * 24 ." Hours";
                        }else{
                            $duration = $days ." Days";

                        }
                        

                        ?>


                        <div class="offer-item">
                            <div class="offer-header">
                                <h3 class="title"><?= $investment_plan->rate; ?>%</h3>
                                <span><b>daily</b></span>
                            </div>
                            <div class="offer-body">
                                <span class="bal-shape"></span>
                                <div class="item first">
                                    <div class="item-thumb">
                                        <img src="assets/images/offer/offer1.png" alt="offer">
                                    </div>
                                    <div class="item-content">
                                        <h5 class="title">Deposit</h5>
                                        <h5 class="subtitle"><span class="min">&#36;<?= number_format($investment_plan->min_invest, 0); ?></span><span class="to">to</span><span class="max"><?= $max_invest; ?></span></h5>
                                    </div>
                                </div>
                                <span class="bal-shape"></span>
                                <div class="item">
                                    <div class="item-thumb">
                                        <img src="assets/images/offer/offer2.png" alt="offer">
                                    </div>
                                    <div class="item-content">
                                        <h5 class="title">Duration</h5>
                                        <h5 class="subtitle"><?= $duration; ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="offer-footer">
                                <a href="register" class="custom-button">invest now</a>
                            </div>
                        </div>

                    <?php
                        $index++;
                       endforeach; ?>

                </div>
            </div>
        </section>
        <!--=======Offer-Section Ends Here=======-->



        <!--=======Proit-Section Starts Here=======-->
        <section class="profit-section padding-top" id="profit">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <div class="section-header">
                            <span class="cate">Calculate the amazing profits</span>
                            <h2 class="title">You Can Earn</h2>
                            <p>Calculate your profit before making an investment.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid p-0">
                <div class="profit-bg bg_img" data-background="assets/images/profit/profit-bg.png">
                    <div class="animation-group">
                        <div class="platform">
                            <img src="assets/images/profit/platform.png" alt="profit">
                        </div>
                        <div class="light">
                            <img src="assets/images/profit/light.png" alt="profit">
                        </div>
                        <div class="coin-1 wow fadeOutDown" data-wow-delay="1s">
                            <img src="assets/images/profit/coin6.png" alt="profit">
                        </div>
                        <div class="coin-2 wow fadeOutDown" data-wow-delay="1s">
                            <img src="assets/images/profit/coin2.png" alt="profit">
                        </div>
                        <div class="coin-3 wow fadeOutDown" data-wow-delay="1s">
                            <img src="assets/images/profit/coin3.png" alt="profit">
                        </div>
                        <div class="coin-4 wow fadeOutDown" data-wow-delay="1s">
                            <img src="assets/images/profit/coin4.png" alt="profit">
                        </div>
                        <div class="coin-5 wow fadeOutDown" data-wow-delay="1s">
                            <img src="assets/images/profit/coin5.png" alt="profit">
                        </div>
                        <div class="coin-6 wow fadeOutDown" data-wow-delay="1s">
                            <img src="assets/images/profit/coin1.png" alt="profit">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="calculate-wrapper tab">
                    <div class="calculate--area">
                        <div class="calculate-area">
                            <div class="calculate-item">
                                <h5 class="title" data-serial="01">Select the plan</h5>
                                <select class="select-bar">
                                    <option value="01">120% daily for 50 days</option>
                                    <option value="02">110% daily for 30 days</option>
                                    <option value="03">105% daily for 20 days</option>
                                    <option value="04">102% daily for 10 days</option>
                                    <option value="05">101% daily for 5 days</option>
                                </select>
                            </div>
                            <div class="calculate-item">
                                <h5 class="title" data-serial="02">Select the currency</h5>
                                <ul class="tab-menu">
                                    <li class="active">usd</li>
                                </ul>
                            </div>
                            <div class="calculate-item">
                                <h5 class="title" data-serial="03">Enter the amount</h5>
                                <input type="number" value="100">
                            </div>
                        </div>
                        <div class="tab-area active">
                            <div class="tab-item">
                                <div class="profit-calc">
                                    <div class="item">
                                        <span class="cate">Daily Profit</span>
                                        <h2 class="title cl-theme-1">0.026400 USD</h2>
                                    </div>
                                    <div class="item">
                                        <span class="cate">Total Profit</span>
                                        <h2 class="title cl-theme">1.320000 USD</h2>
                                    </div>
                                </div>
                                <div class="invest-range-area">
                                    <div class="main-amount">
                                        <input type="text" class="calculator-invest" id="usd-amount" readonly>
                                    </div>
                                    <div class="invest-amount" data-min="1.00 USD" data-max="1000 USD">
                                        <div id="usd-range" class="invest-range-slider"></div>
                                    </div>
                                    <a href="register" class="custom-button">join now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Proit-Section Ends Here=======-->


        <!--=======Feature-Section Starts Here=======-->
        <section class="faq-section padding-top padding-bottom bg_img" data-background="assets/images/feature/feature-bg.png">
            <div class="ball-group-1" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
            data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="assets/images/balls/ball-group5.png" alt="balls">
            </div>
            <div class="ball-group-2 rtl" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30"
            data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="assets/images/balls/ball-group6.png" alt="balls">
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