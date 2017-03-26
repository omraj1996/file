<?php

	//session_start();
	//$userid=$_SESSION['userid'];
	//$password=$_SESSION['password'];
	mysql_connect("localhost","root","");
	mysql_select_db("om");
if(isset($_POST['upload'])){

	 $file = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="../uploads/";
 
 // new file size in KB
 $new_size = $file_size/1024;  
 // new file size in KB
 
 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 $final_file=str_replace(' ','-',$new_file_name);
 //move_uploaded_file($file_loc,$folder.$final_file);
 if(move_uploaded_file($file_loc,$folder.$final_file)){
 $upload="update loginmaster set filepath='../uploads/$new_file_name' where userid='$userid'";
if(mysql_query($upload)){
	echo "yes";

}
else
 echo mysql_error();
 }
 

}

?>
