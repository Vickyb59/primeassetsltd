<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from pixner.net/hyipland/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Nov 2020 21:28:58 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php echo $page_description; ?>" />
    <meta name="keywords" content="<?php echo $settings->siteTitle ?>, Secure Investment, Online Investment, Trusted Online Investment, Long Term Online Investment, 100% Secure Online Business, Top Online Investment Company, Invest and Earn on Daily Basis, Online Investment Services, Investment, Invest with us, Invest with 100% Guaranty, Money Back Guaranty, Hot Investment Company, Risk Free Online Investment, Forex Trading, Forex, Stock Exchange, Invest in Forex Trading, Invest in Stock Exchange Markets, Invest in Multinational Companies, Minimum Invest $100, Start Online Investment Just in $100, Daily earn Daily Withdraw, Minimum Withdraw $5.10">

    <title><?php echo ($page_name == 'Home') ? $settings->siteTitle. ' | ' .$settings->siteTagline : $page_name. ' | ' .$settings->siteTitle;  ?></title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/odometer.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/owl.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
</head>


<?php

require_once("admin/includes/conn.php");

$conn = $pdo->open();

$newQuery = $conn->query("SELECT * from news order by 1 desc limit 3");
if ($newQuery->rowCount()) {
   $news = $newQuery->fetchAll(PDO::FETCH_OBJ);
}

$investment_planQuery = $conn->query("SELECT * from investment_plans order by 1 asc");
if ($investment_planQuery->rowCount()) {
   $investment_plans = $investment_planQuery->fetchAll(PDO::FETCH_OBJ);
}

$depositQuery = $conn->query("SELECT * from hp_transactions WHERE type=1 order by 1 DESC limit 8");
if ($depositQuery->rowCount()) {
   $deposits = $depositQuery->fetchAll(PDO::FETCH_OBJ);
}

$withdrawalQuery = $conn->query("SELECT * from hp_transactions WHERE type=2 order by 1 DESC limit 8");
if ($withdrawalQuery->rowCount()) {
   $withdrawals = $withdrawalQuery->fetchAll(PDO::FETCH_OBJ);
}

$investmentQuery = $conn->query("SELECT *, users.uname AS username from investment LEFT JOIN users ON users.id = investment.user_id LEFT JOIN investment_plans ON investment_plans.id = investment.invest_plan_id ORDER BY 1 DESC limit 8");
if ($investmentQuery->rowCount()) {
   $investments = $investmentQuery->fetchAll(PDO::FETCH_OBJ);
}

$blockchaintxQuery = $conn->query("SELECT * from blockchaintx order by RAND() desc limit 10");
if ($blockchaintxQuery->rowCount()) {
   $blockchaintxs = $blockchaintxQuery->fetchAll(PDO::FETCH_OBJ);
}

function substrwords($text, $maxchar, $end='...') {
   if (strlen($text) > $maxchar || $text == '') {
       $words = preg_split('/\s/', $text);      
       $output = '';
       $i      = 0;
       while (1) {
           $length = strlen($output)+strlen($words[$i]);
           if ($length > $maxchar) {
               break;
           } 
           else {
               $output .= " " . $words[$i];
               ++$i;
           }
       }
       $output .= $end;
   } 
   else {
       $output = $text;
   }
   return $output;
}

?>