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
<th > Roll Number
<th > Batch
<th > Branch
<th> Degree
<th>Joining Year
<th>

<?php
//$g=$_GET['userid'];
$qry="select * from studentmaster";
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
	echo "<td >".$rw[5];
	echo "<td >".$rw[6];
	
	echo "<td>"?><a href="studentreport.php?userid=<?php echo $rw[1];?>" class="button">View Profile</a><?php
	
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
<th bgcolor=#000055> <font color=white> Student Profile
<tr>
<td bgcolor=#aaaaaa>&nbsp;
<tr>
<td >
<table border=0 align=center width=68%>
<tr>
<td>&nbsp;

<?php

if(isset($_GET['userid']))
{
	$g=$_GET['userid'];
$qry="select * from studentmaster where userid='$g'";
$rs=mysql_query($qry);
$rw=mysql_fetch_row($rs);

$qry1="select * from studentacademicmaster where userid='$g'";
$rs1=mysql_query($qry1);
$rw1=mysql_fetch_row($rs1);

$qry2="select * from studentpersonalmaster where userid='$g'";
$rs2=mysql_query($qry2);
$rw2=mysql_fetch_row($rs2);

$qry3="select * from studenttechnicalmaster where userid='$g'";
$rs3=mysql_query($qry3);
$rw3=mysql_fetch_row($rs3);

echo $rw[1];
echo $rw[2];
echo $rw[3];

echo $rw1[0];
echo $rw1[1];
echo $rw1[2];
echo $rw1[3];
echo $rw1[4];
echo $rw1[5];
echo $rw1[6];
echo $rw1[7];

echo $rw2[0];
echo $rw2[1];
echo $rw2[2];
echo $rw2[3];
echo $rw2[4];
echo $rw2[5];

echo $rw3[0];
echo $rw3[1];
echo $rw3[2];
echo $rw3[3];
echo $rw3[4];
echo $rw3[5];
echo $rw3[6];
echo $rw3[7];
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
