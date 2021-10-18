<?php
    include('inc/config.php');

    include 'admin/session.php';

    if(isset($_SESSION['user'])){
      header('location: account/dashboard.php');
   }

    $page_name = 'Account Activation';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = $settings->siteTitle.' provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';
    include('inc/head.php');

    $output = '';
    if(!isset($_GET['code']) OR !isset($_GET['user'])){
        $output .= '
            <h1 class="font-size-sl-72 font-weight-light mb-3">Error!</h1>
            <p class="text-gray-90 font-size-20 mb-0 font-weight-light">Code to activate account not found. Please <a href="register.php">Register</a></p>
        '; 
    }
    else{
        $conn = $pdo->open();

        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE activate_code=:code AND id=:id");
        $stmt->execute(['code'=>$_GET['code'], 'id'=>$_GET['user']]);
        $row = $stmt->fetch();

        if($row['numrows'] > 0){
            if($row['status']){
                $output .= '
                    <h1 class="font-size-sl-72 font-weight-light mb-3">Error!</h1>
                    <p class="text-gray-90 font-size-20 mb-0 font-weight-light">Account already activated. Please <a href="login.php">Login</a></p>
                ';
            }
            else{
                try{

                    $id = $_GET['user'];

                    $now = date('Y-m-d g:i A');

                    $sql4 = "INSERT INTO transaction VALUES(
                                NULL,
                                '$id',
                                '$now',
                                '1',
                                '5',
                                'Welcome Bonus',
                                '5'
                            )";

                            $conn->query($sql4);

                    $stmt = $conn->prepare("UPDATE users SET status=:status WHERE id=:id");
                    $stmt->execute(['status'=>1, 'id'=>$row['id']]);
                    $output .= '
                        <h1 class="font-size-sl-72 font-weight-light mb-3">Success!</h1>
                        <p class="text-gray-90 font-size-20 mb-0 font-weight-light">Account activated - Email: <b>'.$row['email'].'</b>. You may <a href="login.php">Login</a></p>
                    ';


                }
                catch(PDOException $e){
                    $output .= '
                        <h1 class="font-size-sl-72 font-weight-light mb-3">Error!</h1>
                        <p class="text-gray-90 font-size-20 mb-0 font-weight-light">'.$e->getMessage().' Please <a href="register.php">signup</a></p>
                    ';
                }

            }
            
        }
        else{
            $output .= '
                <h1 class="font-size-sl-72 font-weight-light mb-3">Error!</h1>
                <p class="text-gray-90 font-size-20 mb-0 font-weight-light">Cannot activate account. Wrong code. Please <a href="register.php">signup</a></p>
            ';
        }

        $pdo->close();
    }

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
                    <h1 class="title">Account Activation</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="<?= $baseurl ?>">Home</a>
                        </li>
                        <li>
                            Account Activation
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!--=======Banner-Section Ends Here=======-->


        <!--=======Contact-Section Starts Here=======-->
        <section class="contact-section padding-bottom padding-top">
            <div class="container text-center">
                <?php echo $output; ?>
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