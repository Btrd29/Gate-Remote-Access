<?php

// On commence par récupérer la limite de départ
$limite_depart = limite_debut($GET, $nb_msg, $CONFIG['nb_msg'], $nb_page);

// On récupère les messages
$requete_message = mysql_query('SELECT * FROM livredor_message ORDER BY timestamp DESC LIMIT '. $limite_depart .', '. $CONFIG['nb_msg']) or die(mysql_error());

// On affiche les messages
while ($donnees_message = mysql_fetch_array($requete_message))
	{
	echo "\n\n" . '<div class="MESSAGE">' . "\n" . '<div class="MESSAGE_entete"><div>';

	// Avant d'afficher le site et l'email on vérifie si l'utilisateur les a renseigné
	if ($donnees_message['site'] or $donnees_message['email'])
		{
		echo '<span>';

		// Affichage de l'email
		if ($donnees_message['email'])
			{
			echo '<a href="mailto:'. htmlentities($donnees_message['email']) .'"><img src="livre_d-or/images/enveloppe.gif" alt="'. $LANG['ALT_enveloppe'] .'"'. $XHTML .'></a>';
			}

		// Affichage du site
		if ($donnees_message['site'])
			{
			echo '<a href="'. htmlentities($donnees_message['site']) .'" onclick="this.target=\'_blank\'"><img src="livre_d-or/images/maison.gif" alt="'. $LANG['ALT_maison'] .'"'. $XHTML .'></a>';
			}

		echo '</span>';
		}

	echo '<strong>'. htmlentities($donnees_message['pseudo']) .'</strong>';

	// On vérifie si au moins le pays ou la ville est renseigné avant de placer un séparateur
	if ($donnees_message['ville'] or $donnees_message['pays'])
		{
		echo ' - ';

		// On affiche le pays
		echo htmlentities($donnees_message['pays']);

		// Un nouveau séparateur sera placé dans le cas ou le pays et la ville sont tout deux renseignés
		if ($donnees_message['ville'] and $donnees_message['pays'])
			{
			echo '/';
			}

		// Et enfin on affiche la ville
		echo htmlentities($donnees_message['ville']);
		}

	// Message du posteur
	echo '</div></div>' . "\n\n" .'<div class="MESSAGE_corp">' .
	msg_smiles(nl2br_msg(htmlentities(wordwrap($donnees_message['message'], 25, ' ', true)), $CONFIG['nl2br'], 'user', $CONFIG['doctype']), 'livre_d-or/images/smiles/', $XHTML);

	// Message du Webmaster, s'il en a laissé un
	if ($donnees_message['message_webmaster'])
		{
		echo "\n\n" . '<div class="MESSAGE_separateur">'. htmlentities_isoutf8(supprslash($CONFIG['separateur_msg']), $CONFIG['encodage']) .'</div><div class="MESSAGE_webmaster">' . "\n\n" .
		msg_smiles(nl2br_msg(htmlentities(wordwrap($donnees_message['message_webmaster'], 25, " ", true)), $CONFIG['nl2br'], 'admin', $CONFIG['doctype']), 'livre_d-or/images/smiles/', $XHTML ) .'</div>';
		}

	echo '</div>' . "\n\n" . '<div class="MESSAGE_pied"><div>';

	// On vérifie s'il y a une note, si c'est le cas on l'affiche
	if ($donnees_message['note'] != null)
		{
		echo '<span>'. $LANG['NOTE_ok'] . supprslash($donnees_message['note']) .'/20</span>';
		}
	// Sinon, on indique que l'utilisateur n'a pas laissé de note
	else
		{
		echo '<span>'. $LANG['NOTE_pas_ok'] .'</span>';
		}

	// Pour finir on affiche la date
	echo date('d/m/Y H:i', $donnees_message['timestamp']) .'</div>' . "\n" . '</div></div>' . "\n\n";
	}

?>