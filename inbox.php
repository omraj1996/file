<?php

mysql_connect("localhost","root","");
mysql_select_db("om");

require_once'check.php';
 
if($_SESSION['userid']){


$sql="SELECT * FROM  inbox WHERE uid='$pid' ORDER by id DESC";

$result=mysql_query($sql);
$count=mysql_num_rows($result);


?>
<table width="800" border="1">
<form action="inbox.php" method="post" name="form1">
<tr>
<td width="41"></td>
<td width="255">Title:</td>
<td width="255">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;from:</td>
<td width="255">Message:</td>
<td width="255">Receive Date:</td>

</tr>

<?php 
while($rows=mysql_fetch_array($result)){
?>
<?php if($rows['viewed']==0){//show message in bold ?>
<tr>
<td width="41" align="center"> <input type="checkbox" name="checkbox[]"  id="checkbox[]" value="<?php echo $rows['id']; ?>"/></td>
<td  width="200"><!--<a href="viewmsg.php?in=--> <?php echo $rows['id'];?><b><?php echo $rows['title'];?></b><!--</a>--></td> 
<td width="200"><?php echo $rows['from_userid'];?></td><td> <?php echo $rows['content'];?></td><td> <?php echo $rows['recieve_date'];?></td>
</tr>

<?php   //Do not show message in bold if it is viewed ,So remove <b>    ?>

<?php } else if($rows['viewed']==1){?>
<tr>
<td width="41" align="center"> <input type="checkbox" name="checkbox[]" id="checkbox[]" value="<?php  echo $rows['id']; ?>"/></td>
<td  width="260"><!--<a href="viewmsg.php?in=--> <?php  echo $rows['id'];?><!--">--><?php echo $rows['title'];?><!--</a>--></td>
<td width="260"><?php echo $rows['from_userid'];?></td><td> <?php echo $rows['content'];?></td>
</tr>
</table>
<?php } ?>
<?php } ?>

<td colspan="3" align="center"><?php if($inboxMessagesNew>0){?>
<input type="submit" name="delete" id="delete" value="Delete Selected Message"/>
<?php } else { print "There is no message in your inbox";}?></td>
</table>
<?php } else { ?>
<table width="800" border="0">
<tr>
<td>Please login<a href="loginpost.php">Login to your account</a></td>
</tr>
</table>


<?php }?>

 <?php
 
if($_POST['delete']){
$checkbox=$_POST['checkbox'];
$delete=$_POST['delete'];
if($delete){
for($i=0; $i<$count; $i++){
$del_id=$checkbox[$i];

$sql="delete from inbox where id='$del_id'";
$result=mysql_query($sql);
}
 
if($result){
echo  "<meta http-equiv=\"refresh\"content=\"0;URL=inbox.php\">";
}
}mysql_close();
} 
else{
}


?>
</form>