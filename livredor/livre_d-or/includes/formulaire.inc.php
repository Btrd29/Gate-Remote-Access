
<a href="javascript:basculer('FORMULAIRE_masquer_afficher');" class="LIEN"><?php echo $LANG['FORMULAIRE_lien']; ?></a>

<br<?php echo $XHTML; ?>><br<?php echo $XHTML; ?>>

<?php

if (isset($_POST['retour_pseudo']) or isset($_POST['retour_email']) or isset($_POST['retour_ville']) or isset($_POST['retour_pays']) or isset($_POST['retour_url']) or isset($_POST['retour_note']) or isset($_POST['retour_message']))
	{
	$display = 'block';
	}
else
	{
	$display = 'none';
	}

?>
<form id="FORMULAIRE_masquer_afficher" style="display: <?php echo $display; ?>" method="post" action="livre-dor.php">

<dl id="FORMULAIRE">

	<dt id="FORMULAIRE_titre"><?php echo $LANG['FORMULAIRE_msg_entete']; ?></dt>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			<?php echo $LANG['FORMULAIRE_msg_pseudo']; ?>

		</span>

		<span class="FORMULAIRE_dd_right">
			<input type="text" name="form_pseudo" value="<?php if(isset($_POST['retour_pseudo'])) { echo htmlentities(supprslash($_POST['retour_pseudo'])); } ?>" size="15" maxlength="12"<?php echo $XHTML; ?>>
		</span>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			<?php echo $LANG['FORMULAIRE_msg_email']; ?>

		</span>

		<span class="FORMULAIRE_dd_right">
			<input type="text" name="form_email" value="<?php if(isset($_POST['retour_email'])) { echo htmlentities(supprslash($_POST['retour_email'])); } ?>" size="15" maxlength="50"<?php echo $XHTML; ?>>
		</span>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			<?php echo $LANG['FORMULAIRE_msg_ville']; ?>

		</span>

		<span class="FORMULAIRE_dd_right">
			<input type="text" name="form_ville" value="<?php if(isset($_POST['retour_ville'])) { echo htmlentities(supprslash($_POST['retour_ville'])); } ?>" size="15" maxlength="10"<?php echo $XHTML; ?>>
		</span>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			<?php echo $LANG['FORMULAIRE_msg_pays']; ?>

		</span>

		<span class="FORMULAIRE_dd_right">
			<input type="text" name="form_pays" value="<?php if(isset($_POST['retour_pays'])) { echo htmlentities(supprslash($_POST['retour_pays'])); } ?>" size="15" maxlength="10"<?php echo $XHTML; ?>>
		</span>
	</dd>

	<dd class="FORMULAIRE_dd">
		<span class="FORMULAIRE_dd_left">
			<?php echo $LANG['FORMULAIRE_msg_site']; ?>

		</span>

		<span class="FORMULAIRE_dd_right">
			<input type="text" name="form_url" value="<?php if(isset($_POST['retour_url'])) { echo htmlentities(supprslash($_POST['retour_url'])); } ?>" size="35" maxlength="100"<?php echo $XHTML; ?>>
		</span>
	</dd>

<?php
if (isset($_POST['retour_note']))
	{
	$retour_note = $_POST['retour_note'];
	}
else
	{
	$retour_note = '';
	}
?>
	<dd id="FORMULAIRE_dd_note">
		<span class="FORMULAIRE_dd_left">
			<?php echo $LANG['FORMULAIRE_msg_note']; ?>

		</span>

		<span class="FORMULAIRE_dd_right">
			<select name="form_note" size="1">
				<option value="null" <?php if(! $retour_note) { echo "selected=\"selected\""; } ?>><?php echo $LANG['FORMULAIRE_msg_note_aucun']; ?></option>
					<optgroup label="">
						<option value="0" <?php if($retour_note and $retour_note == 0) { echo "selected=\"selected\""; } ?>><?php echo $LANG['FORMULAIRE_msg_note_0']; ?></option>
						<option class="FORMULAIRE_option" value="1" <?php if($retour_note == 1) { echo "selected=\"selected\""; } ?>>1</option>
						<option class="FORMULAIRE_option" value="2" <?php if($retour_note == 2) { echo "selected=\"selected\""; } ?>>2</option>
						<option class="FORMULAIRE_option" value="3" <?php if($retour_note == 3) { echo "selected=\"selected\""; } ?>>3</option>
						<option class="FORMULAIRE_option" value="4" <?php if($retour_note == 4) { echo "selected=\"selected\""; } ?>>4</option>
						<option value="5" <?php if($retour_note == 5) { echo "selected=\"selected\""; } ?>><?php echo $LANG['FORMULAIRE_msg_note_5']; ?></option>
						<option class="FORMULAIRE_option" value="6" <?php if($retour_note == 6) { echo "selected=\"selected\""; } ?>>6</option>
						<option class="FORMULAIRE_option" value="7" <?php if($retour_note == 7) { echo "selected=\"selected\""; } ?>>7</option>
						<option class="FORMULAIRE_option" value="8" <?php if($retour_note == 8) { echo "selected=\"selected\""; } ?>>8</option>
						<option class="FORMULAIRE_option" value="9" <?php if($retour_note == 9) { echo "selected=\"selected\""; } ?>>9</option>
						<option value="10" <?php if($retour_note == 10) { echo "selected=\"selected\""; } ?>><?php echo $LANG['FORMULAIRE_msg_note_10']; ?></option>
						<option class="FORMULAIRE_option" value="11" <?php if($retour_note == 11) { echo "selected=\"selected\""; } ?>>11</option>
						<option class="FORMULAIRE_option" value="12" <?php if($retour_note == 12) { echo "selected=\"selected\""; } ?>>12</option>
						<option class="FORMULAIRE_option" value="13" <?php if($retour_note == 13) { echo "selected=\"selected\""; } ?>>13</option>
						<option class="FORMULAIRE_option" value="14" <?php if($retour_note == 14) { echo "selected=\"selected\""; } ?>>14</option>
						<option value="15" <?php if($retour_note == 15) { echo "selected=\"selected\""; } ?>><?php echo $LANG['FORMULAIRE_msg_note_15']; ?></option>
						<option class="FORMULAIRE_option" value="16" <?php if($retour_note == 16) { echo "selected=\"selected\""; } ?>>16</option>
						<option class="FORMULAIRE_option" value="17" <?php if($retour_note == 17) { echo "selected=\"selected\""; } ?>>17</option>
						<option class="FORMULAIRE_option" value="18" <?php if($retour_note == 18) { echo "selected=\"selected\""; } ?>>18</option>
						<option class="FORMULAIRE_option" value="19" <?php if($retour_note == 19) { echo "selected=\"selected\""; } ?>>19</option>
						<option value="20" <?php if($retour_note == 20) { echo "selected=\"selected\""; } ?>><?php echo $LANG['FORMULAIRE_msg_note_20']; ?></option>
					</optgroup>
			</select>
		</span>
	</dd>

	<dd id="FORMULAIRE_dd_note_message">
		<span class="FORMULAIRE_dd_left">
			<?php echo $LANG['FORMULAIRE_msg_message']; ?>

		</span>
		
		<div id="FORMULAIRE_plus_moins">
		<a href="javascript:taille_textarea(2, 'form_message');" title="<?php echo $LANG['FORMULAIRE_plus']; ?>"><img src="livre_d-or/images/plus.gif" alt=""<?php echo $XHTML; ?>></a>
		<a href="javascript:taille_textarea(1, 'form_message');" title="<?php echo $LANG['FORMULAIRE_moins']; ?>"><img src="livre_d-or/images/moins.gif" alt=""<?php echo $XHTML; ?>></a>
		</div>

			<textarea id="form_message" name="form_message" rows="8" cols="40"  onkeyup="limite(this,1000);" onkeydown="limite(this,1000);"><?php if(isset($_POST['retour_message'])) { echo htmlentities(supprslash($_POST['retour_message'])); } ?></textarea>

<?php

$prefix = 'livre_d-or/images/smiles/';
include"smiles.inc.php";

?>


			<br<?php echo $XHTML; ?>><br<?php echo $XHTML; ?>>

	</dd>
</dl>

<div id="FORMULAIRE_infos">
	<em><?php echo $LANG['FORMULAIRE_condition']; ?></em>
</div>


<?php echo $affichage_de_la_question_anti_robot; ?>

<div id="FORMULAIRE_bouton">
	<input type="submit" value="<?php echo $LANG['FORMULAIRE_bouton']; ?>"<?php echo $XHTML; ?>>
</div>

</form>
