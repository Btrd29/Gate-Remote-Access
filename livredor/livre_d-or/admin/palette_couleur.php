<?php

function rgbTOhex($red, $green, $blue)
{
$red = 0x10000 * max(0, min(255, $red + 0));
$green = 0x100 * max(0, min(255, $green + 0));
$blue = max(0, min(255, $blue + 0));

return "#".str_pad(strtoupper(dechex($red + $green + $blue)), 6, 0, STR_PAD_LEFT);
}


// Couleur sélectionnée
echo "\n\n" . '<dl>' . "\n\n" . '<dd id="palette_afficher_dd_spectre">';


$i_1 = 255;
$i_2 = 0;
$i_3 = 0;
$i_tableau = 0;
$total_cellule = 60;

echo "\n\n" . '<table>' . "\n\n" . '<tr>' . "\n";

while($i_tableau != $total_cellule)
	{

	// colonne
	if ($i_tableau > 0 and $i_tableau <= 10)
		{
		$i_2 = $i_2 + 25.5;
		}
	elseif ($i_tableau > 10 and $i_tableau <= 20)
		{
		$i_1 = $i_1 - 25.5;
		}
	elseif ($i_tableau > 20 and $i_tableau <= 30)
		{
		$i_3 = $i_3 + 25.5;
		}
	elseif ($i_tableau > 30 and $i_tableau <= 40)
		{
		$i_2 = $i_2 - 25.5;
		}
	elseif ($i_tableau > 40 and $i_tableau <= 50)
		{
		$i_1 = $i_1 + 25.5;
		}
	elseif ($i_tableau > 50 and $i_tableau <= 60)
		{
		$i_3 = $i_3 - 25.5;
		}

	// Nombre de cellule
	$i_tableau++;

	// La couleur de la cellule
	$couleur_cellule = rgbTOhex(round($i_1), round($i_2), round($i_3));

	echo "\n<td onmouseover=\"degrade($i_1, $i_2, $i_3, 'degrade', '0'); selectionner_couleur('$couleur_cellule', 'couleur_selectionnee');\" onclick=\"if(bloc) { bloc = false; } else { bloc = true; };\" style=\"width: 3px; height: 50px; background-color: $couleur_cellule; color: #000000;\"></td>";
	}

echo "\n\n" . '</tr>

</table>

</dd>

<dd id="palette_afficher_dd_couleur">
	<div id="couleur_selectionnee_div"></div>
</dd>

<dd id="palette_afficher_dd_degrade">
	<div id="degrade">
		<script type="text/javascript">
		degrade(0, 0, 0, \'degrade\', 1);
		</script>
	</div>
</dd>
	
<dd id="palette_afficher_dd_img">
	<img onclick="degrade(0, 0, 0, \'degrade\', 1);" src="../images/noir-blanc.gif" alt="" />
</dd>

<dd id="palette_afficher_dd_input">
	<input id="couleur_selectionnee_input" type="text" value="" size="10" />
</dd>

</dl>

<br />' . "\n\n";

?>