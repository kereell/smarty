<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

$url = parse_url($_SERVER['REQUEST_URI']);
$path = substr($url['path'], 7);
$query = $url['query'];

require_once (ROOT.DS.'libs'.DS.'bootstrap.php');