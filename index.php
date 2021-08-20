<?php
require "autolaod.php";
autoLoad::autoLoad();
 require ("http.php");
$timestart=microtime(true);

http::startSession();
$http=http::getInstance();
$http->extracteData();
$http->route();

$timeend=microtime(true);
$time=$timeend-$timestart;
 
//Afficher le temps d'éxecution
$page_load_time = number_format($time, 4);
echo "Debut du script: ".date("H:i:s", $timestart);
echo "<br>Fin du script: ".date("H:i:s", $timeend);
echo "<br>Script execute en " . $page_load_time . " sec";

