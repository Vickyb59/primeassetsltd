<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$full_name = $_POST['full_name'];
		$uname = $_POST['uname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$nationality = $_POST['nationality'];
		$phone_no = $_POST['phone_no'];
		$type = $_POST['type'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email=:email");
		$stmt->execute(['email'=>$email]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Email already taken';
		}
		else{
			$password = password_hash($password, PASSWORD_DEFAULT);
			$filename = $_FILES['photo']['name'];
			$now = date('Y-m-d');
			if(!empty($filename)){
				move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$filename);	
			}
			try{
				$stmt = $conn->prepare("INSERT INTO users (email, password, full_name, uname, nationality, phone_no, photo, status, type, created_on) VALUES (:email, :password, :full_name, :uname, :nationality, :phone_no, :photo, :status, :type, :created_on)");
				$stmt->execute(['email'=>$email, 'password'=>$password, 'full_name'=>$full_name, 'uname'=>$uname, 'nationality'=>$nationality, 'phone_no'=>$phone_no, 'photo'=>$filename, 'status'=>1, 'type'=>$type, 'created_on'=>$now]);
				$_SESSION['success'] = 'User added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up user form first';
	}

	header('location: users.php');

?>