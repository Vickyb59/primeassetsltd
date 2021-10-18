<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$title = $_POST['title'];
		$posted = $_POST['posted'];
		$details = $_POST['details'];
		$short_title = $_POST['short_title'];
		$short_details = $_POST['short_details'];

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE news SET title=:title, posted=:posted, details=:details, short_title=:short_title, short_details=:short_details WHERE id=:id");
			$stmt->execute(['title'=>$title, 'posted'=>$posted, 'details'=>$details, 'short_title'=>$short_title, 'short_details'=>$short_details, 'id'=>$id]);
			$_SESSION['success'] = 'news updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit news form first';
	}

	header('location: news.php');

?>