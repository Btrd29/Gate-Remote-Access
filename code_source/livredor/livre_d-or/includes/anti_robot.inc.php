<?php

// On crée une position à rechercher pour l'utilisateur
$position_recherche = rand(0,4);

	if ($position_recherche == 0)
		{
		$message_position = '1er';
		$recuperation_figure_position = 'figure_1';
		}
	else
		{
		$message_position = $position_recherche + 1 . 'e';
		$recuperation_figure_position = 'figure_' . $position_recherche + 1;
		}

$figure_nom = array('', $LANG['ANTIBOT_image_triangle'], $LANG['ANTIBOT_image_carre'], $LANG['ANTIBOT_image_croix'], $LANG['ANTIBOT_image_cercle'], $LANG['ANTIBOT_image_fleche']);

// Calcule de la disposition
$nombre_de_permutation = range(1, 5);
srand((float)microtime() * 1000000);
shuffle($nombre_de_permutation);

// Initialisation de la variable
$nombre_permute = '';

// Création d'emplacement aléatoire des chiffres
foreach ($nombre_de_permutation as $permutation)
	{
	$nombre_permute = $permutation .' '. $nombre_permute;
	}

// On enlève les espaces
$tableau_permute = trim($nombre_permute);
// Récupération des emplacements aléatoires dans un array
$tableau_permute = explode(' ', $tableau_permute);


$figure_1 = $tableau_permute[0];
$figure_2 = $tableau_permute[1];
$figure_3 = $tableau_permute[2];
$figure_4 = $tableau_permute[3];
$figure_5 = $tableau_permute[4];


// On récupère la réponse attendue
$_SESSION['resultat'] = $figure_nom[$tableau_permute[$position_recherche]];


$affichage_de_la_question_anti_robot = '<div id="FORMULAIRE_anti_robot">'. $LANG['ANTIBOT_msg_debut'] . $message_position.$LANG['ANTIBOT_msg_fin'] .'

<br'. $XHTML .'>

<img class="ANTI_ROBOT" src="livre_d-or/images/anti-robot/'. $figure_1 .'.gif" alt="'. $LANG['ANTIBOT_alt'] .' 1"'. $XHTML .'> 
<img class="ANTI_ROBOT" src="livre_d-or/images/anti-robot/'. $figure_2 .'.gif" alt="'. $LANG['ANTIBOT_alt'] .' 2"'. $XHTML .'> 
<img class="ANTI_ROBOT" src="livre_d-or/images/anti-robot/'. $figure_3 .'.gif" alt="'. $LANG['ANTIBOT_alt'] .' 3"'. $XHTML .'> 
<img class="ANTI_ROBOT" src="livre_d-or/images/anti-robot/'. $figure_4 .'.gif" alt="'. $LANG['ANTIBOT_alt'] .' 4"'. $XHTML .'> 
<img class="ANTI_ROBOT" src="livre_d-or/images/anti-robot/'. $figure_5 .'.gif" alt="'. $LANG['ANTIBOT_alt'] .' 5"'. $XHTML .'>


<br'. $XHTML .'>

<em>'. $LANG['ANTIBOT_infos_suppl'] .'</em>

<br'. $XHTML .'>

<div>
<input type="text" name="resultat_utilisateur"'. $XHTML .'>
</div>

</div>' . "\n\n";

?>