<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['add'])){
		$title = $_POST['title'];
		$slug = slugify($title);
		$posted = $_POST['posted'];
		$details = $_POST['details'];
		$short_title = $_POST['title'];
		$short_details = $_POST['details'];
		$filename = $_FILES['photo']['name'];


		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM news WHERE title=:title");
		$stmt->execute(['title'=>$title]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'News already exist';
		}
		else{
			if(!empty($filename)){
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$new_filename = $slug.'.'.$ext;
				move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$new_filename);	
			}
			else{
				$new_filename = '';
			}

			try{
				$stmt = $conn->prepare("INSERT INTO news (title, posted, details, short_title, short_details, photo, slug) VALUES (:title, :posted, :details, :short_title, :short_details, :photo, :slug)");
				$stmt->execute(['title'=>$title, 'posted'=>$posted, 'details'=>$details,  'short_title'=>$short_title,  'short_details'=>$short_details, 'photo'=>$new_filename, 'slug'=>$slug]);
				$_SESSION['success'] = 'News added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up news form first';
	}

	header('location: news.php');

?>