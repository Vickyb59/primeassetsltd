<?php
    include('inc/config.php');

    $page_name = 'Terms and Conditions';
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
                    <h1 class="title">Terms and Conditions</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="<?= $baseurl ?>">Home</a>
                        </li>
                        <li>
                            Terms and Conditions
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!--=======Banner-Section Ends Here=======-->


        <!--=======Contact-Section Starts Here=======-->
        <section class="contact-section padding-bottom padding-top">
            <div class="container">
                <h4>Please read the following rules carefully before registration.</h4><br/>

                <p>You agree to be of legal age in your country to partake in this program, and in all the cases your minimal age must be 18 years.</p>

                <p><?php echo $settings->siteTitle; ?> is not available to the general public and is opened only to the qualified members of <?php echo $settings->siteTitle; ?>, the use of this site is restricted to our members and to individuals personally invited by them. Every deposit is considered to be a private transaction between the <?php echo $settings->siteTitle; ?> and its Member.</p>

                <p>We are not FDIC insured. We are not a licensed bank or a security firm.</p>

                <p>You agree that all information, communications, materials coming from <?php echo $settings->siteTitle; ?> are unsolicited and must be kept private, confidential and protected from any disclosure. Moreover, the information, communications and materials contained herein are not to be regarded as an offer, nor a solicitation for investments in any jurisdiction which deems non-public offers or solicitations unlawful, nor to any person to whom it will be unlawful to make such offer or solicitation.</p>

                <p>All the data giving by a member to <?php echo $settings->siteTitle; ?> will be only privately used and not disclosed to any third parties. <?php echo $settings->siteTitle; ?> is not responsible or liable for any loss of data.</p>

                <p>You agree to hold all principals and members harmless of any liability. You are investing at your own risk and you agree that a past performance is not an explicit guarantee for the same future performance. You agree that all information, communications and materials you will find on this site are intended to be regarded as an informational and educational matter and not an investment advice.</p>

                <p>We reserve the right to change the rules, commissions and rates of the program at any time and at our sole discretion without notice, especially in order to respect the integrity and security of the members' interests. You agree that it is your sole responsibility to review the current terms.</p>

                <p><?php echo $settings->siteTitle; ?> is not responsible or liable for any damages, losses and costs resulting from any violation of the conditions and terms and/or use of our website by a member. You guarantee to <?php echo $settings->siteTitle; ?> that you will not use this site in any illegal way and you agree to respect your local, national and international laws.</p>

                <p>Don't post bad vote on Public Forums and at Gold Rating Site without contacting the administrator of our program FIRST. Maybe there was a technical problem with your transaction, so please always CLEAR the thing with the administrator.</p>

                <p>We will not tolerate SPAM or any type of UCE in this program. SPAM violators will be immediately and permanently removed from the program.</p>

                <p><?php echo $settings->siteTitle; ?> reserves the right to accept or decline any member for membership without explanation.</p>

                <p>If you do not agree with the above disclaimer, please do not go any further.</p>
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