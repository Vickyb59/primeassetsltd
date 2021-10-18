<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <ul class="support-area">
                        <li>
                            <a href="contact"><i class="flaticon-support"></i>Support</a>
                        </li>
                        <li>
                            <a href="mailto:<?php echo $settings->email; ?>"><i class="flaticon-email"></i><?php echo $settings->email; ?></a>
                        </li>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="cart-area">
                        <li <?php echo ( $page_name == 'Login' || $page_parent == 'Login' ) ? 'class="active"' : ''; ?>>
                            <a href="login">Sign In</a>
                        </li>
                        <li>
                            <i class="flaticon-globe"></i>
                            <div class="select-area">
                                <?php include('inc/translate.php'); ?>
                            </div>
                        </li>
                    </ul>                    
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="header-area">
                <div class="logo">
                    <a href="<?= $baseurl; ?>">
                        <img src="assets/images/logo/logo.png" alt="logo">
                    </a>
                </div>
                <ul class="menu">
                    <li <?php echo ( $page_name == 'Home' || $page_parent == 'Home' ) ? 'class="active"' : ''; ?>>
                        <a href="<?= $baseurl; ?>">Home</a>
                    </li>
                    <li <?php echo ( $page_name == 'About Us' || $page_parent == 'About Us' ) ? 'class="active"' : ''; ?>>
                        <a href="about">About</a>
                    </li>
                    <li <?php echo ( $page_name == 'Affiliate' || $page_parent == 'Affiliate' ) ? 'class="active"' : ''; ?>>
                        <a href="affiliate">Affiliate</a>
                    </li>
                    <li <?php echo ( $page_name == 'Investment Plan' || $page_parent == 'Investment Plan' ) ? 'class="active"' : ''; ?>>
                        <a href="investment">Plan</a>
                    </li>
                    <li <?php echo ( $page_name == 'FAQ' || $page_parent == 'FAQ' ) ? 'class="active"' : ''; ?>>
                        <a href="faq">Faqs</a>
                    </li>
                    <li <?php echo ( $page_name == 'Contact Us' || $page_parent == 'Contact Us' ) ? 'class="active"' : ''; ?>>
                        <a href="contact">Contact</a>
                    </li>
                    
                    <li class="pr-0">
                        <a href="register" class="custom-button">Join Us</a>
                    </li>
                </ul>
                <div class="header-bar d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</header>