<?php
if(isset($_POST['button']))
{
$userid=$_POST['userid'];

$status=$_POST['status'];
mysql_connect("localhost","root","");
mysql_select_db("om");
$password=random_password(8);

mysql_query("INSERT INTO loginmaster (userid,password,status) VALUES ('$userid','$password','$status')")or die("Failed to querry database".mysql_error());


		 
	$message = "     
      Hello $userid,
      <br /><br />
      Welcome to the Offical site of NITRR<br/>
      To complete your registration use:<br/>
      <br /><br />
      <b>Your Userid:</b>$userid<br>
       <b>Your Password:</b>$password;
	   
      <br /><br />
      Thanks,";
	  
	  	require_once('phpmailer.php');
  $mail = new PHPMailer();
  $mail->IsSMTP(); 
  $mail->SMTPDebug  = 0;                     
  $mail->SMTPAuth   = true;                  
  $mail->SMTPSecure = "ssl";                 
  $mail->Host       = "smtp.gmail.com";      
  $mail->Port       = 25;             
  $mail->AddAddress ="$userid";
  $mail->MsgHTML($message);
  $mail->Send();
}

?>
<html>
<body bgcolor="#B7950B">


<form method="post" action="adminmodule.php">
User Id: <input type="text" placeholder="User Id" name="userid" id="userid"/>

<select name="status" id="status">
	<option>Select Status</option>
	<option>Admin</option>
	<option>Faculty</option>
	<option>Student</option>
</select>
<button type="submit" id="button" name="button">Submit</button>
</form>

</body>
</html>
<?php
	function random_password($length=8){
		$chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$password=substr(str_shuffle($chars),0,$length);
		return $password;
	}
	
?>

