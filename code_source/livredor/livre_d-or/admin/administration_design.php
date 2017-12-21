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
	// Haut de page
	include 'menu.php';
	echo "\n\n" . '<div id="ENTETE_titre">'. $LANG['ADMIN_design_entete_titre'] .'</div>' . "\n\n" . '<br />' . "\n\n";


	// On récupère les données constituant le graphique
	$le_fichier = fopen('../style.css', 'r');
	$contenu_css = fread($le_fichier, filesize('../style.css'));
	fclose($le_fichier);

	// On crée des variables contenant le code précédant la chaine qui sera recherche
	$repere_corp = "#CORP
{";
	$repere_entete_titre = "#ENTETE_titre
{";
	$repere_entete_message = "#ENTETE_message
{";
	$repere_entete_nombre = "#MESSAGE_nombre
{";
	$repere_entete_moyenne = "#moyenne
{";
	$repere_formulaire = "#FORMULAIRE
{";
	$repere_formulaire_titre = "#FORMULAIRE_titre
{";
	$repere_message_entete = ".MESSAGE_entete
{";
	$repere_message = ".MESSAGE
{";
	$repere_message_pied = ".MESSAGE_pied
{";
	$repere_message_webmaster = ".MESSAGE_webmaster
{";
	$repere_lien = ".LIEN
{";
	$repere_lien_hover = ".LIEN:hover
{";
	$repere_navigation = "#navigation
{";
	$repere_navigation_a = "#navigation a
{";
	$repere_anti_robot = "#FORMULAIRE_anti_robot
{";
	$repere_corp_exterieur = "body
{";
	$repere_graphique_exterieur = "#GRAPHIQUE
{";

	// On vérifie si le formulaire a été soumis
	if (isset($_POST['corp_color_text'])
	 or isset($_POST['corp_color_fond'])
	 or isset($_POST['entete_titre_taille'])
	 or isset($_POST['entete_titre_text_color'])
	 or isset($_POST['entete_message_taille'])
	 or isset($_POST['entete_message_text_color'])
	 or isset($_POST['entete_message_alignement'])
	 or isset($_POST['entete_nombre_msg_taille'])
	 or isset($_POST['entete_moyenne_taille'])
	 or isset($_POST['formulaire_encardre_largeur'])
	 or isset($_POST['formulaire_encardre_bordure'])
	 or isset($_POST['formulaire_titre_text_color'])
	 or isset($_POST['formulaire_titre_fond_color'])
	 or isset($_POST['message_entete_fond_color'])
	 or isset($_POST['message_corp_fond_color'])
	 or isset($_POST['message_pied_fond_color'])
	 or isset($_POST['message_webmaster_text_color'])
	 or isset($_POST['message_encadre_bordure_color'])
	 or isset($_POST['message_encadre_largeur'])
	 or isset($_POST['lien_color'])
	 or isset($_POST['lien_fond_color'])
	 or isset($_POST['lien_hover_color'])
	 or isset($_POST['lien_hover_fond_color'])
	 or isset($_POST['corp_color_fond_exterieur'])
	 or isset($_POST['corp_color_border']))
		{
		// On vérifie que tous les champs sont remplis
		if (empty($_POST['corp_color_text'])
		 or empty($_POST['corp_color_fond'])
		 or empty($_POST['entete_titre_taille'])
		 or empty($_POST['entete_titre_text_color'])
		 or empty($_POST['entete_message_taille'])
		 or empty($_POST['entete_message_text_color'])
		 or empty($_POST['entete_message_alignement'])
		 or empty($_POST['entete_nombre_msg_taille'])
		 or empty($_POST['entete_moyenne_taille'])
		 or empty($_POST['formulaire_encardre_largeur'])
		 or empty($_POST['formulaire_encardre_bordure'])
		 or empty($_POST['formulaire_titre_text_color'])
		 or empty($_POST['formulaire_titre_fond_color'])
		 or empty($_POST['message_entete_fond_color'])
		 or empty($_POST['message_corp_fond_color'])
		 or empty($_POST['message_pied_fond_color'])
		 or empty($_POST['message_webmaster_text_color'])
		 or empty($_POST['message_encadre_bordure_color'])
		 or empty($_POST['message_encadre_largeur'])
		 or empty($_POST['lien_color'])
		 or empty($_POST['lien_fond_color'])
		 or empty($_POST['lien_hover_color'])
		 or empty($_POST['lien_hover_fond_color'])
		 or empty($_POST['corp_color_fond_exterieur'])
		 or empty($_POST['corp_color_border']))
			{
			echo "\n\n" . '<div id="pas_ok">'. $LANG['ADMIN_design_champ_pasok'] .'</div><br />' . "\n\n";
			}
		// Sinon tout est OK alors on met à jour
		else
			{
			// On récupère les données constituant le graphique
			$corp_color_text = css_recup('color: ', $repere_corp, $contenu_css);
			$corp_color_fond = css_recup('background-color: ', $repere_corp, $contenu_css);
			$entete_titre_taille = css_recup('font-size: ', $repere_entete_titre, $contenu_css);
			$entete_titre_text_color = css_recup('color: ', $repere_entete_titre, $contenu_css);
			$entete_message_taille = css_recup('font-size: ', $repere_entete_message, $contenu_css);
			$entete_message_text_color = css_recup('color: ', $repere_entete_message, $contenu_css);
			$entete_message_alignement = css_recup('text-align: ', $repere_entete_message, $contenu_css);
			$entete_nombre_msg_taille = css_recup('font-size: ', $repere_entete_nombre, $contenu_css);
			$entete_moyenne_taille = css_recup('font-size: ', $repere_entete_moyenne, $contenu_css);
			$formulaire_encardre_largeur = css_recup('width: ', $repere_formulaire, $contenu_css);
			$formulaire_encardre_bordure = css_recup('border: 1px solid ', $repere_formulaire, $contenu_css);
			$formulaire_titre_text_color = css_recup('color: ', $repere_formulaire_titre, $contenu_css);
			$formulaire_titre_fond_color = css_recup('background-color: ', $repere_formulaire_titre, $contenu_css);
			$message_entete_fond_color = css_recup('background-color: ', $repere_message_entete, $contenu_css);
			$message_corp_fond_color = css_recup('background-color: ', $repere_message, $contenu_css);
			$message_pied_fond_color = css_recup('background-color: ', $repere_message_pied, $contenu_css);
			$message_webmaster_text_color = css_recup('color: ', $repere_message_webmaster, $contenu_css);
			$message_encadre_bordure_color = css_recup('border: 1px solid ', $repere_message, $contenu_css);
			$message_encadre_largeur = css_recup('width: ', $repere_message, $contenu_css);
			$lien_color = css_recup('color: ', $repere_lien, $contenu_css);
			$lien_fond_color = css_recup('background-color: ', $repere_lien, $contenu_css);
			$lien_hover_color = css_recup('color: ', $repere_lien_hover, $contenu_css);
			$lien_hover_fond_color = css_recup('background-color: ', $repere_lien_hover, $contenu_css);
			$corp_color_border = css_recup('border: 1px solid ', $repere_graphique_exterieur, $contenu_css);
			$corp_color_fond_exterieur = css_recup('background-color: ', $repere_corp_exterieur, $contenu_css);

			// Remplacement du CSS
			$ID_corp = css_remplace('color: '. $corp_color_text, "\ncolor: ". $_POST['corp_color_text'], $repere_corp, $contenu_css, '#CORP');
			$ID_corp = css_remplace('background-color: '. $corp_color_fond, "\nbackground-color: ". $_POST['corp_color_fond'], $repere_corp, $ID_corp, '#CORP');
			$ID_entete_titre = css_remplace('font-size: '. $entete_titre_taille, "\nfont-size: ". $_POST['entete_titre_taille'], $repere_entete_titre, $contenu_css, '#ENTETE_titre');
			$ID_entete_titre = css_remplace('color: '. $entete_titre_text_color, "\ncolor: ". $_POST['entete_titre_text_color'], $repere_entete_titre, $ID_entete_titre, '#ENTETE_titre');
			$ID_entete_titre = css_remplace('background-color: '. css_recup('background-color: ', $repere_entete_titre, $contenu_css), "\nbackground-color: ". $_POST['corp_color_fond'], $repere_entete_titre, $ID_entete_titre, '#ENTETE_titre');
			$ID_entete_message = css_remplace('font-size: '. $entete_message_taille, "\nfont-size: ". $_POST['entete_message_taille'], $repere_entete_message, $contenu_css, '#ENTETE_message');
			$ID_entete_message = css_remplace('color: '. $entete_message_text_color, "\ncolor: ". $_POST['entete_message_text_color'], $repere_entete_message, $ID_entete_message, '#ENTETE_message');
			$ID_entete_message = css_remplace('text-align: '. $entete_message_alignement, "\ntext-align: ". $_POST['entete_message_alignement'], $repere_entete_message, $ID_entete_message, '#ENTETE_message');
			$ID_entete_message = css_remplace('background-color: '. css_recup('background-color: ', $repere_entete_message, $contenu_css), "\nbackground-color: ". $_POST['corp_color_fond'], $repere_entete_message, $ID_entete_message, '#ENTETE_message');
			$ID_message_nombre = css_remplace('font-size: '. $entete_nombre_msg_taille, "\nfont-size: ". $_POST['entete_nombre_msg_taille'], $repere_entete_nombre, $contenu_css, '#MESSAGE_nombre');
			$ID_moyenne = css_remplace('font-size: '. $entete_moyenne_taille, "\nfont-size: ". $_POST['entete_moyenne_taille'], $repere_entete_moyenne, $contenu_css, '#moyenne');
			$ID_formulaire = css_remplace('width: '. $formulaire_encardre_largeur, "\nwidth: ". $_POST['formulaire_encardre_largeur'], $repere_formulaire, $contenu_css, '#FORMULAIRE');
			$ID_formulaire = css_remplace('border: 1px solid '. $formulaire_encardre_bordure, "\nborder: 1px solid ". $_POST['formulaire_encardre_bordure'], $repere_formulaire, $ID_formulaire, '#FORMULAIRE');
			$ID_formulaire = css_remplace('background-color: '. css_recup('background-color: ', $repere_formulaire, $contenu_css), "\nbackground-color: ". $_POST['message_corp_fond_color'], $repere_formulaire, $ID_formulaire, '#FORMULAIRE');
			$ID_formulaire_titre = css_remplace('color: '. $formulaire_titre_text_color, "\ncolor: ". $_POST['formulaire_titre_text_color'], $repere_formulaire_titre, $contenu_css, '#FORMULAIRE_titre');
			$ID_formulaire_titre = css_remplace('background-color: '. $formulaire_titre_fond_color, "\nbackground-color: ". $_POST['formulaire_titre_fond_color'], $repere_formulaire_titre, $ID_formulaire_titre, '#FORMULAIRE_titre');
			$ID_formulaire_titre = css_remplace('border-bottom: 1px solid '. css_recup('border-bottom: 1px solid ', $repere_formulaire_titre, $contenu_css), "\nborder-bottom: 1px solid ". $_POST['formulaire_encardre_bordure'], $repere_formulaire_titre, $ID_formulaire_titre, '#FORMULAIRE_titre');
			$CLASS_message_entete = css_remplace('background-color: '. $message_entete_fond_color, "\nbackground-color: ". $_POST['message_entete_fond_color'], $repere_message_entete, $contenu_css, '.MESSAGE_entete');
			$CLASS_message_entete = css_remplace('color: '. css_recup('color: ', $repere_message_entete, $contenu_css), "\ncolor: ". $_POST['corp_color_text'], $repere_message_entete, $CLASS_message_entete, '.MESSAGE_entete');
			$CLASS_message_entete = css_remplace('border-bottom: 1px solid '. css_recup('border-bottom: 1px solid ', $repere_message_entete, $contenu_css), "\nborder-bottom: 1px solid ". $_POST['message_encadre_bordure_color'], $repere_message_entete, $CLASS_message_entete, '.MESSAGE_entete');
			$CLASS_message = css_remplace('background-color: '. $message_corp_fond_color, "\nbackground-color: ". $_POST['message_corp_fond_color'], $repere_message, $contenu_css, '.MESSAGE');
			$CLASS_message = css_remplace('border: 1px solid '. $message_encadre_bordure_color, "\nborder: 1px solid ". $_POST['message_encadre_bordure_color'], $repere_message, $CLASS_message, '.MESSAGE');
			$CLASS_message = css_remplace('width: '. $message_encadre_largeur, "\nwidth: ". $_POST['message_encadre_largeur'], $repere_message, $CLASS_message, '.MESSAGE');
			$CLASS_message = css_remplace('color: '. css_recup('color: ', $repere_message, $contenu_css), "\ncolor: ". $_POST['corp_color_text'], $repere_message, $CLASS_message, '.MESSAGE');
			$CLASS_message_pied = css_remplace('background-color: '. $message_pied_fond_color, "\nbackground-color: ". $_POST['message_pied_fond_color'], $repere_message_pied, $contenu_css, '.MESSAGE_pied');
			$CLASS_message_pied = css_remplace('color: '. css_recup('color: ', $repere_message_pied, $contenu_css), "\ncolor: ". $_POST['corp_color_text'], $repere_message_pied, $CLASS_message_pied, '.MESSAGE_pied');
			$CLASS_message_pied = css_remplace('border-top: 1px solid '. css_recup('border-top: 1px solid ', $repere_message_pied, $contenu_css), "\nborder-top: 1px solid ". $_POST['message_encadre_bordure_color'], $repere_message_pied, $CLASS_message_pied, '.MESSAGE_pied');
			$CLASS_message_webmaster = css_remplace('color: '. $message_webmaster_text_color, "\ncolor: ". $_POST['message_webmaster_text_color'], $repere_message_webmaster, $contenu_css, '.MESSAGE_webmaster');
			$CLASS_lien = css_remplace('color: '. $lien_color, "\ncolor: ". $_POST['lien_color'], $repere_lien, $contenu_css, '.LIEN');
			$CLASS_lien = css_remplace('background-color: '. $lien_fond_color, "\nbackground-color: ". $_POST['lien_fond_color'], $repere_lien, $CLASS_lien, '.LIEN');
			$CLASS_lien_hover = css_remplace('color: '. $lien_hover_color, "\ncolor: ". $_POST['lien_hover_color'], $repere_lien_hover, $contenu_css, '.LIEN:hover');
			$CLASS_lien_hover = css_remplace('background-color: '. $lien_hover_fond_color, "\nbackground-color: ". $_POST['lien_hover_fond_color'], $repere_lien_hover, $CLASS_lien_hover, '.LIEN:hover');
			$ID_navigation = css_remplace('color: '. css_recup('color: ', $repere_navigation, $contenu_css), "\ncolor: ". $_POST['corp_color_text'], $repere_navigation, $contenu_css, '#navigation');
			$ID_navigation = css_remplace('background-color: '. css_recup('background-color: ', $repere_navigation, $contenu_css), "\nbackground-color: ". $_POST['corp_color_fond'], $repere_navigation, $ID_navigation, '#navigation');
			$ID_navigation_a = css_remplace('color: '. css_recup('color: ', $repere_navigation_a, $contenu_css), "\ncolor: ". $_POST['corp_color_text'], $repere_navigation_a, $contenu_css, '#navigation a');
			$ID_navigation_a = css_remplace('background-color: '. css_recup('background-color: ', $repere_navigation_a, $contenu_css), "\nbackground-color: ". $_POST['corp_color_fond'], $repere_navigation_a, $ID_navigation_a, '#navigation a');
			$ID_anti_robot = css_remplace('background-color: '. css_recup('background-color: ', $repere_anti_robot, $contenu_css), "\nbackground-color: ". $_POST['message_corp_fond_color'], $repere_anti_robot, $contenu_css, '#FORMULAIRE_anti_robot');
			$ID_anti_robot = css_remplace('width: '. css_recup('width: ', $repere_anti_robot, $contenu_css), "\nwidth: ". $_POST['formulaire_encardre_largeur'], $repere_anti_robot, $ID_anti_robot, '#FORMULAIRE_anti_robot');
			$ID_anti_robot = css_remplace('border: 1px solid '. css_recup('border: 1px solid ', $repere_anti_robot, $contenu_css), "\nborder: 1px solid ". $_POST['formulaire_encardre_bordure'], $repere_anti_robot, $ID_anti_robot, '#FORMULAIRE_anti_robot');
			$body = css_remplace('background-color: '. css_recup('background-color: ', $repere_corp_exterieur, $contenu_css), "\nbackground-color: ". $_POST['corp_color_fond_exterieur'], $repere_corp_exterieur, $contenu_css, 'body');
			$ID_graphique = css_remplace('border: 1px solid '. css_recup('border: 1px solid ', $repere_graphique_exterieur, $contenu_css), "\nborder: 1px solid ". $_POST['corp_color_border'], $repere_graphique_exterieur, $contenu_css, '#GRAPHIQUE');

			// Création de la nouvelle feuille de style
			$nouvelle_feuille_de_style = nouveau_css($ID_corp, $repere_corp, $contenu_css, '#CORP');
			$nouvelle_feuille_de_style = nouveau_css($ID_entete_titre, $repere_entete_titre, $nouvelle_feuille_de_style, '#ENTETE_titre');
			$nouvelle_feuille_de_style = nouveau_css($ID_entete_message, $repere_entete_message, $nouvelle_feuille_de_style, '#ENTETE_message');
			$nouvelle_feuille_de_style = nouveau_css($ID_message_nombre, $repere_entete_nombre, $nouvelle_feuille_de_style, '#MESSAGE_nombre');
			$nouvelle_feuille_de_style = nouveau_css($ID_moyenne, $repere_entete_moyenne, $nouvelle_feuille_de_style, '#moyenne');
			$nouvelle_feuille_de_style = nouveau_css($ID_formulaire, $repere_formulaire, $nouvelle_feuille_de_style, '#FORMULAIRE');
			$nouvelle_feuille_de_style = nouveau_css($ID_formulaire_titre, $repere_formulaire_titre, $nouvelle_feuille_de_style, '#FORMULAIRE_titre');
			$nouvelle_feuille_de_style = nouveau_css($CLASS_message_entete, $repere_message_entete, $nouvelle_feuille_de_style, '.MESSAGE_entete');
			$nouvelle_feuille_de_style = nouveau_css($CLASS_message, $repere_message, $nouvelle_feuille_de_style, '.MESSAGE');
			$nouvelle_feuille_de_style = nouveau_css($CLASS_message_pied, $repere_message_pied, $nouvelle_feuille_de_style, '.MESSAGE_pied');
			$nouvelle_feuille_de_style = nouveau_css($CLASS_message_webmaster, $repere_message_webmaster, $nouvelle_feuille_de_style, '.MESSAGE_webmaster');
			$nouvelle_feuille_de_style = nouveau_css($CLASS_lien, $repere_lien, $nouvelle_feuille_de_style, '.LIEN');
			$nouvelle_feuille_de_style = nouveau_css($CLASS_lien_hover, $repere_lien_hover, $nouvelle_feuille_de_style, '.LIEN:hover');
			$nouvelle_feuille_de_style = nouveau_css($ID_navigation, $repere_navigation, $nouvelle_feuille_de_style, '#navigation');
			$nouvelle_feuille_de_style = nouveau_css($ID_navigation_a, $repere_navigation_a, $nouvelle_feuille_de_style, '#navigation a');
			$nouvelle_feuille_de_style = nouveau_css($ID_anti_robot, $repere_anti_robot, $nouvelle_feuille_de_style, '#FORMULAIRE_anti_robot');
			$nouvelle_feuille_de_style = nouveau_css($body, $repere_corp_exterieur, $nouvelle_feuille_de_style, 'body');
			$nouvelle_feuille_de_style = nouveau_css($ID_graphique, $repere_graphique_exterieur, $nouvelle_feuille_de_style, '#GRAPHIQUE');

			// Ecriture de la nouvelle feille de style
			$FICHIER_nouveau_css = fopen("../style.css","w");

			// On vérifie l'écriture
			if (fwrite($FICHIER_nouveau_css, $nouvelle_feuille_de_style))
				{
				echo "\n\n" . '<div id="ok">'. $LANG['ADMIN_design_css_ok'] .'</div><br />' . "\n\n";
				}
			// Sinon, l'écriture a échoué
			else
				{
				echo "\n\n" . '<div id="pas_ok">'. $LANG['ADMIN_design_css_pasok'] .'</div>' . "\n\n";
				}
			fclose($FICHIER_nouveau_css);
			}
		}


// On récupère les données constituant le graphique à nouveau pour que les données soit synchronisé avec le formulaire
$le_fichier = fopen("../style.css", "r");
$contenu_css = fread ($le_fichier, filesize("../style.css"));
fclose($le_fichier);

$corp_color_text = css_recup('color: ', $repere_corp, $contenu_css);
$corp_color_fond = css_recup('background-color: ', $repere_corp, $contenu_css);
$entete_titre_taille = css_recup('font-size: ', $repere_entete_titre, $contenu_css);
$entete_titre_text_color = css_recup('color: ', $repere_entete_titre, $contenu_css);
$entete_message_taille = css_recup('font-size: ', $repere_entete_message, $contenu_css);
$entete_message_text_color = css_recup('color: ', $repere_entete_message, $contenu_css);
$entete_message_alignement = css_recup('text-align: ', $repere_entete_message, $contenu_css);
$entete_nombre_msg_taille = css_recup('font-size: ', $repere_entete_nombre, $contenu_css);
$entete_moyenne_taille = css_recup('font-size: ', $repere_entete_moyenne, $contenu_css);
$formulaire_encardre_largeur = css_recup('width: ', $repere_formulaire, $contenu_css);
$formulaire_encardre_bordure = css_recup('border: 1px solid ', $repere_formulaire, $contenu_css);
$formulaire_titre_text_color = css_recup('color: ', $repere_formulaire_titre, $contenu_css);
$formulaire_titre_fond_color = css_recup('background-color: ', $repere_formulaire_titre, $contenu_css);
$message_entete_fond_color = css_recup('background-color: ', $repere_message_entete, $contenu_css);
$message_corp_fond_color = css_recup('background-color: ', $repere_message, $contenu_css);
$message_pied_fond_color = css_recup('background-color: ', $repere_message_pied, $contenu_css);
$message_webmaster_text_color = css_recup('color: ', $repere_message_webmaster, $contenu_css);
$message_encadre_bordure_color = css_recup('border: 1px solid ', $repere_message, $contenu_css);
$message_encadre_largeur = css_recup('width: ', $repere_message, $contenu_css);
$lien_color = css_recup('color: ', $repere_lien, $contenu_css);
$lien_fond_color = css_recup('background-color: ', $repere_lien, $contenu_css);
$lien_hover_color = css_recup('color: ', $repere_lien_hover, $contenu_css);
$lien_hover_fond_color = css_recup('background-color: ', $repere_lien_hover, $contenu_css);
$corp_color_border = css_recup('border: 1px solid ', $repere_graphique_exterieur, $contenu_css);
$corp_color_fond_exterieur = css_recup('background-color: ', $repere_corp_exterieur, $contenu_css);

// On affiche le formulaire
echo '<form method="post" action="administration_design.php">

<div>
<a class="LIEN" href="javascript:basculer(\'palette_afficher\');">'. $LANG['ADMIN_design_lien_palette'] .'</a>
</div>

<div class="div_spacer"></div>

<div style="display: none;" id="palette_afficher">

<div class="FORMULAIRE_titre">'. $LANG['ADMIN_design_titre_palette'] .'</div>' . "\n\n";


// La palette de couleur
include "palette_couleur.php";


echo $LANG['ADMIN_design_infos_palette'] .'

</div>


<dl class="FORMULAIRE">

	<dt class="FORMULAIRE_titre">'. $LANG['ADMIN_design_from_corp_titre'] .'</dt>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_corp_c_text_i'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="i_1" onchange="couleur_value(1);" type="text" name="corp_color_text" value="'. $corp_color_text .'" size="10" />
		</span>

		<div id="c_1">
			<script type="text/javascript">couleur_value(1);</script>
		</div>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_corp_c_fond_i'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="i_2" onchange="couleur_value(2);" type="text" name="corp_color_fond" value="'. $corp_color_fond .'" size="10" />
		</span>

		<div id="c_2">
			<script type="text/javascript">couleur_value(2);</script>
		</div>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_corp_c_border_e'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="i_3" onchange="couleur_value(3);" type="text" name="corp_color_border" value="'. $corp_color_border .'" size="10" />
		</span>

		<div id="c_3">
			<script type="text/javascript">couleur_value(3);</script>
		</div>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_corp_c_fond_e'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="i_4" onchange="couleur_value(4);" type="text" name="corp_color_fond_exterieur" value="'. $corp_color_fond_exterieur .'" size="10" />
		</span>

		<div id="c_4">
			<script type="text/javascript">couleur_value(4);</script>
		</div>
	</dd>

</dl>

<div class="div_spacer"></div>

<dl class="FORMULAIRE">

	<dt class="FORMULAIRE_titre">'. $LANG['ADMIN_design_from_head_titre'] .'</dt>

	<dd class="FORMULAIRE_dd_infos">
		<strong>'. $LANG['ADMIN_design_from_head_i_titre'] .'</strong>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_head_tail_titre'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="it_1" onchange="taille_value(1);" type="text" name="entete_titre_taille" value="'. $entete_titre_taille .'" size="10" />
		</span>

		<div>
			<img id="t_1" src="" alt="" />
			<script type="text/javascript">taille_value(1);</script>
		</div>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_head_c_titre'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="i_5" onchange="couleur_value(5);" type="text" name="entete_titre_text_color" value="'. $entete_titre_text_color .'" size="10" />
		</span>

		<div id="c_5">
			<script type="text/javascript">couleur_value(5);</script>
		</div>
	</dd>

	<dd class="FORMULAIRE_dd_infos">
		<strong>'. $LANG['ADMIN_design_from_head_i_msg'] .'</strong>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_head_tail_msg'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="it_2" onchange="taille_value(2);" type="text" name="entete_message_taille" value="'. $entete_message_taille .'" size="10" />
		</span>

		<div>
			<img id="t_2" src="" alt="" />
			<script type="text/javascript">taille_value(2);</script>
		</div>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_head_c_msg'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="i_6" onchange="couleur_value(6);" type="text" name="entete_message_text_color" value="'. $entete_message_text_color .'" size="10" />
		</span>

		<div id="c_6">
			<script type="text/javascript">couleur_value(6);</script>
		</div>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_head_align_msg'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<select name="entete_message_alignement" size="1">';
?>

				<option value="center" <?php if($entete_message_alignement == 'center') echo 'selected="selected"' ?>><?php echo $LANG['ADMIN_design_from_head_align_msg_c']; ?></option>
				<option value="justify" <?php if($entete_message_alignement == 'justify') echo 'selected="selected"' ?>><?php echo $LANG['ADMIN_design_from_head_align_msg_j']; ?></option>
				<option value="left" <?php if($entete_message_alignement == 'left') echo 'selected="selected"' ?>><?php echo $LANG['ADMIN_design_from_head_align_msg_l']; ?></option>
				<option value="right" <?php if($entete_message_alignement == 'right') echo 'selected="selected"' ?>><?php echo $LANG['ADMIN_design_from_head_align_msg_r']; ?></option>

<?php

echo "\t\t\t" . '</select>
		</span>
	</dd>

	<dd class="FORMULAIRE_dd_infos">
		<strong>'. $LANG['ADMIN_design_from_head_i_reste'] .'</strong>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_taille_nb_msg'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="it_3" onchange="taille_value(3);" type="text" name="entete_nombre_msg_taille" value="'. $entete_nombre_msg_taille .'" size="10" />
		</span>

		<div>
			<img id="t_3" src="" alt="" />
			<script type="text/javascript">taille_value(3);</script>
		</div>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_taille_moyen_msg'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="it_4" onchange="taille_value(4);" type="text" name="entete_moyenne_taille" value="'. $entete_moyenne_taille .'" size="10" />
		</span>

		<div>
			<img id="t_4" src="" alt="" />
			<script type="text/javascript">taille_value(4);</script>
		</div>
	</dd>

</dl>

<div class="div_spacer"></div>

<dl class="FORMULAIRE">

	<dt class="FORMULAIRE_titre">'. $LANG['ADMIN_design_from_f_titre'] .'</dt>

	<dd class="FORMULAIRE_dd_infos">
		<strong>'. $LANG['ADMIN_design_from_f_i_titre'] .'</strong>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_f_c_titre'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="i_7" onchange="couleur_value(7);" type="text" name="formulaire_titre_text_color" value="'. $formulaire_titre_text_color .'" size="10" />
		</span>

		<div id="c_7">
			<script type="text/javascript">couleur_value(7);</script>
		</div>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_f_fond_titre'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="i_8" onchange="couleur_value(8);" type="text" name="formulaire_titre_fond_color" value="'. $formulaire_titre_fond_color .'" size="10" />
		</span>

		<div id="c_8">
			<script type="text/javascript">couleur_value(8);</script>
		</div>
	</dd>

	<dd class="FORMULAIRE_dd_infos">
		<strong>'. $LANG['ADMIN_design_from_f_i_encadre'] .'</strong>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_f_border_encadre'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="i_9" onchange="couleur_value(9);" type="text" name="formulaire_encardre_bordure" value="'. $formulaire_encardre_bordure .'" size="10" />
		</span>

		<div id="c_9">
			<script type="text/javascript">couleur_value(9);</script>
		</div>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_f_width_encadre'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input type="text" name="formulaire_encardre_largeur" value="'. $formulaire_encardre_largeur .'" size="10" />
		</span>
	</dd>

</dl>

<div class="div_spacer"></div>

<dl class="FORMULAIRE">

	<dt class="FORMULAIRE_titre">'. $LANG['ADMIN_design_from_msg_titre'] .'</dt>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_msg_cf_entete'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="i_10" onchange="couleur_value(10);" type="text" name="message_entete_fond_color" value="'. $message_entete_fond_color .'" size="10" />
		</span>

		<div id="c_10">
			<script type="text/javascript">couleur_value(10);</script>
		</div>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_msg_cf_msg'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="i_11" onchange="couleur_value(11);" type="text" name="message_corp_fond_color" value="'. $message_corp_fond_color .'" size="10" />
		</span>

		<div id="c_11">
			<script type="text/javascript">couleur_value(11);</script>
		</div>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_msg_cf_pied'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="i_12" onchange="couleur_value(12);" type="text" name="message_pied_fond_color" value="'. $message_pied_fond_color .'" size="10" />
		</span>

		<div id="c_12">
			<script type="text/javascript">couleur_value(12);</script>
		</div>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_msg_c_webmast'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="i_13" onchange="couleur_value(13);" type="text" name="message_webmaster_text_color" value="'. $message_webmaster_text_color .'" size="10" />
		</span>

		<div id="c_13">
			<script type="text/javascript">couleur_value(13);</script>
		</div>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_msg_cb_encadre'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="i_14" onchange="couleur_value(14);" type="text" name="message_encadre_bordure_color" value="'. $message_encadre_bordure_color .'" size="10" />
		</span>

		<div id="c_14">
			<script type="text/javascript">couleur_value(14);</script>
		</div>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_msg_w_encadre'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input type="text" name="message_encadre_largeur" value="'. $message_encadre_largeur .'" size="10" />
		</span>
	</dd>

</dl>

<div class="div_spacer"></div>

<dl class="FORMULAIRE">

	<dt class="FORMULAIRE_titre">'. $LANG['ADMIN_design_from_lien_titre'] .'</dt>

	<dd class="FORMULAIRE_dd_infos">
		<strong>'. $LANG['ADMIN_design_from_lien_infos'] .'</strong>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_lien_c'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="i_15" onchange="couleur_value(15);" type="text" name="lien_color" value="'. $lien_color .'" size="10" />
		</span>

		<div id="c_15">
			<script type="text/javascript">couleur_value(15);</script>
		</div>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_lien_cf'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="i_16" onchange="couleur_value(16);" type="text" name="lien_fond_color" value="'. $lien_fond_color .'" size="10" />
		</span>

		<div id="c_16">
			<script type="text/javascript">couleur_value(16);</script>
		</div>
	</dd>

	<dd class="FORMULAIRE_dd_infos">
		<strong>'. $LANG['ADMIN_design_from_lien_infos2'] .'</strong>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_lien_hover_c'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="i_17" onchange="couleur_value(17);" type="text" name="lien_hover_color" value="'. $lien_hover_color .'" size="10" />
		</span>

		<div id="c_17">
			<script type="text/javascript">couleur_value(17);</script>
		</div>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['ADMIN_design_from_lien_hover_cf'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input id="i_18" onchange="couleur_value(18);" type="text" name="lien_hover_fond_color" value="'. $lien_hover_fond_color .'" size="10" />
		</span>

		<div id="c_18">
			<script type="text/javascript">couleur_value(18);</script>
		</div>
	</dd>

</dl>

<div id="FORMULAIRE_infos">
	<em>'. $LANG['ADMIN_design_from_condition'] .'</em>
</div>

<div id="FORMULAIRE_bouton">
	<input type="submit" value="'. $LANG['ADMIN_design_from_bouton'] .'" />
</div>

</form>' . "\n\n";
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