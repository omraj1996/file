<?php
//session_start();
if(isset($_SESSION))
{
		mysql_connect("localhost","root","");
		mysql_select_db("om");
		$userid=$_SESSION['userid'];
		$password=$_SESSION['password'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../AdminLTE.min.css">
<style>
.abc{
  width: 30px;
  height: 30px;
 display: inline-block;

}
.abc1{
  float: left;
  margin-right: 5px;
}
.badge-notify{
   background:red;
   position:relative;
   top: -18px;
   left: -10px;
}
</style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="facultyin.php">Home</a></li>
        
		<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Notice <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="../simpnoticeboard/teacher/notification.php">View Notice</a></li>
					<li><a href="../simpnoticeboard/notify1.php">Post Notice</a></li>
				</ul>
		</li>
        <li><a href="u1.php">Upload</a></li>
		<li><a href="studentreport.php">Student</a></li>
		<li><?php include '../search-form.php'?></li>
      </ul>
<?php
		if(isset($_SESSION))
		{
			mysql_connect("localhost","root","");
			mysql_select_db("om");
							
			$sql=mysql_query("Select id,message,content,from_username from inbox where to_userid='$userid'");
							
			$n=0;
							
			while($res= mysql_fetch_array($sql))
			{
				$n++;
			}
		}
	  
?>
      <ul class="nav navbar-nav navbar-right">
       <li class="dropdown messages-menu">
	   <a class="dropdown-toggle" data-toggle="dropdown" href="#contact"><img src="../uploads/users.png"><span class="badge badge-notify"><?php echo $n;?></span></span></a>
	   <ul class="dropdown-menu">
	    <li class="header">You have <?php echo $n;?>Friend Request</li>
		<li>
		<ul class="menu">
				<?php
						/*//session_start();
						//$userid=$_SESSION['userid'];
						//$password=$_SESSION['password'];
						if(isset($_SESSION))
						{
							mysql_connect("localhost","root","");
							mysql_select_db("om");
							
							$sql=mysql_query("Select id,message,content,from_username from inbox where to_userid='$userid'");
							
							$n=0;
							
							while($res= mysql_fetch_array($sql))
							{
								$n++;
								$loc=$res['content'];
								$name=$res['from_username'];
								//echo $loc;
								if($res['content']=="")
								{
									echo '  
										<li>
											
											<a href="viewmsg.php?id='.$res['id'].'">
												<div  class="abc">
													<div class="abc1">
														<img  class="img-circle" height="40" width="40" src="../uploads/default1.jpg">
													</div>
													<div class="abc2">
														<b>'.$name.'</b><br>
														'.$res['message'].'
													</div>
												</div>
											</a>
											
										</li>
										
											';
											//	
								
								}
								else
								{
									//echo'<img  class="img-circle" height="30" width="30" src='$loc'>';
									echo '  
										<li> 
										
											<a href="viewmsg.php?id='.$res['id'].'">
												<div class="abc">
													<div class="abc1" >
														<img  class="img-circle" height="40" width="40" src="'.$loc.'">
													</div>
													<div class="abc2" >
														<b>'.$name.'</b><br>
														'.$res['message'].'
													</div>
												</div>
											</a>
											
										</li>
										
											';
													
									
									}
								
							}
						$res=mysql_query("SELECT content from studentmaster where userid='$userid'");
						$row=mysql_fetch_array($res);
						}*/
						
				?>
				</ul>
				</li>
			<li class="footer"><a href="#">See All Friend Request</a></li>
	   </ul>
	   </li>
	  <li class="dropdown messages-menu">
	   <a class="dropdown-toggle" data-toggle="dropdown" href="#contact"><span class="glyphicon glyphicon-globe" style="font-size:24px" aria-hidden="true"><span class="badge badge-notify"><?php echo $n;?></span></span></a>
	   <ul class="dropdown-menu">
	    <li class="header">You have <?php echo $n;?>Notifications</li>
		<li>
		<ul class="menu">
				<?php
						/*//session_start();
						//$userid=$_SESSION['userid'];
						//$password=$_SESSION['password'];
						if(isset($_SESSION))
						{
							mysql_connect("localhost","root","");
							mysql_select_db("om");
							
							$sql=mysql_query("Select id,message,content,from_username from inbox where to_userid='$userid'");
							
							$n=0;
							
							while($res= mysql_fetch_array($sql))
							{
								$n++;
								$loc=$res['content'];
								$name=$res['from_username'];
								//echo $loc;
								if($res['content']=="")
								{
									echo '  
										<li>
											
											<a href="viewmsg.php?id='.$res['id'].'">
												<div  class="abc">
													<div class="abc1">
														<img  class="img-circle" height="40" width="40" src="../uploads/default1.jpg">
													</div>
													<div class="abc2">
														<b>'.$name.'</b><br>
														'.$res['message'].'
													</div>
												</div>
											</a>
											
										</li>
										
											';
											//	
								
								}
								else
								{
									//echo'<img  class="img-circle" height="30" width="30" src='$loc'>';
									echo '  
										<li> 
										
											<a href="viewmsg.php?id='.$res['id'].'">
												<div class="abc">
													<div class="abc1" >
														<img  class="img-circle" height="40" width="40" src="'.$loc.'">
													</div>
													<div class="abc2" >
														<b>'.$name.'</b><br>
														'.$res['message'].'
													</div>
												</div>
											</a>
											
										</li>
										
											';
													
									
									}
								
							}
						$res=mysql_query("SELECT content from studentmaster where userid='$userid'");
						$row=mysql_fetch_array($res);
						}*/
						
				?>
				</ul>
				</li>
			<li class="footer"><a href="#">See All Notifications</a></li>
	   </ul>
	   </li>
       <li class="dropdown messages-menu">
	   <a class="dropdown-toggle" data-toggle="dropdown" href="#contact"><span class="glyphicon glyphicon-envelope" style="font-size:24px" aria-hidden="true"><span class="badge badge-notify"><?php echo $n;?></span></span></a>
	   <ul class="dropdown-menu">
	    <li class="header">You have <?php echo $n;?> messages</li>
		<li>
		<ul class="menu">
				<?php
						//session_start();
						//$userid=$_SESSION['userid'];
						//$password=$_SESSION['password'];
						if(isset($_SESSION))
						{
							mysql_connect("localhost","root","");
							mysql_select_db("om");
							
							$sql=mysql_query("Select id,message,content,from_username from inbox where to_userid='$userid'");
							
							$n=0;
							
							while($res= mysql_fetch_array($sql))
							{
								$n++;
								$loc=$res['content'];
								$name=$res['from_username'];
								//echo $loc;
								if($res['content']=="")
								{
									echo '  
										<li>
											
											<a href="viewmsg.php?id='.$res['id'].'">
												<div  class="abc">
													<div class="abc1">
														<img  class="img-circle" height="40" width="40" src="../uploads/default1.jpg">
													</div>
													<div class="abc2">
														<b>'.$name.'</b><br>
														'.$res['message'].'
													</div>
												</div>
											</a>
											
										</li>
										
											';
											//	
								
								}
								else
								{
									//echo'<img  class="img-circle" height="30" width="30" src='$loc'>';
									echo '  
										<li> 
										
											<a href="viewmsg.php?id='.$res['id'].'">
												<div class="abc">
													<div class="abc1" >
														<img  class="img-circle" height="40" width="40" src="'.$loc.'">
													</div>
													<div class="abc2" >
														<b>'.$name.'</b><br>
														'.$res['message'].'
													</div>
												</div>
											</a>
											
										</li>
										
											';
													
									
									}
								
							}
						$res=mysql_query("SELECT content from studentmaster where userid='$userid'");
						$row=mysql_fetch_array($res);
						}
						
				?>
				</ul>
				</li>
			<li class="footer"><a href="#">See All Messages</a></li>
	   </ul>
	   </li>
          <?php
    if($_SESSION["userid"]) {
    ?>
    <!--<li style="float:right;color:white"><a href="logout.php" tite="Logout" style="float:right">Logout.</li></a>-->
	
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
    	<?php 

		$res=mysql_query("SELECT * from loginmaster where userid='$userid'");
		while($row=mysql_fetch_array($res))
		{
			$loc=$row['filepath'];
				if($row['filepath']==""){
		echo  "<img src='../uploads/default1.jpg' class='img-circle' width='30' height='30' />";
	}
	else
	{
		echo '<img class="img-circle" height="30" width="30" src="'.$loc.'">';
	}
		}

?><?php //echo $username; ?><span class="caret"></span></a>
<ul class="dropdown-menu">
                <li><a href="">Change profile picture</a></li>
                <li><a href="view.php">View Profile</a></li>
				<li><a href="updateprofile.php">Update Profile</a></li>      
				<li><a href="logout.php">Logout</a></li>
            
          </ul>
</li>
     
    <?php
    }
    ?>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container">
  
</div>

</body>
</html>
