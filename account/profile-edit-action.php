<?php
	include 'inc/session.php';
	include '../admin/includes/slugify.php';

	$user_id = $_SESSION['user'];

	if(isset($_POST['update'])){
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$nationality = $_POST['nationality'];
		$phone_no = $_POST['phone_no'];
		$photo = $_FILES['photo']['name'];

		$conn = $pdo->open();

		$date_view = date('Y-m-d');

		$act_time = date('Y-m-d h:i A');

		if(!empty($photo)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../admin/images/'.$photo);
			$filename = $photo;	
		}
		else{
			$filename = $user['photo'];
		}

		try{

			$stmt = $conn->prepare("UPDATE users SET gender=:gender, dob=:dob, nationality=:nationality, phone_no=:phone_no, photo=:photo WHERE id=:id");
			$stmt->execute(['gender'=>$gender, 'dob'=>$dob, 'nationality'=>$nationality, 'phone_no'=>$phone_no, 'photo'=>$filename, 'id'=>$user_id]);

			$activity = $conn->prepare("INSERT INTO activity (user_id, message, category, date_sent) VALUES (:user_id, :message, :category, :start_date)");
			$activity->execute(['user_id'=>$user_id, 'message'=>'You updated your profile', 'category'=>'Info', 'start_date'=>$act_time]);

			$_SESSION['success'] = 'Profile Setup Completed';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'You are not doing something right';
	}

	header('location: profile.php');

?>