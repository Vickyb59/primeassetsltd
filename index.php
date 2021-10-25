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

    <!-- hero start -->
    <section class="hero bg_img" data-background="assets/images/bg/hero.jpg">
      <div class="container">
        <div class="row">
          <div class="col-xl-5 col-lg-8">
            <div class="hero__content">
              <h2 class="hero__title"><span class="text-white font-weight-normal">Invest for the Future on our Stable Platform</span> <b class="base--color">and Make Fast Money</b></h2>
              <p class="text-white f-size-18 mt-3">Invest with Prime Assets Limited, a Professional and Reliable Company. We provide you with the most necessary features that will make your experience better. Not only do we guarantee the fastest and the most exciting returns on your investments, but we also guarantee the security of your investment.</p>
              <a href="register" class="cmn-btn text-uppercase font-weight-600 mt-4">Sign Up</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- hero end -->

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

    <!-- cureency section start -->
    <div class="cureency-section">
      <div class="container">
        <div class="row mb-none-30">
          <div class="col-lg-3 col-sm-6 cureency-item mb-30">
            <div class="cureency-card text-center">
              <h6 class="cureency-card__title text-white">REGISTERED USERS</h6>
              <span class="cureency-card__amount h-font-family font-weight-600 base--color"><?= $total_accounts ?> M</span>
            </div><!-- cureency-card end -->
          </div><!-- cureency-item end -->
          <div class="col-lg-3 col-sm-6 cureency-item mb-30">
            <div class="cureency-card text-center">
              <h6 class="cureency-card__title text-white">COUNTRIES SUPPORTED</h6>
              <span class="cureency-card__amount h-font-family font-weight-600 base--color">184</span>
            </div><!-- cureency-card end -->
          </div><!-- cureency-item end -->
          <div class="col-lg-3 col-sm-6 cureency-item mb-30">
            <div class="cureency-card text-center">
              <h6 class="cureency-card__title text-white">TOTAL PAYOUTS</h6>
              <span class="cureency-card__amount h-font-family font-weight-600 base--color"><?= $total_payout ?> M</span>
            </div><!-- cureency-card end -->
          </div><!-- cureency-item end -->
          <div class="col-lg-3 col-sm-6 cureency-item mb-30">
            <div class="cureency-card text-center">
              <h6 class="cureency-card__title text-white">ACTIVE MEMBERS</h6>
              <span class="cureency-card__amount h-font-family font-weight-600 base--color"><?= $active_members ?></span>
            </div><!-- cureency-card end -->
          </div><!-- cureency-item end -->
        </div>
      </div>
    </div>
    <!-- cureency section end  -->

    <!-- about section start -->
    <section class="about-section pt-120 pb-120 bg_img" data-background="assets/images/bg/bg-2.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-6">
            <div class="about-content">
              <h2 class="section-title mb-3"><span class="font-weight-normal">About</span> <b class="base--color">Us</b></h2>
              <p>Prime Assets is an international financial company engaged in investment activities, which are related to trading on financial markets and cryptocurrency exchanges performed by qualified professional traders.</p>
              <p class="mt-4">Our goal is to provide our investors with a reliable source of high income, while minimizing any possible risks and offering a high-quality service, allowing us to automate and simplify the relations between the investors and the trustees. We work towards increasing your profit margin by profitable investment.</p>
              <a href="about" class="cmn-btn mt-4">MORE INFO</a>
            </div><!-- about-content end -->
          </div>
        </div>
      </div>
    </section>
    <!-- about section end -->

    <!-- package section start -->
    <section class="pt-120 pb-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <div class="section-header">
              <h2 class="section-title"><span class="font-weight-normal">Investment</span> <b class="base--color">Plans</b></h2>
              <p>To make a solid investment, you have to know where you are investing. Find a plan which is best for you.</p>
            </div>
          </div>
        </div><!-- row end -->
        <div class="row justify-content-center mb-none-30">
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

              $total_rate = number_format($investment_plan->rate * $investment_plan->duration, 0);

              if ($investment_plan->duration <= 4) {
                  
                  $duration = $days * 24 ." Hours";
              }else{
                  $duration = $days ." Days";

              }
              

              ?>

              <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                <div class="package-card text-center bg_img" data-background="assets/images/bg/bg-4.png">
                  <h4 class="package-card__title base--color mb-2"><?= $investment_plan->name; ?></h4>
                  <ul class="package-card__features mt-4">
                    <li>Return <?= $investment_plan->rate; ?>%</li>
                    <li>Daily</li>
                    <li>For <?= $duration; ?></li>
                    <li>Total <?= $total_rate; ?>% + <span class="badge base--bg text-dark">Capital</span></li>
                  </ul>
                  <div class="package-card__range mt-5 base--color">&#36;<?= number_format($investment_plan->min_invest, 0); ?> - <?= $max_invest; ?></div>
                  <a href="investment" class="cmn-btn btn-md mt-4">Invest Now</a>
                </div><!-- package-card end -->
              </div>

          <?php
              $index++;
             endforeach; ?>
        </div><!-- row end -->
        <div class="row mt-50">
          <div class="col-lg-12 text-center">
            <a href="investment" class="cmn-btn">View All Packages</a>
          </div>
        </div>
      </div>
    </section>
    <!-- package section end  -->

    <!-- choose us section start -->
    <section class="pt-120 pb-120 overlay--radial bg_img" data-background="assets/images/bg/bg-3.jpg">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <div class="section-header">
              <h2 class="section-title"><span class="font-weight-normal">Why Choose</span> <b class="base--color">Prime Assets</b></h2>
              <p>Our goal is to provide our investors with a reliable source of high income, while minimizing any possible risks and offering a high-quality service.</p>
            </div>
          </div>
        </div><!-- row end -->
        <div class="row justify-content-center mb-none-30">
          <div class="col-xl-4 col-md-6 mb-30">
            <div class="choose-card border-radius--5">
              <div class="choose-card__header mb-3">
                <div class="choose-card__icon">
                  <i class="lar la-copy"></i>
                </div>
                <h4 class="choose-card__title base--color">Legal Company</h4>
              </div>
              <p>Our company conducts absolutely legal activities in the legal field. We are certified to operate investment business, we are legal and safe.</p>
            </div><!-- choose-card end -->
          </div>
          <div class="col-xl-4 col-md-6 mb-30">
            <div class="choose-card border-radius--5">
              <div class="choose-card__header mb-3">
                <div class="choose-card__icon">
                  <i class="las la-lock"></i>
                </div>
                <h4 class="choose-card__title base--color">High reliability</h4>
              </div>
              <p>We are trusted by a huge number of people. We are working hard constantly to improve the level of our security system and minimize possible risks.</p>
            </div><!-- choose-card end -->
          </div>
          <div class="col-xl-4 col-md-6 mb-30">
            <div class="choose-card border-radius--5">
              <div class="choose-card__header mb-3">
                <div class="choose-card__icon">
                  <i class="las la-user-lock"></i>
                </div>
                <h4 class="choose-card__title base--color">Anonymity</h4>
              </div>
              <p>Anonymity and using cryptocurrency as a payment instrument. In the era of electronic money – this is one of the most convenient ways of cooperation.</p>
            </div><!-- choose-card end -->
          </div>
          <div class="col-xl-4 col-md-6 mb-30">
            <div class="choose-card border-radius--5">
              <div class="choose-card__header mb-3">
                <div class="choose-card__icon">
                  <i class="las la-shipping-fast"></i>
                </div>
                <h4 class="choose-card__title base--color">Quick Withdrawal</h4>
              </div>
              <p>Our all requests are treated spontaneously once requested. There are high maximum limits. The minimum withdrawal amount is only $100.</p>
            </div><!-- choose-card end -->
          </div>
          <div class="col-xl-4 col-md-6 mb-30">
            <div class="choose-card border-radius--5">
              <div class="choose-card__header mb-3">
                <div class="choose-card__icon">
                  <i class="las la-users"></i>
                </div>
                <h4 class="choose-card__title base--color">Referral Program</h4>
              </div>
              <p>We are offering a certain level of referral income through our referral program. you can increase your income by simply refering a few people.</p>
            </div><!-- choose-card end -->
          </div>
          <div class="col-xl-4 col-md-6 mb-30">
            <div class="choose-card border-radius--5">
              <div class="choose-card__header mb-3">
                <div class="choose-card__icon">
                  <i class="las la-headset"></i>
                </div>
                <h4 class="choose-card__title base--color">24/7 Support</h4>
              </div>
              <p>We provide 24/7 customer support through e-mail and livechat. Our support representatives are periodically available to elucidate any difficulty..</p>
            </div><!-- choose-card end -->
          </div>
          <div class="col-xl-4 col-md-6 mb-30">
            <div class="choose-card border-radius--5">
              <div class="choose-card__header mb-3">
                <div class="choose-card__icon">
                  <i class="las la-server"></i>
                </div>
                <h4 class="choose-card__title base--color">Dedicated Server</h4>
              </div>
              <p>We are using a dedicated server for the website which allows us exclusive use of the resources of the entire server.</p>
            </div><!-- choose-card end -->
          </div>
          <div class="col-xl-4 col-md-6 mb-30">
            <div class="choose-card border-radius--5">
              <div class="choose-card__header mb-3">
                <div class="choose-card__icon">
                  <i class="fab fa-expeditedssl"></i>
                </div>
                <h4 class="choose-card__title base--color">SSL Secured</h4>
              </div>
              <p>Comodo Essential-SSL Security encryption confirms that the presented content is genuine and legitimate.</p>
            </div><!-- choose-card end -->
          </div>
          <div class="col-xl-4 col-md-6 mb-30">
            <div class="choose-card border-radius--5">
              <div class="choose-card__header mb-3">
                <div class="choose-card__icon">
                  <i class="las la-shield-alt"></i>
                </div>
                <h4 class="choose-card__title base--color">DDOS Protection</h4>
              </div>
              <p>We are using one of the most experienced, professional, and trusted DDoS Protection and mitigation provider.</p>
            </div><!-- choose-card end -->
          </div>
        </div>
      </div>
    </section>
    <!-- choose us section end  -->

    <!-- profit calculator section start -->
    <section class="pt-120 pb-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="section-header text-center">
              <h2 class="section-title"><span class="font-weight-normal">Profit</span> <b class="base--color">Calculator</b></h2>
              <p>You must know the calculation before investing in any plan, so you never make mistakes. Check the calculation and you will get as our calculator says.</p>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-xl-8">
            <div class="profit-calculator-wrapper">
              <form class="profit-calculator">
                <div class="row mb-none-30">
                  <div class="col-lg-6 mb-30">
                    <label>Choose Plan</label>
                    <select data-bind="in:value" data-name="plan" class="base--bg">
                      <?php
                        $index = 1;
                        foreach ($investment_plans as $investment_plan) : ?>

                        <option value="<?= $investment_plan->rate; ?>"><?= $investment_plan->name; ?></option>
                      <?php
                          $index++;
                         endforeach; ?>
                    </select>
                  </div>
                  <div class="col-lg-6 mb-30">
                    <label>Invest Amount</label>
                    <input type="number" data-bind="in:value, f: float" data-name="amount" id="invest_amount" placeholder="0.00" class="form-control base--bg">
                  </div>
                  <div class="col-lg-6 mb-30">
                    <label>Duration in days</label>
                    <input type="number" data-bind="in:value, f: float" data-name="duration" id="invest_duration" placeholder="0.00" class="form-control base--bg">
                  </div>
                  <div class="col-lg-6 mb-30">
                    <label>Profit Amount</label>
                    <span data-bind="out:price, f:currency" data-name="profit" class="form-control base--bg">
                        <span class="pr-sign">-&nbsp;</span> $<span class="pr-wrap" style="display: none;"><span class="pr">0</span></span>
                    </span>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- profit calculator section end -->

    <!-- how work section start -->
    <section class="pt-120 pb-120 bg_img" data-background="assets/images/bg/bg-5.jpg">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <div class="section-header">
              <h2 class="section-title"><span class="font-weight-normal">How</span> <b class="base--color">Prime Assets</b> <span class="font-weight-normal">Works</span></h2>
              
            </div>
          </div>
        </div><!-- row end -->
        <div class="row justify-content-center mb-none-30">
          <div class="col-lg-4 col-md-6 work-item mb-30">
            <div class="work-card text-center">
              <div class="work-card__icon">
                <i class="las la-user base--color"></i>
                <span class="step-number">01</span>
              </div>
              <div class="work-card__content">
                <h4 class="base--color mb-3">Create Account</h4>
              </div>
            </div><!-- work-card end -->
          </div>
          <div class="col-lg-4 col-md-6 work-item mb-30">
            <div class="work-card text-center">
              <div class="work-card__icon">
                <i class="las la-hand-holding-usd base--color"></i>
                <span class="step-number">02</span>
              </div>
              <div class="work-card__content">
                <h4 class="base--color mb-3">Invest To Plan</h4>
              </div>
            </div><!-- work-card end -->
          </div>
          <div class="col-lg-4 col-md-6 work-item mb-30">
            <div class="work-card text-center">
              <div class="work-card__icon">
                <i class="las la-wallet base--color"></i>
                <span class="step-number">03</span>
              </div>
              <div class="work-card__content">
                <h4 class="base--color mb-3">Get Profit</h4>
              </div>
            </div><!-- work-card end -->
          </div>
        </div>
      </div>
    </section>
    <!-- how work section end  -->

    
    <!-- faq section start -->
    <section class="pt-120 pb-120" id="faq">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <div class="section-header">
              <h2 class="section-title"><span class="font-weight-normal">Frequently Asked</span> <b class="base--color">Questions</b></h2>
              <p>We answer some of your Frequently Asked Questions regarding our platform. If you have a query that is not answered here, Please contact us.</p>
            </div>
          </div>
        </div><!-- row end -->
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="accordion cmn-accordion" id="accordionExample">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <i class="las la-question-circle"></i>
                      <span>When can I deposit/withdraw from my Investment account?</span>
                    </button>
                  </h2>
                </div>
            
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                    Deposit and withdrawal are available for at any time. Be sure, that your funds are not used in any ongoing trade before the withdrawal. The available amount is shown in your dashboard on the main page of Investing platform. 
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <i class="las la-question-circle"></i>
                      <span>How do I check my account balance?</span>
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body">
                    You can see this anytime on your accounts dashboard. 
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      <i class="las la-question-circle"></i>
                      <span>I forgot my password, what should I do?</span>
                    </button>
                  </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                  <div class="card-body">
                    Visit the password reset page, type in your email address and click the `Reset` button. 
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingFour">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      <i class="las la-question-circle"></i>
                      <span>How will I know that the withdrawal has been successful?</span>
                    </button>
                  </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                  <div class="card-body">
                    You will get an automatic notification once we send the funds and you can always check your transactions or account balance. Your chosen payment system dictates how long it will take for the funds to reach you. 
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingFive">
                  <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                      <i class="las la-question-circle"></i>
                      <span>How much can I withdraw?</span>
                    </button>
                  </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                  <div class="card-body">
                    You can withdraw the full amount of your account balance minus the funds that are used currently for supporting opened positions.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- faq section end -->


    <!-- testimonial section start -->
    <section class="pt-120 pb-120 bg_img overlay--radial" data-background="assets/images/bg/bg-7.jpg">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <div class="section-header">
              <h2 class="section-title"><span class="font-weight-normal">What People Say</span> <b class="base--color">About Us</b></h2>
              
            </div>
          </div>
        </div><!-- row end -->
        <div class="row">
          <div class="col-lg-12">
            <div class="testimonial-slider">
              <div class="single-slide">
                <div class="testimonial-card">
                  <div class="testimonial-card__content">
                    <p>I was scared at first but their swift payment system changed my mindset</p>
                  </div>
                  <div class="testimonial-card__client">
                    <div class="thumb">
                      <img src="assets/images/testimonial/1.jpg" alt="image">
                    </div>
                    <div class="content">
                      <h6 class="name">Henry Taverner</h6>
                      <span class="designation">VIP INVESTOR</span>
                      <div class="ratings">
                        <i class="las la-star"></i>
                        <i class="las la-star"></i>
                        <i class="las la-star"></i>
                        <i class="las la-star"></i>
                        <i class="las la-star"></i>
                      </div>
                    </div>
                  </div>
                </div><!-- testimonial-card end -->
              </div><!-- single-slide end -->
              <div class="single-slide">
                <div class="testimonial-card">
                  <div class="testimonial-card__content">
                    <p>First of all, I want to say thank you for the opportunity to earn !! I like the company. Opened a deposit of 1000. Profitable marketing and a pleasant referral program. You can make good money.</p>
                  </div>
                  <div class="testimonial-card__client">
                    <div class="thumb">
                      <img src="assets/images/testimonial/2.jpg" alt="image">
                    </div>
                    <div class="content">
                      <h6 class="name">Ashton Cambage</h6>
                      <span class="designation">VIP INVESTOR</span>
                      <div class="ratings">
                        <i class="las la-star"></i>
                        <i class="las la-star"></i>
                        <i class="las la-star"></i>
                        <i class="las la-star"></i>
                        <i class="las la-star"></i>
                      </div>
                    </div>
                  </div>
                </div><!-- testimonial-card end -->
              </div><!-- single-slide end -->
              <div class="single-slide">
                <div class="testimonial-card">
                  <div class="testimonial-card__content">
                    <p>The best investment that i can recommend to anyone that want to trade and get back profit.</p>
                  </div>
                  <div class="testimonial-card__client">
                    <div class="thumb">
                      <img src="assets/images/testimonial/3.jpg" alt="image">
                    </div>
                    <div class="content">
                      <h6 class="name">Jasper Kossak</h6>
                      <span class="designation">VIP INVESTOR</span>
                      <div class="ratings">
                        <i class="las la-star"></i>
                        <i class="las la-star"></i>
                        <i class="las la-star"></i>
                        <i class="las la-star"></i>
                        <i class="las la-star"></i>
                      </div>
                    </div>
                  </div>
                </div><!-- testimonial-card end -->
              </div><!-- single-slide end -->
              <div class="single-slide">
                <div class="testimonial-card">
                  <div class="testimonial-card__content">
                    <p>At first I was skeptical, I decided to start with the starter plan. I've never looked back since then. It is a great retirement plan for me</p>
                  </div>
                  <div class="testimonial-card__client">
                    <div class="thumb">
                      <img src="assets/images/testimonial/4.jpg" alt="image">
                    </div>
                    <div class="content">
                      <h6 class="name">Zohir Khan</h6>
                      <span class="designation">VIP INVESTOR</span>
                      <div class="ratings">
                        <i class="las la-star"></i>
                        <i class="las la-star"></i>
                        <i class="las la-star"></i>
                        <i class="las la-star"></i>
                        <i class="las la-star"></i>
                      </div>
                    </div>
                  </div>
                </div><!-- testimonial-card end -->
              </div><!-- single-slide end -->
            </div>
          </div>
        </div><!-- row end -->
      </div>
    </section>
    <!-- testimonial section end -->

    <!-- team section start -->
    <?php include('inc/team.php') ?>
    <!-- team section end -->


    <!-- data section start -->
    <section class="pt-120 pb-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <div class="section-header">
              <h2 class="section-title"><span class="font-weight-normal">Our Latest</span> <b class="base--color">Transaction</b></h2>
              <p>Here is the log of the most recent transactions including withdraw and deposit made by our users.</p>
            </div>
          </div>
        </div><!-- row end -->
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <ul class="nav nav-tabs custom--style-two justify-content-center" id="transactionTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="deposit-tab" data-toggle="tab" href="#deposit" role="tab" aria-controls="deposit" aria-selected="true">Latest Deposit</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="withdraw-tab" data-toggle="tab" href="#withdraw" role="tab" aria-controls="withdraw" aria-selected="false">Latest Withdraw</a>
              </li>
            </ul>

            <div class="tab-content mt-4" id="transactionTabContent">
              <div class="tab-pane fade show active" id="deposit" role="tabpanel" aria-labelledby="deposit-tab">
                <div class="table-responsive--sm">
                  <table class="table style--two">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Gateway</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if(!empty($deposits)){ ?>

                          <?php
                          foreach ($deposits as $deposit) : 

                          ?>

                          <tr>
                            <td data-label="Name">
                              <div class="user">
                                <span><?= $deposit->username; ?></span>
                              </div>
                            </td>
                            <td data-label="Date"><?= $deposit->trans_date; ?></td>
                            <td data-label="Amount">&#36; <?= number_format($deposit->amount, 2); ?></td>
                            <td data-label="Gateway"><?= $deposit->payment_mode; ?></td>
                          </tr>

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
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="withdraw" role="tabpanel" aria-labelledby="withdraw-tab">
                <div class="table-responsive--md">
                  <table class="table style--two">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Gateway</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if(!empty($withdrawals)){ ?>

                            <?php
                            foreach ($withdrawals as $withdrawal) : 

                            ?>

                            <tr>
                              <td data-label="Name">
                                <div class="user">
                                  <span><?= $withdrawal->username; ?></span>
                                </div>
                              </td>
                              <td data-label="Date"><?= $withdrawal->trans_date; ?></td>
                              <td data-label="Amount">&#36; <?= number_format($withdrawal->amount, 2); ?></td>
                              <td data-label="Gateway"><?= $withdrawal->payment_mode; ?></td>
                            </tr>


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
                    </tbody>
                  </table>
                </div>
              </div>
            </div><!-- tab-content end -->
          </div>
        </div>
      </div>
    </section>
    <!-- data section end -->


    <!-- top investor section start -->
    <section class="pt-120 pb-120 border-top-1">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 col-lg-8 text-center">
            <div class="section-header">
              <h2 class="section-title"><span class="font-weight-normal">Our Top</span> <b class="base--color">Investor</b></h2>
              
            </div>
          </div>
        </div><!-- row end -->
        <div class="row justify-content-center mb-none-30">
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="investor-card border-radius--5">
              <div class="investor-card__thumb bg_img background-position-y-top" data-background="assets/images/investor/1.jpg"></div>
              <div class="investor-card__content">
                <h6 class="name">Fahad Bin Faiz</h6>
                <span class="amount f-size-14">Investment - $1,500,355</span>
              </div>
            </div><!-- investor-card end -->
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="investor-card border-radius--5">
              <div class="investor-card__thumb bg_img background-position-y-top" data-background="assets/images/investor/2.jpg"></div>
              <div class="investor-card__content">
                <h6 class="name">Danial K</h6>
                <span class="amount f-size-14">Investment - $1,500,355</span>
              </div>
            </div><!-- investor-card end -->
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="investor-card border-radius--5">
              <div class="investor-card__thumb bg_img background-position-y-top" data-background="assets/images/investor/3.jpg"></div>
              <div class="investor-card__content">
                <h6 class="name">Lew Son</h6>
                <span class="amount f-size-14">Investment - $1,500,355</span>
              </div>
            </div><!-- investor-card end -->
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="investor-card border-radius--5">
              <div class="investor-card__thumb bg_img background-position-y-top" data-background="assets/images/investor/4.jpg"></div>
              <div class="investor-card__content">
                <h6 class="name">Tend z Joe</h6>
                <span class="amount f-size-14">Investment - $1,500,355</span>
              </div>
            </div><!-- investor-card end -->
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="investor-card border-radius--5">
              <div class="investor-card__thumb bg_img background-position-y-top" data-background="assets/images/investor/5.jpg"></div>
              <div class="investor-card__content">
                <h6 class="name">Sam Joe</h6>
                <span class="amount f-size-14">Investment - $1,500,355</span>
              </div>
            </div><!-- investor-card end -->
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="investor-card border-radius--5">
              <div class="investor-card__thumb bg_img background-position-y-top" data-background="assets/images/investor/6.jpg"></div>
              <div class="investor-card__content">
                <h6 class="name">Alex Joe</h6>
                <span class="amount f-size-14">Investment - $1,500,355</span>
              </div>
            </div><!-- investor-card end -->
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="investor-card border-radius--5">
              <div class="investor-card__thumb bg_img background-position-y-top" data-background="assets/images/investor/7.jpg"></div>
              <div class="investor-card__content">
                <h6 class="name">Juna Sun</h6>
                <span class="amount f-size-14">Investment - $1,500,355</span>
              </div>
            </div><!-- investor-card end -->
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="investor-card border-radius--5">
              <div class="investor-card__thumb bg_img background-position-y-top" data-background="assets/images/investor/8.jpg"></div>
              <div class="investor-card__content">
                <h6 class="name">Profed Laun</h6>
                <span class="amount f-size-14">Investment - $1,500,355</span>
              </div>
            </div><!-- investor-card end -->
          </div>
        </div>
      </div>
    </section>
    <!-- top investor section end -->


    <!-- cta section start -->
    <section class="pb-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-8">
            <div class="cta-wrapper bg_img border-radius--10 text-center" data-background="assets/images/bg/bg-8.jpg">
              <h2 class="title mb-3">Get Started Today With Us</h2>
              <p>This is a Revolutionary Money Making Platform! Invest for Future in Stable Platform and Make Fast Money. Not only we guarantee the fastest and the most exciting returns on your investments, but we also guarantee the security of your investment.</p>
              <a href="register" class="cmn-btn mt-4">Join Us</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- cta section end -->

    <!-- payment brand section start -->
    <section class="pb-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <div class="section-header">
              <h2 class="section-title"><span class="font-weight-normal">Payment We</span> <b class="base--color">Accept</b></h2>
              <p>We accept all major cryptocurrencies and fiat payment methods to make your investment process easier with our platform.</p>
            </div>
          </div>
        </div><!-- row end -->
        <div class="row">
          <div class="col-lg-12">
            <div class="payment-slider">
              <div class="single-slide">
                <div class="brand-item">
                  <img src="assets/images/brand/1.png" alt="image">
                </div><!-- brand-item end -->
              </div>
              <div class="single-slide">
                <div class="brand-item">
                  <img src="assets/images/brand/2.png" alt="image">
                </div><!-- brand-item end -->
              </div>
              <div class="single-slide">
                <div class="brand-item">
                  <img src="assets/images/brand/3.png" alt="image">
                </div><!-- brand-item end -->
              </div>
              <div class="single-slide">
                <div class="brand-item">
                  <img src="assets/images/brand/4.png" alt="image">
                </div><!-- brand-item end -->
              </div>
              <div class="single-slide">
                <div class="brand-item">
                  <img src="assets/images/brand/5.png" alt="image">
                </div><!-- brand-item end -->
              </div>
              <div class="single-slide">
                <div class="brand-item">
                  <img src="assets/images/brand/6.png" alt="image">
                </div><!-- brand-item end -->
              </div>
              <div class="single-slide">
                <div class="brand-item">
                  <img src="assets/images/brand/7.png" alt="image">
                </div><!-- brand-item end -->
              </div>
              <div class="single-slide">
                <div class="brand-item">
                  <img src="assets/images/brand/8.png" alt="image">
                </div><!-- brand-item end -->
              </div>
            </div><!-- payment-slider end -->
          </div>
        </div>
      </div>
    </section>
    <!-- payment brand section end -->

    
    <!-- blog section start -->
    <section class="pt-120 pb-120 border-top-1">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <div class="section-header">
              <h2 class="section-title"><span class="font-weight-normal">Our Latest</span> <b class="base--color">News</b></h2>
              <p>Follow our latest news and thoughts which focuses exclusively on investment strategy guide, blockchain tech, crypto-trading and mining.</p>
            </div>
          </div>
        </div><!-- row end -->
        <div class="row justify-content-center mb-none-30">
          <?php
            $index = 1;
              foreach ($news as $new) : 

                if ($index == 1) {
                  $tag1 = "Crypto News";
                  $tag2 = "Apps";
                  
                }elseif ($index == 2) {
                  $tag1 = "Cryptocurrency";
                  $tag2 = "Tech";
                }elseif ($index == 3) {
                  $tag1 = "Bitcoin";
                  $tag2 = "Tech";
                }
                  ?>
                <div class="col-lg-4 col-md-6 mb-30">
                  <div class="blog-card">
                    <div class="blog-card__thumb">
                      <img src="admin/images/<?= $new->photo; ?>" alt="image">
                    </div>
                    <div class="blog-card__content">
                      <h4 class="blog-card__title mb-3"><a href="news-detail.php?id=<?= $new->id; ?>&title=<?= $new->slug; ?>"><?= substrwords($new->short_title, 50); ?></a></h4>
                      <ul class="blog-card__meta d-flex flex-wrap mb-4">
                        <li>
                          <a href="news-detail.php?id=<?= $new->id; ?>&title=<?= $new->slug; ?>"><?= $tag1; ?>, <?= $tag2; ?></a>
                        </li>
                        <li>
                          <i class="las la-calendar"></i>
                          <a href="#0"><?= $new->posted; ?></a>
                        </li>
                      </ul>
                      <p><?= substrwords($new->short_details, 180); ?></p>
                      <a href="news-detail.php?id=<?= $new->id; ?>&title=<?= $new->slug; ?>" class="cmn-btn btn-md mt-4">Read More</a>
                    </div>
                  </div>
                </div>
            <?php
              $index++;
                endforeach; ?>
        </div>
      </div>
    </section>
    <!-- blog section end -->

    <!-- subscribe section start -->
    <section class="pb-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="subscribe-wrapper bg_img" data-background="assets/images/bg/bg-5.jpg">
              <div class="row align-items-center">
                <div class="col-lg-5">
                  <h2 class="title">Subscribe Our Newsletter</h2>
                </div>
                <div class="col-lg-7 mt-lg-0 mt-4">
                  <form class="subscribe-form">
                    <input type="email" class="form-control" placeholder="Email Address">
                    <button class="subscribe-btn"><i class="las la-envelope"></i></button>
                  </form>
                </div>
              </div>
            </div><!-- subscribe-wrapper end -->
          </div>
        </div>
      </div>
    </section>
    <!-- subscribe section end -->


    <!-- footer section start -->
    <?php include('inc/footer.php') ?>
    <!-- footer section end -->
  </div> <!-- page-wrapper end -->
  <?php include('inc/scripts.php') ?>
  </body>

<!-- Mirrored from template.viserlab.com/hyiplab/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Oct 2021 16:37:40 GMT -->
</html>