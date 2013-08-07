<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname( __DIR__ )) );
define('VENDOR', ROOT . DS . 'vendor');
define('CORE', ROOT . DS . 'dblvdapp');
define('CONFIG', CORE . DS . 'config');
define('ERROR', CORE . DS . 'error');
define('SERVICES', CORE . DS . 'services');

//registration of autoloader
require CORE . DS . 'AutoLoader.php';
\TwigApp\AutoLoader::register('DblvdApp', ROOT);

//registration of Twig
require_once(VENDOR . DS . 'autoload.php');
