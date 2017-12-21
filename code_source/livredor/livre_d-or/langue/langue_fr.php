<?php

##
## Configuration du texte fran�ais

$LANG = array
(

// Donn�es de la page /livre_d-or/livre_d-or.php
'ENTETE_msg_post_ok' 		=> "Votre message a bien �t� post� dans le livre d'or !",
'ENTETE_msg_erreur_IP' 		=> "Un seul message par adresse IP est autoris� dans le livre d'or",
'ENTETE_msg_erreur_dp_1'	=> "Vous ne pouvez pas reposter un message si votre IP a post� le dernier message du livre d'or",
'ENTETE_msg_erreur_dp_2'	=> "Vous ne pouvez pas reposter un message si votre IP a post� le dernier message du livre d'or ou tant que le webmaster n'a pas �mis de r�ponse � votre message",
'ENTETE_msg_erreur_champ' 	=> "Vous devez au moins renseigner les champs � Pseudo � et � Votre message � pour poster dans le livre d'or",
'ENTETE_msg_erreur_email' 	=> "L'email que vous avez donn� est invalide",
'ENTETE_msg_erreur_url' 	=> "L'URL que vous avez donn� est invalide",
'ENTETE_msg_erreur_message' => "Votre message est beaucoup trop long, il ne doit pas exc�der les 1000 caract�res !",
'ENTETE_msg_erreur_captcha' => "La r�ponse � la question anti-robot est incorrecte !",
'BOUTON_retour_erreur' 		=> "Retour",
'BOUTON_retour' 			=> "Retour au livre d'or",
'NOMBRE_msg_singulier' 		=> "Il y a actuellement <strong>1</strong> message dans le livre d'or",
'NOMBRE_msg_pluriel' 		=> "Il y a actuellement <strong>". @$nb_msg ."</strong> messages dans le livre d'or",
'NOMBRE_msg_aucun' 			=> "Il n'y a pas encore de message dans le livre d'or, soyez le premier � le signer !",
'MOYENNE' 					=> "Moyenne du site ",
'COPYRIGHT' 				=> "Script PHP r�alis� par Chopin",
'COPYRIGHT_license' 		=> "Licence CC",
'COPYRIGHT_site' 			=> "Script de livre d'or gratuit",

// Donn�es de la page /livre_d-or/includes/message.inc.php
'ALT_enveloppe' 			=> "Email du posteur",
'ALT_maison' 				=> "Site du posteur",
'NOTE_ok' 					=> "Note : ",
'NOTE_pas_ok' 				=> "Non �valu�",

// Donn�es de la page /livre_d-or/includes/formulaire.inc.php
'FORMULAIRE_plus' 			=> "Agrandir la taille du formulaire",
'FORMULAIRE_moins' 			=> "R�duire la taille du formulaire",
'FORMULAIRE_lien' 			=> "Ajouter un message",
'FORMULAIRE_msg_entete' 	=> "Signer le livre d'or",
'FORMULAIRE_msg_pseudo' 	=> "Pseudo *",
'FORMULAIRE_msg_email' 		=> "Email",
'FORMULAIRE_msg_ville' 		=> "Ville",
'FORMULAIRE_msg_pays' 		=> "Pays",
'FORMULAIRE_msg_site' 		=> "Site internet",
'FORMULAIRE_msg_note' 		=> "Donner une note � ce site",
'FORMULAIRE_msg_note_aucun' => "Pas d'avis",
'FORMULAIRE_msg_note_0' 	=> "0 - Sans aucun int�r�t",
'FORMULAIRE_msg_note_5' 	=> "5 - Tr�s peu d'int�r�t",
'FORMULAIRE_msg_note_10' 	=> "10 - Il y a du bon",
'FORMULAIRE_msg_note_15' 	=> "15 - Tr�s int�ressent",
'FORMULAIRE_msg_note_20' 	=> "20 - Fr�le la perfection",
'FORMULAIRE_msg_message' 	=> "Votre message *",
'FORMULAIRE_condition'	 	=> "Les champs � Pseudo � et � Votre message � sont obligatoires",
'FORMULAIRE_bouton'		 	=> "Signer",

// Donn�es de la page /livre_d-or/includes/anti_robot.inc.php
'ANTIBOT_msg_debut' 		=> "Afin de v�rifier que la validation du formulaire n'est pas automatique nous vous demandons de taper le nom de la figure se trouvant en ",
'ANTIBOT_msg_fin'		 	=> " position",
'ANTIBOT2_msg' 				=> "Afin de v�rifier que la validation du formulaire n'est pas automatique nous vous demandons de donner le r�sultat de l'op�ration suivante",
'ANTIBOT3_msg'				=> "Afin de v�rifier que la validation du formulaire n'est pas automatique nous vous demandons de recopier l'image ci-dessous",
'ANTIBOT_alt'		 		=> "Anti-robot",
'ANTIBOT_infos_suppl'		=> "Sans accent, ni majuscule (triangle, carre, cercle, croix, fleche)",
'ANTIBOT3_infos_suppl'		=> "Majuscule et minuscule � respecter",
'ANTIBOT_image_triangle'	=> "triangle",
'ANTIBOT_image_carre'		=> "carre",
'ANTIBOT_image_croix'		=> "croix",
'ANTIBOT_image_cercle'		=> "cercle",
'ANTIBOT_image_fleche'		=> "fleche",

// Donn�es de la page /livre_d-or/includes/fonctions.inc.php
'NAVIGATION_suivant'		=> "Page suivante",
'NAVIGATION_precedent'		=> "Page pr�c�dente"

);

?>