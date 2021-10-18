

<div class="left-sidenav">
    <!-- LOGO -->
    <div class="brand">
        <a href="<?php echo $baseurl ?>" class="logo">
            <span>
                <img height="150%" src="../assets/images/logo/logo2.png" alt="royal-logo" class="logo-big">
            </span>
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <ul class="metismenu left-sidenav-menu">
            <li class="menu-label mt-0">Main</li>
            <li>
                <a href="dashboard"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Dashboard</span></a>
            </li>

            <hr class="hr-dashed hr-menu">
            <li class="menu-label my-2">Info</li>


            <li>
                <a href="investments"><i data-feather="bar-chart" class="align-self-center menu-icon"></i><span>Plans</span></a>
            </li>


            <li>
                <a href="deposits"><i data-feather="credit-card" class="align-self-center menu-icon"></i><span>Deposit Funds</span></a>
            </li>


            <li>
                <a href="withdrawals"><i data-feather="briefcase" class="align-self-center menu-icon"></i><span>Withdraw Funds</span></a>
            </li>


            <hr class="hr-dashed hr-menu">
            <li class="menu-label my-2">Account & Settings</li>

            <li>
                <a href="referrals"><i data-feather="git-merge" class="align-self-center menu-icon"></i><span>Referrals</span></a>
            </li>


            <li>
                <a href="profile"><i data-feather="user" class="align-self-center menu-icon"></i><span>Profile</span></a>
            </li>


            <li>
                <a href="messages"><i data-feather="inbox" class="align-self-center menu-icon"></i><span>Inbox</span></a>
            </li>


            <li>
                <a href="password-update"><i data-feather="lock" class="align-self-center menu-icon"></i><span>Change Password</span></a>
            </li>       


            <li>
                <a href="../contact"><i data-feather="life-buoy" class="align-self-center menu-icon"></i><span>Contact Support</span></a>
            </li>


            <li>
                <a href="logout_action"><i data-feather="log-out" class="align-self-center menu-icon"></i><span>Logout</span></a>
            </li>
        </ul>

        <div class="bitcoin-converter mt-40">
            <script src="assets/js/forbit/calc_widget.js"></script>
        </div>

        <div class="update-msg text-center">
            <a href="javascript: void(0);" class="float-right close-btn text-muted" data-dismiss="update-msg" aria-label="Close" aria-hidden="true">
                <i class="mdi mdi-close"></i>
            </a>
            <h5 class="mt-3"><?php echo $settings->siteTitle; ?></h5>
            <p class="mb-3"><?php echo $settings->siteTagline; ?></p>
        </div>
    </div>
</div>