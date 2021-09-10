<?php

define("RAIZ",$_SERVER['DOCUMENT_ROOT']) ;
//define("RAIZ",$_SERVER['DOCUMENT_ROOT']."/") ;
//define ("TIEMPO","date_sub(CURRENT_TIMESTAMP, INTERVAL (5*60*60) second)");
define ("TIEMPO","CURRENT_TIMESTAMP");

require_once './Controller/ControllerView.php';
require_once './Model/Business.php';


ob_start();
require_once RAIZ.'View/Template.php';
ob_flush();
