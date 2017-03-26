<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("om");

require_once'check.php';
 


$sql="SELECT * FROM  outbox WHERE uid='$pid' ORDER by id DESC";

$result=mysql_query($sql);
$count=mysql_num_rows($result);


?>
<table width="800" border="o">
<form action="outbox.php" method="post" name="form1">
<tr>
<td width="41"></td>
<td width="490">TItle:</td>
<td width="255">from:</td>

</tr>
<?php 
while($rows=mysql_fetch_array($result)){
?>
<tr>
<td width="41" align="center">
<td><input type="checkbox" name="checkbox[]" id="checkbox[]"  value="<?php echo $rows['id']; ?>" </td>
<td  width="490"><a href="pm_view_out.php?out=<?php echo $rows['id'];?>"><b><?php echo $rows['title'];?></b></a>
<td width="225"><?php echo $rows['to_userid'];?></td>
<?php } ?>
</tr>

  <td colspan="3" align="center"><?php if($outboxMessages>0){?>
<input type="submit" name="delete" id="delete" value="Delete Selected Message"/>
<?php } else { echo "There is no message in your outbox";}?></td>
</tr>
 
 <?php
 
if($_POST['delete']){
$checkbox=$_POST['checkbox'];
$delete=$_POST['delete'];
if($delete){
for($i=0; $i<$count; $i++){
$del_id=$checkbox[$i];

$sql="delete from outbox where id='$del_id'";
$result=mysql_query($sql);
}
 
if($result){
echo  "<meta http-equiv=\"refresh\"content=\"0;URL=outbox.php\">";
}
}mysql_close();
} 
else{
}


?>
</form>