<?php
    include('inc/config.php');
    include('admin/includes/format.php');

    $page_name = 'Contact Us';
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
                    <h1 class="title">Contact</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="<?= $baseurl ?>">Home</a>
                        </li>
                        <li>
                            Contact
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
                        <img src="assets/images/about/contact.png" alt="contact">
                    </div>
                    <div class="col-lg-6">
                        <div class="section-header left-style">
                            <h2 class="title">we are always available to help</h2>
                            <p>
                                Visit us, call us, send us an email, chat with us online, or fill the form below. Whatever your choices expect prompt responses.
                            </p>
                        </div>
                        <div class="about--content">
                            <div class="about-item">
                                <div class="about-thumb">
                                    <img src="assets/images/about/contact01.png" alt="about">
                                </div>
                                <div class="about-content">
                                    <h5 class="title">Address</h5>
                                    <p>
                                        <?= $settings->address; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="about-item">
                                <div class="about-thumb">
                                    <img src="assets/images/about/contact02.png" alt="about">
                                </div>
                                <div class="about-content">
                                    <h5 class="title">Phone Number</h5>
                                    <p>
                                        <?= $settings->phoneNumber; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="about-item">
                                <div class="about-thumb">
                                    <img src="assets/images/about/contact03.png" alt="about">
                                </div>
                                <div class="about-content">
                                    <h5 class="title">Email</h5>
                                    <p>
                                       <?= $settings->email; ?><br/> 
                                       <?= $settings->email2; ?><br/> 
                                       <?= $settings->email3; ?><br/> 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======About-Section Ends Here=======-->
        <!--=======Contact-Section Starts Here=======-->
        <section class="contact-section padding-bottom padding-top">
            <div class="container">
                <div class="contact-wrapper padding-top">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-xl-4 offset-xl-1">
                            <div class="contact-header">
                                <h2 class="title">Get in touch</h2>
                                <p>Ready to make life easier?</p>
                            </div>
                            <div class="contact-content">
                                <h3 class="title">Have questions?</h3>
                                <p>
                                    Have questions about payments or price plans? We have answers!
                                </p>
                                <a href="faq">Read F.A.Q <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-5 offset-xl-1">
                            <form class="contact-form" id="contact_form_submit">
                                <div class="form-group">
                                    <label for="name">First name</label>
                                    <input type="text" id="name" placeholder="Enter first name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="surename">Last name</label>
                                    <input type="text" id="surename" placeholder="Enter last name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="text" id="email" placeholder="Enter your email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="message">How can we help</label>
                                    <textarea name="message" id="message" placeholder="Enter Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Send Message">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=38%20Curity%20Ave%2C%20East%20York%2C%20ON%20M4B%200A2%2C%20Canada&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net">insert google map into website</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style></div>
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