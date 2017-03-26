<?php
session_start();
$userid=$_SESSION['userid'];
$password=$_SESSION['password'];

if(isset($_SESSION))
{
	mysql_connect("localhost","root","");
	mysql_select_db("om");
	$sql=mysql_query("select * from studentmaster where userid='$userid'") ;
	$sql1=mysql_query("select * from studentacademicmaster where userid='$userid'") ;
	$sql2=mysql_query("select * from studentpersonalmaster where userid='$userid'") ;
	$sql3=mysql_query("select * from studenttechnicalmaster where userid='$userid'") ;
		while(($row=mysql_fetch_array($sql)))
		{
		$userid=$row['userid'];
		$branch=$row['branch'];
		$degree=$row['degree'];
		}
		while(($row1=mysql_fetch_array($sql1)))
		{
		$acdachvmt=$row1['acdachvmt'];
		$sports=$row1['sports'];
		$cultural=$row1['cultural'];
		$others=$row1['others'];
		$graduation=$row1['graduation'];
		$inter=$row1['inter'];
		$highschool=$row1['highschool'];
		}
		while(($row2=mysql_fetch_array($sql2)))
		{
		$name=$row2['name'];	
		$address=$row2['address'];
		$mobileno=$row2['mobileno'];
		}
		while(($row3=mysql_fetch_array($sql3)))
		{
		$prgmlanguage=$row3['prgmlanguage'];
		$db=$row3['db'];
		$os=$row3['os'];
		$softawre=$row3['software'];
		$otherskill=$row3['otherskill'];
		$industryexp=$row3['industryexp'];
		$academicproject=$row3['academicproject'];
		}
}

?>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="simpleValidation.js"></script>
</head>
<style>
	input[type="text"]{border:none; border: 1px solid black; width: 182px;}
	.requiredfield{color:red;}
	.error{color:red;}
</style>
<body>


</center>
<form id="myform" method="post" action="generatePDF.php">	
	<table border="0" align="center">
	  <tr><td>Name:</td><td><input type="text" name="name" id="name" value="<?php echo $name?>" /></td></tr>
	  <tr><td>Email:</td><td><input type="text" name="email" id="email"  /></td></tr>
	  <tr><td>Message:</td><td><textarea name="message" id="message"></textarea></td></tr>
	  <tr><td></td><td><input type="submit" id="submitbtn" /></td></tr>
	</table>
</form>
</body>
</html>