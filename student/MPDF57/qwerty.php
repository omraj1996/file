
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
<head>
   <link rel="stylesheet" href="../AdminLTE.min.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
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
  <header>
<nav class="navbar navbar-inverse  ">
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
        <li class="active"><a href="../home1.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile <span class="caret"></span></a>
          <ul class="dropdown-menu">
                  <li><a href="../view.php">View Profile</a></li>
        
        <li><a href="../updateprofile.php">Update Profile</a></li>
            
          </ul>
        </li>
        <li><a href="../../simpnoticeboard/student/notification.php">Notice</a></li>
      <li><a href="../dwnlod.php">Download</a></li>
      <li><a href="../MPDF57/qwerty.php">Build Resume</a></li>
      <li><a href="../facultyreport.php">Faculty</a></li>
      <li><a href="#contact">Contact</a></li>
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
														<img  class="img-circle" height="40" width="40" src="../'.$loc.'">
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
    <li style="float:right;color:white"><a href="../logout.php" tite="Logout" style="float:right">Logout.</li></a>
    <li ><a href="#">
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
		echo '<img class="img-circle" height="30" width="30" src="../'.$loc.'">';
	}
		}

?><?php echo $_SESSION["userid"]; ?></a></li>
   
    <?php
    }
    ?>
      </ul>
    </div>
  </div>
</nav>
</header>
<?php


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
		$software=$row3['software'];
		$otherskill=$row3['otherskill'];
		$industryexp=$row3['industryexp'];
		$academicproject=$row3['academicproject'];
		}
}

?>
<html>
<head>
<style>
input[type="text"] {
  display: block;
  margin: 0;
  width: 100%;
  font-family: sans-serif;
  font-size: 18px;

    padding: 10px;
  border: solid 1px #dcdcdc;
  transition: box-shadow 0.3s, border 0.3s;
}
input[type="text"]:focus,input[type="text"].focus{
  outline: none;
    border: solid 1px #707070;
  box-shadow: 0 0 5px 1px #969696;
}

</style>
</head>
<body>

<form method="post" action="abcd.php">
<pre>
<div class="input-group">
  <span class="input-group-addon" id="sizing-addon2">Username</span>
  <input type="text" class="form-control" name="username" placeholder="Username" aria-describedby="sizing-addon2" value="<?php echo $name?>">
</div>
<div class="input-group">
  <span class="input-group-addon" id="sizing-addon2">Contact:</span>
  <input type="text" class="form-control" placeholder="Address" aria-describedby="sizing-addon2" value="<?php echo $address?>">
</div>
<div class="input-group">
  <span class="input-group-addon" id="sizing-addon2">Email:</span>
<input type="text" class="form-control" placeholder="Email" aria-describedby="sizing-addon2" name="userid" value="<?php echo $userid?>">
</div>
Phone:<input type="text" placeholder="Phone no." name="mobileno" value="<?php echo $mobileno?>">
Career Vission:<input type="text" placeholder="Career Vission" name="message" >
Education:
			High School:
			Board:<input type="text" placeholder="Name of Board" name="board">
			School:<input type="text" placeholder="Name of School" name="school">
			Score:<input type="text" placeholder="Marks in Percentage" name="highschool" value="<?php echo $highschool?>"> in %age.
			Secondary High School:
			Board:<input type="text" placeholder="Name of Board" name="board1">
			School:<input type="text" placeholder="Name of School" name="school1">
			Score:<input type="text" placeholder="Marks in Percentage" name="inter" value="<?php echo $inter?>"> in %age.
			College:
			Name of College:<input type="text" placeholder="Name of School" name="college">
			Branch:<input type="text" placeholder="Name of Board" name="branch" value="<?php echo $branch?>">
			Degree:<input type="text" placeholder="Degree" name="degree" value="<?php echo $degree?>">
			CPI:<input type="text" placeholder="Marks in Percentage" name="graduation" value="<?php echo $graduation?>"> in grades.
			
			Academic Achievement:<input type="text" placeholder="Any Academic Achievement" name="acdachvmt" value="<?php echo $acdachvmt?>">
			Sports:<input type="text" placeholder="Sports" name="sports" value="<?php echo $sports?>">
			Cultural:<input type="text" placeholder="Cultural" name="cultural" value="<?php echo $cultural?>">
			Others:<input type="text" placeholder="Others" name="others" value="<?php echo $others?>">
			
Software and Hardware Skills:
			Programming Languages:<input type="text" placeholder="Pragramming Laguages Known" name="prgmlanguage" value="<?php echo $prgmlanguage?>">
			Database Tools:<input type="text" placeholder="Database" name="db" value="<?php echo $db?>">
			Operating System:<input type="text" placeholder="Operating System" name="os" value="<?php echo $os?>" >
			Software:<input type="text" placeholder="Software" name="software" value="<?php echo $software?>">
			Other Skills:<input type="text" placeholder="Other Skills" name="otherskill" value="<?php echo $otherskill?>">
			Industry Experience:<input type="text" placeholder="Industry Experience" name="industryexp" value="<?php echo $industryexp?>">
			Academic Project:<input type="text" placeholder="Academic Project" name="academicproject" value="<?php echo $academicproject?>">
			
			<input type="submit" value="Generate Resume" name="resume">
			
</pre>
</form>
</body>
</html>
