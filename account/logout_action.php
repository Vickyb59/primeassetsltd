<?php

    include('../inc/config.php');
    include('inc/session.php');


    $id = $_SESSION['user'];
    //set login time
    
    $stmt = "UPDATE users set date_view=NOW() WHERE id='".$id."'";
    mysqli_query($conne, $stmt);
    $_SESSION['user'] = $id;

    session_destroy();



    header('location: ../login.php');

?>