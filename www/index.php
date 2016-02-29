<?php
session_start();
error_reporting(E_ALL);
require __DIR__ . '/autoload.php';

$cont = isset($_GET['cont']) ? $_GET['cont'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';


$contName = 'App\\Controllers\\' . $cont;
$controller = new $contName;
$method = 'action' . $act;
$controller->$method();