<?php
//Sets initial app settings
include __DIR__ . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR,array('DblvdApp','Config','bootstrap.php'));
//Handle requests on Main Controller
include SERVICES . DS . implode(DS , array( 'Controllers' ,  'MainController.php'));
