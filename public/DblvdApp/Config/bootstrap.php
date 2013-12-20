<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname( __DIR__ )) );
define('VENDOR', ROOT . DS . 'vendor');
define('CORE', ROOT . DS . 'DblvdApp');
define('CONFIG', CORE . DS . 'Config');
define('ERROR', CORE . DS . 'Error');
define('SERVICES', CORE . DS . 'Services');
define('CONTROLLERS', SERVICES . DS . 'Controllers');
define('VIEWS', SERVICES . DS . 'Views');
define('MODELS', SERVICES . DS . 'Models');

//registration of autoloader
require_once(VENDOR . DS . 'autoload.php');

$__LOADER = new \Composer\Autoload\ClassLoader();

// register classes with namespaces
$__LOADER->add('DblvdApp', ROOT);
 
// activate the autoloader
$__LOADER->register();


