<?php

define('APPPATH', __DIR__);

$module = $argv[1] ?? 'Login';
require_once APPPATH . '/includes/autoloader.php';

$controller = "$module\Controller";

$p = new $controller(true);
$p -> index();
