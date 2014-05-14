<?php

use DblvdApp\Services\Models as Models;
use DblvdApp\Services\Controllers\UserProvider as UserProvider;
use Ruckuus\Silex\ActiveRecordServiceProvider as ARProvider;
use Silex\Provider\FormServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



$app = new Silex\Application();
$app['debug'] = true;
$app['charset'] = 'utf-8';






//$u = new User();
//$f = new FF(null,null);

/* FIREWALL SECURITY SERVICE PROVIDER DEFINITIONS */


$app['security.firewalls'] = array(
        'unsecured'=>array(
            'anonymous'=>true,
            'pattern'=>'^/[a-z]{1,2}/home$'
        ),
        'login' => array(
            'pattern' => '^/login$',
        ),
        'admin' => array(
            'pattern' => '^/admin/',
            'form' => array('login_path' => '/login', 'check_path' => '/admin/login_check'),
            'logout' => array('logout_path' => '/admin/logout'),
            'users' => $app->share(function () use ($app) {
                    return new UserProvider();
            }),
        ),
        //'secured' => array(
        //    'pattern' => '^/services.*$',
        //    'form' => array('login_path' => '/login.html', 'check_path' => '/login_check'),
        //    'logout' => array('logout_path' => '/logout.html'),
        //    'users' => $app->share(function () use ($app) {
        //            return new UserProvider();
        //    }),
        //),
    );

    $app['security.role_hierarchy'] = array(
        'ROLE_ADMIN' => array('ROLE_USER', 'ROLE_ALLOWED_TO_SWITCH'),
    );
    
    $app['security.access_rules'] = array(
        array('^/admin/home$', 'ROLE_ADMIN'),
        array('^.*$', 'ROLE_USER')
    );

/**********************************/


$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\SecurityServiceProvider());
$app->register(new ARProvider(), array(
    'ar.model_dir' => MODELS,
    'ar.connections' =>  array ('development' => 'mysql://root:loc@ltest123@localhost/dadblvd'),
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

//Monolog
$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => LOG . DS . 'development.log',
    'monolog.name'    => 'DvlvdApp'
));

// Web Profiler
if ($app['debug']) {
    $app->register(new Silex\Provider\WebProfilerServiceProvider(), array(
        'profiler.cache_dir' => PROFILER,
        'profiler.mount_prefix' => '/_profiler', // this is the default
    ));    
}

//Security pages controller
$app->get('/login' , function(Request $request) use($app){
    
    
    //Check the different methods to get the password so that it can be compared
    $password=$app['security.encoder.digest']->encodePassword('foo','');
    error_log("Password :::  $password");
    
    
    //Check on the user information?
    $token = $app['security']->getToken();
    if (null !== $token) {
        $user = $token->getUser();
        $app['monolog']->addDebug('Username :: ' . $user->getUsername());
    } else {
        $app['monolog']->addDebug('User not in session');
    }
    
    
    return $app['twig']->render('login.html', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
}
);


//ADMIN PAGES
$app->get('/admin/login_check', function() use ($app) {
    //Check on the user information?
    $token = $app['security']->getToken();
    $username = "N/A";
    if (null !== $token) {
        $user = $token->getUser();
        $app['monolog']->addDebug('LOGIN_CHECK -> Username :: ' . $user->getUsername());
        $username = $user->getUsername();
    } else {
        $app['monolog']->addDebug('LOGIN_CHECK -> User not in session');
    }
    
    return $app['twig']->render('login_check.html', array(
        'username'         => $username
    ));
    
}
);



//Register new users to the system
//Create new user in this section... Make sure that it is possible

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

$app->get('/{lang}/home', function($lang) use($app) { 
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
            
            //Monolog test
            $app['monolog']->addDebug('Testing the Monolog logging.');
            
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
     return $app->redirect('/en/home');
});

$app->run();