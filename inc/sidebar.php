<section class="hidden-sidebar side-navigation">
    <a href="#" class="close-button side-navigation-close-btn fa fa-times"></a><!-- /.close-button -->
    <div class="sidebar-content">
        <div class="top-content">
            <a href="<?php echo $baseurl; ?>"><img src="img/favicon/logo1-1.png" alt="Logo Image"/></a>
        </div><!-- /.top-content -->
        <nav class="nav-menu middle-content">
            <ul class="navigation-box">
                <li <?php echo ( $page_name == 'Home' || $page_parent == 'Home') ? 'class="current"' : ''; ?>> 
                    <a href="<?php echo $baseurl; ?>">Home</a>
                </li>
                <li <?php echo ( $page_name == 'About Us' || $page_parent == 'About Us') ? 'class="current"' : ''; ?>> <a href="about">About Us</a> </li>
                <li<?php echo ( $page_name == 'Shipping' || $page_parent == 'Shipping') ? 'class="current"' : ''; ?>> 
                    <a href="#">Shipping</a> 
                    <ul class="sub-menu">
                        <li><a href="create-shipment">Create A Shipment</a></li>
                        <li><a href="schedule-pickup">Schedule A Pickup</a></li>
                        <li><a href="international-shipping-guide">International Shipping Guide</a></li>
                        <li><a href="in-store-shipping-services">In-Store Shipping Services</a></li>
                    </ul><!-- /.sub-menu -->
                </li>
                <li <?php echo ( $page_name == 'Tracking' || $page_parent == 'Tracking') ? 'class="current"' : ''; ?>> 
                    <a href="#">Tracking</a> 
                    <ul class="sub-menu">
                        <li> <a href="track-shipment">Track A Shipment</a> </li>
                        <li> <a href="track-shipment">Advanced Shipment Tracking</a> </li>
                    </ul><!-- /.sub-menu -->
                </li>
                <li <?php echo ( $page_name == 'Support' || $page_parent == 'Support') ? 'class="current"' : ''; ?>> 
                    <a href="#">Support</a> 
                    <ul class="sub-menu">
                        <li> <a href="all-location">New Customer Center</a> </li>
                        <li> <a href="service-guide">Dista Service Guide</a> </li>
                        <li> <a href="contact">File A Claim</a> </li>
                        <li> <a href="customer-support">Customer Support</a> </li>
                    </ul><!-- /.sub-menu -->
                </li>
                <li <?php echo ( $page_name == 'Contact Us' || $page_parent == 'Contact Us') ? 'class="current"' : ''; ?>> <a href="contact">Contact Us</a> 
                </li>
            </ul>
        </nav><!-- /.nav-menu -->
        <div class="bottom-content">
            <div class="social">
                <a href="#" class="fab fa-facebook-f"></a><!--
                --><a href="#" class="fab fa-twitter"></a><!--
                --><a href="#" class="fab fa-google-plus-g"></a><!--
                --><a href="#" class="fab fa-instagram"></a><!--
                --><a href="#" class="fab fa-behance"></a>
            </div><!-- /.social -->
            <p class="copy-text">&copy; <?php echo $year; ?> <?php echo $settings->siteTitle; ?>. <br /> made with <i class="fa fa-heart"></i> by Rael Tech</p><!-- /.copy-text -->
        </div><!-- /.bottom-content -->
    </div><!-- /.sidebar-content -->
</section><!-- /.hidden-sidebar -->



<div class="search_area zoom-anim-dialog mfp-hide" id="test-search">
    <div class="search_box_inner">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button"><i class="fas fa-search"></i></button>
            </span>
        </div>
    </div>
</div>