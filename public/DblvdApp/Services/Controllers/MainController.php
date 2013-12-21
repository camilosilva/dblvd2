<?php
use DblvdApp\Services\Models as Models;
use Ruckuus\Silex\ActiveRecordServiceProvider as ARProvider;

$app = new Silex\Application();
$app['debug'] = true;
$app['charset'] = 'utf-8';

$app->register(new ARProvider(), array(
    'ar.model_dir' => MODELS,
    'ar.connections' =>  array ('development' => 'mysql://root@localhost/test22'),
    'ar.default_connection' => 'development',
));

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => TEMPLATES,
    'twig.options' => array(
        'cache' => TEMPLATES .DS. 'cache',
        'auto_reload' => true,
        'charset' => 'utf-8'
    )
));

$app->get('/{locale}/about/', function () use ($app) {
    $locale = $app['request']->get('locale');
    switch($locale) {
        case 'ja':
        case 'jp':
            $fileView = 'ja.main.html';
            $contents = array('welcome'=>'私のサイトへようこそ！', 'greeting'=>'友達こんにちは！');
            break;
        
        case 'es':
        default:
            $fileView = 'es.main.html';
            $contents = array('welcome' => 'Bienvenidos a mi asombrosa pagina web!',
                              'greeting' => 'Hola mi Gente!');
            break;
    }
    return $app['twig']->render($fileView, $contents);
})->bind('about');

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
            try{
                $role = new Models\Role();
                $role->printTest();
            }
            catch(Exception $e) {
                //error_log(print_r($e, true));
                var_dump($e);
                //print_r($e,true);
            }
            
            //$role->printThis();
            error_log("TEST 22");
            $fileView = 'index';
            $contents = array();
            break;
    }
    
    //Check for JSON requests
    if(isset($requests['json'])){    
        $fileView .= '.json';
        $contents = array('data'=>$contents);
        $app['twig']->addExtension(new Models\TwigJsonExtension());
    } else {
        $fileView .= '.html';
    }
    
    //Render the page
    return $app['twig']->render($fileView, $contents);

});

$app->get('/', function() use($app){
     return $app->redirect('/en/');
});

$app->run();