<?php
	include 'includes/session.php';

	if(isset($_POST['msg'])){
		$id = $_POST['id'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];


		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();



		if($row['numrows'] > 0){

			$msg_id = NULL;
			$now = date('Y-m-d g:i A');
            $status = '0';    

			$act_time = date('Y-m-d h:i A');   

			
			try{

				$stmt = $conn->prepare("INSERT INTO direct_message (msg_id, user_id, subject, message, date_sent, status) VALUES (:msg_id, :user_id, :subject, :message, :date_sent, :status)");
				$stmt->execute(['msg_id'=>$msg_id, 'user_id'=>$id, 'subject'=>$subject, 'message'=>$message, 'date_sent'=>$now, 'status'=>0]);

				$activity = $conn->prepare("INSERT INTO activity (user_id, message, category, date_sent) VALUES (:user_id, :message, :category, :start_date)");
				$activity->execute(['user_id'=>$id, 'message'=>'You have 1 new message', 'category'=>'Inbox', 'start_date'=>$act_time]);
					            
				$_SESSION['success'] = 'Message Sent Successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up DM form first';
	}

	header('location: users.php');

?>