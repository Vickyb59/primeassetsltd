<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['add'])){
		$payment_type = $_POST['payment_type'];
		$username = $_POST['username'];
		$amount = $_POST['amount'];
		$date = $_POST['date'];


		$conn = $pdo->open();

		

		try{
			$stmt = $conn->prepare("INSERT INTO hp_transactions (payment_mode, username, type, trans_date, amount) VALUES (:payment_mode, :username, :type, :trans_date, :amount)");
			$stmt->execute(['payment_mode'=>$payment_type, 'username'=>$username, 'type'=>1, 'trans_date'=>$date, 'amount'=>$amount]);
			$_SESSION['success'] = 'Latest Deposit Info added successfully';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up Latest Deposit form first';
	}

	header('location: hp_deposits.php');

?>