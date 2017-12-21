<?php

$affichage_de_la_question_anti_robot = '<div id="FORMULAIRE_anti_robot">'. $LANG['ANTIBOT3_msg'] .'

<br'. $XHTML .'><br'. $XHTML .'>

<img id="captcha" src="livre_d-or/images/anti-robot/captcha.php" alt=""'. $XHTML .'>

<a href="javascript:actualise_image(\'captcha\');"><img style="border: none;" src="livre_d-or/images/anti-robot/actualisation.gif" alt="Actualisation" title="Cliquez ici pour recharger une autre image"'. $XHTML .'></a>

<br'. $XHTML .'><br'. $XHTML .'>

<em>'. $LANG['ANTIBOT3_infos_suppl'] .'</em>

<br'. $XHTML .'><br'. $XHTML .'>

<input type="text" name="resultat_utilisateur" size="14"'. $XHTML .'>

</div>' . "\n\n";

?>