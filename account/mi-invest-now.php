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

		$query = $conn->prepare("SELECT balance FROM passbook".$user_id." ORDER BY trans_id DESC LIMIT 1");
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

		$returns = $invest_amount + ($invest_amount * $invest_rate * $invest_duration/100);

		$start_date = date('Y-m-d');

		$end_date = date('Y-m-d', strtotime ( $start_date .' + '.$invest_duration.' days'));

		$remarks = 'Invested in '.$row0['name'].' plan';

		$new_balance = $user_bal - $invest_amount;

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

						$bquery = $conn->prepare("INSERT INTO passbook".$user_id." (trans_date, remarks, debit, credit, balance, status) VALUES (:start_date, :remarks, :invest_amount, :credit, :new_balance, :b_status)");
						$bquery->execute(['start_date'=>$start_date, 'remarks'=>$remarks, 'invest_amount'=>$invest_amount, 'credit'=>0, 'new_balance'=>$new_balance, 'b_status'=>$b_status]);

						$stmt = $conn->prepare("INSERT INTO investment (invest_plan_id, user_id, capital, returns, current, start_date, end_date, status) VALUES (:plan_id, :user_id, :invest_amount, :returns, :current, :start_date, :end_date, :status)");
						$stmt->execute(['plan_id'=>$plan_id, 'user_id'=>$user_id, 'invest_amount'=>$invest_amount, 'returns'=>$returns, 'current'=>$invest_amount, 'start_date'=>$start_date, 'end_date'=>$end_date, 'status'=>$status]);
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

	header('location: dashboard.php');

?>