<?php
	include 'includes/session.php';

	if(isset($_POST['activate'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{

			$now = date('Y-m-d g:i A');

            $sql1 = "INSERT INTO transaction VALUES(
                        NULL,
                        '$id',
                        '$now',
                        '1',
                        '10',
                        'Registration Bonus',
                        '10'
                    )";

                    $conn->query($sql1);

			$stmt = $conn->prepare("UPDATE users SET status=:status WHERE id=:id");
			$stmt->execute(['status'=>1, 'id'=>$id]);
			$_SESSION['success'] = 'User activated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();

	}
	else{
		$_SESSION['error'] = 'Select user to activate first';
	}

	header('location: users.php');
?>