<?php
session_start();
$userid=$_SESSION['userid'];
mysql_connect("localhost","root","");
mysql_select_db("om");
$sql="select id,userid from loginmaster";
$result=mysql_query($sql);

$options="";

while($row=mysql_fetch_array($result)){
$USERid=$row['id'];
$USERname=$row['userid'];
$options.="<OPTION VALUE=\"$USERid\">".$USERname."</OPTION>";
}
?>
<?php
$username=$_SESSION['userid'];

?>
<table width="800" border="0">
<tr>
<td>PHP PRIVATE MESSAGE  TUTORIAL</td>

</tr>
</table>
<table width="800" border="1">
<tr>
<td>You are currently logged in as, &nbsp;&nbsp;<?php  echo $userid; ?></td>
<tr>
<td><?php require_once"check.php";?></td>
</tr>
</tr>
</table>
<form action="send_to.php" id="form" method="post" onSubmit="return validate_form();">
<tr>
<td width="185">select user</td>
<td width="605"><select name="to_userid" id="to_userid">
<?php echo $options;?>
</OPTION></select></td>
</tr>
<tr> <td colspan="2"><input type="submit" id="submit" value="select user"/></td>
</tr>
</form>
</table>









