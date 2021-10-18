<?php
    include('inc/config.php');
    include('admin/includes/format.php');

    $page_name = 'Payouts';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = $settings->siteTitle.' provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';
    include('inc/head.php');



    $blockchaintxpoutQuery = $conn->query("SELECT * from blockchaintx order by RAND() desc");
    if ($blockchaintxpoutQuery->rowCount()) {
       $blockchaintxspout = $blockchaintxpoutQuery->fetchAll(PDO::FETCH_OBJ);
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
        <section class="bg_img hero-section-2" data-background="assets/images/about/hero-bg2.jpg">
            <div class="container">
                <div class="hero-content text-white">
                    <h1 class="title">Payouts</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="<?= $baseurl; ?>">Home</a>
                        </li>
                        <li>
                            Payouts
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hero-shape">
                <img class="wow slideInUp" src="assets/images/about/hero-shape1.png" alt="about" data-wow-duration="1s">
            </div>
        </section>
        <!--=======Banner-Section Ends Here=======-->


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
                               Payouts
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center feature-wrapper">
                    <div class="col-md-12 col-sm-10 col-lg-12">
                        <div class="feature-item">
                            <?php
                                if(!empty($blockchaintxspout)){ ?>

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
                                        foreach ($blockchaintxspout as $btx) : ?>
                                          
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
        </section>
        <!--=======Feature-Section Ends Here=======-->
        
        <!-- ==========Footer-Section Starts Here========== -->
        <?php include('inc/footer.php') ?>
        <!-- ==========Footer-Section Ends Here========== -->

        
    </div>

    <?php include('inc/scripts.php') ?>
</body>


<!-- Mirrored from <?= $settings->siteTitle ?> by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Nov 2020 21:30:26 GMT -->
</html>