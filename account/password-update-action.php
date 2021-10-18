<?php
    include('../inc/config.php');
    include('../admin/session.php');

    $page_name = 'Password Change';
    $page_parent = '';
    $page_title = 'Welcome to the Official Website of '.$settings->siteTitle;
    $page_description = 'Manage Investment provides quality infrastructure backed high-performance cloud computing services for cryptocurrency mining. Choose a plan to get started today! What are you waiting for? Together We Grow!...';

    include('inc/head.php');

    $id = $_SESSION['user'];
    $old_pwd = mysqli_real_escape_string($conne, $_POST["old_pwd"]);
    $new_pwd = mysqli_real_escape_string($conne, $_POST["new_pwd"]);
    $check_pwd = mysqli_real_escape_string($conne, $_POST["check_pwd"]);

    $act_time = date('Y-m-d h:i A');

    if(password_verify($old_pwd, $user['password'])){

        $new_pwd = password_hash($new_pwd, PASSWORD_DEFAULT);

        $sql1 = "UPDATE users SET password = '$new_pwd' WHERE id=".$id;

        $activity = $conn->prepare("INSERT INTO activity (user_id, message, category, date_sent) VALUES (:user_id, :message, :category, :start_date)");
        $activity->execute(['user_id'=>$id, 'message'=>'You changed your password', 'category'=>'Security', 'start_date'=>$act_time]);
            
        if (($conne->query($sql1) === TRUE)) {
            $_SESSION['success'] = 'Password updated successfully';
        }
        else {
            $_SESSION['error'] = 'Error in Connection';
        }
    }
    else {
        $_SESSION['error'] = 'Password not correct';
    }

    header('location: dashboard.php');
?>