<?php
session_start();
$userid=$_SESSION['userid'];
$password=$_SESSION['password'];
//include 'navigation.css';
if(isset($_SESSION))
{
		mysql_connect("localhost","root","");
		mysql_select_db("om");
		//$res=mysql_query("SELECT content from studentmaster where userid='$userid'");
		//$row=mysql_fetch_array($res);
}
?>
<html>
<head>
<title>Student Login</title>

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
#footer{
    position:relative;
    height:200px;
	width:100%;
    background-color:black;
    bottom:0px;
    left:0px;
    right:0px;
    margin-bottom:0px;
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body bgcolor="#acdfe2">
<h1>Student Portal</h1>
<?php include 'studentnavigation.php'?>
	
<!-- Image Header -->
<div class="">
  <img src="x.jpg" alt="boat" style="width:100%;min-height:350px;max-height:600px;">
  </div>
  
  <!-- Team Container -->
<div class="" style="padding:64;background-color:grey;" id="team">
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="circle">
				<img src="../uploads/123.jpg" alt="Boss" style="width:100px; hieght:100px;" class="img-circle">
				<h3>Johnny Walker</h3>
				<p>Web Designer</p>
			</div>
		</div>

		<div class="col-md-3">
			<div class="circle">
				<img src="../uploads/123.jpg" alt="Boss" style="width:100px; hieght:100px;" class="img-circle">
				<h3>Rebecca Flex</h3>
				<p>Support</p>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="circle">
				<img src="../uploads/123.jpg" alt="Boss" style="width:100px; hieght:100px;" class="img-circle">
				<h3>Jan Ringo</h3>
				<p>Boss man</p>
			</div>
		</div>

		<div class="col-md-3">
			<div class="circle">
				<img src="../uploads/123.jpg" alt="Boss" style="width:100px; hieght:100px;" class="img-circle">
				<h3>Kai Ringo</h3>
				<p>Fixer</p>
			</div>
		</div>

</div>
</div>
</div>
<footer id="footer">
  <h4>Follow Us</h4>
  <a class="" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook" style="position:center;"></i></a>
  <a class="" href="javascript:void(0)" title="Twitter"><i class="fa fa-twitter" style="position:center;"></i></a>
  <a class="" href="javascript:void(0)" title="Google +"><i class="fa fa-google-plus" style="position:center;"></i></a>
  <a class="" href="javascript:void(0)" title="Google +"><i class="fa fa-instagram" style="position:center;"></i></a>
  <a class="" href="javascript:void(0)" title="Linkedin"><i class="fa fa-linkedin" style="position:center;"></i></a>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>

  <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
    <span class="w3-text w3-padding w3-teal w3-hide-small">Go To Top</span>   
    <a class="w3-button w3-theme" href="#myPage"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
</footer>

</body>
</html>
