<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use mailer\PHPMailer\PHPMailer;
use mailer\PHPMailer\SMTP;
require 'mailer/vendor/autoload.php';

class Authentication extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Authentication_model');
	}
	public function index()
	{
		$data = array();
		if (is_logged_in())
		{
			redirect(base_url());
		}else
		{
			$this->load->view('authentication/desktop',$data);
		}
	}
	function in()
	{
		$comp['allow_access'] = true;
		if (!$comp['allow_access'])
		{
			$result['error'] = 'Check Jaringan Anda';
			echo json_encode($result);
		}else
		{
			$message = '';
			$error = '';
			$data['username'] = $this->input->post('username');
			$data['password'] = $this->input->post('password');
			
			if (!$data['username'] OR !$data['password']){
				$error .= 'Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, harap coba lagi.';
			}
			if (!$error)
			{
				$this->load->library('auth');
				$return = $this->auth->do_login($data);
				if($return['login'])
				{
					$message = 'Welcome Back '.$this->session->userdata('Auth')['name'];
				}else
				{
					$error = $return['message'];
				}
			}
			$result['success'] = $message;
			$result['error'] = $error;
			echo json_encode($result);
		}
	}
	function register()
	{
		$comp['allow_access'] = true;
		if (!$comp['allow_access'])
		{
			$result['error'] = 'Check Jaringan Anda';
			echo json_encode($result);
		}else
		{
			$message = '';
			$error = '';
			$data['fullname'] = $this->input->post('fullname');
			$data['username'] = $this->input->post('username');
			$data['email'] = $this->input->post('email');
			$data['password'] = $this->input->post('password');
			$data['repassword'] = $this->input->post('repassword');
			
			if (!$data['username'] OR !$data['password'] OR !$data['email'] OR !$data['fullname'] OR !$data['repassword']){
				$error .= 'Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, harap coba lagi.';
			}
			if($data['password'] != $data['repassword']){
				$error .= 'Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, harap coba lagi.';
			}
			$where = array();
			$where['(
				username = \''.$data['username'].'\' OR
				email = \''.$data['email'].'\'
			)'] = null;
			$get = $this->Authentication_model->get($where);
			if($get['id'] != ''){
				$error = "Username / Email sudah di gunakan";
			}
			if (!$error)
			{
				$pass = password_hash($data['password'],PASSWORD_DEFAULT);
				$save_auth = array();
				$save_auth['id'] = 0;
				$save_auth['name'] = $data['fullname'];
				$save_auth['username'] = $data['username'];
				$save_auth['email'] = $data['email'];
				$save_auth['password'] = $pass;
				$save_auth['image'] = 'default.jpg';
				$save_auth['role_id'] = 2;
				$save_auth['is_active'] = 1;
				$save_auth['created_date'] = date("Y-m-d");
				$this->Authentication_model->save($save_auth);
				$message = 'Terima kasih telah mendaftar di TMO '.$data['fullname'];
			}
			$result['success'] = $message;
			$result['error'] = $error;
			echo json_encode($result);
		}
	}
	function forgot()
	{
		$data = array();
		$data_auth = array();
		$save_auth = array();
		$comp['allow_access'] = true;
		$error = '';
		$data['email'] = $this->input->post('t_email');
		if (!$data['email']){
			$error .= 'Required';
		}
		if (!$error) {
			$team =  $this->team_model->get($data);
			if ($team['id']) {
				$data_auth['team'] = $team['id'];
				$auth =  $this->auth_model->get($data_auth);
				$email = $team['email'];
				$nama = $auth['name'];
				$password = $this->randomPassword();
				$pass = password_hash($password,PASSWORD_DEFAULT);

				$save_auth['id'] = $auth['id'];
				$save_auth['password'] = $pass;
				$this->auth_model->save($save_auth);
				// print_r($auth);
				// exit;
				//Create a new PHPMailer instance
				$mail = new PHPMailer;
				//Tell PHPMailer to use SMTP
				$mail->isSMTP();
				//Enable SMTP debugging
				// SMTP::DEBUG_OFF = off (for production use)
				// SMTP::DEBUG_CLIENT = client messages
				// SMTP::DEBUG_SERVER = client and server messages
				// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
				//Set the hostname of the mail server
				$mail->Host = 'duniaprojek.com';
				//Set the SMTP port number - likely to be 25, 465 or 587
				$mail->Port = 25;
				//We don't need to set this as it's the default value
				//$mail->SMTPAuth = false;
				//Set who the message is to be sent from
				$mail->setFrom('no-reply@duniaprojek.com', 'No Reply');
				//Set an alternative reply-to address
				$mail->addReplyTo('admin@duniaprojek.com', 'Admin Edodon');
				//Set who the message is to be sent to
				$mail->addAddress($email, $nama);
				//Set the subject line
				$mail->Subject = 'Forgot Password';
				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				// $mail->msgHTML(file_get_contents('contents.html'), __DIR__);
				//Replace the plain text body with one created manually
				// $mail->AltBody = 'This is a plain-text message body';
				$mail->Body    = '
				<!DOCTYPE html>
				<html>
				<head>
				<meta charset="UTF-8">
				<title> Recovery Account</title>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				<!--[if !mso]><!-->
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<!--<![endif]-->
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<!--[if !mso]><!-->
					<style type="text/css">
						@font-face {
							font-family: "flama-condensed";
							font-weight: 100;
							src: url("https://cdn.duniaprojek.com/email/forget/FlamaCond-Medium.eot");
							src: url("https://cdn.duniaprojek.com/email/forget/FlamaCond-Medium.eot?#iefix") format("embedded-opentype"),
								url("https://cdn.duniaprojek.com/email/forget/FlamaCond-Medium.woff") format("woff"),
								url("https://cdn.duniaprojek.com/email/forget/FlamaCond-Medium.ttf") format("truetype");
						}
						@font-face {
							font-family: "Muli";
							font-weight: 100;
							src: url("https://cdn.duniaprojek.com/email/forget/muli-regular.eot");
							src: url("https://cdn.duniaprojek.com/email/forget/muli-regular.eot?#iefix") format("embedded-opentype"),
								url("https://cdn.duniaprojek.com/email/forget/muli-regular.woff2") format("woff2"),
								url("https://cdn.duniaprojek.com/email/forget/muli-regular.woff") format("woff"),
								url("https://cdn.duniaprojek.com/email/forget/muli-regular.ttf") format("truetype");
						}
						.address-description a {color: #000000 ; text-decoration: none;}
							@media (max-device-width: 480px) {
							.vervelogoplaceholder {
								height:83px ;
							}
						}
					</style>
					<!--<![endif]-->
					<!--[if (gte mso 9)|(IE)]>
					<style type="text/css">
						.address-description a {color: #000000 ; text-decoration: none;}
						table {border-collapse: collapse ;}
					</style>
					<![endif]-->
				</head>

				<body bgcolor="#e1e5e8" style="margin-top:0 ;margin-bottom:0 ;margin-right:0 ;margin-left:0 ;padding-top:0px;padding-bottom:0px;padding-right:0px;padding-left:0px;background-color:#e1e5e8;">
					<!--[if gte mso 9]>
					<center>
					<table width="600" cellpadding="0" cellspacing="0"><tr><td valign="top">
					<![endif]-->
					<center style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#e1e5e8;">
						<div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;">
							<table align="center" cellpadding="0" style="border-spacing:0;font-family:Muli,Arial,sans-serif;color:#333333;Margin:0 auto;width:100%;max-width:600px;">
								<tbody>
									<tr>
										<td align="center" class="vervelogoplaceholder" height="143" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;height:143px;vertical-align:middle;" valign="middle"><span class="sg-image"><a href="https://office.duniaprojek.com/" target="_blank"><img alt="Edodon" height="80" src="https://cdn.duniaprojek.com/images/dp_icon.png" style="border-width: 0px; width: 160px; height: 80px;" width="160"></a></span></td>
									</tr>
									<!-- Start of Email Body-->
									<tr>
										<td class="one-column" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#ffffff;">
											<!--[if gte mso 9]>
												<center>
													<table width="80%" cellpadding="20" cellspacing="30"><tr><td valign="top">
														<![endif]-->
											<table style="border-spacing:0;" width="100%">
												<tbody>
													<tr>
														<td align="center" class="inner" style="padding-top:15px;padding-bottom:15px;padding-right:30px;padding-left:30px;" valign="middle">
															<span class="sg-image"><img alt="Forgot Password" class="banner" height="93" src="https://cdn.duniaprojek.com/images/forgot.png" style="border-width: 0px; margin-top: 30px; width: 255px; height: 93px;" width="255"></span></td>
													</tr>
													<tr>
														<td class="inner contents center" style="padding-top:15px;padding-bottom:15px;padding-right:30px;padding-left:30px;text-align:left;">
															<center>
																<p class="h1 center" style="Margin:0;text-align:center;font-family:flama-condensed,Arial Narrow,Arial;font-weight:100;font-size:30px;Margin-bottom:26px;">Forgot your password?</p>
																<!--[if (gte mso 9)|(IE)]><![endif]-->
																<p class="description center" style="font-family:Muli,Arial Narrow,Arial;Margin:0;text-align:center;max-width:320px;color:#a1a8ad;line-height:24px;font-size:15px;Margin-bottom:10px;margin-left: auto; margin-right: auto;"><span style="color: rgb(161, 168, 173); font-family: Muli, Arial Narrow, Arial; font-size: 15px; text-align: center; background-color: rgb(255, 255, 255);">This is your new password, ' . $password . '</span></p>
																<!--[if (gte mso 9)|(IE)]><br>&nbsp;<![endif]-->
																<!--span class="sg-image"><a href="https://office.duniaprojek.com/" target="_blank"><img alt="Reset your Password" height="54" src="https://cdn.duniaprojek.com/images/reset.png" style="border-width: 0px; margin-top: 30px; margin-bottom: 50px; width: 260px; height: 54px;" width="260"></a></span-->
																<!--[if (gte mso 9)|(IE)]><br>&nbsp;<![endif]-->
															</center>
														</td>
													</tr>
												</tbody>
											</table>
											<!--[if (gte mso 9)|(IE)]>
											</td></tr></table>
										</center>
										<![endif]-->
										</td>
									</tr>
									<!-- End of Email Body-->
									<!-- whitespace -->
									<tr>
										<td height="40">
											<p style="line-height: 40px; padding: 0 0 0 0; margin: 0 0 0 0;">&nbsp;</p>
											<p>&nbsp;</p>
										</td>
									</tr>
									<!-- Social Media -->
									<!--tr>
										<td align="center" style="padding-bottom:0;padding-right:0;padding-left:0;padding-top:0px;" valign="middle"><span class="sg-image" data-imagelibrary="%7B%22width%22%3A%228%22%2C%22height%22%3A18%2C%22alt_text%22%3A%22Facebook%22%2C%22alignment%22%3A%22%22%2C%22border%22%3A0%2C%22src%22%3A%22https%3A//marketing-image-production.s3.amazonaws.com/uploads/0a1d076f825eb13bd17a878618a1f749835853a3a3cce49111ac7f18255f10173ecf06d2b5bd711d6207fbade2a3779328e63e26a3bfea5fe07bf7355823567d.png%22%2C%22link%22%3A%22%23%22%2C%22classes%22%3A%7B%22sg-image%22%3A1%7D%7D"><a href="https://www.facebook.com/vervewine/" target="_blank"><img alt="Facebook" height="18" src="https://marketing-image-production.s3.amazonaws.com/uploads/0a1d076f825eb13bd17a878618a1f749835853a3a3cce49111ac7f18255f10173ecf06d2b5bd711d6207fbade2a3779328e63e26a3bfea5fe07bf7355823567d.png" style="border-width: 0px; margin-right: 21px; margin-left: 21px; width: 8px; height: 18px;" width="8"></a></span>
											<!--[if gte mso 9]>&nbsp;&nbsp;&nbsp;<![endif]--><span class="sg-image" data-imagelibrary="%7B%22width%22%3A%2223%22%2C%22height%22%3A18%2C%22alt_text%22%3A%22Twitter%22%2C%22alignment%22%3A%22%22%2C%22border%22%3A0%2C%22src%22%3A%22https%3A//marketing-image-production.s3.amazonaws.com/uploads/6234335b200b187dda8644356bbf58d946eefadae92852cca49fea227cf169f44902dbf1698326466ef192bf122aa943d61bc5b092d06e6a940add1368d7fb71.png%22%2C%22link%22%3A%22%23%22%2C%22classes%22%3A%7B%22sg-image%22%3A1%7D%7D"><a href="https://twitter.com/vervewine" target="_blank"><img alt="Twitter" height="18" src="https://marketing-image-production.s3.amazonaws.com/uploads/6234335b200b187dda8644356bbf58d946eefadae92852cca49fea227cf169f44902dbf1698326466ef192bf122aa943d61bc5b092d06e6a940add1368d7fb71.png" style="border-width: 0px; margin-right: 16px; margin-left: 16px; width: 23px; height: 18px;" width="23"></a></span>
											<!--[if gte mso 9]>&nbsp;&nbsp;&nbsp;&nbsp;<![endif]--><span class="sg-image" data-imagelibrary="%7B%22width%22%3A%2218%22%2C%22height%22%3A18%2C%22alt_text%22%3A%22Instagram%22%2C%22alignment%22%3A%22%22%2C%22border%22%3A0%2C%22src%22%3A%22https%3A//marketing-image-production.s3.amazonaws.com/uploads/650ae3aa9987d91a188878413209c1d8d9b15d7d78854f0c65af44cab64e6c847fd576f673ebef2b04e5a321dc4fed51160661f72724f1b8df8d20baff80c46a.png%22%2C%22link%22%3A%22%23%22%2C%22classes%22%3A%7B%22sg-image%22%3A1%7D%7D"><a href="https://www.instagram.com/vervewine/" target="_blank"><img alt="Instagram" height="18" src="https://marketing-image-production.s3.amazonaws.com/uploads/650ae3aa9987d91a188878413209c1d8d9b15d7d78854f0c65af44cab64e6c847fd576f673ebef2b04e5a321dc4fed51160661f72724f1b8df8d20baff80c46a.png" style="border-width: 0px; margin-right: 16px; margin-left: 16px; width: 18px; height: 18px;" width="18"></a></span></td>
										</tr-->
										<!-- whitespace -->
										<tr>
											<td height="25">
												<p style="line-height: 25px; padding: 0 0 0 0; margin: 0 0 0 0;">&nbsp;</p>
												<p>&nbsp;</p>
											</td>
										</tr>
										<!-- Footer -->
										<tr>
											<td style="padding-top:0;padding-bottom:0;padding-right:30px;padding-left:30px;text-align:center;Margin-right:auto;Margin-left:auto;">
												<center>
													<p style="font-family:Muli,Arial,sans-serif;Margin:0;text-align:center;Margin-right:auto;Margin-left:auto;font-size:15px;color:#a1a8ad;line-height:23px;">Problems or questions? Call us at
														<nobr><a class="tel" href="tel:+6281802281628" style="color:#a1a8ad;text-decoration:none;" target="_blank"><span style="white-space: nowrap">+62 818 0228 1628 </span></a></nobr>
													</p>
													<p style="font-family:Muli,Arial,sans-serif;Margin:0;text-align:center;Margin-right:auto;Margin-left:auto;font-size:15px;color:#a1a8ad;line-height:23px;">or email <a href="mailto:contact@duniaprojek.com?Subject=Recovery Password" style="color:#a1a8ad;text-decoration:underline;" target="_blank"><span class="__cf_email__" data-cfemail="c1a9a4adadae81b7a4b3b7a4b6a8afa4efa2aeac">contact@duniaprojek.com</span></a></p>
													<p style="font-family:Muli,Arial,sans-serif;Margin:0;text-align:center;Margin-right:auto;Margin-left:auto;padding-top:10px;padding-bottom:0px;font-size:15px;color:#a1a8ad;line-height:23px;">© Edodon <span style="white-space: nowrap">Komplek Permata Buah Batu Blok C 15B​</span>, <span style="white-space: nowrap">Bandung,</span> <span style="white-space: nowrap">Indonesia 40288</span></p>
												</center>
											</td>
										</tr>
										<!-- whitespace -->
										<tr>
											<td height="40">
												<p style="line-height: 40px; padding: 0 0 0 0; margin: 0 0 0 0;">&nbsp;</p>
												<p>&nbsp;</p>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</center>
						<!--[if gte mso 9]>
						</td></tr></table>
					</center>
					<![endif]-->
					<!-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
				</body>
				</html>
				';
				$mail->isHTML(true);
				//Attach an image file
				// $mail->addAttachment('images/phpmailer_mini.png');
				//send the message, check for errors
				if (!$mail->send()) {
					$error = 'Mailer Error: ' . $mail->ErrorInfo;
				} else {
					$error = 'success';
				}
			} else {
				$error = 'Unregistered';
			}
		}
		$result['error'] = $error;
		echo json_encode($result);
	}
	function out()
	{
		$this->auth->logout();
		redirect(site_url());
	}
}

