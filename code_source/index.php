<?php
$nom = $_POST['champ1']; 
$prenom = $_POST['champ2'];
$phrase = $_POST['champ3']; 

if ($nom=='Rhob'&&$prenom=='Slein') { ?>

<html>
<head>
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../base.css">
</head>
<body>
	<h1><span>G</span>ate <span>R</span>emote <span>A</span>ccess</h1>
	<h3>G.R.A. v0.1 - Portail de communication distant</h3>
	<br>
	<h3>Bienvenue Professeur Rhob</h3>
	<form>
		<button formaction="../1015ur1401l/">1015ur1401l</button>
		<button formaction="../lkcononyxxooc/">Emergency Access</button>
		<!--deux choix aussi precieux l'un que l'autre s'offrent a vous-->
	</form>
</body>
</html>

<?php
} elseif ($nom=='Murphy'&&$prenom=='William'||$phrase!=null&&strtoupper($phrase)!='THE QUICK BROWN FOX JUMPS OVER THE LAZY DOG') { ?>

<html>
<head>
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../base.css">
</head>
<body>
	<h1><span>G</span>ate <span>R</span>emote <span>A</span>ccess</h1>
	<h3>G.R.A. v0.1 - Portail de communication distant</h3>
	<br>
	<h3>Bienvenue Assistant Murphy</h3>
	<br>
	<br>
	<img src="pcddasmrvl02.PNG" style="width:1800px; height:auto ">
	<form method="post">
		<input type="text" name="champ3" size="15">
		<input type="submit" value="valider">
	</form>
</body>
</html>

<?php
} elseif (strtoupper($phrase)=='THE QUICK BROWN FOX JUMPS OVER THE LAZY DOG') {

header('Location: /messagerie');

} elseif ($nom!=''||$prenom!='') {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>ALERTE SECURITE</title>
	<link rel="stylesheet" href="base.css">
</head>
<body>
	<audio autoplay loop><source src="alert.mp3" type="audio/mpeg"></audio>
	<h1><font color="#b20000">Niveau de sécurité élevé</h1>
	<h2><a href="http://www.twitter.com/Slein_Rhob" style="text-decoration:none; color:#b20000">Identification</a> requise</font></h2>
	<form method="post">
		<input type="text" name="champ1" size="15">
		<input type="text" name="champ2" size="15">
		<input type="submit" value="valider">
	</form>
</body>
</html>

<?php
} else {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>ALERTE SECURITE</title>
	<link rel="stylesheet" href="base.css">
</head>
<body>
	<h1><font color="#b20000">Niveau de sécurité élevé</h1>
	<h2><a href="http://www.twitter.com/Slein_Rhob" style="text-decoration:none; color:#b20000">Identification</a> requise</font></h2>
	<form method="post">
		<input type="text" name="champ1" size="15">
		<input type="text" name="champ2" size="15">
		<input type="submit" value="valider">
	</form>
</body>
</html>

<?php
}
?>