<?php

include('mpdf.php');

$name 	= $_POST['username'];
$email 	= $_POST['userid'];
$msg 	= $_POST['message'];
$address= $_POST['address'];
$mobileno 	= $_POST['mobileno'];
$board 	= $_POST['board'];
$board1 	= $_POST['board1'];
$college 	= $_POST['college'];
$school 	= $_POST['school'];
$school1 	= $_POST['school1'];
$highschool 	= $_POST['highschool'];
$inter 	= $_POST['inter'];
$branch	= $_POST['branch'];
$degree 	= $_POST['degree'];
$graduation 	= $_POST['graduation'];
$db 	= $_POST['db'];
$os 	= $_POST['os'];
$prgmlanguage 	= $_POST['prgmlanguage'];
$software 	= $_POST['software'];
$otherskill 	= $_POST['otherskill'];
$industryexp 	= $_POST['industryexp'];
$academicproject 	= $_POST['academicproject'];
$acdachvmt	= $_POST['acdachvmt'];
$sports 	= $_POST['sports'];
$cultural 	= $_POST['cultural'];
$others 	= $_POST['others'];

$html .= "
<html>
<head>
<style>
body {font-family: sans-serif;
    font-size: 10pt;
}
p{
	background-color:black;
	color:white;
}
pre{
	color:black;
}
h5{
	color:black;
}

</style>
</head>
<body>

<!--mpdf
<htmlpagefooter name='myfooter'>
<div style='border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; '>
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>

<sethtmlpageheader name='myheader' value='on' show-this-page='1' />
<sethtmlpagefooter name='myfooter' value='on' />
mpdf-->

<div style='text-align:center;'>HTML Form to PDF - Blog.theonlytutorials.com</div><br>
<h1>$name</h1>
<b><hr></b>
<p><b>CONTACT</b></p>
<pre>
$address                                                       Email:$email
															   Phone No.:$mobileno
</pre>
<p><b>CAREER VISION</b></p>
<pre>
$msg
</pre>
<p><b>EDUCATION</b></p>
<pre><b>HIGH SCHOOL($board)</b>
$school
Scored :$highschool
</pre>
<pre><b>INTERMEDIATE($board1)</b>
$school1
Scored :$inter
</pre>
<pre><b>COLLEGE</b>
$college
Branch:$branch
Degree:$degree
CPI:$graduation
</pre>
<p><b>SOFTWARE AND HARDWARE SKILLS</b></p>
<pre>
Programming Tools:$prgmlanguage
Database Tools:$db
Web Designing Tools:$otherskill
Working Platform:$os
Software Known:$software
</pre>
<p><b>PROJECT AND TRAININGS</b></p>
<pre>
Industry Experience:$industryexp
Academic Project:$academicproject
</pre>
<p><b>ACADEMIC ACHIEVMENT</b></p>
<pre>
Academic:$acdachvmt
Sports:$sports
Cultural:$cultural
Others:$others
</pre>
</body>
</html>
";



$mpdf=new mPDF();
$mpdf->WriteHTML($html);
$mpdf->SetDisplayMode('fullpage');

$mpdf->Output();

?>