<?php
 {
if(isset($_GET["lien"]))
        {
?>
<?php
$u = $date = date("d-m-Y");$heure = date("H:i");
$question1 = $_GET['nomdelachaine'];
$question2 = $_GET['lien'];
$question3 = $_GET['qualite'];
$question4 = $_GET['utilisateur'];
$file = 'liensuser.php';
// Une nouvelle personne à ajouter
 
$person = '<meta charset="utf-8"><p></p>Nom de la chaine : '.$question1."<p></p>Lien du flux : ".$question2."<p></p>Qualité du flux : ".$question3."<p></p>Email : ".$question4."<p></p>Date : ".$u.' à '.$heure.'<hr></hr>';
// Ecrit le contenu dans le fichier, en utilisant le drapeau
// FILE_APPEND pour rajouter à la suite du fichier et
// LOCK_EX pour empêcher quiconque d'autre d'écrire dans le fichier
// en même temps
file_put_contents($file, $person, FILE_APPEND | LOCK_EX);
?>
<?php

$mail = 'votre email'; // Déclaration de l'adresse de destination.

if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.

{

    $passage_ligne = "\r\n";

}

else

{

    $passage_ligne = "\n";

}

//=====Déclaration des messages au format texte et au format HTML.

$message_txt = 'Bonjour ,<p></p>
Un nouveau lien vient d\'être posté, voici la description : <meta charset="utf-8"><p></p>Nom de la chaine : '.$question1."<p></p>Lien du flux : ".$question2."<p></p>Qualité du flux : ".$question3."<p></p>Date : ".$u.' à '.$heure;

$message_html = 'Bonjour ,<p></p>
Un nouveau lien vient d\'être posté, voici la description : <meta charset="utf-8"><p></p>Nom de la chaine : '.$question1."<p></p>Lien du flux : ".$question2."<p></p>Qualité du flux : ".$question3."<p></p>Date : ".$u.' à '.$heure;

//==========

 

//=====Création de la boundary

$boundary = "-----=".md5(rand());

//==========

 

//=====Définition du sujet.

$sujet = "Un nouveau lien vient d'être posté !";

//=========

 

//=====Création du header de l'e-mail.

$header = "From: \"Sujet\"<".$question4.">".$passage_ligne;

$header.= "Reply-to: \"Sujet\" <".$question4.">".$passage_ligne;

$header.= "MIME-Version: 1.0".$passage_ligne;

$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

//==========

 

//=====Création du message.

$message = $passage_ligne."--".$boundary.$passage_ligne;

//=====Ajout du message au format texte.

$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;

$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;

$message.= $passage_ligne.$message_txt.$passage_ligne;

//==========

$message.= $passage_ligne."--".$boundary.$passage_ligne;

//=====Ajout du message au format HTML

$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;

$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;

$message.= $passage_ligne.$message_html.$passage_ligne;

//==========

$message.= $passage_ligne."--".$boundary."--".$passage_ligne;

$message.= $passage_ligne."--".$boundary."--".$passage_ligne;

//==========

 

//=====Envoi de l'e-mail.

mail($mail,$sujet,$message,$header);

//==========

?>
<?
 } else { ;
    // sinon, le formulaire s'affiche
    }
	
	}
	 ?>

<html><head>
<meta charset="utf-8">
</head>
<body><form id="worm" action="liens.php" autocomplete="off">
		<p id="nomdelachaine"> Nom : <input name="nomdelachaine" placeholder="Entrez le nom de la chaine" style="height:30px; width:300px" value="" type="text"></p>	
		<p> </p>Lien : <input style="height:30px;width:305px" name="lien" id="lien" placeholder="Entrez le lien" type="text">	
		<p> </p>Qualité : <input style="height:30px;width:288px" name="qualite" id="qualite" placeholder="Entrez la Qualité" type="text">	
		<p> </p>Email : <input style="height:30px;width:228px" name="utilisateur" id="utilisateur" placeholder="Entrez votre email" type="text">	
		
	<p></p><input id="submit" value="Envoyer" style="height:30px" type="submit">

	

</form></body></html>
