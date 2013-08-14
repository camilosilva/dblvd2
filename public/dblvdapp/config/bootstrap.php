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
require CORE . DS . 'AutoLoader.php';
\DblvdApp\AutoLoader::register('DblvdApp', ROOT);

//registration of Twig
require_once(VENDOR . DS . 'autoload.php');
