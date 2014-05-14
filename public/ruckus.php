#!/usr/bin/env php
<?php

include __DIR__ . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR,array('DblvdApp','Config','bootstrap.php'));

define('RUCKUSING_WORKING_BASE', getcwd());
$db_config = require RUCKUSING_WORKING_BASE . DS . 'ruckusing.conf.php';

if (isset($db_config['ruckusing_base'])) {
    define('RUCKUSING_BASE', $db_config['ruckusing_base']);
} else {
    define('RUCKUSING_BASE', dirname(__FILE__));
}

require_once RUCKUSING_BASE . DS . 'config' . DS . 'config.inc.php';


$main = new Ruckusing_FrameworkRunner($db_config, $argv);
echo $main->execute();
