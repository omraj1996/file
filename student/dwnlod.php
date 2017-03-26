
<html>
<head>
<title>Download File From MySQL</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php
mysql_connect("localhost","root","");
mysql_select_db("om");


$query = "SELECT id, name FROM upload";
$result = mysql_query($query) or die('Error, query failed');
if(mysql_num_rows($result) == 0)
{
echo "Database is empty <br>";
} 
else
{
while(list($id, $name) = mysql_fetch_array($result))
{
	//header("Content-type:$type");
	//echo mysql_result($result, 0);
?>
<a href="dwnlod1.php?id=<?php echo $id;?>"><?php echo $name;?></a> <br>


<?php 
}
}
 include 'dwnlod1.php'
?>
</body>
</html>