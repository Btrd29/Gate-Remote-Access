<?php

/************ Donn�es essentielles ************/

// Appel des fonctions
include 'includes/fonctions.inc.php';

// R�cup�ration de la configuration
include 'config/bdd.php';

// Connexion � la base de donn�es
include 'config/config.php';

// R�cup�ration du nombre total de message
$requete_nb_msg = requete('SELECT COUNT(*) as nombre_entree FROM livredor_message');
$nb_msg = $requete_nb_msg['nombre_entree'];

// R�cup�ration du texte
include 'langue/langue_fr.php';

// Si l'utilisateur a activ� l'UTF-8 alors on encode les donn�es
if ($CONFIG['encodage'])
	{
	array_walk($CONFIG, 'array_enc_utf8');
	array_walk($LANG, 'array_enc_utf8');
	}

// Modification du codage HTML selon le doctype choisi
if ($CONFIG['doctype'])
	{
	$XHTML = ' /';
	}
else
	{
	$XHTML = '';
	}


/************ Si le formulaire a �t� soumis on passe � la phase de validation du message sans afficher le livre d'or ************/

if (isset($_POST['form_pseudo']) or isset($_POST['form_email']) or isset($_POST['form_ville']) or isset($_POST['form_pays']) or isset($_POST['form_url']) or isset($_POST['form_note']) or isset($_POST['form_message']) or isset($_POST['resultat_utilisateur']))
{

// On commence par v�rifier que l'IP de l'utilisateur n'a pas d�j� post� un message
$requete_verif_ip = requete('SELECT * FROM livredor_message WHERE ip="'.$_SERVER['REMOTE_ADDR'].'"');

// On r�cup�re les donn�es du dernier message post�
$requete_derniere_poste = requete('SELECT ip, pseudo, message_webmaster FROM livredor_message ORDER BY timestamp desc');
$derniere_ip = $requete_derniere_poste['ip'];
$dernier_pseudo = $requete_derniere_poste['pseudo'];
$dernier_msg_webmaster = $requete_derniere_poste['message_webmaster'];


// On r�cup�re le poste dans des variables
if (isset($_POST['form_pseudo']))
	{
	$form_pseudo = trim($_POST['form_pseudo']);
	}
else
	{
	$form_pseudo = '';
	}

if (isset($_POST['form_email']))
	{
	$form_email = trim($_POST['form_email']);
	}
else
	{
	$form_email = '';
	}

if (isset($_POST['form_ville']))
	{
	$form_ville = trim($_POST['form_ville']);
	}
else
	{
	$form_ville = '';
	}

if (isset($_POST['form_pays']))
	{
	$form_pays = trim($_POST['form_pays']);
	}
else
	{
	$form_pays = '';
	}

if (isset($_POST['form_url']))
	{
	$form_url = trim($_POST['form_url']);
	}
else
	{
	$form_url = '';
	}

if ($_POST['form_note'] != "null")
	{
	$form_note = "".$_POST['form_note'].",";
	$note = 'note,';
	}
else
	{
	$form_note = '';
	$note = '';
	}

if (isset($_POST['form_message']))
	{
	$form_message = trim($_POST['form_message']);
	}
else
	{
	$form_message = '';
	}

if (isset($_POST['resultat_utilisateur']))
	{
	$resultat_utilisateur = $_POST['resultat_utilisateur'];
	}
elseif($_POST['resultat_utilisateur'] == 0)
	{
	$resultat_utilisateur = 'zero';
	}
else
	{
	$resultat_utilisateur = '';
	}

// On r�cup�re la session qui contient le resultat exacte � l'anti-robot
if ($_SESSION['resultat'])
	{
	$resultat = $_SESSION['resultat'];
	}
elseif($_SESSION['resultat'] == 0)
	{
	$resultat = 'zero';
	}
else
	{
	$resultat = 'nada';
	}


// On ouvre le corp du livre d'or
echo "\n\n" . '<div id="CORP">' . "\n\n";

// On affiche le titre du livre d'or
echo "\n\n" . '<div id="ENTETE_titre">'. supprslash($CONFIG['entete_titre']) .'</div>' . "\n\n";


// On v�rifie maintenant la validit� des donn�es saisies avant de valider le poste
if (! $form_pseudo
 or ! $form_message
 or strlen(trim(supprslash($form_message))) > 1000
 or $resultat != $resultat_utilisateur
 or ($requete_verif_ip and $CONFIG['flood'] == 0)
 or ($CONFIG['flood'] == 1 and ($derniere_ip == $_SERVER['REMOTE_ADDR'] or $dernier_pseudo == $form_pseudo))
 or ($CONFIG['flood'] == 3 and ! $dernier_msg_webmaster and ($derniere_ip == $_SERVER['REMOTE_ADDR'] or $dernier_pseudo == $form_pseudo))
 or ($form_email and ! email_valide($form_email))
 or ($form_url and ! url_valide($form_url))
   )
	{

	// Message d'erreur : Flood, test sur l'IP (En cas de flood non autoris�)
	if ($requete_verif_ip and $CONFIG['flood'] == 0)
		{
		echo "\n\n" . '<br'. $XHTML .'>

<div id="ENTETE_infos">'. $LANG['ENTETE_msg_erreur_IP'] .'</div>

<form method="get" action="livre-dor.php">

<div id="FORMULAIRE_bouton">
	<input type="submit" value="'. $LANG['BOUTON_retour'] .'"'. $XHTML .'>
</div>

</form>

<br />' . "\n\n";
		}

	// Message d'erreur : Flood, test sur l'IP et sur le pseudo (En cas d'autorisation du flood mais de double poste non autoris�)
	elseif (($derniere_ip == $_SERVER['REMOTE_ADDR'] or $dernier_pseudo == $form_pseudo) and $CONFIG['flood'] == 1)
		{
		echo "\n\n" . '<br'. $XHTML .'>

<div id="ENTETE_infos">'. $LANG['ENTETE_msg_erreur_dp_1'] .'</div>

<form method="get" action="livre-dor.php">

<div id="FORMULAIRE_bouton">
	<input type="submit" value="'. $LANG['BOUTON_retour'] .'"'. $XHTML .'>
</div>

</form>

<br'. $XHTML .'>' . "\n\n";
		}

	// Message d'erreur : flood, test sur l'IP et sur le pseudo (En cas d'autorisation du flood et de double poste autoris� uniquement en cas de r�ponse d'un autre utilisateur ou du webmaster)
	elseif (($derniere_ip == $_SERVER['REMOTE_ADDR'] or $dernier_pseudo == $form_pseudo) and $CONFIG['flood'] == 3 and ! $dernier_msg_webmaster)
		{
		echo "\n\n" . '<br'. $XHTML .'>

<div id="ENTETE_infos">'. $LANG['ENTETE_msg_erreur_dp_2'] .'</div>

<form method="get" action="livre-dor.php">

<div id="FORMULAIRE_bouton">
	<input type="submit" value="'. $LANG['BOUTON_retour'] .'"'. $XHTML .'>
</div>

</form>

<br'. $XHTML .'>' . "\n\n";
		}

	// Sinon, tout est OK alors on passe � la v�rification des donn�es saisies restantes
	else
		{
	// Message d'erreur : Champs obligatoires non renseign�s
	if (! $form_pseudo or ! $form_message)
		{
		echo "\n\n" . '<br'. $XHTML .'>' . "\n\n" . '<div id="ENTETE_infos">'. $LANG['ENTETE_msg_erreur_champ'] .'</div>' . "\n\n";
		}
	// Message d'erreur : Email invalide
	elseif ($form_email and ! email_valide($form_email))
		{
		echo "\n\n" . '<br'. $XHTML .'>' . "\n\n" . '<div id="ENTETE_infos">'. $LANG['ENTETE_msg_erreur_email'] .'</div>' . "\n\n";
		}
	// Message d'erreur : URL invalide
	elseif ($form_url and ! url_valide($form_url))
		{
		echo "\n\n" . '<br'. $XHTML .'>' . "\n\n" . '<div id="ENTETE_infos">'. $LANG['ENTETE_msg_erreur_url'] .'</div>' . "\n\n";
		}
	// Message d'erreur : Message trop grand
	elseif (strlen(trim(supprslash($form_message))) > 1000)
		{
		echo "\n\n" . '<br'. $XHTML .'>' . "\n\n" . '<div id="ENTETE_infos">'. $LANG['ENTETE_msg_erreur_message'] .'</div>' . "\n\n";
		}
	// Message d'erreur : R�ponse � l'anti-robot incorrect
	else
		{
		echo "\n\n" . '<br'. $XHTML .'>' . "\n\n" . '<div id="ENTETE_infos">'. $LANG['ENTETE_msg_erreur_captcha'] .'</div>' . "\n\n";
		}

// On retiens les donn�es saisie dans des champs cach�s afin que les formulaires sois de nouveau remplient en cas de retour
echo "\n\n" . '<form method="post" action="livre-dor.php">

<div>

<input type="hidden" name="retour_pseudo" value="'. htmlentities(supprslash($form_pseudo)) .'"'. $XHTML .'>
<input type="hidden" name="retour_email" value="'. htmlentities(supprslash($form_email)) .'"'. $XHTML .'>
<input type="hidden" name="retour_ville" value="'. htmlentities(supprslash($form_ville)) .'"'. $XHTML .'>
<input type="hidden" name="retour_pays" value="'. htmlentities(supprslash($form_pays)) .'"'. $XHTML .'>
<input type="hidden" name="retour_url" value="'. htmlentities(supprslash($form_url)) .'"'. $XHTML .'>
<input type="hidden" name="retour_note" value="'. htmlentities(supprslash($form_note)) .'"'. $XHTML .'>
<input type="hidden" name="retour_message" value="'. htmlentities(supprslash($form_message)) .'"'. $XHTML .'>

</div>

<div id="FORMULAIRE_bouton">
	<input type="submit" value="'. $LANG['BOUTON_retour_erreur'] .'"'. $XHTML .'>
</div>

</form>

<br'. $XHTML .'>' . "\n\n";
		}
	}

// Sinon, tout est OK alors on valide le poste
else
	{
	// On avertie l'utilisateur que son message est post�
	echo "\n\n" . '<br'. $XHTML .'>

<div id="ENTETE_infos">'. $LANG['ENTETE_msg_post_ok'] .'</div>

<form method="get" action="livre-dor.php">

<div id="FORMULAIRE_bouton">
	<input type="submit" value="'. $LANG['BOUTON_retour'] .'"'. $XHTML .'>
</div>

</form>

<br'. $XHTML .'>' . "\n\n";

	// On insert le message dans la base de donn�es
	mysql_query('

INSERT INTO livredor_message (pseudo, email, site, ville, pays, message, message_webmaster, '. $note .' ip, timestamp)

VALUES(
"'. mysql_real_escape_string(supprslash(utf8_decode_isoutf8($form_pseudo, $CONFIG['encodage']), 'both', 'oui')) .'", 
"'. mysql_real_escape_string(supprslash(utf8_decode_isoutf8($form_email, $CONFIG['encodage']), 'both', 'oui')) .'", 
"'. mysql_real_escape_string(supprslash(utf8_decode_isoutf8($form_url, $CONFIG['encodage']), 'both', 'oui')) .'", 
"'. mysql_real_escape_string(supprslash(utf8_decode_isoutf8($form_ville, $CONFIG['encodage']), 'both', 'oui')) .'", 
"'. mysql_real_escape_string(supprslash(utf8_decode_isoutf8($form_pays, $CONFIG['encodage']), 'both', 'oui')) .'", 
"'. mysql_real_escape_string(supprslash(utf8_decode_isoutf8($form_message, $CONFIG['encodage']), 'both', 'oui')) .'", 
"", 
'. mysql_real_escape_string(supprslash(utf8_decode_isoutf8($form_note, $CONFIG['encodage']), 'both', 'oui')) .' 
"'. $_SERVER['REMOTE_ADDR'] .'", 
"'. time() .'")')

or die(mysql_error());

	// On d�truit la session afin d'�viter les doubles posts
	session_unset();
	}


// Et enfin, on ferme le corp du livre d'or
echo "\n\n" . '</div>' . "\n\n";
}


/************ Sinon, le formulaire n'a pas �t� soumis alors on affiche le livre d'or ************/

else
{
// On commence par r�cup�rer le syst�me anti-robot choisi
if ($CONFIG['anti_bot'] == 1)
	{
	$anti_bot_include = '';
	}
else
	{
	$anti_bot_include = '_' . $CONFIG['anti_bot'];
	}

include 'includes/anti_robot'. $anti_bot_include .'.inc.php';

// On r�cup�re le nombre total de page
$nb_page = nb_de_page($nb_msg, $CONFIG['nb_msg']);

// On r�cup�re la page � afficher
if (isset($_GET['page']) and is_numeric($_GET['page']))
	{
	$GET = $_GET['page'];
	}
else
	{
	$GET = "";
	}

// On ouvre le corp du livre d'or
echo "\n\n" . '<div id="CORP">' . "\n\n";


// On affiche le titre du livre d'or
echo "\n\n" . '<div id="ENTETE_titre">'. supprslash($CONFIG['entete_titre']) .'</div>'. "\n\n" . '

<!-- Chopin livre d\'or : Version 2.0.6 -->

<img style="display: none;" src="http://www.chopinscript.codissimo.fr/no_suppr.php?url='. htmlentities($_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]) .'" alt=""'. $XHTML .'>' . "\n\n";

// On affiche le message d'en-t�te du livre d'or
if ($CONFIG['entete_msg'])
	{
	echo "\n\n" . '<p id="ENTETE_message">'. nl2br_msg(htmlentities_isoutf8(supprslash($CONFIG['entete_msg']), $CONFIG['encodage']), 0, 'msg', $CONFIG['encodage']) .'</p>' . "\n\n";
	}

// On affiche le nombre total de message post� dans le livre d'or en respectant le pluriel/singulier
	if ($nb_msg == 0)
		{
		echo "\n\n" . '<div id="MESSAGE_nombre">'. $LANG['NOMBRE_msg_aucun'] .'</div>' . "\n\n";
		}
	elseif ($nb_msg == 1)
		{
		echo "\n\n" . '<div id="MESSAGE_nombre">'. $LANG['NOMBRE_msg_singulier'] .'</div>' . "\n\n";
		}
	else
		{
		echo "\n\n" . '<div id="MESSAGE_nombre">'. $LANG['NOMBRE_msg_pluriel'] .'</div>' . "\n\n";
		}

	// On affiche maintenant la moyenne du site dans la mesure ou il y a au moins une note dans la base de donn�es
	$requete_moyenne = requete('select avg(note) AS moyenne from livredor_message');

	if ($requete_moyenne['moyenne'])
		{
		echo "\n\n" . '<div id="moyenne"><em>'. $LANG['MOYENNE'] . round($requete_moyenne['moyenne'], 1) .'/20</em></div>' . "\n\n";
		}

// On appel le formulaire de poste
include "includes/formulaire.inc.php";

// On appel la page qui affiche les messages
include "includes/message.inc.php";

// On affiche la navigation entre les pages
echo NVGT_page_par_page($GET, $CONFIG['nb_msg'], $nb_msg, "livre-dor.php?page=", "livre-dor.php", $nb_page, $LANG['NAVIGATION_suivant'], $LANG['NAVIGATION_precedent']);

// On affiche le copyright (ne peut �tre enlev� si la version du script ne date pas au minimum d'un an ou si un arrangement avec moi m�me a �t� pass�)
echo "\n\n" . '<div id="copyright"><a class="LIEN" href="http://www.chopinscript.codissimo.fr" onclick="this.target=\'_blank\'">'. $LANG['COPYRIGHT_site'] .'</a> | '. $LANG['COPYRIGHT'] .' | <a class="LIEN" href="http://creativecommons.org/licenses/by-nc-sa/2.0/fr/" onclick="this.target=\'_blank\'">'. $LANG['COPYRIGHT_license'] .'</a></div>' . "\n\n";

// Et enfin, on ferme le corp du livre d'or
echo "\n\n" . '</div>' . "\n\n";
}


/************ Cl�turation de la liaison avec MySQL ************/
mysql_close($bdd);

?>