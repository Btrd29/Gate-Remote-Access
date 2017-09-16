<?php 

// On vérifie que le dossier "install" n'existe plus sinon on va vers l'install
if (file_exists('../install/install.php'))
	{
	header('Location: ../install/install.php');
	}

ob_start();
session_start();

// Version du script
$version = '2.0.6';

// Fichier
$config_file = '../config/config.php';

// On récupère le texte, la configuration et les fonctions
include '../includes/fonctions.inc.php';
include $config_file;
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
		<script type="text/javascript" src="http://www.chopinscript.codissimo.fr/version.js"></script>
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


// Si les identifiants correspondent toujours à ceux de la configuration alors on affiche la page demandée
if ($admin_pseudo == htmlentities(supprslash($CONFIG['admin_pseudo'], 'gd')) and $admin_mot_de_passe == $CONFIG['admin_mdp'])
	{
	// Haut de page
	include "menu.php";
	echo "\n\n" . '<div id="ENTETE_titre">'. $LANG['ADMIN_entete_titre'] .'</div>' . "\n\n" . '<br />' . "\n\n";

	// Suivi des mise à jour
	echo '<div id="maj"><script type="text/javascript">version(\''. $version .'\', \''. addslashes($LANG['ADMIN_maj']) .'\', \'maj\');</script></div>' . "\n\n";

	// On vérifie si le formulaire a été soumis
	if (isset($_POST['config_utilisateur']) or isset($_POST['config_mot_de_passe']) or isset($_POST['config_mot_de_passe_verif']) or isset($_POST['config_separateur']) or isset($_POST['config_nombre_message']) or isset($_POST['config_titre']) or isset($_POST['config_message']))
		{
		// On vérifie que les champs obligatoires ont été renseignés
		if (empty($_POST['config_utilisateur']) or empty($_POST['config_separateur']) or empty($_POST['config_nombre_message']) or empty($_POST['config_titre']))
			{
			echo "\n\n" . '<div id="pas_ok">'. $LANG['ADMIN_erreur_champ'] .'</div><br />' . "\n\n";
			}
		// On vérifie ensuite si le mot de passe a été renseigné et s'il a été correctement renseigné
		elseif ((isset($_POST['config_mot_de_passe']) or isset($_POST['config_mot_de_passe_verif'])) and ($_POST['config_mot_de_passe'] != $_POST['config_mot_de_passe_verif']))
			{
			echo "\n\n" . '<div id="pas_ok">'. $LANG['ADMIN_erreur_pass'] .'</div><br />' . "\n\n";
			}
		// Sinon tout est OK alors on met à jour
		else
			{
			// On récupère les données du post
			if ($_POST['config_mot_de_passe'])
				{
				$_SESSION['admin_mot_de_passe'] = md5(supprslash($_POST['config_mot_de_passe'], 'both', 'oui'));
				}
			if ($_POST['flood'] == 'oui')
				{
				$config_sql_flood = $_POST['flood_option'];
				}
			else
				{
				$config_sql_flood = 0;
				}
			if ($_POST['br'] == 'oui')
				{
				$config_sql_br = $_POST['br_option'];
				}
			else
				{
				$config_sql_br = 0;
				}

			$_SESSION['admin_pseudo'] = htmlentities(supprslash($_POST['config_utilisateur'], 'both', 'oui'));

			// On met le fichier de configuration à jour
			$array_config = array('entete_titre' => supprslash($_POST['config_titre'], 'both', 'oui'),
								  'entete_msg' => supprslash(@$_POST['config_message'], 'both', 'oui'),
								  'nb_msg' => $_POST['config_nombre_message'],
								  'separateur_msg' => supprslash($_POST['config_separateur'], 'both', 'oui'),
								  'flood' => $config_sql_flood,
								  'nl2br' => $config_sql_br,
								  'admin_pseudo' => supprslash($_POST['config_utilisateur'], 'both', 'oui'),
								  'admin_mdp' => $_SESSION['admin_mot_de_passe'],
								  'anti_bot' => $_POST['config_anti_bot'],
								  'doctype' => $_POST['doctype'],
								  'encodage' => $_POST['encodage'],
								  'langue' => 'fr'
								 );

			$array_config = '<?php '. "\n\n" .'$CONFIG = '. array_affiche($array_config) . "\n\n" . '?>';
			f_owc($config_file, $array_config, 'w');

			// On modifie le charset de la table si l'encodage a été modifier
			include '../config/bdd.php';

			if (isset($_POST['encodage']))
				{
				mysql_query('ALTER TABLE livredor_message DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;') or die(mysql_error());
				mysql_query('ALTER TABLE livredor_message CONVERT TO CHARACTER SET utf8;') or die(mysql_error());
				}
			else
				{
				mysql_query('ALTER TABLE livredor_message DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;') or die(mysql_error());
				mysql_query('ALTER TABLE livredor_message CONVERT TO CHARACTER SET latin1;') or die(mysql_error());
				}

			mysql_close($bdd);

			// Enfin, on affiche le message pour prévenir l'utilisateur que la mise à jour a été effectuée
			echo "\n\n" . '<div id="ok">'. $LANG['ADMIN_ok'] .'</div><br />' . "\n\n";
			}
		}

	// On récupère la configuration actuelle
	include $config_file;

	echo '<form method="post" action="administration.php">

<dl class="FORMULAIRE">

	<dt class="FORMULAIRE_titre">'. $LANG['FORMULAIRE_ident_titre'] .'</dt>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['FORMULAIRE_ident_user'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input type="text" name="config_utilisateur" value="'. htmlentities(supprslash($CONFIG['admin_pseudo'], 'gd')) .'" size="12" />
		</span>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['FORMULAIRE_ident_pass'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input type="password" name="config_mot_de_passe" value="" size="12" />
		</span>
	</dd>
		
	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['FORMULAIRE_ident_pass_verif'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input type="password" name="config_mot_de_passe_verif" value="" size="12" />
		</span>
	</dd>

</dl>

<div class="div_spacer"></div>

<dl class="FORMULAIRE">

	<dt class="FORMULAIRE_titre">'. $LANG['FORMULAIRE_config_titre'] .'</dt>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['FORMULAIRE_config_separateur'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input type="text" name="config_separateur" value="'. htmlentities(supprslash($CONFIG['separateur_msg'], 'gd')) .'" size="12" />
		</span>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['FORMULAIRE_config_nb_message'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input type="text" name="config_nombre_message" value="'. $CONFIG['nb_msg'] .'" size="12" />
		</span>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['FORMULAIRE_config_db_titre'] .'
		</span>

		<span class="FORMULAIRE_dd_right">
			<input type="text" name="config_titre" value="'. htmlentities(supprslash($CONFIG['entete_titre'], 'gd')) .'" size="42" />
		</span>
	</dd>';

?>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			<?php echo $LANG['FORMULAIRE_config_flood']; ?>

		</span>

		<span class="FORMULAIRE_dd_right">
			<?php echo $LANG['FORMULAIRE_config_oui']; ?>

			<input onclick="option_affiche('bloc_flood', 'block');" style="border: none;" type="radio" name="flood" value="oui" <?php if ($CONFIG['flood'] >= 1) { echo 'checked="checked"'; } ?> />
			<?php echo $LANG['FORMULAIRE_config_non']; ?>

			<input onclick="option_affiche('bloc_flood', 'none');" style="border: none;" type="radio" name="flood" value="non" <?php if ($CONFIG['flood'] == 0) { echo 'checked="checked"'; } ?> />
		</span>
	</dd>

	<dd id="bloc_flood" style="display: <?php if ($CONFIG['flood'] >= 1) { echo 'block'; } else { echo 'none'; } ?>; margin: 0px auto 0px auto; width: 450px; text-align: right;">

		<div class="FORMULAIRE_dd_infos">
			<strong><?php echo $LANG['FORMULAIRE_config_flood_infos']; ?></strong>
		</div>

		<div class="FORMULAIRE_dd">
			<span class="FORMULAIRE_dd_left">
				<?php echo $LANG['FORMULAIRE_config_flood_option_1']; ?>

			</span>

			<span class="FORMULAIRE_dd_right">
				<input style="border: none;" type="radio" name="flood_option" value="1" <?php if ($CONFIG['flood'] == 0 or $CONFIG['flood'] == 1) { echo 'checked="checked"'; } ?> />
			</span>
		</div>

		<div class="FORMULAIRE_dd">
			<span class="FORMULAIRE_dd_left">
				<?php echo $LANG['FORMULAIRE_config_flood_option_2']; ?>

			</span>

			<span class="FORMULAIRE_dd_right">
				<input style="border: none;" type="radio" name="flood_option" value="2" <?php if ($CONFIG['flood'] == 2) { echo 'checked="checked"'; } ?> />
			</span>
		</div>

		<div class="FORMULAIRE_dd" style="margin-bottom: 15px;">
			<span class="FORMULAIRE_dd_left">
				<?php echo $LANG['FORMULAIRE_config_flood_option_3']; ?>

			</span>

			<span class="FORMULAIRE_dd_right">
				<input style="border: none;" type="radio" name="flood_option" value="3" <?php if ($CONFIG['flood'] == 3) { echo 'checked="checked"'; } ?> />
			</span>
		</div>

	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			<?php echo $LANG['FORMULAIRE_config_br']; ?>

		</span>

		<span class="FORMULAIRE_dd_right">
			<?php echo $LANG['FORMULAIRE_config_oui']; ?>

			<input onclick="option_affiche('bloc_br', 'block');" style="border: none;" type="radio" name="br" value="oui" <?php if ($CONFIG['nl2br'] >= 1) { echo 'checked="checked"'; } ?> />
			<?php echo $LANG['FORMULAIRE_config_non']; ?>

			<input onclick="option_affiche('bloc_br', 'none');" style="border: none;" type="radio" name="br" value="non" <?php if ($CONFIG['nl2br'] == 0) { echo 'checked="checked"'; } ?> />
		</span>
	</dd>

	<dd id="bloc_br" style="display: <?php if ($CONFIG['nl2br'] >= 1) { echo 'block'; } else { echo 'none'; } ?>; margin: 0px auto 0px auto; width: 450px; text-align: right;">

		<div class="FORMULAIRE_dd_infos">
			<strong><?php echo $LANG['FORMULAIRE_config_br_infos']; ?></strong>
		</div>

		<div class="FORMULAIRE_dd">
			<span class="FORMULAIRE_dd_left">
				<?php echo $LANG['FORMULAIRE_config_br_option_1']; ?>

			</span>

			<span class="FORMULAIRE_dd_right">
				<input style="border: none;" type="radio" name="br_option" value="1" <?php if ($CONFIG['nl2br'] == 0 or $CONFIG['nl2br'] == 1) { echo 'checked="checked"'; } ?> />
			</span>
		</div>

		<div class="FORMULAIRE_dd">
			<span class="FORMULAIRE_dd_left">
				<?php echo $LANG['FORMULAIRE_config_br_option_2']; ?>

			</span>

			<span class="FORMULAIRE_dd_right">
				<input style="border: none;" type="radio" name="br_option" value="2" <?php if ($CONFIG['nl2br'] == 2) { echo 'checked="checked"'; } ?> />
			</span>
		</div>

	</dd>

	<dd style="margin: 0px auto 0px auto; width: 450px; text-align: right;">

		<div class="FORMULAIRE_dd_infos">
			<strong>Configuration du doctype</strong>
		</div>

		<div class="FORMULAIRE_dd">
			<span class="FORMULAIRE_dd_left">
				XHTML strict 1.0

			</span>

			<span class="FORMULAIRE_dd_right">
				<input style="border: none;" type="radio" name="doctype" value="1" <?php if ($CONFIG['doctype']) { echo 'checked="checked"'; } ?> />
			</span>
		</div>

		<div class="FORMULAIRE_dd">
			<span class="FORMULAIRE_dd_left">
				HTML transitional 4.01

			</span>

			<span class="FORMULAIRE_dd_right">
				<input style="border: none;" type="radio" name="doctype" value="0" <?php if (! $CONFIG['doctype']) { echo 'checked="checked"'; } ?> />
			</span>
		</div>

	</dd>

	<dd style="margin: 0px auto 0px auto; width: 450px; text-align: right;">

		<div class="FORMULAIRE_dd_infos">
			<strong>Configuration de l'encodage</strong>
		</div>

		<div class="FORMULAIRE_dd">
			<span class="FORMULAIRE_dd_left">
				UTF-8

			</span>

			<span class="FORMULAIRE_dd_right">
				<input style="border: none;" type="radio" name="encodage" value="1" <?php if ($CONFIG['encodage']) { echo 'checked="checked"'; } ?> />
			</span>
		</div>

		<div class="FORMULAIRE_dd">
			<span class="FORMULAIRE_dd_left">
				ISO

			</span>

			<span class="FORMULAIRE_dd_right">
				<input style="border: none;" type="radio" name="encodage" value="0" <?php if (! $CONFIG['encodage']) { echo 'checked="checked"'; } ?> />
			</span>
		</div>

	</dd>

</dl>

<?php

echo '<div class="div_spacer"></div>

<dl class="FORMULAIRE">

	<dt class="FORMULAIRE_titre">'. $LANG['FORMULAIRE_anti_bot_titre'] .'</dt>

	<dd class="FORMULAIRE_dd_msg">';

?>
		<select name="config_anti_bot" size="1">
			<option value="1" <?php if ($CONFIG['anti_bot'] == 1) { echo "selected=\"selected\""; } ?>><?php echo $LANG['FORMULAIRE_anti_bot_choix_1']; ?></option>
			<option value="2" <?php if ($CONFIG['anti_bot'] == 2) { echo "selected=\"selected\""; } ?>><?php echo $LANG['FORMULAIRE_anti_bot_choix_2']; ?></option>
			<option value="3" <?php if ($CONFIG['anti_bot'] == 3) { echo "selected=\"selected\""; } ?>><?php echo $LANG['FORMULAIRE_anti_bot_choix_3']; ?></option>
		</select>
	</dd>

<?php

echo '</dl>

<div class="div_spacer"></div>

<dl class="FORMULAIRE">

	<dt class="FORMULAIRE_titre">'. $LANG['FORMULAIRE_config_msg_titre'] .'</dt>

	<dd class="FORMULAIRE_dd_msg">
		<span class="FORMULAIRE_dd_left">
			'. $LANG['FORMULAIRE_config_msg'] .'
		</span>

		<div id="FORMULAIRE_plus_moins">
		<a href="javascript:taille_textarea(2, \'config_message\');" title="'. $LANG['FORMULAIRE_plus'] .'"><img src="../images/plus.gif" alt="" /></a>
		<a href="javascript:taille_textarea(1, \'config_message\');" title="'. $LANG['FORMULAIRE_moins'] .'"><img src="../images/moins.gif" alt="" /></a>
		</div>

		<textarea id="config_message" name="config_message" rows="6" cols="40">'. htmlentities(supprslash($CONFIG['entete_msg'], 'gd')) .'</textarea>
	</dd>

</dl>

<div id="FORMULAIRE_infos">
	<em>'. $LANG['FORMULAIRE_condition'] .'</em>
</div>

<div id="FORMULAIRE_bouton">
	<input type="submit" value="'. $LANG['FORMULAIRE_config_bouton'] .'" />
</div>

</form>' ."\n\n";
	}

// Sinon, les identifiants ne correspondent plus alors on redirectionne l'utilisateur au formulaire de connexion
else
	{
	header('Location: index.php');
	}

?>

</div>

</body>
</html>