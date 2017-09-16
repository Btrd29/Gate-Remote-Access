<?php

// On vérifie que l'utilisateur n'est pas un bot d'un moteur de recherche avant d'ouvrir la session
function checkUaRobot()
{
$robot = false;
$_UA = array('Googlebot', 'crawler', 'Slurp', 'Fast', 'Scooter', 'VoilaBot', 'W3C', 'msnbot', 'ask', 'exabot');

foreach($_UA as $ua)
	{
	if(strpos($ua, $_SERVER['HTTP_USER_AGENT']))

	return true;
	}

return false;
}

if (! checkUaRobot())
	{
	session_start();
	}

?>