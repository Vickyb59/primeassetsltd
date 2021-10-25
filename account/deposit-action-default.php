<?php
	include 'inc/session.php';
	include '../admin/includes/slugify.php';

	$user_id = $_SESSION['user'];

	if(isset($_POST['complete'])){
		$deposit_amount = $_POST['deposit_amount'];
		$payment_mode = $_POST['payment_mode'];
		$status = 'pending';



		$conn = $pdo->open();

		$trans_date = date('Y-m-d');

		$act_time = date('Y-m-d h:i A');

			try{

				$stmt = $conn->prepare("INSERT INTO request (user_id, trans_date, type, amount, status) VALUES (:user_id, :trans_date, :type, :deposit_amount, :status)");
				$stmt->execute(['user_id'=>$user_id, 'trans_date'=>$trans_date, 'type'=>1, 'deposit_amount'=>$deposit_amount, 'status'=>$status]);

				$activity = $conn->prepare("INSERT INTO activity (user_id, message, category, date_sent) VALUES (:user_id, :message, :category, :start_date)");
				$activity->execute(['user_id'=>$user_id, 'message'=>'You made a deposit request of $'.$deposit_amount, 'category'=>'Deposit Request', 'start_date'=>$act_time]);

				$_SESSION['success'] = 'Your request has been sent and you will be contacted on how to proceed shortly';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Make Sure all Fields are filled';
	}

	header('location: deposits.php');

?>