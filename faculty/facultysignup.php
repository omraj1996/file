<html>
<link rel="stylesheet" type="text/css" href="navigation.css">
<body bgcolor="#9C640C">
<?php include 'navigation.php'?>
<div>
<form class="faculty" method="post" action="" >
User Id:<input type="text" placeholder="User Id" name="userid"/>
Password:<input type="text" placeholder="Password" name="password"/>
Department:<input type="text" placeholder="Branch" name="branch"/>
Degree:<select name="degree">
<option >B.Tech</option>
<option >M.Tech</option>
<option >MCA</option>
<option >P.hd</option>
</select>
Joining Year:<input type="text" placeholder="Joining Year" name="join"/>
<input type="submit" value="Register" name="faculty" />
</form>
</div>
</body>
</html>