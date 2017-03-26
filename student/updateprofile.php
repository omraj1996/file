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

		$res=mysql_query("SELECT content from studentmaster where userid='$userid'");
		$row=mysql_fetch_array($res);
		
}

?>

<?php
if(isset($_POST['update'])){
	mysql_connect("localhost","root","");
	mysql_select_db("om");

		$userid=$_POST['userid'];
		$branch=$_POST['branch'];
		$degree=$_POST['degree'];
		$batch=$_POST['batch'];
		$joiningyear=$_POST['joiningyear'];
		$rollno=$_POST['rollno'];
		
		$s1="UPDATE studentmaster SET batch='$batch',branch='$branch',degree='$degree',joiningyear='$joiningyear',rollno='$rollno' WHERE userid='$userid'";
		mysql_query($s1);
		
		//$acdachvmt=$_POST['acdachvmt'];
		$sports=$_POST['sports'];
		$cultural=$_POST['cultural'];
		$others=$_POST['others'];
		$graduation=$_POST['graduation'];
		$inter=$_POST['inter'];
		$highschool=$_POST['highschool'];
		
		$s2="UPDATE studentacademicmaster SET sports='$sports',cultural='$cultural',othersr='$others',graduation='$graduation',
		inter='$inter',highschool='$highschool' WHERE userid='$userid'";
		mysql_query($s2);
		
		$name=$_POST['name'];	
		$address=$_POST['address'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		$mobileno=$_POST['mobileno'];
		
		$s3="UPDATE studentpersonalmaster SET name='$name',address='$address',gender='$gender',dob='$dob',mobileno='$mobileno' WHERE userid='$userid'";
		mysql_query($s3);
		
		$prgmlanguage=$_POST['prgmlanguage'];
		$db=$_POST['db'];
		$os=$_POST['os'];
		$software=$_POST['software'];
		$otherskill=$_POST['otherskill'];
		$industryexp=$_POST['industryexp'];
		//$academicproject=$_POST['academicproject'];
		$s4="UPDATE studenttechnicalmaster SET prgmlanguage='$prgmlanguage',db='$db',software='$software',otherskill='$otherskill',industryexp='$industryexp',
			WHERE userid='$userid'";
		mysql_query($s4);


}
?>
<?php
include '../upload.php'; 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<head>


</head>
<body bgcolor="#acdfe2">
<?php include 'studentnavigation.php'?>

<form method="POST" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
<input name="file" type="file" />
		<fieldset style="width:1175px; display:inline-block">
		<legend><span><b><font color="#800040">Training&nbsp;</font></b></span></legend>
			Name:<input type="text" name="name" value="<?php echo $name?>"><br>
			Date of Birth:<input type="text" name="dob" value="<?php echo $dob?>"><br>		
			Gender:<input type="text" name="gender" value="<?php echo $gender?>"><br>
			Address:<input type="text" name="address" value="<?php echo $address?>"><br>
			Mobile Number:<input type="text" name="mobileno" value="<?php echo $mobileno?>">
			</fieldset>
			<br><br>
		<fieldset style="width:1175px; display:inline-block">
		<legend><span><b><font color="#800040">Training&nbsp;</font></b></span></legend>
		<table width="100%" border="0" cellpadding="2" cellspacing="0">
		 <tr>
			<td align="left" width="40%">Username:<input type="text" name="userid" value="<?php echo $userid?>"></td>
			<td align="left" width="60%">Roll No.:<input type="text" name="rollno" value="<?php echo $rollno?>"></td>
			</tr>
			Batch:<input type="text" name="batch" value="<?php echo $batch?>"><br>
			Branch:<input type="text" name="branch" value="<?php echo $branch?>"><br>
			Degree:<input type="text" name="degree" value="<?php echo $degree?>"><br>
			Joining Year:<input type="text" name="joiningyear" value="<?php echo $joiningyear?>">
			</table>
		</fieldset>
		<br><br>
		<fieldset style="width:1175px; display:inline-block">
		<legend><span><b><font color="#800040">Training&nbsp;</font></b></span></legend>
			Academic Achievement:<input type="text" name="acdachvm" value="<?php echo $acdachvmt?>"><br>
			Sports:<input type="text" name="sports" value="<?php echo $sports?>"><br>
			Cultural:<input type="text" name="cultural" value="<?php echo $cultural?>"><br>
			Others:<input type="text" name="others" value="<?php echo $others?>"><br>
			CPI of Last Semester:<input type="text" name="graduation" value="<?php echo $graduation?>"><br>
			Percentage Obtained in 10th :<input type="text" name="highschool" value="<?php echo $highschool?>"><br>
			Percentage Obtaned in 12th:<input type="text" name="inter" value="<?php echo $inter?>"><br>
			</fieldset>
			<br><br>

		<fieldset style="width:1175px; display:inline-block">
		<legend><span><b><font color="#800040">Training&nbsp;</font></b></span></legend>
			Programming Language Known:<input type="text" name="prgmlanguage" value="<?php echo $prgmlanguage?>"><br>
			Database Tools:<input type="text" name="db" value="<?php echo $db?>"><br>
			Operating System<input type="text" name="os" value="<?php echo $os?>"><br>
			Software:<input type="text" name="software" value="<?php echo $software?>"><br>
			Otherskills:<input type="text" name="otherskill" value="<?php echo $otherskill?>"><br>
			Industry Experience:<input type="text" name="industryexp" value="<?php echo $industryexp?>"><br>
			</fieldset>
			<br><br>
		<input name="upload" type="submit" class="box" id="update" value=" Update ">
			

</form>
</body>
</html>

