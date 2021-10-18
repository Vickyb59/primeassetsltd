<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$slug = slugify($name);
		$timee = $_POST['time'];
		$datee = $_POST['date'];
		$comment = $_POST['comment'];
		$filename = $_FILES['photo']['name'];


		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM review WHERE name=:name");
		$stmt->execute(['name'=>$name]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Customer review already exist';
		}
		else{
			if(!empty($filename)){
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$new_filename = $slug.'.'.$ext;
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$new_filename);	
			}
			else{
				$new_filename = '';
			}

			try{
				$stmt = $conn->prepare("INSERT INTO review (name, timee, datee, comment, photo) VALUES (:name, :timee, :datee, :comment, :photo)");
				$stmt->execute(['name'=>$name, 'timee'=>$timee, 'datee'=>$datee,  'comment'=>$comment, 'photo'=>$new_filename]);
				$_SESSION['success'] = 'Review added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up review form first';
	}

	header('location: review.php');

?>