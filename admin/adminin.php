<?php
session_start();
						$userid=$_SESSION['userid'];
						$password=$_SESSION['password'];
/*<script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>*/
?>
<html>
<head>
<title>Admin Login</title>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

<style>
.form{
	border-radius:5px;
	display: block;
	position:absolute;
	left:10px;
	top:120px;
	width:1075px;
	height:400px;
	text-decoration color:#abcdef;
}
</style>

</head>
<body bgcolor="#acdfe2">
<h1>Admin Portal</h1>
<?php include'adminnavigation.php'?>

</body>
</html>
