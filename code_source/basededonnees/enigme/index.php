<?php
$rep01 = strtolower($_POST['01']); 
$rep02 = strtolower($_POST['02']); 
$rep03 = strtolower($_POST['03']); 
$rep11 = strtolower($_POST['11']); 
$rep12 = strtolower($_POST['12']); 
$rep13 = strtolower($_POST['13']); 
$rep21 = strtolower($_POST['21']); 
$rep22 = strtolower($_POST['22']); 
$rep23 = strtolower($_POST['23']); 
$rep31 = strtolower($_POST['31']); 
$rep32 = strtolower($_POST['32']); 
$rep33 = strtolower($_POST['33']); 
$rep41 = strtolower($_POST['41']); 
$rep42 = strtolower($_POST['42']); 
$rep43 = strtolower($_POST['43']); 

if ($rep01=='geologue'&&$rep02=='35'&&$rep03=='rome'&&$rep11=='astronome'&&$rep12=='45'&&$rep13=='bruxelles'&&$rep21=='biologiste'&&$rep22=='30'&&$rep23=='berlin'&&$rep31=='physicien'&&$rep32=='40'&&$rep33=='paris'&&$rep41=='mathematicien'&&$rep42=='25'&&$rep43=='madrid') {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../../base.css">
</head>
<body>
	<img src="pcddasmrvl01.JPG" style="width:1000px; height:auto ">
</body>
</html>

<?php
} else { ?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../../base.css">
</head>
<body>
	<h1>Les 5 scientifiques</h1>
	<br>
	<h3> Mr Rhob, si vous lisez ces lignes, c'est que vous vous êtes enfin décidé à tester mes mesures de sécurité et par conséquent, cette énigme. J'espère qu'elle vous plaira !</h3>
	<h3 class="default02">- Murphy</h3>
	<br>
	<hr>
	<p>Cinq scientifiques oeuvrant dans des domaines divers viennent d'être récompensés.</p>
	<p>A vous de découvrir la spécialité de chacun, son âge et la ville où il a reçu son prix.</p>
	<p>-</p>
	<?php
	$list = range(0, 5);
	$phrase = array("Le scientifique de 45 ans n'est pas géologue et n'a pas reçu un prix à Paris.","Auguste est plus âgé que le scientifique récompensé à Rome, mais plus jeune que le scientifique astronome.","Marie est plus jeune que le scientifique ayant reçu un prix à Bruxelles, mais plus âgées que le biologiste.","Lucien a cinq ans de plus que la personne récompensée à Madrid, mais cinq de moins que le géologue.","La personne ayant reçu un prix à Berlin a dix ans de moins que le physicien, mais cinq de plus que Pierre, le mathématicien.","Le plus vieux a 45 ans, le plus jeune en a 25.");
	shuffle($list);
	foreach ($list as $elem) {
		echo "<p>$phrase[$elem]</p>";
	}
	?>
	<p>-</p>
	<form method="POST">
		<center>
			<TABLE BORDER="1" style="background-color:lightgrey;color:black">
				<TR> 
					<TH> Scientifique </TH> 
					<TH> Metier </TH> 
					<TH> Age </TH> 
					<TH> Ville </TH> 
				</TR> 
				<TR> 
					<TD> Marie </TD> 
					<TD><input type="text" name="01" size="15"></TD> 
					<TD><input type="text" name="02" size="15"></TD> 
					<TD><input type="text" name="03" size="15"></TD> 
				</TR> 
				<TR> 
					<TD> Charles </TD> 
					<TD><input type="text" name="11" size="15"></TD> 
					<TD><input type="text" name="12" size="15"></TD> 
					<TD><input type="text" name="13" size="15"></TD> 
				</TR> 
				<TR> 
					<TD> Lucien </TD> 
					<TD><input type="text" name="21" size="15"></TD> 
					<TD><input type="text" name="22" size="15"></TD> 
					<TD><input type="text" name="23" size="15"></TD> 
				</TR> 
				<TR> 
					<TD> Auguste </TD> 
					<TD><input type="text" name="31" size="15"></TD> 
					<TD><input type="text" name="32" size="15"></TD> 
					<TD><input type="text" name="33" size="15"></TD> 
				</TR> 
				<TR> 
					<TD> Pierre </TD> 
					<TD><input type="text" name="41" size="15"></TD> 
					<TD><input type="text" name="42" size="15"></TD> 
					<TD><input type="text" name="43" size="15"></TD> 
				</TR> 
			<p>Pas de majuscules, pas d'accents.</p>
			</TABLE>
		</center> 
		<br>
		<input type="submit" value="valider">
	</form>
</body>
</html>

<?php
}
?>