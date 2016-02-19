<?php
$date = date("Y-m-d-H");
## Cette protection permet de personaliser votre token. Quelques lettres suffisent. ##
$mot = "Votre phrase de protection";
$token = sha1($_SERVER['REMOTE_ADDR'].$date.$mot);
if(isset($_GET["token"]) && ($_GET["token"] == $token)) {
## Votre Code à protéger ##	
} else { echo '403 Forbidden'; }
?>
