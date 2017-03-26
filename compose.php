<?php
session_start();
	$userid=$_SESSION['userid'];
	$password=$_SESSION['password'];
	if(isset($_SESSION))
	{
		mysql_connect("localhost","root","");
		mysql_select_db("om");
			$res= mysql_query("SELECT filepath from loginmaster where userid='$userid'");
			while($row=mysql_fetch_array($res))
			{
				$from_userid= $row['filepath'];
			}
				
			
			
			
		if(isset($_POST['submit']))
		{
			
			$to=$_POST['to'];
			$title=$_POST['title'];
			$message=$_POST['message'];
			$senddate=$_POST['senddate'];

			mysql_query("insert into inbox(to_userid,from_userid,title,message,senddate,content)values('$to','$userid','$title','$message','$senddate','$from_userid')");
		}
		
	}
?>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<form action="compose.php" method="post">
SENDING TO:
<input name="to"  type="text" id="to" size="40"/>
<br>
Title:
<input name="title"  type="text" id="title" size="40"/>
<br>
Message:
<textarea name="message"  cols="20" rows="10"></textarea>
<br>
<input name="senddate" type="hidden" id="sender" value="<?php echo date("l,jS F Y,g:i:s:a"); ?>"/>
<input type="submit" name="submit" id="submit"  value="Send"/>



