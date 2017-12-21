<?php
$request = $_POST['reponse'];

//Bombardements
if (strtolower($request)=="l'autre côté") {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../../../base.css">
	<style type="text/css">
	img {
		width: 75%;
		height: auto;
	}
	</style>
</head>
<body>
	<img src="L'autre_Côté.png">
</body>
</html>

<?php
} else {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../../../base.css">
	<style type="text/css">
	img {
		width: 30%;
		height: auto;
	}
	</style>
</head>
<body>
	<br>
	<img src="téléporteur.jpg">
	<br>
	<form method='post'>
	<center>
	<TABLE BORDER="1" style="background-color:lightgrey;color:black">
		<TR>
			<TD> 1-1-25-44 </TD>
			<TD> 9-11-35-35 </TD> 
			<TD> 4-2-1-22 </TD> 
		</TR> 
		<TR> 
			<TD> Pardon </TD> 
			<TD> Baissez vos armes </TD> 
			<TD><input type="text" name="reponse" size="15"></TD> 
		</TR> 
	</TABLE>
	<br>
	<input type="submit" value="valider">
	</center> 
	</form>
</body>
</html>

<?php
}
?>