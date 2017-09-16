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


<div id="ENTETE_titre"><?php echo $LANG['ENTETE_titre']; ?></div>

<br />

<?php

// On vérifie si le formulaire n'a pas été soumis
if (empty($_POST['admin_pseudo']) and empty($_POST['admin_mot_de_passe']))

{
?>
<form method="post" action="index.php">

<dl id="FORMULAIRE_connexion">

	<div class="FORMULAIRE_titre"><?php echo $LANG['FORMULAIRE_titre']; ?></div>

	<dd class="FORMULAIRE_dd_connexion">
		<span class="FORMULAIRE_dd_left">
			<?php echo $LANG['FORMULAIRE_pseudo']; ?>
		</span>

		<span class="FORMULAIRE_dd_right">
			<input type="text" name="admin_pseudo" value="" size="12" />
		</span>
	</dd>

	<dd class="FORMULAIRE_dd_connexion">
		<span class="FORMULAIRE_dd_left">
			<?php echo $LANG['FORMULAIRE_pass']; ?>
		</span>

		<span class="FORMULAIRE_dd_right">
			<input type="password" name="admin_mot_de_passe" value="" size="12" />
		</span>
	</dd>

</dl>

<div id="FORMULAIRE_bouton">
	<input type="submit" value="<?php echo $LANG['FORMULAIRE_bouton']; ?>" />
</div>

</form>
<?php
}

// Sinon, le formulaire a bien été soumis
else
{

// On commence par récupérer le post
if (isset($_POST['admin_pseudo']))
	{
	$admin_pseudo = htmlentities(supprslash($_POST['admin_pseudo'], '', 'oui'));
	}
else
	{
	$admin_pseudo = '';
	}
if (isset($_POST['admin_mot_de_passe']))
	{
	$admin_mot_de_passe = md5(supprslash($_POST['admin_mot_de_passe'], '', 'oui'));
	}
else
	{
	$admin_mot_de_passe = '';
	}

// On vérifie que le pseudo correspond
if ($admin_pseudo != htmlentities(supprslash($CONFIG['admin_pseudo'], 'gd')))
	{
	echo "\n\n" . '<div id="ENTETE_message">'. $LANG['FORMULAIRE_erreur_pseudo'] .'</div>' . "\n\n" . '<a class="LIEN" href="index.php">&lt;- '. $LANG['LIEN_retour'] .' -&gt;</a>' . "\n\n";
	}

// On vérifie ensuite que le mot de passe correspond
elseif ($admin_mot_de_passe != $CONFIG['admin_mdp'])
	{
	echo "\n\n" . '<div id="ENTETE_message">'. $LANG['FORMULAIRE_erreur_pass'] .'</div>' . "\n\n" . '<a class="LIEN" href="index.php">&lt;- '. $LANG['LIEN_retour'] .' -&gt;</a>' . "\n\n";
	}
// Sinon tout est OK alors direction l'administration
else
	{
	// On commence par retenir les données saisies dans le formulaire
	$_SESSION['admin_pseudo'] = $admin_pseudo;
	$_SESSION['admin_mot_de_passe'] = $admin_mot_de_passe;

	// Et enfin, on redirige l'utilisateur vers l'administration
	header('Location: administration.php');
	}
}
?>

</div>

</body>
</html>