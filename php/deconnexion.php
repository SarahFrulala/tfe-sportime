<?php

session_start();

session_destroy();

header('Location: /tfe/sportime');  //ONLINE
// echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/">';   //LOCAL
// exit;

?>

