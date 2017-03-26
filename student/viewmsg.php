<?php 
	session_start();
	$userid=$_SESSION['userid'];
	$password=$_SESSION['password'];
	mysql_connect("localhost","root","");
	mysql_select_db("om");
	
	
?>

<?php

if(isset($_GET['id']))
{
	$g=$_GET['id'];
$qry="select * from inbox where id='$g'";
$rs=mysql_query($qry);
$rw=mysql_fetch_row($rs);

//echo $rw[1];
//echo $rw[2];
//echo $rw[3];
//echo $rw[4];
//echo $rw[5];
//echo $rw[6];
}
?>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<form action="reply.php" method="post">
From:
<input name="from"  type="text" id="from" size="40" value="<?php echo $rw[2];?>"/>
<br>
Title:
<input name="title"  type="text" id="title" size="40" value="<?php echo $rw[3];?>"/>
<br>
Message:
<textarea name="message"  cols="20" rows="10" ><?php echo $rw[4];?></textarea>
<br>
<input name="sentdate" type="hidden" id="reciever" value="<?php echo date("l,jS F Y,g:i:s:a"); ?>"/>
<a href="reply.php?id='$g'"><input type="button" name="submit" id="submit"  value="Reply"/></a>	
  
