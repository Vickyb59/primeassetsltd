<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$full_name = $_POST['full_name'];
		$uname = $_POST['uname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$nationality = $_POST['nationality'];
		$phone_no = $_POST['phone_no'];

		$conn = $pdo->open();
		$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();

		if($password == $row['password']){
			$password = $row['password'];
		}
		else{
			$password = password_hash($password, PASSWORD_DEFAULT);
		}

		try{
			$stmt = $conn->prepare("UPDATE users SET email=:email, password=:password, full_name=:full_name, uname=:uname, nationality=:nationality, phone_no=:phone_no WHERE id=:id");
			$stmt->execute(['email'=>$email, 'password'=>$password, 'full_name'=>$full_name, 'uname'=>$uname, 'nationality'=>$nationality, 'phone_no'=>$phone_no, 'id'=>$id]);
			$_SESSION['success'] = 'User updated successfully';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit user form first';
	}

	header('location: users.php');

?>