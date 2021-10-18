<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$duration = $_POST['duration'];
		$rate = $_POST['rate'];
		$min_invest = $_POST['min_invest'];
		$max_invest = $_POST['max_invest'];


		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM investment_plans WHERE name=:name");
		$stmt->execute(['name'=>$name]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Investment Plan already exist';
		}
		else{

			try{
				$stmt = $conn->prepare("INSERT INTO investment_plans (name, duration, rate, min_invest, max_invest) VALUES (:name, :duration, :rate, :min_invest, :max_invest)");
				$stmt->execute(['name'=>$name, 'duration'=>$duration, 'rate'=>$rate,  'min_invest'=>$min_invest, 'max_invest'=>$max_invest]);
				$_SESSION['success'] = 'Investment plan added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up investment plan form first';
	}

	header('location: investment_plans.php');

?>