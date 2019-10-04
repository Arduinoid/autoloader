<?php
namespace Login;
require_once __DIR__ . '/../../includes/autoloader.php';
use Autoload\ModuleClassLoader;

ModuleClassLoader::$namespace = __NAMESPACE__;
ModuleClassLoader::$directory = __DIR__;

spl_autoload_register('Autoload\ModuleClassLoader::autoload');