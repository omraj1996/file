<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                          					         // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';            					         // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     					     // Enable SMTP authentication
$mail->Username = 'csportal123@gmail.com';     					     // SMTP username
$mail->Password = 'cspcspcsp'; 						                 // SMTP password
$mail->SMTPSecure = 'tls';            						         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 					 // TCP port to connect to
$mail->setFrom('csportal123@gmail.com', 'CodexWorld');
$mail->addReplyTo('$userid', 'CodexWorld');
$mail->addAddress($userid);   // Add a recipient
$mail->MsgHTML($message);
$mail->AddAddress($userid);
$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>How to Send Email using PHP in Localhost by CodexWorld</h1>';

if(!$mail->send()) {?>
			<div class="container">
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Sorry! Some Error Occured.</h4>
							</div>
							<div class="modal-body">
								<p><?php echo 'Message could not be sent.';?></p>
								<p><?php echo 'Mailer Error: ' . $mail->ErrorInfo;?></p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php 
   //echo 'Message could not be sent.';
   //echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {?>
<?php
mysql_query("INSERT INTO loginmaster (username,userid,password,status,address,cnumber,gender,month,day,year) VALUES ('$username','$userid','$password','$status','$address','$cnumber','$gender','$month','$day','$year')")or die("Failed to querry database".mysql_error());
?>
	
			<div class="container">
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Thanks for Registering</h4>
							</div>
							<div class="modal-body">
							<p>A verification main has been sent to your gmail account.</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php
   // echo 'Message has been sent';
}
?>
