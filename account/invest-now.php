<?php
	include 'inc/session.php';
	include '../admin/includes/slugify.php';

	$user_id = $_SESSION['user'];

	if(isset($_POST['invest'])){
		$plan_id = $_POST['plan_id'];
		$invest_amount = $_POST['invest_amount'];
		$status = 'in progress';
		$b_status = 'approved';



		$conn = $pdo->open();

		$query = $conn->prepare("SELECT balance FROM transaction WHERE user_id = $user_id ORDER BY trans_id DESC LIMIT 1");
		$query->execute();
		$row1 = $query->fetch();
		$user_bal = $row1["balance"];
	
		$row = $conn->prepare("SELECT * FROM investment_plans WHERE id=$plan_id");
		$row->execute(['id'=>$plan_id]);
		$row0 = $row->fetch();
		$invest_rate = $row0["rate"];
		$invest_duration = $row0["duration"];
		$min_invest = $row0["min_invest"];
		$max_invest = $row0["max_invest"];

		$returns = $invest_amount + ($invest_amount * $invest_rate /100);

		$start_date = date('Y-m-d H:i:s');

		$end_date = date('Y-m-d H:i:s', strtotime ( $start_date .' + '.$invest_duration.' days'));

		$remarks = 'Invested in '.$row0['name'].' plan';

		$new_balance = $user_bal - $invest_amount;

		$category = $row0['name'];

		$message = 'Current Ongoing investment';

		$act_time = date('Y-m-d h:i A');

		if ($invest_amount > $user_bal) {
			$_SESSION['error'] = 'You have insufficient funds to fund this transaction';
		}
		else{

			if ($invest_amount < $min_invest) {
				$_SESSION['error'] = 'Please select a plan that corresponds with your investment amount';
			}
			else{
				if ($invest_amount > $max_invest) {
					$_SESSION['error'] = 'Please select a higher plan';
				}
				else{
					try{

						$bquery = $conn->prepare("INSERT INTO transaction (user_id, trans_date, type, amount, remark, balance) VALUES (:user_id, :start_date, :type, :invest_amount, :remarks, :new_balance)");
						$bquery->execute(['user_id'=>$user_id, 'start_date'=>$start_date, 'type'=>2, 'invest_amount'=>$invest_amount, 'remarks'=>$remarks, 'new_balance'=>$new_balance]);

						$stmt = $conn->prepare("INSERT INTO investment (invest_plan_id, user_id, capital, returns, current, start_date, end_date, status) VALUES (:plan_id, :user_id, :invest_amount, :returns, :current, :start_date, :end_date, :status)");
						$stmt->execute(['plan_id'=>$plan_id, 'user_id'=>$user_id, 'invest_amount'=>$invest_amount, 'returns'=>$returns, 'current'=>$invest_amount + 1, 'start_date'=>$start_date, 'end_date'=>$end_date, 'status'=>$status]);

						$activity = $conn->prepare("INSERT INTO activity (user_id, message, category, date_sent) VALUES (:user_id, :message, :category, :start_date)");
						$activity->execute(['user_id'=>$user_id, 'message'=>$message, 'category'=>$category, 'start_date'=>$act_time]);
						$_SESSION['success'] = 'You have successfully invested';

					}
					catch(PDOException $e){
						$_SESSION['error'] = $e->getMessage();
					}

				}
			}



		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up Latest Deposit form first';
	}

	header('location: investments.php');

?>