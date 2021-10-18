<?php
	include('../inc/config.php');
    include 'session.php';

    if(isset($_SESSION['user'])){
      header('location: ../account/dashboard.php');
   }

    
    $page_name = 'Login';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = 'Login to your account...';

?>

<!DOCTYPE html>
<html lang="en">
    <!-- Mirrored from flatfull.com/themes/basik/html/signin.1.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Mar 2020 23:13:27 GMT -->
    <head>
        <meta charset="utf-8" />
        <title><?php echo ($page_name == 'Home') ? $settings->siteTitle. ' | ' .$settings->siteTagline : $page_name. ' | ' .$settings->siteTitle;  ?></title>
        <meta name="description" content="<?php echo $page_description; ?>" />
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
        <!-- style -->
        
        <link rel="stylesheet" href="../account/dist/simple-calendar.css">
        <link rel="stylesheet" href="../account/assets/demo.css">
        <link rel="stylesheet" href="../account/assets/css/site.min.css" />
    </head>

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
                            <?php
                                            if(isset($_SESSION['error'])){
                                              echo "
                                                <div class='callout callout-danger text-center'>
                                                  <p>".$_SESSION['error']."</p> 
                                                </div>
                                              ";
                                              unset($_SESSION['error']);
                                            }
                                            if(isset($_SESSION['success'])){
                                              echo "
                                                <div class='callout callout-success text-center'>
                                                  <p>".$_SESSION['success']."</p> 
                                                </div>
                                              ";
                                              unset($_SESSION['success']);
                                            }
                                          ?>
                            <form class="" role="form" action="verify.php" method="post">
                                <div class="form-group">
                                	<label>Email</label>
                                	<input type="text" class="form-control" placeholder="Enter Your Email" name="email" required />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Enter Password" name="password" required />
                                    <div class="my-3 text-right">
                                    	<a href="forgot-password" class="text-muted">Forgot password?</a>
                                    </div>
                                </div>
                                <div class="checkbox mb-3">
                                    <label class="ui-check"><input type="checkbox" /><i></i> Remember me</label>
                                </div>
                                <button type="submit" name="login" class="btn btn-primary mb-4">Sign in</button>
                                <div>Do not have an account? <a href="../register.php" class="text-primary">Open one now</a></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="text-center text-muted">&copy; Copyright. Manage Investment</div>
            </div>
        </div>
        
        <script src="../account/assets/js/site.min.js"></script>
    </body>
    

</html>
