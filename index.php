<?php
    include('inc/config.php');
    include('admin/includes/format.php');

    $page_name = 'Home';
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
        <section class="banner-section" id="home">
            <div class="banner-bg d-lg-none">
                <img src="assets/images/banner/banner-bg2.jpg" alt="banner">
            </div>
            <div class="banner-bg d-none d-lg-block bg_img" data-background="assets/images/banner/banner.jpg">
                <div class="chart-1 wow fadeInLeft" data-wow-delay=".5s" data-wow-duration=".7s">
                    <img src="assets/images/banner/chart1.png" alt="banner">
                </div>
                <div class="chart-2 wow fadeInDown" data-wow-delay="1s" data-wow-duration=".7s">
                    <img src="assets/images/banner/chart2.png" alt="banner">
                </div>
                <div class="chart-3 wow fadeInRight" data-wow-delay="1.5s" data-wow-duration=".7s">
                    <img src="assets/images/banner/chart3.png" alt="banner">
                </div>
                <div class="chart-4 wow fadeInUp" data-wow-delay="2s" data-wow-duration=".7s">
                    <img src="assets/images/banner/clock.png" alt="banner">
                </div>
            </div>
            <div class="animation-area d-none d-lg-block">
                <div class="plot">
                    <img src="assets/images/banner/plot.png" alt="banner">
                </div>
                <div class="element-1 wow fadeIn" data-wow-delay="1s">
                    <img src="assets/images/banner/light.png" alt="banner">
                </div>
                <div class="element-2 wow fadeIn" data-wow-delay="1s">
                    <img src="assets/images/banner/coin1.png" alt="banner">
                </div>
                <div class="element-3 wow fadeIn" data-wow-delay="1s">
                    <img src="assets/images/banner/coin2.png" alt="banner">
                </div>
                <div class="element-4 wow fadeIn" data-wow-delay="1s">
                    <img src="assets/images/banner/coin3.png" alt="banner">
                </div>
                <div class="element-5 wow fadeIn" data-wow-delay="1s">
                    <img src="assets/images/banner/coin4.png" alt="banner">
                </div>
                <div class="element-6 wow fadeIn" data-wow-delay="1s">
                    <img src="assets/images/banner/coin5.png" alt="banner">
                </div>
                <div class="element-7 wow fadeIn" data-wow-delay="1s">
                    <img src="assets/images/banner/coin6.png" alt="banner">
                </div>
                <div class="element-8 wow fadeIn" data-wow-delay="1s">
                    <img src="assets/images/banner/sheild.png" alt="banner">
                </div>
                <div class="element-9 wow fadeIn" data-wow-delay="1s">
                    <img src="assets/images/banner/coin7.png" alt="banner">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 offset-lg-6 offset-xl-7">
                        <div class="banner-content">
                            <h1 class="title">Simple <span>Profitable </span> Convenient</h1>
                            <p>
                                A Profitable platform for high-margin investment
                            </p>
                            <div class="button-group">
                                <a href="register" class="custom-button">Get Started Now!</a>
                                <a href="https://www.youtube.com/watch?v=L-Qhv8kLESY" class="popup video-button"><i class="flaticon-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Banner-Section Ends Here=======-->


        <!--=======Counter-Section Starts Here=======-->
        <div class="counter-section">
            <div class="container">
                <div class="row align-items-center mb-30-none justify-content-center">
                    <?php
                 
                        $now = date('Y-m-d H:i:s');
                        $random_number = strtotime($now);

                        $total_accounts = number_format($random_number / 1000000000, 1);
                        $active_members = number_format(rand(60000,90100));

                        $current_time = time(); // or your date as well
                        $site_creation_date = strtotime("2015-10-20");
                        $datediff = $current_time - $site_creation_date;

                        $running_days = number_format(round($datediff / (60 * 60 * 24)), 0);

                        $happy_clients = number_format(round($random_number / (86400000)), 0);

                        $total_payout = number_format($random_number / 52000000, 1);
                    ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="counter-item">
                            <div class="counter-thumb">
                                <img src="assets/images/counter/counter01.png" alt="counter">
                            </div>
                            <div class="counter-content">
                                <div class="counter-header">
                                    <h3 class="title odometer" data-odometer-final="<?= $total_accounts ?>">0</h3><h3 class="title">M</h3>
                                </div>
                                <p>Registered users</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="counter-item">
                            <div class="counter-thumb">
                                <img src="assets/images/counter/counter02.png" alt="counter">
                            </div>
                            <div class="counter-content">
                                <div class="counter-header">
                                    <h3 class="title odometer" data-odometer-final="174">0</h3>
                                </div>
                                <p>Countries Supported</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="counter-item">
                            <div class="counter-thumb">
                                <img src="assets/images/counter/counter03.png" alt="counter">
                            </div>
                            <div class="counter-content">
                                <div class="counter-header">
                                    <h3 class="title">$</h3><h3 class="odometer title" data-odometer-final="<?= $total_payout ?>">0</h3><h3 class="title">M</h3>
                                </div>
                                <p>Total Payout</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=======Counter-Section Ends Here=======-->


        <!--=======About-Section Starts Here=======-->
        <section class="about-section padding-top padding-bottom" id="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 d-none d-lg-block rtl">
                        <img src="assets/images/about/about.png" alt="about">
                    </div>
                    <div class="col-lg-6">
                        <div class="section-header left-style">
                            <span class="cate">WELCOME TO <?= $settings->siteTitleCap ?></span>
                            <h2 class="title">about <?= $settings->siteTitle ?></h2>
                            <p>
                                <?= $settings->siteTitleCap; ?> is an investment company, whose team is working on making money from the volatility of cryptocurrencies and offer great returns to our clients.
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
                                    <h5 class="title">Guaranteed Profits</h5>
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


        <!--=======Feature-Section Starts Here=======-->
        <section class="feature-section padding-top padding-bottom bg_img" data-background="./assets/images/feature/feature-bg.png" id="feature">
            <div class="ball-1" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
            data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="assets/images/balls/ball1.png" alt="balls">
            </div>
            <div class="ball-2" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
            data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="assets/images/balls/ball2.png" alt="balls">
            </div>
            <div class="ball-3" data-paroller-factor="0.30" data-paroller-factor-lg="-0.30"
            data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="assets/images/balls/ball3.png" alt="balls">
            </div>


            <div class="container padding-bottom">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="section-header">
                            <span class="cate">Real Time System Transactions</span>
                            <h2 class="title">
                               Latest Payouts
                            </h2>
                            <p class="mw-100">
                                <a href="payouts">Click here</a> to view more...
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center feature-wrapper">
                    <div class="col-md-12 col-sm-10 col-lg-12">
                        <div class="feature-item">
                            <?php
                                if(!empty($blockchaintxs)){ ?>

                                <table class="table mb-0" style="overflow: scroll;">
                                    <thead class="thead-light" style="overflow: scroll;">
                                        <tr>
                                            <th>Reference ID</th>
                                            <th>Amount(BTC)</th>
                                            <th>Trx. ID</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody style="overflow-x: scroll;">
                                      
                                        <?php
                                        foreach ($blockchaintxs as $btx) : ?>
                                          
                                        <tr>
                                              <td>DIDTXCRT<?= $btx->btx_id; ?></td>
                                              <td><?= $btx->btx_amount; ?></td>
                                              <td><a target="_blank" href="https://www.blockchain.com/btc/tx/<?= $btx->btx_txid; ?>"><?= substr($btx->btx_txid, 0, 20); ?>...</a></td>
                                              <td><a target="_blank" href="https://www.blockchain.com/btc/address/<?= $btx->btx_address; ?>"><?= substr($btx->btx_address, 0, 15); ?>...</a></td>
                                          </tr>

                                        <?php
                                        endforeach; ?>
                                      
                                      
                                    </tbody>
                                </table><!--end /table-->

                            <?php }else{
                                  echo "<p>No Transactions Yet</p>";
                                } 
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="section-header">
                            <span class="cate">Our Amazing Features</span>
                            <h2 class="title">
                                why should you invest
                            </h2>
                            <p class="mw-100">
                                We are worldwide investment company who are committed to the principle of revenue  
                                maximization and reduction of the financial risks at investing.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center feature-wrapper">
                    <div class="col-md-6 col-sm-10 col-lg-4">
                        <div class="feature-item">
                            <div class="feature-thumb">
                                <img src="assets/images/feature/feature01.png" alt="feature">
                            </div>
                            <div class="feature-content">
                                <h5 class="title">Profitable Investment</h5>
                                <p>Our variety of plans gives you the choice of selecting a plan that fits your lifestyle.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-10 col-lg-4">
                        <div class="feature-item">
                            <div class="feature-thumb">
                                <img src="assets/images/feature/feature02.png" alt="feature">
                            </div>
                            <div class="feature-content">
                                <h5 class="title">Funds Protection</h5>
                                <p>Transfer of funds from and to us is fully secured as we make us of latest security applications. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-10 col-lg-4">
                        <div class="feature-item">
                            <div class="feature-thumb">
                                <img src="assets/images/feature/feature03.png" alt="feature">
                            </div>
                            <div class="feature-content">
                                <h5 class="title">24/7 Support Center</h5>
                                <p>On the web or by email, we are always available to listen to you and serve you. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Feature-Section Ends Here=======-->


        <!--=======How-Section Starts Here=======-->
        <section class="get-section padding-top padding-bottom">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <div class="section-header">
                            <span class="cate">get to know</span>
                            <h2 class="title">how we work.</h2>
                            <p>
                                Follow these simple steps and make profit!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="hover-tab">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 d-lg-block d-none">
                            <div class="hover-tab-area">
                                <div class="tab-area">
                                    <div class="tab-item active first">
                                        <img src="assets/images/how/how01.png" alt="how">
                                    </div>
                                    <div class="tab-item second">
                                        <img src="assets/images/how/how02.png" alt="how">
                                    </div>
                                    <div class="tab-item third">
                                        <img src="assets/images/how/how03.png" alt="how">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-9">
                            <div class="hover-tab-menu">
                                <ul class="tab-menu">
                                    <li class="active">
                                        <div class="menu-thumb">
                                            <span>
                                                01
                                            </span>
                                        </div>
                                        <div class="menu-content">
                                            <h5 class="title">Instant  registration</h5>
                                            <p>
                                                Click <a href="register">Sign Up</a> to fill the blank, our 256 SSL will Protect your privacy.
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="menu-thumb">
                                            <span>
                                                02
                                            </span>
                                        </div>
                                        <div class="menu-content">
                                            <h5 class="title">MAKE AN INVEST</h5>
                                            <p>
                                                <a href="login">Login</a> your account to click invest to start to earn the profit.
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="menu-thumb">
                                            <span>
                                                03
                                            </span>
                                        </div>
                                        <div class="menu-content">
                                            <h5 class="title">get profit</h5>
                                            <p>
                                                You will get your profit in your <?= $settings->siteTitle; ?> wallet, which you can withdraw to your desired account.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======How-Section Ends Here=======-->


        <!--=======Check-Section Starts Here=======-->
        <section class="call-section call-overlay bg_img" data-background="assets/images/call/call-bg.jpg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="call--item">
                            <span class="cate">We are always available</span>
                            <h3 class="title">Request a call back</h3>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="call-button">
                            <a href="contact" class="call">
                                <img src="assets/images/call/icon02.png" alt="call">
                            </a>
                            <a href="contact" class="custom-button"> Contact Support</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Check-Section Ends Here=======-->


        <!--=======Offer-Section Stars Here=======-->
        <section class="offer-section padding-top padding-bottom pb-max-md-0" id="plan">
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
                        <div class="tab-area">
                            <div class="tab-item active">
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


        <!--=======Latest-Transaction-Section Starts Here=======-->
        <section class="latest-transaction padding-top padding-bottom" id="transaction">
            <div class="transaction-bg bg_img" data-background="assets/images/transaction/transaction-bg.png">
                <span class="d-none">Image</span>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <div class="section-header">
                            <span class="cate">Latest Transactions</span>
                            <h2 class="title">Latest Transactions Feed</h2>
                            <p>Our goal is to simplify investing so that anyone can be an investor. With this in mind, 
                            we hand-pick the investments we offer on our platform.</p>
                        </div>
                    </div>
                </div>
                <div class="tab transaction-tab d-flex flex-wrap justify-content-center">
                    <ul class="tab-menu">
                        <li class="active">
                            <div class="thumb">
                                <i class="flaticon-wallet"></i>
                            </div>
                            <div class="content">
                                <span class="d-block">latest</span>
                                <span class="d-block">deposits</span>
                            </div>
                        </li>
                        <li>
                            <div class="thumb">
                                <i class="flaticon-atm"></i>
                            </div>
                            <div class="content">
                                <span class="d-block">latest</span>
                                <span class="d-block">withdrawals</span>
                            </div>
                        </li>
                        <li>
                            <div class="thumb">
                                <i class="flaticon-team"></i>
                            </div>
                            <div class="content">
                                <span class="d-block">latest</span>
                                <span class="d-block">investors</span>
                            </div>
                        </li>
                    </ul>
                    <div class="tab-area">
                        <div class="tab-item active">
                            <div class="row justify-content-center mb-30-none">
                                <?php
                                    if(!empty($deposits)){ ?>

                                        <?php
                                        foreach ($deposits as $deposit) : 

                                        ?>


                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                            <div class="transaction-item">
                                                <div class="transaction-header">
                                                    <h5 class="title"><?= $deposit->username; ?></h5>
                                                    <span class="date"><?= $deposit->trans_date; ?></span>
                                                </div>
                                                <div class="transaction-thumb">
                                                    <img src="assets/images/transaction/<?= $deposit->payment_mode; ?>.png" alt="transaction">
                                                </div>
                                                <div class="transaction-footer">
                                                    <span class="amount">Amount</span>
                                                    <h5 class="sub-title">&#36; <?= number_format($deposit->amount, 2); ?></h5>
                                                </div>
                                            </div>
                                        </div>


                                        <?php
                                        endforeach; ?>


                                <?php }else{
                                      echo '
                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                            <div class="transaction-item">
                                                <div class="transaction-header">
                                                    <h5 class="title">No Transaction Yet</h5>
                                                </div>
                                            </div>
                                        </div>';
                                    } 
                                ?>
                            </div>
                        </div>
                        <div class="tab-item">
                            <div class="row justify-content-center mb-30-none">
                                <?php
                                    if(!empty($withdrawals)){ ?>

                                        <?php
                                        foreach ($withdrawals as $withdrawal) : 

                                        ?>


                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                            <div class="transaction-item">
                                                <div class="transaction-header">
                                                    <h5 class="title"><?= $withdrawal->username; ?></h5>
                                                    <span class="date"><?= $withdrawal->trans_date; ?></span>
                                                </div>
                                                <div class="transaction-thumb">
                                                    <img src="assets/images/transaction/<?= $withdrawal->payment_mode; ?>.png" alt="transaction">
                                                </div>
                                                <div class="transaction-footer">
                                                    <span class="amount">Amount</span>
                                                    <h5 class="sub-title">&#36; <?= number_format($withdrawal->amount, 2); ?></h5>
                                                </div>
                                            </div>
                                        </div>


                                        <?php
                                        endforeach; ?>


                                <?php }else{
                                      echo '
                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                            <div class="transaction-item">
                                                <div class="transaction-header">
                                                    <h5 class="title">No Transaction Yet</h5>
                                                </div>
                                            </div>
                                        </div>';
                                    } 
                                ?>

                            </div>
                        </div>
                        <div class="tab-item">
                            <div class="row justify-content-center mb-30-none">
                                <?php
                                    if(!empty($investments)){ ?>

                                        <?php
                                        foreach ($investments as $investment) : 

                                        ?>


                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                            <div class="transaction-item">
                                                <div class="transaction-header">
                                                    <h5 class="title"><?= $investment->username; ?></h5>
                                                    <span class="date"><?= $investment->start_date; ?></span>
                                                </div>
                                                <div class="transaction-thumb">
                                                    <h5 class="title">Plan: <?= $investment->plan; ?></h5>
                                                </div>
                                                <div class="transaction-footer">
                                                    <span class="amount">Amount</span>
                                                    <h5 class="sub-title">&#36; <?= number_format($investment->amount, 2); ?></h5>
                                                </div>
                                            </div>
                                        </div>


                                        <?php
                                        endforeach; ?>


                                <?php }else{
                                      echo '
                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                            <div class="transaction-item">
                                                <div class="transaction-header">
                                                    <h5 class="title">No Transaction Yet</h5>
                                                </div>
                                            </div>
                                        </div>';
                                    } 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Latest-Transaction-Section Ends Here=======-->


        <!--=======Affiliate-Section Starts Here=======-->
        <section class="affiliate-programe" id="affiliate">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 padding-bottom padding-top">
                        <div class="section-header left-style">
                            <span class="cate">What You’ll Get As</span>
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
                            <h6 class="title">Make money with <?= $settings->siteTitle ?></h6>
                            <a href="affiliate" class="custom-button">
                                learn more <i class="flaticon-right"></i>
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


        <!--=======Check-Section Starts Here=======-->
        <section class="client-section padding-bottom padding-top">
            <div class="background-map">
                <img src="assets/images/client/client-bg.png" alt="client">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10">
                        <div class="section-header left-style">
                            <span class="cate">TESTIMONIALS</span>
                            <h2 class="title"><span><?= $happy_clients ?>+</span> HAPPY CLIENTS AROUND THE WORLD</h2>
                            <p class="mw-500">
                                We have many happy investors. Some impresions from our Customers!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-9">
                        <div class="m--30">
                            <div class="client-slider owl-carousel owl-theme">
                                <div class="client-item">
                                    <div class="client-content">
                                        <p>
                                            Perfect retirement plan for me, customer support is awesome
                                        </p>
                                        <div class="rating">
                                            <span>
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span>
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span>
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span>
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span>
                                                <i class="fas fa-star-half-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="client-thumb">
                                        <a href="#0">
                                            <img src="assets/images/client/client01.png" alt="client">
                                        </a>
                                    </div>
                                </div>
                                <div class="client-item">
                                    <div class="client-content">
                                        <p>
                                            Very easy to use, perfect for investment for me
                                        </p>
                                        <div class="rating">
                                            <span>
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span>
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span>
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span>
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span>
                                                <i class="fas fa-star-half-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="client-thumb">
                                        <a href="#0">
                                            <img src="assets/images/client/client02.png" alt="client">
                                        </a>
                                    </div>
                                </div>
                                <div class="client-item">
                                    <div class="client-content">
                                        <p>
                                            <?= $settings->siteTitle ?> is the most profitable site!
                                        </p>
                                        <div class="rating">
                                            <span>
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span>
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span>
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span>
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span>
                                                <i class="fas fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="client-thumb">
                                        <a href="#0">
                                            <img src="assets/images/client/client03.png" alt="client">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Check-Section Ends Here=======-->

        
        <!-- ==========Footer-Section Starts Here========== -->
        <?php include('inc/footer.php') ?>
        <!-- ==========Footer-Section Ends Here========== -->

        
    </div>

    <?php include('inc/scripts.php') ?>
</body>


<!-- Mirrored from <?= $settings->siteTitle ?> by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Nov 2020 21:30:26 GMT -->
</html>