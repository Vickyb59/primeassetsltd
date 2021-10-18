<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$timee = $_POST['timee'];
		$datee = $_POST['datee'];
		$comment = $_POST['comment'];

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE review SET name=:name, timee=:timee, datee=:datee, comment=:comment WHERE id=:id");
			$stmt->execute(['name'=>$name, 'timee'=>$timee, 'datee'=>$datee, 'comment'=>$comment, 'id'=>$id]);
			$_SESSION['success'] = 'Review updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit review form first';
	}

	header('location: review.php');

?>