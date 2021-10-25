<?php
	include('../inc/config.php');

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	include 'inc/session.php';
	include '../admin/includes/slugify.php';

	$user_id = $_SESSION['user'];

	$stmt = $conn->prepare("SELECT * FROM users WHERE id=:user_id");
	$stmt->execute(['user_id'=>$user_id]);
	$row = $stmt->fetch();
	$investor_email = $row['email'];
	$investor_name = $row['full_name'];

	if(isset($_POST['complete'])){
		$withdrawal_amount = $_POST['withdrawal_amount'];
		$payment_mode = $_POST['payment_mode'];
		$status = 'pending';



		$conn = $pdo->open();

		$trans_date = date('Y-m-d');

		$act_time = date('Y-m-d h:i A');

			try{

				$stmt = $conn->prepare("INSERT INTO request (user_id, trans_date, type, amount, status) VALUES (:user_id, :trans_date, :type, :withdraw_amount, :status)");
				$stmt->execute(['user_id'=>$user_id, 'trans_date'=>$trans_date, 'type'=>2, 'withdraw_amount'=>$withdrawal_amount, 'status'=>$status]);

				$activity = $conn->prepare("INSERT INTO activity (user_id, message, category, date_sent) VALUES (:user_id, :message, :category, :start_date)");
				$activity->execute(['user_id'=>$user_id, 'message'=>'You made a withdrawal request of $'.$withdrawal_amount, 'category'=>'Withdrawal Request', 'start_date'=>$act_time]);

				$message = "
					<div id='_rc_sig'>
					    <div id=':or' class='ii gt'>
					        <div id=':oq' class='a3s aiL msg4873022159957722792'>
					            <div id='m_4873022159957722792body' class='m_4873022159957722792body' style='background-color: #f3f2f1; margin: 0; padding: 0;'>
					                <div style='font-family: Helvetica Neue, Helvetica, Roboto, Arial, sans-serif; direction: ltr;'>
					                    <table class='m_4873022159957722792main' border='0' width='100%' cellspacing='0' cellpadding='0' bgcolor='#F3F2F1'>
					                        <tbody>
					                            <tr>
					                                <td class='m_4873022159957722792outer-box' style='padding: 0 8px;' align='center' bgcolor='#F3F2F1'>
					                                    <table style='max-width: 600px; padding: 0 0 15px 0;' border='0' width='100%' cellspacing='0' cellpadding='0'>
					                                        <tbody>
					                                            <tr>
					                                                <td style='padding: 10px 0 13px 0;' align='left'>
					                                                    <a href='https://www.primeassetslimited.com'>
					                                                        <img
					                                                            class='m_4873022159957722792jecl-Icon-img CToWUd'
					                                                            style='display: block;'
					                                                            src='https://www.primeassetslimited.com/assets/images/logo-dark.png'
					                                                            alt='prime-logo'
					                                                            width='300'
					                                                            height='60'
					                                                            border='0'
					                                                        />
					                                                    </a>
					                                                </td>
					                                            </tr>
					                                        </tbody>
					                                    </table>
					                                    <table class='m_4873022159957722792width-600' style='max-width: 600px;' border='0' width='100%' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF'>
					                                        <tbody>
					                                            <tr>
					                                                <td class='m_4873022159957722792content-box' style='padding-bottom: 24px !important;'>
					                                                    <table border='0' width='100%' cellspacing='0' cellpadding='0'>
					                                                        <tbody>
					                                                            <tr>
					                                                                <td>
					                                                                    <table border='0' width='100%' cellspacing='0' cellpadding='0'>
					                                                                        <tbody>
					                                                                            <tr>
					                                                                                <td style='padding: 16px 10px 0;'>
					                                                                                    <p style='font-size: 13px; line-height: 20px; color: #666666; margin: 0px; text-align: left;' align='center'>
					                                                                                        <span style='font-size: 12pt; font-family: arial black, sans-serif; color: #000000;'> <strong>Dear ".$investor_name.",</strong> </span>
					                                                                                    </p>
					                                                                                    <p style='font-size: 13px; line-height: 20px; color: #666666; margin: 0px; text-align: left;' align='center'>&nbsp;</p>
					                                                                                    <p style='font-size: 13px; line-height: 20px; color: #666666; margin: 0px; text-align: left;' align='center'>
					                                                                                        <span style='color: #000000;'>
					                                                                                            Your request to withdraw $".$withdrawal_amount." has been received. Funds will
					                                                                                            be withdrawn to your choosen payment option upon confirmation.
					                                                                                        </span>
					                                                                                    </p>
					                                                                                    <p style='font-size: 13px; line-height: 20px; color: #666666; margin: 0px; text-align: left;' align='center'>&nbsp;</p>
					                                                                                    <p style='font-size: 13px; line-height: 20px; color: #666666; margin: 0px; text-align: left;' align='center'>
					                                                                                        <span style='color: #000000;'> Do note that Prime Assets will not give you any other wallet address apart from the one shown on the website. </span>
					                                                                                        <br />
					                                                                                        <br />
					                                                                                        <span style='color: #000000;'>
					                                                                                            To report fraudulent activities, contact
					                                                                                            <strong><a style='color: #000000;' href='mailto:fraud@primeassetslimited.com'>fraud@primeassetslimited.com.</a> </strong>
					                                                                                        </span>
					                                                                                    </p>
					                                                                                </td>
					                                                                            </tr>
					                                                                        </tbody>
					                                                                    </table>
					                                                                </td>
					                                                            </tr>
					                                                        </tbody>
					                                                    </table>
					                                                </td>
					                                            </tr>
					                                            <tr>
					                                                <td>&nbsp;</td>
					                                            </tr>
					                                        </tbody>
					                                    </table>
					                                    <table style='max-width: 550px; height: 264px; width: 114.979%;' border='0' width='573' cellspacing='0' cellpadding='0' bgcolor='#F2F2F2'>
					                                        <tbody>
					                                            <tr>
					                                                <td style='padding: 24px 4px; width: 100%;'>
					                                                    <table style='max-width: 424px;' border='0' cellspacing='0' cellpadding='0' align='center'>
					                                                        <tbody>
					                                                            <tr>
					                                                                <td style='font-size: 12px; line-height: 16px; color: #4b4b4b; padding: 20px 0; margin: 0 auto;' align='center'>
					                                                                    *This email account is not monitored. Reply to <a href='mailto:info@primeassetslimited.com'>info@primeassetslimited.com</a> if you have any query.
					                                                                    <a style='text-decoration: underline; color: #085ff7;' href='https://www.primeassetslimited.com/investment'> View Our Available Plans </a>
					                                                                </td>
					                                                            </tr>
					                                                        </tbody>
					                                                    </table>
					                                                    <table style='font-size: 12px; color: #2d2d2d; line-height: 22px; margin: 0px auto; height: 63px; width: 69.7305%;' border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
					                                                        <tbody>
					                                                            <tr style='height: 43px;'>
					                                                                <td lang='en' style='padding: 0px; height: 43px;' align='center'>&copy; 2021 Prime Assets Limited.</td>
					                                                            </tr>
					                                                            <tr style='height: 10px;'>
					                                                                <td class='m_4873022159957722792j-6' style='padding: 15px 0px 25px; height: 10px;' align='center'>
					                                                                    <span class='m_4873022159957722792j-5'><a style='text-decoration: underline; color: #085ff7;' href='https://www.primeassetslimited.com'>Home</a>|</span>
					                                                                    <a class='m_4873022159957722792j-1' style='text-decoration: underline; color: #085ff7;' href='https://www.primeassetslimited.com/about'>About</a>
					                                                                    <span class='m_4873022159957722792j-5'>|</span>
					                                                                    <a class='m_4873022159957722792j-2' style='text-decoration: underline; color: #085ff7;' href='https://www.primeassetslimited.com/investment'>Plans</a> <br />
					                                                                    <a class='m_4873022159957722792j-3' style='text-decoration: underline; color: #085ff7;' href='https://www.primeassetslimited.com/news'> News </a>
					                                                                    <span class='m_4873022159957722792j-5'>|</span>
					                                                                    <a class='m_4873022159957722792j-4' style='text-decoration: underline; color: #085ff7;' href='https://www.primeassetslimited.com/contact'>Contact</a>
					                                                                </td>
					                                                            </tr>
					                                                        </tbody>
					                                                    </table>
					                                                </td>
					                                            </tr>
					                                        </tbody>
					                                    </table>
					                                </td>
					                            </tr>
					                        </tbody>
					                    </table>
					                </div>
					            </div>
					        </div>
					    </div>
					</div>
				";


				//Notify Admin

				$msg = $investor_name." just requested a withdrawal , Login Admin";

				// use wordwrap() if lines are longer than 70 characters
				$msg = wordwrap($msg,70);

				// send email
				mail($settings->email,"New Withdrawal Request",$msg);




				//Load phpmailer
	    		require '../vendor/autoload.php';

	    		$mail = new PHPMailer(true);                             
			    try {
			        //Server settings

					$mail->IsSMTP();        //Sets Mailer to send message using SMTP
					$mail->Host = $sweet_url;  //Sets the SMTP hosts
					$mail->Port = '465';        //Sets the default SMTP server port
					$mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
					$mail->Username = 'noreply@'.$sweet_url;     //Sets SMTP username
					$mail->Password = $noreply_password;     //Sets SMTP password
					$mail->SMTPSecure = 'ssl';       //Sets connection prefix. Options are "", "ssl" or "tls"
					$mail->From = 'noreply@'.$sweet_url;     //Sets the From email address for the message
					$mail->FromName = $settings->siteTitle;    //Sets the From name of the message
					$mail->AddAddress($investor_email);//Adds a "To" address

					$mail->IsHTML(true);       //Sets message type to HTML   

					$mail->Subject = $settings->siteTitle." Withdrawal Request";  
					$mail->Body = $message;

			        $mail->send();

			        unset($_SESSION['full_name']);
			        unset($_SESSION['username']);
			        unset($_SESSION['email']);

			        $_SESSION['success'] = 'Your request has been sent and you will be contacted on how to proceed shortly';

			    } 
			    catch (Exception $e) {
			        $_SESSION['success'] = 'Your request has been sent. Please proceed to pay and invest';
			    }

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Make Sure all Fields are filled';
	}

	header('location: withdrawals.php');

?>