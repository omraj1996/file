<?php
session_start();

$userid=$_SESSION['userid'];
$password=$_SESSION['password'];

if(isset($_SESSION))
{
	mysql_connect("localhost","root","");
	mysql_select_db("om");
	$sql=mysql_query("select * from studentmaster where userid='$userid'") ;

		while(($row=mysql_fetch_array($sql)))
		{
		$userid=$row['userid'];
		
		$rollno=$row['rollno'];
		
		$batch=$row['batch'];
		$branch=$row['branch'];
		$degree=$row['degree'];
		$joiningyear=$row['joiningyear'];
	}
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />



</head>
<body bgcolor="#acdfe2">
<?php include 'adminnavigation.php'?>
<?php include '../upload.php'?>
<form method="POST" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
<input name="file" type="file" />
		<fieldset style="width:1175px; display:inline-block">
		<legend><span><b><font color="#800040">Training&nbsp;</font></b></span></legend>
		<table width="100%" border="0" cellpadding="2" cellspacing="0">
		 <tr>
			<td align="left" width="40%">Username:<input type="text" name="userid" value="<?php echo $userid?>"></td>
			<td align="left" width="60%">Roll No.:<input type="text" name="rollno" value="<?php echo $rollno?>"></td>
			</tr>
			Batch:<input type="text" name="batch" value="<?php echo $batch?>"><br>
			Branch:<input type="text" name="branch" value="<?php echo $branch?>"><br>
			Degree:<input type="text" name="degree" value="<?php echo $degree?>"><br>
			Joining Year:<input type="text" name="joiningyear" value="<?php echo $joiningyear?>">
			</table>
		</fieldset>
		<br><br>
		<fieldset style="width:1175px; display:inline-block">
		<legend><span><b><font color="#800040">Training&nbsp;</font></b></span></legend>
			Academic Achievement:<input type="text" name="userid" value="<?php echo $userid?>"><br>
			Sports:<input type="text" name="rollno" value="<?php echo $rollno?>"><br>
			Cultural:<input type="text" name="batch" value="<?php echo $batch?>"><br>
			Others:<input type="text" name="branch" value="<?php echo $branch?>"><br>
			CPI of Last Semester:<input type="text" name="degree" value="<?php echo $degree?>"><br>
			Percentage Obtained in 10th :<input type="text" name="joiningyear" value="<?php echo $joiningyear?>"><br>
			Percentage Obtaned in 12th:<input type="text" name="userid" value="<?php echo $userid?>"><br>
			</fieldset>
			<br><br>
		<fieldset style="width:1175px; display:inline-block">
		<legend><span><b><font color="#800040">Training&nbsp;</font></b></span></legend>
			Name:<input type="text" name="rollno" value="<?php echo $rollno?>"><br>
			Date of Birth:<input type="text" name="batch" value="<?php echo $batch?>"><br>		
			Gender:<input type="text" name="branch" value="<?php echo $branch?>"><br>
			Address:<input type="text" name="degree" value="<?php echo $degree?>"><br>
			Mobile Number:<input type="text" name="joiningyear" value="<?php echo $joiningyear?>">
			</fieldset>
			<br><br>
		<fieldset style="width:1175px; display:inline-block">
		<legend><span><b><font color="#800040">Training&nbsp;</font></b></span></legend>
			Programming Language Known:<input type="text" name="userid" value="<?php echo $userid?>"><br>
			Database Tools:<input type="text" name="rollno" value="<?php echo $rollno?>"><br>
			Operating System<input type="text" name="batch" value="<?php echo $batch?>"><br>
			Software:<input type="text" name="branch" value="<?php echo $branch?>"><br>
			Otherskills:<input type="text" name="degree" value="<?php echo $degree?>"><br>
			Industry Experience:<input type="text" name="joiningyear" value="<?php echo $joiningyear?>"><br>
			</fieldset>
			<br><br>
					<input name="upload" type="submit" class="box" id="update" value=" Update ">
</form>

</body>
</html>
