<?php
	include('../inc/config.php');

    if (isset($_GET['loginFailed'])) {
        $message = "Invalid Credentials ! Please try again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

    $page_name = 'Login';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = 'Login to your account...';
    include('inc/head.php');

?>

    <body class="layout-row">
        <div class="flex">
            <div class="w-xl w-auto-sm mx-auto py-5">
                <div class="p-4 d-flex flex-column h-100">

                	

                    <!-- brand -->
                    <a href="<?php echo $baseurl; ?>" class="navbar-brand align-self-center">
                        <img src="../images/logo-gray.png" alt="MI">
                        <!-- <img src="assets/img/logo.png" alt="..."> -->
                    </a>
                    <!-- / brand -->
                </div>
                <div class="card">
                    <div id="content-body">
                        <div class="p-3 p-md-5">
                            <h5>Welcome</h5>
                            <p><small class="text-muted">Login to manage your account</small></p>
                            <form class="" role="form" action="customer_login_action.php" method="post">
                                <div class="form-group">
                                	<label>Username</label>
                                	<input type="text" class="form-control" placeholder="Enter Your Username" name="cust_uname" required />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Enter Password" name="cust_psw" required />
                                    <div class="my-3 text-right">
                                    	<a href="forgot-password" class="text-muted">Forgot password?</a>
                                    </div>
                                </div>
                                <div class="checkbox mb-3">
                                    <label class="ui-check"><input type="checkbox" /><i></i> Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-primary mb-4">Sign in</button>
                                <div>Do not have an account? <a href="../savings" class="text-primary">Open one now</a></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="text-center text-muted">&copy; Copyright. Mannage Investment</div>
            </div>
        </div>
        
        <?php include('inc/scripts.php'); ?>
    </body>
    

</html>
