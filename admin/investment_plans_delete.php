<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM investment_plans WHERE id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'Investment Plan deleted successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select Investment Plan to delete first';
	}

	header('location: investment_plans.php');
	
?>