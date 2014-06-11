<?php

// $url = 'http://sportime.dev';
$url = 'http://sarahbreemans.be/tfe/sportime';

$destinataire = $email;
$sujet = 'Active ton compte sur Sportime!';
$message = '
<p>Bienvenue sur Sportime,</p>
<p>active ton compte en cliquant sur <a href="'.$url.'/activation.php?hash='.$hash.'">ce lien</a>.</p>';

$headers = 'From:sarah.breemans@gmail.com'."\r\n";
$headers .= 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-Type: text/html; charset=utf-8'."\r\n";

mail($destinataire, $sujet, $message, $headers);

?>