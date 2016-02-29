<?php
session_start();
error_reporting(E_ALL);
require __DIR__ . '/autoload.php';

if (isset($_COOKIE['username']) && !isset($_SESSION['username'])) {
    \App\Controllers\Site::setSessionByCookie();
}
if (isset($_SESSION['username']) && !isset($_SESSION['access'])) {
    \App\Controllers\Site::setSessionAccess();
}

$cont = isset($_GET['cont']) ? $_GET['cont'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';


$contName = 'App\\Controllers\\' . $cont;
$controller = new $contName;
$method = 'action' . $act;
$controller->$method();