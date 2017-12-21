<?php

// On vérifie que le dossier "install" n'existe plus sinon on va vers l'install
if (file_exists('../install/install.php'))
	{
	header('Location: ../install/install.php');
	}

ob_start();
session_start();

// On récupère le texte, la configuration et les fonctions
include '../includes/fonctions.inc.php';
include '../config/config.php';
include '../langue/admin/langue_fr.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
	<title>Admin</title>
		<meta name="description" content="Admin" />
		<meta name="keywords" content="Admin" />
		<meta name="classification" content="Livre d'or" />
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<meta name="author" content="Chopin Fred : Frédéric Boillot" />
		<link rel="stylesheet" href="style.css" type="text/css" title="Graphique" />
	</head>
<body>

<div id="GRAPHIQUE">

<?php

// On commence par récupérer les données de la session
if ($_SESSION['admin_pseudo'])
	{
	$admin_pseudo = $_SESSION['admin_pseudo'];
	}
else
	{
	$admin_pseudo = "";
	}
if ($_SESSION['admin_mot_de_passe'])
	{
	$admin_mot_de_passe = $_SESSION['admin_mot_de_passe'];
	}
else
	{
	$admin_mot_de_passe = "";
	}

// Si les identifiants correspondent toujours à ceux de la base de données alors on affiche la page demandée
if ($admin_pseudo == htmlentities(supprslash($CONFIG['admin_pseudo'], 'gd')) and $admin_mot_de_passe == $CONFIG['admin_mdp'])
	{
	// Haut de page
	echo "\n\n" . '<div id="ENTETE_titre">'. $LANG['DECO_entete_titre'] .'</div>' . "\n\n" . '<br />' . "\n\n" . '<div id="ok">'. $LANG['DECO_ok'] .'</div>

<a class="LIEN" href="../../livre-dor.php">&lt;- '. $LANG['DECO_lien_retour'] .' -&gt;</a>' . "\n\n";
	
	// On détruit la session
	session_unset();
	}

// Sinon, les identifiants ne correspondent plus alors on redirectionne l'utilisateur au formulaire de connexion
else
	{
	header("Location: index.php");
	}

?>

</div>

</body>
</html>