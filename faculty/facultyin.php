<?php
session_start();
$userid=$_SESSION['userid'];
$password=$_SESSION['password'];

if(isset($_SESSION))
{
		mysql_connect("localhost","root","");
		mysql_select_db("om");
}
?>
<html>
<head>
<title>Faculty Login</title>

</head>
<body bgcolor="#9C640C">
<h1>Faculty Portal</h1>
<?php include 'facultynavigation.php' ?>
</body>
</html>