
<?php
if(isset($_POST['register']))
{
$username=$_POST['username'];
$userid=$_POST['email'];
$password=$_POST['password'];
$status=$_POST['status'];
$address=$_POST['address'];
$cnumber=$_POST['cnumber'];
$gender=$_POST['gender'];
$month=$_POST['month'];
$day=$_POST['day'];
$year=$_POST['year'];
mysql_connect("localhost","root","");
mysql_select_db("om");


//mysql_query("INSERT INTO loginmaster (username,userid,password,status,address,cnumber,gender,month,day,year) VALUES ('$username','$userid','$password','$status','$address','$cnumber','$gender','$month','$day','$year')")or die("Failed to querry database".mysql_error());


		 
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
  $mail->Send();?><?php
}

?>
<?php
if(isset($_POST['login']))
{
session_start();
$message="";

if(count($_POST)>0) {
	mysql_connect("localhost","root","");
	mysql_select_db("om");
	$sql=mysql_query("Select * from loginmaster where userid='" . $_POST["email"] . "'  and password='". $_POST["password"]."' and status='". $_POST["status"]."' ")or die("Failed to querry database".mysql_error());
	$row=mysql_fetch_array($sql);

if(is_array($row)) {
	if($_POST['status']=='Admin')
	{
		$_SESSION["password"] = $row['password'];
		$_SESSION["userid"] = $row['userid'];

		if(isset($_SESSION["password"])) {
			header("Location:admin/adminin.php");
		}
		else{//if the user details don't match up
			header("location:home.php?Login Failed! Please Try Again.");
			exit();
		}
	}
	if($_POST['status']=='Faculty')
	{
		$_SESSION["password"] = $row['password'];
		$_SESSION["userid"] = $row['userid'];

		if(isset($_SESSION["password"])) {
			header("Location:faculty/facultyin.php");
		}
		else{//if the user details don't match up
			header("location:home.php?Login Failed! Please Try Again.");
			exit();
		}
	}
	if($_POST['status']=='Student')
	{
		$_SESSION["password"] = $row['password'];
		$_SESSION["userid"] = $row['userid'];

		if(isset($_SESSION["password"])) {
			header("Location:student/studentin.php");
		}
		else{//if the user details don't match up
			header("location:home.php?Login Failed! Please Try Again.");
			exit();
		}
	}
} else {
$message = "Invalid Username or Password!";
}
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="format1.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(bg2.jpg);
	background-repeat:repeat-x;
	background-color:#d1d7e7;

}
-->
</style></head>

<body>
<form method="post" action="home.php">
<div class="mainr">
  <div class="topleft"><img src="1.jpg" width="175" height="41" /></div>
  
  <div class="qwerty">
  
		<div class="label">
		  <div class="email" id="email">&nbsp;Email</div>
		  <div class="password" id="password">&nbsp;&nbsp;Password</div>
		  <div class="status" id="status">Status</div>
		</div>
		<div class="label1">
				
				<span class="emailtext"><input name="email" type="text" /></span>
		  		<span class="passwordtext"><input name="password" type="text" /></span>
				<span class="statustext">
						<select name="status" id="status">
							<option >Select Status:</option>
							<option >Admin</option>
							<option >Faculty</option>
							<option >Student</option>
						</select></span>

				<span class="btn"><input name="login" type="submit" value="log-in" class="greenButton"  /></span>
				
				
		</div>
		<div class="label2">
		
				<div class="em">
				<div class="radio"><input name="check" type="checkbox" value="" /></div>
				<div class="text1">Keep me Log-in</div>
				</div>
		  		<div class="pass">Forgot Password?</div>
		
		</div>
</div>
</div>
</form>

<div class="downleft">

  <div class="picture"><img src="x.jpg" height="400px"width="400px" /></div>
  <div class="field">
  
    <div class="signup">Sign Up</div>
	<div class="free">It's free, and always will be</div>
	<div class="text">
	<form action="home.php" method="post">
		
		<div class="textleft">UserName:</div>
		<div class="textright"><input name="username" class="textfield" type="text" /></div>
		<div class="textleft">Email:</div>
		<div class="textright"><input name="email" class="textfield" type="text" /></div>
		<div class="textleft">Password:</div>
		<div class="textright"><input name="password" class="textfield" type="password" /></div>

	  	<div class="textleft">Status:</div>
		<div class="textright">
				<select name="status" id="status" class="textfield">
					<option >Select Status:</option>
					<option >Admin</option>
					<option >Faculty</option>
					<option >Student</option>
				</select></div>
		<div class="textleft">Address:</div>
		<div class="textright"><input name="address" class="textfield" type="text" /></div>
		<div class="textleft">Contact Number:</div>
		<div class="textright"><input name="cnumber" class="textfield" type="text" /><input name="propic" id="dadded" type="hidden" value="uploadedimage/defoult.jpg" /></div>

		<div class="textleft">I am:</div>
		<div class="textright">
			<div class="input-container">
    		<select name="gender" id="gender">
    		<option >Select Sex:</option>
   	 		<option >Female</option>
    		<option >Male</option>
    		</select>
    		</div>
		
		</div>
		<div class="textleft">Birth Day:</div>
		<div class="textright">
		
		<div class="input-container">
    <select name="month">
        <option>Month:</option>
        <option>Jan</option>
        <option>Feb</option>
        <option>Mar</option>
        <option>apr</option>
        <option>Jun</option>
        <option>Jul</option>
        <option>Aug</option>
        <option>Sep</option>
        <option>Oct</option>
        <option>Nov</option>
        <option>Dec</option>
        </select>
    <select name="day">
        <option>Day:</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
        <option>13</option>
        <option>14</option>
        <option>15</option>
        <option>16</option>
        <option>17</option>
        <option>18</option>
        <option>19</option>
        <option>20</option>
        <option>21</option>
        <option>22</option>
        <option>23</option>
        <option>24</option>
        <option>25</option>
        <option>26</option>
        <option>27</option>
        <option>28</option>
        <option>29</option>
        <option>30</option>
        <option>31</option>
      </select>
	<select name="year">
        <option>Year:</option>
        <option>2017</option>
        <option>2016</option>
        <option>2015</option>
        <option>2014</option>
        <option>2013</option>
        <option>2012</option>
        <option>2011</option>
        <option>2010</option>
        <option>2009</option>
        <option>2008</option>
        <option>2007</option>
        <option>2006</option>
        <option>2005</option>
        <option>2004</option>
        <option>2003</option>
        <option>2002</option>
        <option>2001</option>
        <option>2000</option>
        <option>1999</option>
        <option>1998</option>
        <option>1997</option>
        <option>1996</option>
        <option>1995</option>
        <option>1994</option>
        <option>1993</option>
        <option>1992</option>
        <option>1991</option>
        <option>1990</option>
        <option>1989</option>
        <option>1988</option>
		<option>1987</option>
        <option>1986</option>
        <option>1985</option>
        <option>1984</option>
      </select>
    </div>
		
		
		</div>
		<div class="textleft"></div>
		<div class="textright">
		  <br /><label>
		  <div class="container">
			<input type="submit" name="register" value="Sign Up" id="greenButton1" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"/>
		  </div>
		  </label>
		</div>
	</form>	
	</div>
  </div>
</div>
</body>
</html>







