<?php
session_start();
$userid=$_SESSION['userid'];
	mysql_connect("localhost","root","");
	mysql_select_db("om");
//loggedin person info
$sql="select id,userid from loginmaster where userid=$userid";
$query=mysql_query($sql);
while($row=mysql_fetch_array($query)){
$pid=$row['id'];
$userid=$row['userid'];

}
mysql_free_result($query);
//to send message to particular user because threre is no $_SESSION['username']
$to_userid=$_POST['to_userid'];
$sqlCommand="select id,userid from users where id='$to_userid' limit 1";
$query=mysql_query($sqlCommand);
while($row=mysql_fetch_array($query)){
$TOid=$row['id'];
$TOuser=$row['userid'];
}

mysql_free_result($query);
?>
<table width="800" border="0">
<tr>
<td></td>

</tr>
</table>
<table width="800" border="0">
<tr>
<td>You are currently logged in as:<?php  echo $_SESSION['userid']; ?></td>
<tr>
<td><?php require_once"check.php";?></td>
</tr>
</tr>
</table>


<table width="800" border="0">
<form action="send_to.php" method="post">
<tr>
<td width="185">SENDING TO:</td>
<td width="605"><input name="to_userid" type="text" id="to_userid" readonly="readonly" value="<?php  print $TOuser ?>" size="140" style="border: hidden"/>
</td>
</tr>
<tr>
<td width="185">Title:</td>
<td width="605"><input name="title"  type="text" id="title" size="40"/></td>
</tr>


<tr>
<td width="185">Message:</td>
<td width="605"><textarea name="message"  cols="20" rows="10"></textarea></td></tr>


<tr>
<td colspan="2" align="center"><input type="submit" name="submit" id="submit"  value="<?php  print $TOuser;   ?>"/>
<input name="to_userid" type="hidden" id="to_userid" value="<?php print $TOid;?>"/>
<input name="uid" type="hidden" id="userid" value="<?php print $pid ;?>"/>
<input name="from_userid" type="hidden" id="from_userid" value="<?php print $userid;?>"/> 
<input name="senddate" type="hidden" id="sender" value="<?php echo date("l,jS F Y,g:i:s:a"); ?>"/></td>
</tr>

<?php
//require_once"connect_i.php";
if($_POST['submit']){
$to_userid=$_POST['to_userid'];
$title=$_POST['title'];
$message=$_POST['message'];
$to_id=$_POST['to_id'];
$uid=$_POST['uid'];
$from_userid=$_POST['from_userid'];
$senddate=$_POST['senddate'];

//special character fix
//this function allows user to send message characters like ?,/,#,$,%,& etc.if this function from 78line to 86 not used then user cannot send
//such  caracters.
function filterFunction($var){
$var=nl2br(htmlspecialchars($var));
$var=eregi_replace("'","&#39;",($var));

$var=eregi_replace("'","$#39;",($var));
return $var;
}

$message=filterFunction($message);// this $message from line number 70
	mysql_connect("localhost","root","");
	mysql_select_db("om");

$query=mysql_query("insert into outbox(uid,userid,to_id,to_userid,title,content,senddate)values('$uid','$from_userid','$to_id','$to_userid','$title','$message','$senddate')");


$query=mysql_query("insert into inbox(uid,userid,from_id,from_userid,title,content,recieve_date)values('$to_id','to_userid','$uid','$from_userid','$title','$message','$senddate')");

  echo "<meta http-equiv=\"refresh\"content=\"0;URL=outbox.php\">";
  exit();
}

?>