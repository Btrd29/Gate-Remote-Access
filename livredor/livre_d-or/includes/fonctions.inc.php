<?php

// Requête SQL de base
function requete($requete)
{
$requete = mysql_query($requete) or die(mysql_error());
$requete = mysql_fetch_array($requete);

return $requete;
}

// HTMLentities UTF-8/ISO
function htmlentities_isoutf8($text, $encodage)
{
if ($encodage)
	{
	$text = htmlentities($text, ENT_COMPAT, 'UTF-8');
	}
else
	{
	$text = htmlentities($text);
	}
return $text;
}

// utf8_decode UTF-8/ISO
function utf8_decode_isoutf8($text, $encodage)
{
if ($encodage)
	{
	$text = utf8_decode($text);
	}
return $text;
}

// Encode un tableau en UTF-8
function array_enc_utf8(&$valeur)
{
$valeur = utf8_encode($valeur);
}

// Supprime un dossier et sont contenu
function rmdir_and_files($dossier)
{
$contenu = dir($dossier);
chmod($dossier, 0777);

while (false !== ($entree = $contenu->read()))
	{
	if ($entree != '.' or $entree != '..')
		{
		@unlink($dossier .'/'. $entree);
		}
	}

$contenu->close();
rmdir($dossier);
}

// Affichage d'un tableau
function array_affiche($array)
{
$nb_entree = count($array);
$creation_array = 'array(';
$i = 0;

foreach ($array as $cle => $valeur)
	{
	$i++;

	if ($i != $nb_entree)
		{
		$virgule = ',' . " \n";
		}
	else
		{
		$virgule = '';
		}

	if ($i > 1)
		{
		$indentation = "\t\t\t\t";
		}
	else
		{
		$indentation = '';
		}

	$creation_array .= $indentation . '\''. $cle .'\''.' => \''. addslashes($valeur).'\''.$virgule;
	}

$creation_array .= "\n\t\t\t   " . ');';

return $creation_array;
}

// Fopen, fwrite, fclose (tout en 1)
function f_owc($fichier, $contenu, $methode)
{
$fichier = fopen($fichier, $methode);
fwrite($fichier, $contenu);
fclose($fichier);
}

// Configuration des sauts de ligne
function nl2br_msg($msg, $option, $user, $doctype='admin')
{
if ($option == 2 and $user == 'user')
	{
	if ($doctype)
		{
		return nl2br($msg);
		}
	else
		{
		return preg_replace("#\n#", "<br>", $msg);
		}
	}
elseif ($option != 0 and $user == 'admin')
	{
	if ($doctype)
		{
		return nl2br($msg);
		}
	else
		{
		return preg_replace("#\n#", "<br>", $msg);
		}
	}
elseif($user == 'msg')
	{
	if ($doctype)
		{
		return nl2br($msg);
		}
	else
		{
		return preg_replace("#\n#", "<br>", $msg);
		}
	}
else
	{
	return $msg;
	}
}

// Remplace :n: par les smiles respectifs
function msg_smiles($MSG_smiles, $MSG_prefix, $MSG_XHTML='')
{
for ($i=0;$i<13;$i++)
	{
	$MSG_smiles = preg_replace('#:'. $i .':#', "\n" . '<img src="'. $MSG_prefix . $i .'.gif" alt=""'. $MSG_XHTML .'>' . "\n", $MSG_smiles);
	}

return $MSG_smiles;
}

// Vérification de la validité d'une adresse email
function email_valide($VRFCT_email)
{
if (preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#', $VRFCT_email))
	{
	return true;
	}
	
else
	{
	return false;
	}
}

// Vérification de la validité d'une adresse web
function url_valide($VRFCT_url)
{
if (preg_match('#^(http://|https://)#', $VRFCT_url))
	{
	return true;
	}
	
else
	{
	return false;
	}
}

// Calcul de la limite de départ
function limite_debut($LIM_GET_page, $LIM_nombre_d_entree, $LIM_nombre_entree_par_page, $LIM_nombre_de_page)
{
if ($LIM_GET_page)
	{
	$LIM = round(abs($LIM_GET_page));
	}
else
	{
	$LIM = 1;
	}
if ($LIM > $LIM_nombre_de_page)
	{
	$LIM = 1;
	}

// Calcul de de la limite actuelle en utilisant Y = ax + b
$LIM_debut_daffichage = $LIM * $LIM_nombre_entree_par_page - $LIM_nombre_entree_par_page;

return $LIM_debut_daffichage; // La fonction renvoie la limite d'affichage des entrées pour la page actuellemet chargée
}

// Nombre de page
function nb_de_page($NBDP_nombre_d_entree, $NBDP_nombre_entree_par_page)
{

$NBDP_nombre_de_page = ceil($NBDP_nombre_d_entree / $NBDP_nombre_entree_par_page);

return $NBDP_nombre_de_page;
}

// Navigation entre les pages
function NVGT_page_par_page($NVGT_GET_page, $NVGT_nombre_entree_par_page, $NVGT_nombre_d_entree, $NVGT_chemin, $NVGT_chemin2, $NVGT_nombre_de_page, $NVGT_suivant, $NVGT_precedent)
{

/* Calcul de la page actuellement chargée */

	// Si "$NVGT_GET_page" est renseigné alors "$NVGT_page_actuelle" prend la valeur de "$NVGT_GET_page"
	if ($NVGT_GET_page)
		{
		$NVGT_page_actuelle = round(abs($NVGT_GET_page)); // Forçage d'un nombre numérique entiers sans virgule avec "round" et "abs"
		}

	// Sinon "$NVGT_GET_page" n'est pas renseigné alors "$NVGT_page_actuelle" prend pour valeur "1"
	else
		{
		$NVGT_page_actuelle = 1;
		}

	// Vérification que le nombre n'est pas plus grand que le nombre d'entree sinon la valeur de "$LIM_debut_daffichage" reviens à  0
	if ($NVGT_page_actuelle > $NVGT_nombre_de_page)
		{
		$NVGT_page_actuelle = 1;
		}


/* Calcul de la page précédente et suivante */

	// Calcul de la page suivante en vérifiant qu'il existe bien une page suivante
	if ($NVGT_nombre_de_page > 1 and $NVGT_page_actuelle != $NVGT_nombre_de_page)
		{
		$NVGT_page_suivante = $NVGT_page_actuelle + 1;
		}
	else
		{
		$NVGT_page_suivante = "";
		}

	// Cacul de la page précédente en vérifiant qu'il existe bien une page précédente
	if ($NVGT_page_actuelle != 1)
		{
		$NVGT_page_precedente = $NVGT_page_actuelle - 1;
		}
	else
		{
		$NVGT_page_precedente = "";
		}


/* Configuration des variables pour la navigation page par page */

	// Si le nombre de page est inférieur à  10 alors les variables suivante sont utilisées
	if ($NVGT_nombre_de_page <= 10)
		{
		$NVGT_boucle_page_no = 0;
		$NVGT_limite = $NVGT_nombre_de_page;
		$NVGT_page_no_debut = "";
		$NVGT_page_no_fin = "";
		}

	// Sinon, si on se trouve dans les six premières pages et que le nombre total de page est supérieure à 10 alors les variables suivante sont utilisées
	elseif ($NVGT_page_actuelle < 6 and $NVGT_nombre_de_page > 10)
		{
		$NVGT_boucle_page_no = 0;
		$NVGT_limite = 10;
		$NVGT_page_no_fin = "\n...\n\n" . '<a href="'. $NVGT_chemin . $NVGT_nombre_de_page .'">'. $NVGT_nombre_de_page .'</a>'  . "\n\n";
		$NVGT_page_no_debut = '';
		}

	// Sinon, si on se trouve dans les 5 dernières pages alors les variables suivante sont utilisées
	elseif ($NVGT_page_actuelle > $NVGT_nombre_de_page - 5)
		{
		$NVGT_boucle_page_no = $NVGT_nombre_de_page - 10;
		$NVGT_limite = $NVGT_nombre_de_page;
		$NVGT_page_no_debut = "\n\n" . '<a href="'. $NVGT_chemin2 .'">1</a>' . "\n\n...\n\n";
		$NVGT_page_no_fin = '';
		}

	// Et sinon, on se trouve après les dix premières pages et en dessous des dix dernières pages alors les varibles suivantes sont utilisées
	else
		{
	    $NVGT_boucle_page_no = $NVGT_page_actuelle - 5;
		$NVGT_limite = 4 + $NVGT_page_actuelle;
		$NVGT_page_no_debut = "\n\n" . '<a href="'. $NVGT_chemin2 .'">1</a>' . "\n\n...\n\n";;
		$NVGT_page_no_fin = "\n...\n\n" . '<a href="'. $NVGT_chemin . $NVGT_nombre_de_page .'">'. $NVGT_nombre_de_page .'</a>' . "\n\n";
		}


/* Configuration de l'affichage de la navigation */

	// Récupération de la page précédente s'il y en existe une
	if ($NVGT_page_precedente)
		{
		$NVGT_menu_precedent = '<a href="'. $NVGT_chemin . $NVGT_page_precedente .'">&lt;= '. $NVGT_precedent . '</a>';
		}
	else
		{
		$NVGT_menu_precedent = '';
		}

	// Si la page précédente est la première des pages alors on utilise l'url de départ
	if ($NVGT_page_actuelle == 2)
		{
		$NVGT_menu_precedent = '<a href="'. $NVGT_chemin2 .'">&lt;= '. $NVGT_precedent . '</a>';
		}

	// Récupération de la page suivante s'il y en existe une
	if ($NVGT_page_suivante)
		{
		$NVGT_menu_suivant = '<a href="'. $NVGT_chemin . $NVGT_page_suivante .'">'. $NVGT_suivant .' =&gt;</a>';
		}
	else
		{
		$NVGT_menu_suivant = '';
		}


/* Création des différentes parties du tableau d'affichage */

	// Création du début du tableau d'affichage de la navigation
		$NVGT_debut_tableau = "\n\n" . '<table id="navigation">
    <tr>
        <td id="navigation_td_1">'. $NVGT_menu_precedent .'</td>' . "\n\n" . '<td  id="navigation_td_2">';


	// Initailisation de la variable
	$NVGT_milieu_tableau = '';

	// Création du mileu du tableau d'affichage de la navigation
	while ($NVGT_boucle_page_no != $NVGT_limite) // Boucle qui créra l'affichage d'un maximum de 12 liens de navigation entres les pages
		{
		$NVGT_boucle_page_no++;

		// Création du numéro de la page actuelle
		if ($NVGT_boucle_page_no == $NVGT_page_actuelle)
			{
			$NVGT_milieu_tableau = $NVGT_milieu_tableau . "\n" . '<em>' . $NVGT_page_actuelle . '</em>' . "\n\n";
			}

		// S'il s'agit de la première page alors l'url de déart est utilisé
		elseif ($NVGT_boucle_page_no == 1)
			{
			$NVGT_milieu_tableau = $NVGT_milieu_tableau . '<a href="'. $NVGT_chemin2 .'">'. $NVGT_boucle_page_no .'</a>' . "\n";
			}
		
		// Création de des numéros et liens des autres pages
		else
			{
			$NVGT_milieu_tableau = $NVGT_milieu_tableau . '<a href="'. $NVGT_chemin . $NVGT_boucle_page_no .'">'. $NVGT_boucle_page_no .'</a>' . "\n";
			}
		}

	// Création de la fin du tableau d'affichage de la navigation
		$NVGT_fin_tableau = "\n" . '</td>' . "\n        " . '<td id="navigation_td_3">'. $NVGT_menu_suivant .'</td>
    </tr>
</table>' . "\n\n";


/* Création du tableau d'affichage complet */

		$NVGT_navigation = 	$NVGT_debut_tableau.
							$NVGT_page_no_debut.
							$NVGT_milieu_tableau.
							$NVGT_page_no_fin.
							$NVGT_fin_tableau;

return $NVGT_navigation; // La fonction renvoie le tableau de navigation entres les pages
}

// Retourne une chaine sans echappement
function supprslash($chaine, $guillemet = '', $magic_quotes_gpc_test = '')
{
if ($guillemet == 'gs')
	{
	$rechercher = array('\\\'', '\\\\');
	$remplacement = array('\'', '\\');
	}
elseif ($guillemet == 'gd')
	{
	$rechercher = array('\\"', '\\\\');
	$remplacement = array('"', '\\');
	}
else
	{
	$rechercher = array('\\\'', '\\"', '\\\\');
	$remplacement = array('\'', '"', '\\');
	}

if ($magic_quotes_gpc_test and get_magic_quotes_gpc())
	{
	return str_replace($rechercher, $remplacement, $chaine);
	}
elseif ($magic_quotes_gpc_test)
	{
	return $chaine;
	}
else
	{
	return str_replace($rechercher, $remplacement, $chaine);
	}
}

// Récupération d'une données CSS
function css_recup($CSS_avant, $CSS_class_id, $CSS_centenu)
{
$CSS_RECUP = array_pop(explode($CSS_class_id, $CSS_centenu));
$CSS_RECUP = substr($CSS_RECUP, 0, strpos($CSS_RECUP, '}'));
$CSS_RECUP = array_pop(explode($CSS_avant, $CSS_RECUP));
$CSS_RECUP = substr($CSS_RECUP, 0, strpos($CSS_RECUP, ';'));

return $CSS_RECUP;
}

// Remplacement d'une données CSS
function css_remplace($CSS_instruction, $CSS_nouvelle_instruction, $CSS_class_id, $CSS_centenu, $CSS_id_class_complet)
{
$CSS_REMPLACE = array_pop(explode($CSS_class_id, $CSS_centenu));
$CSS_REMPLACE = substr($CSS_REMPLACE, 0, strpos($CSS_REMPLACE, '}'));
$CSS_REMPLACE = $CSS_id_class_complet . "
{". $CSS_REMPLACE .'}';
$CSS_REMPLACE = preg_replace('/([[:space:]]+|^)'. $CSS_instruction .'/', $CSS_nouvelle_instruction, $CSS_REMPLACE);

return $CSS_REMPLACE;
}

// Remplacement d'une partie CSS
function nouveau_css($CSS_nouveau, $CSS_class_id, $CSS_centenu, $CSS_id_class_complet)
{
$NOUVEAU_CSS = array_pop(explode($CSS_class_id, $CSS_centenu));
$NOUVEAU_CSS = substr($NOUVEAU_CSS, 0, strpos($NOUVEAU_CSS, '}'));
$NOUVEAU_CSS = $CSS_id_class_complet . "
{". $NOUVEAU_CSS .'}';
$NOUVEAU_CSS = preg_replace('/'. $NOUVEAU_CSS .'/', $CSS_nouveau, $CSS_centenu);

return $NOUVEAU_CSS;
}

?>