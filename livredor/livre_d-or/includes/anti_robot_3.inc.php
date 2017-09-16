<?php

// Les numéros aléatoires
$numero_1 = rand(1,10);
$numero_2 = rand(1,10);
$numero_3 = rand(1,10);

// Les signes aléatoires
function signe_aleatoire()
{
$aleatoire = rand(1,2);

if ($aleatoire == 1)
	{
	$signe = '+';
	}
else
	{
	$signe = '-';
	}

return $signe;
}

// Les signes
$signe_1 = signe_aleatoire();
$signe_2 = signe_aleatoire();

switch ($signe_1.$signe_2)
	{
	case '++':
		{
		$operation = $numero_1 .' + '. $numero_2 .' + '. $numero_3;
		$resultat_cacul = $numero_1 + $numero_2 + $numero_3;
		}
		break;
	case '+-': 
		{
		$operation = $numero_1 .' + '. $numero_2 .' - '. $numero_3;
		$resultat_cacul = $numero_1 + $numero_2 - $numero_3;
		}
		break;
	case '--': 
		{
		$operation = $numero_1 .' - '. $numero_2 .' - '. $numero_3;
		$resultat_cacul = $numero_1 - $numero_2 - $numero_3;
		}
		break;
	case '-+': 
		{
		$operation = $numero_1 .' - '. $numero_2 .' + '. $numero_3;
		$resultat_cacul = $numero_1 - $numero_2 + $numero_3;
		}
		break;
	}


// On récupère la réponse attendue
$_SESSION['resultat'] = $resultat_cacul;


$affichage_de_la_question_anti_robot = '<div id="FORMULAIRE_anti_robot">'. $LANG['ANTIBOT2_msg'] .'

<br'. $XHTML .'><br'. $XHTML .'>

'. $operation .' = <input type="text" name="resultat_utilisateur" size="5"'. $XHTML .'>

</div>' . "\n\n";

?>