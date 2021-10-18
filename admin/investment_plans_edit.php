<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$duration = $_POST['duration'];
		$rate = $_POST['rate'];
		$min_invest = $_POST['min_invest'];
		$max_invest = $_POST['max_invest'];

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE investment_plans SET name=:name, duration=:duration, rate=:rate, min_invest=:min_invest, max_invest=:max_invest WHERE id=:id");
			$stmt->execute(['name'=>$name, 'duration'=>$duration, 'rate'=>$rate, 'min_invest'=>$min_invest, 'max_invest'=>$max_invest, 'id'=>$id]);
			$_SESSION['success'] = 'Investment plan updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit Investment plan form first';
	}

	header('location: investment_plans.php');

?>