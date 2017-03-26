<?php
session_start();

$userid=$_SESSION['userid'];
$password=$_SESSION['password'];

if(isset($_SESSION))
{
	mysql_connect("localhost","root","");
	mysql_select_db("om");
	$sql=mysql_query("select * from facultymaster where userid='$userid'") ;

		while(($row=mysql_fetch_array($sql)))
		{
		$userid=$row['userid'];
		$department=$row['department'];
		$degree=$row['degree'];
		$joiningyear=$row['joiningyear'];
	}
	$res=mysql_query("SELECT content from facultymaster where userid='$userid'");
		$row=mysql_fetch_array($res);
}

?>
<html>
<head>

<style>
.form{
	border-radius:5px;
	display: block;
	position:absolute;
	left:10px;
	top:60px;
	width:1075px;
	height:420px;
	text-decoration color:#abcdef;
}
</style>
</head>
<body bgcolor="#acdfe2">
<?php include 'facultynavigation.php'?>
<div class="form">
<form>
Username:<input type="text" name="userid" value="<?php echo $userid?>"><br>
Department:<input type="text" name="department" value="<?php echo $department?>"><br>
Degree:<input type="text" name="degree" value="<?php echo $degree?>"><br>
Joining Year:<input type="text" name="joiningyear" value="<?php echo $joiningyear?>"><br>
</form>
</div>
</body>
</html>
