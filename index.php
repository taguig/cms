<?php
require "autolaod.php";
autoLoad::autoLoad();
$timestart=microtime(true);

base\http::startSession();
$http=base\http::getInstance();
$http->extracteData();
$http->route();
$timeend=microtime(true);
$time=$timeend-$timestart;
 

//Afficher le temps d'éxecution
$page_load_time = number_format($time, 4);
echo "Debut du script: ".date("H:i:s:ms", $timestart);
echo "<br>Fin du script: ".date("H:i:s:ms", $timeend);
echo "<br>Script execute en " . $page_load_time . " sec";

