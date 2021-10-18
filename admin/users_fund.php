<?php
	include 'includes/session.php';

	if(isset($_POST['fund'])){
		$id = $_POST['id'];
		$amt = $_POST['amount'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();



		if($row['numrows'] > 0){

			$stmt = $conn->prepare("SELECT balance FROM transaction WHERE user_id = $id ORDER BY trans_id DESC LIMIT 1");
				$stmt->execute();
				$row2 = $stmt->fetch();
				$receiver_balance = $row2["balance"];

				$trans_id = NULL;
				$trans_date = date('Y-m-d g:i A');
				$remarks = 'Amount of '.$amt.' was deposited successfully';
	            $type = '1';
	            $balance = $receiver_balance + $amt;

				$act_time = date('Y-m-d h:i A');
	            

			
			try{

				$stmt = $conn->prepare("INSERT INTO transaction (trans_id, user_id, trans_date, type, amount, remark, balance) VALUES (:trans_id, :user_id, :trans_date, :type, :amount, :remark, :balance)");
				$stmt->execute(['trans_id'=>$trans_id, 'user_id'=>$id, 'trans_date'=>$trans_date, 'type'=>$type, 'amount'=>$amt, 'remark'=>$remarks, 'balance'=>$balance]);

				$activity = $conn->prepare("INSERT INTO activity (user_id, message, category, date_sent) VALUES (:user_id, :message, :category, :start_date)");
				$activity->execute(['user_id'=>$id, 'message'=>$remarks, 'category'=>'Deposit', 'start_date'=>$act_time]);
					            
				$_SESSION['success'] = 'Amount deposited successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up deposit form first';
	}

	header('location: users.php');

?>