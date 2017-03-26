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
		$batch=$row['batch'];
		$joiningyear=$row['joiningyear'];
		$rollno=$row['rollno'];
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
		$gender=$row2['gender'];
		$dob=$row2['dob'];
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>


  <style >
  /* Footer styles
-------------------------------------------------- */
body {
    margin:0; padding:0; height:100%; width: 100%; position:relative; overflow-x: hidden; overflow-y: hidden;
}

html {
    width: 100%; height: 100%; margin-left: 0px; margin-right: 0px; overflow-x: hidden; overflow-y: hidden";
}

#ordoner2 {
background-color:#ecf0f1;
float: left;
margin-left: 10px;
margin-top: 50px;
width: 250px;
height:58%;
position: fixed;
top: 153px;
}
.home {
  position:relative;
  top: 120px;
  bottom:100px;
  width:100%;
  height:58%; overflow-y: scroll;
}
#sideLeft {
float: left;
width: 740px;
height: 800px;
font-family: verdana;
font-color:red;
clear: left;
margin-left: 300px;

}
#footer {
  position: absolute;
  bottom: 0;
  
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 50px;
  background: 
  /* color overlay */ 
    linear-gradient(
      rgba(240, 212, 0, 0.45), 
      rgba(0, 0, 0, 0.45)
    );
}

.abc{
	 position: absolute;
  top: 1;
  
  width: 100%;
  


  background: 
  /* color overlay */ 
    linear-gradient(
      rgba(0, 0,250, 0.45), 
      rgba(0, 0, 0, 0.45)
    );
}
/* Custom footer CSS
-------------------------------------------------- */


.container{
	position:relative;
	top: 120px;
	width: 650;
	height: 650;
  max-width: 680px;
  overflow:auto;
  overflow-x:hidden;
  overflow-y: scroll 
}

  </style>
</head>



<body bgcolor="#acdfe2">
<?php include 'studentnavigation.php'?>

<div id="ordoner2">rrrwerewrewrewrwererrerw</div>


<div class="abc" >
<?php 

		$res=mysql_query("SELECT * from loginmaster where userid='$userid'");
		while($row=mysql_fetch_array($res))
		{
			$loc=$row['filepath'];
				if($row['filepath']==""){
		echo  "<img src='uploads/default.jpg' width='200' height='200' />";
	}
	else
	{
		echo '<img class="img-thumbnail" height="100" width="100" src="'.$loc.'">';
	}
		}

?>
  <b style="color:white;font-size:40px"><?php echo $name?></b></div>
			
<div class="home">
  <div id="sideLeft"> 
<b>Date of Birth:</b><?php echo $dob?><br>  					
		<b>Gender:</b><?php echo $gender?><br>						
		<b>Address:</b><?php echo $address?><br>  			
		<b>Mobile Number:</b><?php echo $mobileno?><br> 
    <b>Email Id:</b><?php echo $userid?><br>  				
		<b>Roll No.:</b><?php echo $rollno?><br>		     											
		  <b>Batch:</b><?php echo $batch?><br>													
			<b>Branch:</b><?php echo $branch?><br>	
      <b>Degree:</b><?php echo $degree?><br>
        <b>Joining Year:</b><?php echo $joiningyear?><br>
		<b>Academic Achievement:</b><?php echo $acdachvmt?><br>	<b>Programming Language Known:</b><?php echo $prgmlanguage?><br>
		<b>Sports:</b><?php echo $sports?><br>					<b>Database Tools:</b><?php echo $db?><br>
		<b>Cultural:</b><?php echo $cultural?><br>				<b>Operating System:</b><?php echo $os?><br>
		<b>Others:</b><?php echo $others?><br>					<b>Software:</b><?php echo $software?><br>
		<b>CPI of Last Semester:</b><?php echo $graduation?><br><b>Otherskills:</b><?php echo $otherskill?><br>
		<b>Percentage Obtained in 10th :</b><?php echo $highschool?><br><b>Industry Experience:</b><?php echo $industryexp?><br>
		<b>Percentage Obtaned in 12th:</b><?php echo $inter?><br>
			
	</div>	
</div>
 <footer class="footer" id="footer">

 </footer>

</body>

</html>
