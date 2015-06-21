/*
Ce script permet de protéger vos scripts PHP par des tokens de protection. Pour pouvoir accèder à votre script, vous devrez mettre le token necessaire. Enregistrez un fichier PHP avec ce code : 
<?php
$login = 'asiojmszdxjomqdjmoidcqjzoiddojijdzoadk';
$password = 'ZDZ68FE4FE8S4DC5DS1E8EZZ1DDZ';
$ip = $_SERVER['REMOTE_ADDR'];
$token = md5($login.$password.$ip);
echo $token;
?>
Vous accèderez au script ci dessous comme ceci : script.php?token=le token généré dans le fichier ci dessus.
*/
<?php
 {
$login = 'asiojmszdxjomqdjmoidcqjzoiddojijdzoadk';
$password = 'ZDZ68FE4FE8S4DC5DS1E8EZZ1DDZ';
$ip = $_SERVER['REMOTE_ADDR'];
$token = md5($login.$password.$ip);
       if(isset($_GET["token"]) && ($_GET["token"] == $token))
        {
?>
le code à protéger
<?
 } else { echo '<html><head><meta content="text/html; charset=utf-8" http-equiv="Content-Type"></head><body><h1 style="height: 25px;">403 Forbidden</h1><hr style="height: 1px;"><h3 style="line-height: 2px;">Pourquoi ce message s\'affiche ?</h3><p>Il se peut que le token ait expiré ou que votre IP ait changé. Allez à l\'écran d\'accueil et cliquez sur Actualiser. Si les problèmes persistent, contactez-moi.</p></body></html>' ;
    // sinon, le formulaire s\'affiche
    }
	
	}
	  ?>
