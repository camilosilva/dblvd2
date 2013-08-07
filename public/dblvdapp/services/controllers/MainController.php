<?php
use \DblvdApp\Services\Models as Models;

$app = new Silex\Application();

$app->get('/{lang}/', function($lang) use($app) { 
    $lang = $app->escape($lang);
    $requests = (!empty($_GET))? $_GET : '';
    
    switch($lang) {
        case 'ja':
        case 'jp':
            $fileView = 'ja.main';
            $contents = array('welcome'=>'私のサイトへようこそ！', 'greeting'=>'友達こんにちは！');
            break;
        
        case 'es':
            $fileView = 'es.main';
            $contents = array('welcome' => 'Bienvenidos a mi asombrosa pagina web!',
                              'greeting' => 'Hola mi Gente!');
            break;
        
        case 'fr':
            $fileView = 'fr.main';
            $contents = array('welcome' => 'Bienvenue sur ma page d\'accueil impressionnant!',
                              'greeting' => 'Bonjour mon Peuple!');
            break;
        
        case 'en':
        default:
            $fileView = 'en.main';
            $contents = array('welcome' => 'Welcome to my awesome homepage.',
                              'greeting' => 'Hello People!');
            break;
    }
    
    //Create the Twig loader and direct the template source
    $loader = new Twig_Loader_Filesystem(SERVICES .DS. 'views' .DS. 'templates');
    //Configure Twig's environment
    $twig = new Twig_Environment($loader, array(
        'cache' => SERVICES .DS. 'views' .DS. 'templates' .DS. 'cache',
        'auto_reload' => true,
        'charset' => 'utf-8'
    ));
    
    //Check for JSON requests
    if(isset($requests['json'])){    
        $fileView .= '.json';
        $contents = array('data'=>$contents);
        $twig->addExtension(new Models\TwigJsonExtension());
    } else {
        $fileView .= '.html';
    }
    
    //Render the page
    return $twig->render($fileView, $contents);

});

$app->get('/', function() use($app){
     return $app->redirect('/en/');
});

$app->run();