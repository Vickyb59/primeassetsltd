<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$payment_type = $_POST['payment_type'];
		$username = $_POST['username'];
		$amount = $_POST['amount'];


		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE hp_transactions SET payment_mode=:payment_mode, username=:username, amount=:amount WHERE id=:id");
			$stmt->execute(['payment_mode'=>$payment_type, 'username'=>$username, 'amount'=>$amount, 'id'=>$id]);
			$_SESSION['success'] = 'Latest withdrawal Info updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit Latest withdrawal Info form first';
	}

	header('location: hp_withdrawals.php');

?>