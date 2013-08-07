<?php

namespace DblvdApp\Services\Models;

class TwigJsonExtension extends \Twig_Extension {
    
    public function getFunctions(){
        return array(
            new \Twig_SimpleFunction('setjson', array($this, 'setJson'))
        );
    }
    
    public function getName(){
        return 'twigJson';
    }
    
    public function setJson(){
        header('Content-type: application/json; charset=utf-8');
    }
}