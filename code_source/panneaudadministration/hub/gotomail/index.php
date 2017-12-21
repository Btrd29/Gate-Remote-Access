<?php
$request = $_POST['reponse'];

//Bombardements
if (strtoupper($request)=="LA COMBINAISON"||strtoupper($request)=="COMBINAISON") {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../../../base.css">
</head>
<body>
	<h1>Messagerie</h1>
	<br>
	<br>
	<img src="m1e2.PNG" style="width:1000px; height:auto ">
	<br>
	<img src="m2e2.PNG" style="width:1000px; height:auto ">
	<br>
	<img src="m3e2.PNG" style="width:1000px; height:auto ">
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
		width: 50%;
		height: auto;
	}
	</style>
</head>
<body>
	<h1>Trouvez la pour y accéder</h1>
	<br>
	<img src="photo.jpg">
	<br>
	<form method='post'>
		<input type="text" name="reponse">
		<input type="submit" value="valider">
	</form>
</body>
</html>

<?php
}
?>