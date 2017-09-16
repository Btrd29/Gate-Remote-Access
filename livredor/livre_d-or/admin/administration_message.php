<?php

// On vérifie que le dossier "install" n'existe plus sinon on va vers l'install
if (file_exists('../install/install.php'))
	{
	header('Location: ../install/install.php');
	}

ob_start();
session_start();

// Appel des fonctions
include '../includes/fonctions.inc.php';

// Récupération de la configuration
include '../config/config.php';

// Connexion à la base de données
include '../config/bdd.php';

// Récupération du nombre total de message
$requete_nb_msg = requete('SELECT COUNT(*) as nombre_entree FROM livredor_message');
$nb_msg = $requete_nb_msg['nombre_entree'];

// Récupération du texte
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
		<script type="text/javascript" src="javascript.js"></script>
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
	$admin_pseudo = '';
	}
if ($_SESSION['admin_mot_de_passe'])
	{
	$admin_mot_de_passe = $_SESSION['admin_mot_de_passe'];
	}
else
	{
	$admin_mot_de_passe = '';
	}

// Si les identifiants correspondent toujours à ceux de la base de données alors on affiche la page demandée
if ($admin_pseudo == htmlentities(supprslash($CONFIG['admin_pseudo'], 'gd')) and $admin_mot_de_passe == $CONFIG['admin_mdp'])
	{
	// On récupère le GET
	if (isset($_GET['supprimer']) and is_numeric($_GET['supprimer']))
		{
		$supprimer_id = $_GET['supprimer'];
		}
	else
		{
		$supprimer_id = '';
		}
	if (isset($_GET['editer']) and is_numeric($_GET['editer']))
		{
		$editer_id = $_GET['editer'];
		}
	else
		{
		$editer_id = '';
		}
	if (isset($_GET['repondre']) and is_numeric($_GET['repondre']))
		{
		$repondre_id = $_GET['repondre'];
		}
	else
		{
		$repondre_id = '';
		}
	if (isset($_GET['ok']))
		{
		$ok = $_GET['ok'];
		}
	else
		{
		$ok = '';
		}

	// Si l'utilisateur a décidé de supprimer un message alors on le supprime
	if ($ok and $supprimer_id)
		{
		mysql_query('DELETE FROM livredor_message WHERE id="'. $supprimer_id .'"') or die(mysql_error());
		}

	// En cas de modification, on récupère le pseudo et le message avant de mettre à jour
	if (isset($_POST['msg_pseudo']))
		{
		$msg_pseudo = $_POST['msg_pseudo'];
		}
	else
		{
		$msg_pseudo = '';
		}
	if (isset($_POST['msg_message']))
		{
		$msg_message = $_POST['msg_message'];
		}
	else
		{
		$msg_message = '';
		}

	// Si l'utilisateur a décidé d'éditer un message alors on le met à jour
	if ($msg_pseudo and $msg_message)
		{
		// On récupère pour commencer le poste
		if (isset($_POST['msg_email']))
			{
			$msg_email = $_POST['msg_email'];
			}
		else
			{
			$msg_email = '';
			}
		if (isset($_POST['msg_ville']))
			{
			$msg_ville = $_POST['msg_ville'];
			}
		else
			{
			$msg_ville = '';
			}
		if (isset($_POST['msg_pays']))
			{
			$msg_pays = $_POST['msg_pays'];
			}
		else
			{
			$msg_pays = '';
			}
		if (isset($_POST['msg_url']))
			{
			$msg_url = $_POST['msg_url'];
			}
		else
			{
			$msg_url = '';
			}
		if ($_POST['msg_note'] != 'null')
			{
			$msg_note = ' note=\''. $_POST['msg_note'] .'\',';
			}
		else
			{
			$msg_note = ' note=null,';
			}

		// Mise à jour de la base de données
		mysql_query('UPDATE livredor_message SET pseudo="'. mysql_real_escape_string(supprslash($_POST['msg_pseudo'], 'both', 'oui')) .'",
												 email="'. mysql_real_escape_string(supprslash($msg_email, 'both', 'oui')) .'",
												 ville="'. mysql_real_escape_string(supprslash($msg_ville, 'both', 'oui')) .'",
												 pays="'. mysql_real_escape_string(supprslash($msg_pays, 'both', 'oui')) .'",
												 site="'. mysql_real_escape_string(supprslash($msg_url, 'both', 'oui')) .'",
												 '. $msg_note .'
												 message="'. mysql_real_escape_string(supprslash($_POST['msg_message'], 'both', 'oui')) .'"

												 WHERE id='. $editer_id) or die(mysql_error());
		}

	// Si l'utilisateur a décidé de laisser une réponse alors on met à jour la table
	if (isset($_POST['repondre_message']))
		{
		mysql_query('UPDATE livredor_message SET message_webmaster="'. mysql_real_escape_string(supprslash($_POST['repondre_message'], 'both', 'oui')) .'" WHERE id='. $repondre_id) or die(mysql_error());
		}
	
	// Haut de page
	include 'menu.php';
	echo "\n\n" . '<div id="ENTETE_titre">'. $LANG['ADMIN_msg_entete_titre'] .'</div>' . "\n\n" . '<br />' . "\n\n";

	// Nombre de page total
	$nb_page = nb_de_page($nb_msg, $CONFIG['nb_msg']);

	// Gestion du GET dans les liens de page
	if (isset($_GET['page']) and is_numeric($_GET['page']))
		{
		$GET = $_GET['page'];
		$PAGE_actuel_get = '?page=' . $GET;
		}
	else
		{
		$GET = '';
		$PAGE_actuel_get = '';
		}
	if ($GET)
		{
		$supprimer_get = 'administration_message.php?page='. $GET .'&amp;supprimer=';
		}
	else
		{
		$supprimer_get = 'administration_message.php?supprimer=';
		}
	if ($GET)
		{
		$editer_get = 'administration_message.php?page='. $GET .'&amp;editer=';
		}
	else
		{
		$editer_get = 'administration_message.php?editer=';
		}
	if ($GET)
		{
		$repondre_get = 'administration_message.php?page='. $GET .'&amp;repondre=';
		}
	else
		{
		$repondre_get = 'administration_message.php?repondre=';
		}


	// Si un message a étté supprimé, on affiche la confirmation
	if ($supprimer_get and $ok)
		{
		echo "\n\n" . '<div id="ok">'. $LANG['ADMIN_msg_suppr_ok'] .'</div><br />' . "\n\n";
		}

	// On affiche le nombre total de message posté dans le livre d'or tout en respetant le singulier/pluriel
	if ($nb_msg == 0)
		{
		echo "\n\n" . '<div id="MESSAGE_nombre">'. $LANG['ADMIN_msg_nb_aucun'] .'</div>' . "\n\n";
		}
	elseif ($nb_msg == 1)
		{
		echo "\n\n" . '<div id="MESSAGE_nombre">'. $LANG['ADMIN_msg_nb_singulier'] .'</div>' . "\n\n";
		}
	else
		{
		echo "\n\n" . '<div id="MESSAGE_nombre">'. $LANG['ADMIN_msg_nb_pluriel'] .'</div>' . "\n\n";
		}

	// On affiche maintenant la moyenne du site dans la mesure ou il y a au moins une note
	$requete_moyenne = requete('select avg(note) AS moyenne from livredor_message');

	if ($requete_moyenne['moyenne'])
		{
		echo "\n\n" . '<div id="moyenne"><em>'. $LANG['ADMIN_msg_moeyenne'] . round($requete_moyenne['moyenne'], 1) .'/20</em></div>' . "\n\n";
		}

	// On appel la page qui affichera les messages
	include 'message.php';

	// Affichage de la navigation entre les pages
	echo NVGT_page_par_page($GET, $CONFIG['nb_msg'], $nb_msg, 'administration_message.php?page=', 'administration_message.php', $nb_page, $LANG['ADMIN_msg_page_suivante'], $LANG['ADMIN_msg_page_precedente']);
	}

// Sinon, les identifiants ne correspondent plus alors on redirectionne l'utilisateur au formulaire de connexion
else
	{
	header("Location: index.php");
	}


// On ferme la connexion à MySQL
mysql_close($bdd);

?>

</div>

</body>
</html>