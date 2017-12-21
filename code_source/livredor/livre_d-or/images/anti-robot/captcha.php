<?php

// On ouvre la session
session_start(); 

// Cr�ation de la chaine de caract�re
function chaine_caractere()
{
// Tous les caract�res possibles
$caractere = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'm', 'n', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
				   'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
				   2, 3, 4, 5, 6, 7, 8, 9);

// Cr�ation de la chaine de caract�re
$chaine_caractere = $caractere[rand(0, 55)] .' '.
					$caractere[rand(0, 55)] .' '.
					$caractere[rand(0, 55)] .' '.
					$caractere[rand(0, 55)] .' '.
					$caractere[rand(0, 55)] .' '.
					$caractere[rand(0, 55)] .' '.
					$caractere[rand(0, 55)];

return $chaine_caractere;
}

// Cr�ation de l'image
function image($chaine_caractere, $caractere_image)
{
// Taille de l'image
$image = imagecreate(75, 25);

// Couleur de fond de l'image
$blanc = imagecolorallocate($image, 255, 255, 255);
// Couleur de des hachures
$gris = imagecolorallocate($image, 223, 223, 223);

// Cr�ation des hachures
for($x = 0; $x < 75; $x += 8)
	{
	imageline($image, $x, 1, rand(-80, 80), 25, $gris);
	}

// Couleur al�atoire
$couleur_aleatoire = array(imagecolorallocate($image, 0, 0, 255),
						   imagecolorallocate($image, 0, 0, 0),
						   imagecolorallocate($image, 170, 204, 255),
						   imagecolorallocate($image, 139, 116, 255),
						   imagecolorallocate($image, 194, 194, 194));

// Cr�ation des caract�res � recopier
imagestring($image, 5, 3, rand(1, 8), $caractere_image[0], $couleur_aleatoire[rand(0, 4)]);
imagestring($image, 5, 13, rand(1, 8), $caractere_image[1], $couleur_aleatoire[rand(0, 4)]);
imagestring($image, 5, 23, rand(1, 8), $caractere_image[2], $couleur_aleatoire[rand(0, 4)]);
imagestring($image, 5, 33, rand(1, 8), $caractere_image[3], $couleur_aleatoire[rand(0, 4)]);
imagestring($image, 5, 43, rand(1, 8), $caractere_image[4], $couleur_aleatoire[rand(0, 4)]);
imagestring($image, 5, 53, rand(1, 8), $caractere_image[5], $couleur_aleatoire[rand(0, 4)]);
imagestring($image, 5, 63, rand(1, 8), $caractere_image[6], $couleur_aleatoire[rand(0, 4)]);

// L'image
imagegif($image);
imagedestroy($image);
}

// G�n�ration des caract�res et de l'image
function captcha()
{
// Chaine de caract�re
$chaine_caractere = chaine_caractere();

// R�cup�ration de chacun des caract�res dans un array
$caractere_image = explode(' ', $chaine_caractere);

// R�sultat que devra entrer l'utilisateur
$_SESSION['resultat'] = implode('', $caractere_image);

// L'image
image($chaine_caractere, $caractere_image);
}

header('Content-type: image/gif');
captcha();

?>