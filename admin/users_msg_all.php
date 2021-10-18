<?php
	include 'includes/session.php';

	if(isset($_POST['msg_all'])){
		$id = $_POST['id'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];


		$conn = $pdo->open();


		$msg_id = NULL;
		$now = date('Y-m-d g:i A');
        $status = '0';       

		
		try{

			$stmt = $conn->prepare("INSERT INTO direct_message (msg_id, user_id, subject, message, date_sent, status) VALUES (:msg_id, :user_id, :subject, :message, :date_sent, :status)");
			$stmt->execute(['msg_id'=>$msg_id, 'user_id'=>$id, 'subject'=>$subject, 'message'=>$message, 'date_sent'=>$now, 'status'=>0]);
				            
			$_SESSION['success'] = 'Message Sent to All Users Successfully';

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up DM form first';
	}

	header('location: users.php');

?>