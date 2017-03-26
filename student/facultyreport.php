<html>
<head>
<style>
a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;
}
</style>
</head>
<body>
<center>
<?php
mysql_connect("localhost", "root", "");
mysql_select_db("om");
$selectrow=-1;

?>
<center>
<p>&nbsp;
<p>&nbsp;
<table border=1 width=50% bordercolor=#000055 style='border-collapse:collapse'>
<tr>
<th bgcolor=#000055> <font color=white> Report
<tr>
<td bgcolor=#aaaaaa>&nbsp;
<tr>
<td >
<table border=0 align=center width=68%>
<tr>
<td>&nbsp;
<tr bgcolor=#aaaaaa>
<th>Id
<th > User Id
<th > Department
<th > Degree
<th > Joining Year
<th>

<?php
//$g=$_GET['id'];
$qry="select * from facultymaster";
$rs=mysql_query($qry);
$n=0;
while($rw=mysql_fetch_row($rs))
{
	$n++;
	if($n%2!=0)
		echo "<tr>";
	else
		echo "<tr bgcolor=#dddddd>";
	echo"<td>".$rw[0];
	echo "<td >".$rw[1];
	
	echo "<td >".$rw[2];
	echo "<td >".$rw[3];
	echo "<td >".$rw[4];
	echo "<td>"?><a href="facultyreport.php?id=<?php echo $rw[0];?>" class="button">View profile</a><?php
}
?>
<tr>
<td>&nbsp;
</table>



</table>
<center>
<p>&nbsp;
<p>&nbsp;
<table border=1 width=50% bordercolor=#000055 style='border-collapse:collapse'>
<tr>
<th bgcolor=#000055> <font color=white> Faculty Profile
<tr>
<td bgcolor=#aaaaaa>&nbsp;
<tr>
<td >
<table border=0 align=center width=68%>
<tr>
<td>&nbsp;

<?php

if(isset($_GET['id']))
{
	$g=$_GET['id'];
$qry="select * from facultymaster where id='$g'";
$rs=mysql_query($qry);
$rw=mysql_fetch_row($rs);

echo $rw[1];
echo $rw[2];
echo $rw[3];
}
?>
<tr>
<td>&nbsp;
</table>
</table>
<p>
<b> <?php echo $n; ?> </b> record(s) ..
<p>
&copy; Om Raj - 2017
