<?php

// Chemin des smiles
$prefix = '../images/smiles/';

// On commence par récupérer la limite de départ
$limite_depart = limite_debut($GET, $nb_msg, $CONFIG['nb_msg'], $nb_page);

// On récupère les messages
$requete_message = mysql_query('SELECT * FROM livredor_message ORDER BY timestamp DESC LIMIT '. $limite_depart .', '. $CONFIG['nb_msg']) or die(mysql_error());

// On affiche les messages
while ($donnees_message = mysql_fetch_array($requete_message))
	{
	echo "\n\n" . '<div class="MESSAGE"><a name="'. $donnees_message['id'] .'"></a>' . "\n" . '<div class="MESSAGE_entete"><div>';

	// Avant d'afficher le site et l'email on vérifie si l'utilisateur les a renseigné
	if ($donnees_message['site'] or $donnees_message['email'])
		{
		echo '<span>';

		// Affichage de l'email
		if ($donnees_message['email'])
			{
			echo '<a href="mailto:'. htmlentities($donnees_message['email']) .'"><img src="../images/enveloppe.gif" alt="'. $LANG['ADMIN_msg_alt_enveloppe'] .'" /></a>';
			}

		// Affichage du site
		if ($donnees_message['site'])
			{
			echo '<a href="'. htmlentities($donnees_message['site']) .'" onclick="this.target=\'_blank\'"><img src="../images/maison.gif" alt="'. $LANG['ADMIN_msg_alt_maison'] .'" /></a>';
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
	msg_smiles(nl2br_msg(htmlentities(wordwrap($donnees_message['message'], 25, ' ', true)), $CONFIG['nl2br'], 'user'), '../images/smiles/');

	// Message du Webmaster, s'il en a laissé un
	if ($donnees_message['message_webmaster'])
		{
		echo "\n\n" . '<div class="MESSAGE_separateur">'. htmlentities(supprslash($CONFIG['separateur_msg'])) .'</div><div class="MESSAGE_webmaster">' . "\n\n" .
		msg_smiles(nl2br_msg(htmlentities(wordwrap($donnees_message['message_webmaster'], 25, " ", true)), $CONFIG['nl2br'], 'admin'), '../images/smiles/') .'</div>';
		}

	echo '</div>' . "\n\n" . '<div class="MESSAGE_pied"><div>';

	// On vérifi s'il y a une note, si c'est le cas on l'affiche
	if ($donnees_message['note'] != null)
		{
		echo '<span>'. $LANG['ADMIN_msg_msg_note'] . supprslash($donnees_message['note']) .'/20</span>';
		}
	// Sinon, on indique que l'utilisateur n'a pas laissé de note
	else
		{
		echo '<span>'. $LANG['ADMIN_msg_msg_no_note'] .'</span>';
		}

// Pour finir on affiche la date
echo date('d/m/Y H:i', $donnees_message['timestamp']) .' (IP : '. $donnees_message['ip'] .')</div>' . "\n" . '</div></div>' . "\n\n";

// Liens d'administration
echo "\n\n" . '<a class="LIEN" href="'. $supprimer_get . $donnees_message['id'] .'#'. $donnees_message['id'] .'">'. $LANG['ADMIN_msg_suppr'] .'</a> | <a class="LIEN" href="'. $editer_get . $donnees_message['id'] .'#'. $donnees_message['id'] .'">'. $LANG['ADMIN_msg_edit'] .'</a> | <a class="LIEN" href="'. $repondre_get . $donnees_message['id'] .'#'. $donnees_message['id'] .'">'. $LANG['ADMIN_msg_repondre'] .'</a>' . "\n\n";

// On affiche le message de validation de suppression du message si le lien a été cliqué
if ($supprimer_id and $supprimer_id == $donnees_message['id'] and ! $ok)
	{
	echo "\n\n" . '<div id="modif_message">'. $LANG['ADMIN_msg_suppr_verif'] .'<br /><a class="LIEN" href="'. $supprimer_get . $donnees_message['id'] .'&amp;ok=oui">'. $LANG['ADMIN_msg_suppr_oui'] .'</a> | <a class="LIEN" href="administration_message.php'. $PAGE_actuel_get .'#'. $donnees_message['id'] .'">'. $LANG['ADMIN_msg_suppr_non'] .'</a></div>' . "\n\n";
	}

// On affiche le formulaire de modification si le lien de modification a été cliqué
if ($editer_id and $editer_id == $donnees_message['id'] and (empty($_POST['msg_pseudo']) and empty($_POST['msg_email']) and empty($_POST['msg_ville']) and empty($_POST['msg_pays']) and empty($_POST['msg_site']) and empty($_POST['msg_note']) and empty($_POST['msg_message'])))
	{
	?>

<form method="post" action="<?php echo $editer_get . $donnees_message['id'] .'&amp;valide=ok#'. $donnees_message['id']; ?>">

<dl id="modif_message">

	<dt>&nbsp;</dt>

	<dd class="modif_message_dd">
		<span class="FORMULAIRE_dd_left">
			<?php echo $LANG['ADMIN_msg_edit_form_pseudo']; ?>

		</span>

		<span class="FORMULAIRE_dd_right">
			<input type="text" name="msg_pseudo" value="<?php echo htmlentities($donnees_message['pseudo']); ?>" size="15" />
		</span>
	</dd>

	<dd class="modif_message_dd">
		<span class="FORMULAIRE_dd_left">
			<?php echo $LANG['ADMIN_msg_edit_form_email']; ?>

		</span>

		<span class="FORMULAIRE_dd_right">
			<input type="text" name="msg_email" value="<?php echo htmlentities($donnees_message['email']); ?>" size="15" />
		</span>
	</dd>

	<dd class="modif_message_dd">
		<span class="FORMULAIRE_dd_left">
			<?php echo $LANG['ADMIN_msg_edit_form_ville']; ?>

		</span>

		<span class="FORMULAIRE_dd_right">
			<input type="text" name="msg_ville" value="<?php echo htmlentities($donnees_message['ville']); ?>" size="15" />
		</span>
	</dd>

	<dd class="modif_message_dd">
		<span class="FORMULAIRE_dd_left">
			<?php echo $LANG['ADMIN_msg_edit_form_pays']; ?>

		</span>

		<span class="FORMULAIRE_dd_right">
			<input type="text" name="msg_pays" value="<?php echo htmlentities($donnees_message['pays']); ?>" size="15" />
		</span>
	</dd>

	<dd class="modif_message_dd">
		<span class="FORMULAIRE_dd_left">
			<?php echo $LANG['ADMIN_msg_edit_form_url']; ?>

		</span>

		<span class="FORMULAIRE_dd_right">
			<input type="text" name="msg_url" value="<?php echo htmlentities($donnees_message['site']); ?>" size="35" />
		</span>
	</dd>

	<dd id="modif_message_dd_note">
		<span class="FORMULAIRE_dd_left">
			<?php echo $LANG['ADMIN_msg_edit_form_note']; ?>

		</span>

		<span class="FORMULAIRE_dd_right">
			<select name="msg_note" size="1">
				<option value="null" <?php if($donnees_message['note'] == null) {echo 'selected="selected"'; } ?>>-</option>
				<option value="0" <?php if($donnees_message['note'] == 0 and $donnees_message['note'] != null) {echo 'selected="selected"'; } ?>>0</option>
				<option value="1" <?php if($donnees_message['note'] == 1) {echo 'selected="selected"'; } ?>>1</option>
				<option value="2" <?php if($donnees_message['note'] == 2) {echo 'selected="selected"'; } ?>>2</option>
				<option value="3" <?php if($donnees_message['note'] == 3) {echo 'selected="selected"'; } ?>>3</option>
				<option value="4" <?php if($donnees_message['note'] == 4) {echo 'selected="selected"'; } ?>>4</option>
				<option value="5" <?php if($donnees_message['note'] == 5) {echo 'selected="selected"'; } ?>>5</option>
				<option value="6" <?php if($donnees_message['note'] == 6) {echo 'selected="selected"'; } ?>>6</option>
				<option value="7" <?php if($donnees_message['note'] == 7) {echo 'selected="selected"'; } ?>>7</option>
				<option value="8" <?php if($donnees_message['note'] == 8) {echo 'selected="selected"'; } ?>>8</option>
				<option value="9" <?php if($donnees_message['note'] == 9) {echo 'selected="selected"'; } ?>>9</option>
				<option value="10" <?php if($donnees_message['note'] == 10) {echo 'selected="selected"'; } ?>>10</option>
				<option value="11" <?php if($donnees_message['note'] == 11) {echo 'selected="selected"'; } ?>>11</option>
				<option value="12" <?php if($donnees_message['note'] == 12) {echo 'selected="selected"'; } ?>>12</option>
				<option value="13" <?php if($donnees_message['note'] == 13) {echo 'selected="selected"'; } ?>>13</option>
				<option value="14" <?php if($donnees_message['note'] == 14) {echo 'selected="selected"'; } ?>>14</option>
				<option value="15" <?php if($donnees_message['note'] == 15) {echo 'selected="selected"'; } ?>>15</option>
				<option value="16" <?php if($donnees_message['note'] == 16) {echo 'selected="selected"'; } ?>>16</option>
				<option value="17" <?php if($donnees_message['note'] == 17) {echo 'selected="selected"'; } ?>>17</option>
				<option value="18" <?php if($donnees_message['note'] == 18) {echo 'selected="selected"'; } ?>>18</option>
				<option value="19" <?php if($donnees_message['note'] == 19) {echo 'selected="selected"'; } ?>>19</option>
				<option value="20" <?php if($donnees_message['note'] == 20) {echo 'selected="selected"'; } ?>>20</option>
			</select>
		</span>
	</dd>

	<dd class="FORMULAIRE_dd_msg2">
		<span class="FORMULAIRE_dd_left">
			<?php echo $LANG['ADMIN_msg_edit_form_msg']; ?>

		</span>

		<div id="FORMULAIRE_plus_moins">
		<a href="javascript:taille_textarea(2,'form_message');" title="<?php echo $LANG['FORMULAIRE_plus']; ?>"><img src="../images/plus.gif" alt="" /></a>
		<a href="javascript:taille_textarea(1,'form_message');" title="<?php echo $LANG['FORMULAIRE_moins']; ?>"><img src="../images/moins.gif" alt="" /></a>
		</div>

		<textarea id="form_message" name="msg_message" rows="6" cols="40"><?php echo htmlentities($donnees_message['message']); ?></textarea>
	</dd>

	<dd id="modif_message_dd_infos">

<?php

$XHTML = ' /';
include '../includes/smiles.inc.php';

?>

		<br /><br />

		<div id="FORMULAIRE_infos">
			<em><?php echo $LANG['ADMIN_msg_edit_form_condition']; ?></em>
		</div>

		<div id="FORMULAIRE_bouton">
			<input type="submit" value="<?php echo $LANG['ADMIN_msg_edit_form_bouton']; ?>" />
		</div>

	</dd>

</dl>

</form>
<?php
	}

// Sinon, si le formulaire a été validé, on vérifie que les champs obligatoire ont été renseignés
elseif (($editer_id and $editer_id == $donnees_message['id']) and (isset($_POST['msg_pseudo']) or isset($_POST['msg_email']) or isset($_POST['msg_ville']) or isset($_POST['msg_pays']) or isset($_POST['msg_url']) or isset($_POST['msg_note']) or isset($_POST['msg_message'])) and (empty($_POST['msg_pseudo']) or empty($_POST['msg_message'])))
	{
	echo "\n\n" . '<div id="modif_message"><div id="pas_ok">'. $LANG['ADMIN_msg_edit_form_pas_ok'] .'</div></div>' . "\n\n";
	}
// Sinon, tout est OK
elseif ($editer_id and $editer_id == $donnees_message['id'])
	{
	echo "\n\n" . '<div id="modif_message"><div id="ok">'. $LANG['ADMIN_msg_edit_form_ok'] .'</div></div>' . "\n\n";
	}

// On affiche le formulaire de réponse si le lien de réponse a été cliqué
if ($repondre_id and $repondre_id == $donnees_message['id'] and empty($_POST['repondre_message']))
	{
?>
<form method="post" action="<?php echo $repondre_get . $donnees_message['id'].'&amp;valide=ok#'. $donnees_message['id']; ?>">

<dl id="modif_message">

	<dd class="FORMULAIRE_dd_msg2">
		<span class="FORMULAIRE_dd_left">
			<?php echo $LANG['ADMIN_msg_repondre_form_reponse']; ?>

		</span>

		<div id="FORMULAIRE_plus_moins">
		<a href="javascript:taille_textarea(2,'form_message');" title="<?php echo $LANG['FORMULAIRE_plus']; ?>"><img src="../images/plus.gif" alt="" /></a>
		<a href="javascript:taille_textarea(1,'form_message');" title="<?php echo $LANG['FORMULAIRE_moins']; ?>"><img src="../images/moins.gif" alt="" /></a>
		</div>

		<textarea id="form_message" name="repondre_message" rows="6" cols="40"><?php echo htmlentities($donnees_message['message_webmaster']); ?></textarea>
	</dd>

	<dd id="modif_message_dd_infos">

<?php

$XHTML = ' /';
include '../includes/smiles.inc.php';

?>

		<br /><br />

		<div id="FORMULAIRE_bouton">
			<input type="submit" value="<?php echo $LANG['ADMIN_msg_repondre_form_bouton']; ?>" />
		</div>
	</dd>

</dl>

</form>
	<?php
	}

// Si le formulaire a été posté alors on affiche la confirmation
if ((isset($_POST['repondre_message']) and $_POST['repondre_message'] != "") and $repondre_id == $donnees_message['id'])
	{
	echo "\n\n" . '<div id="modif_message"><div id="ok">'. $LANG['ADMIN_msg_repondre_form_ok'] .'</div></div>' . "\n\n";
	}

	}

?>