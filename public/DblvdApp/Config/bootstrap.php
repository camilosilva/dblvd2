<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname( __DIR__ )) );
define('VENDOR', ROOT . DS . 'vendor');
define('CORE', ROOT . DS . 'dblvdapp');
define('CONFIG', CORE . DS . 'config');
define('ERROR', CORE . DS . 'error');
define('SERVICES', CORE . DS . 'services');
define('CONTROLLERS', SERVICES . DS . 'controllers');
define('VIEWS', SERVICES . DS . 'views');
define('MODELS', SERVICES . DS . 'models');

//registration of autoloader
require_once(VENDOR . DS . 'autoload.php');

$__LOADER = new \Composer\Autoload\ClassLoader();

// register classes with namespaces
$__LOADER->add('DblvdApp', ROOT);
 
// activate the autoloader
$__LOADER->register();


