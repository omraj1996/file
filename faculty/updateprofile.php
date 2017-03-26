
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
<?php
/*$userid=$_SESSION['userid'];
if(isset($_POST['update']))
{
	$image=addslashes(file_get_contents($_FILES['userfile']['tmp_name']));
mysql_connect("localhost","root","");
mysql_select_db("om");

$query = "UPDATE facultymaster set content='$image' where userid='$userid'";

mysql_query($query) or die('Error, query failed'); 
} */
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
<?php include 'facultynavigation.php' ?>
<?php include '../upload.php'?>
<div class="form">
<form method="POST" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
<input name="file" type="file" />
				Username:<input type="text" name="userid" value="<?php echo $userid?>">
				Department:<input type="text" name="rollno" value="<?php echo $department?>">
				
				Degree:<input type="text" name="degree" value="<?php echo $degree?>">
				Joining Year:<input type="text" name="joiningyear" value="<?php echo $joiningyear?>">
				<input type="submit" name="upload" value="Update">
</form>
</div>		
</body>
</html>
