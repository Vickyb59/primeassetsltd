<?php
include "inc/connect.php";

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

<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from mannatthemes.com/dastone/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Dec 2020 21:59:37 GMT -->
<head>
    <meta charset="utf-8" />
    <title><?php echo ($page_name == 'Home') ? $settings->siteTitle. ' | ' .$settings->siteTagline : $page_name. ' | ' .$settings->siteTitle;  ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Dashboard" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.png">

    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">

    <!-- Plugins css -->
    <link href="plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
    <link href="plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <link href="plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />

</head>