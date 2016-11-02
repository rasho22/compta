<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();
// Register service providers
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\SecurityServiceProvider(), array(
     'security.firewalls' => array(
         'secured' => array(
             'pattern' => '^/',
             'anonymous' => true,
             'logout' => true,
             'form' => array('login_path' => '/login', 'check_path' => '/login_check'),
             'users' => $app->share(function () use ($app) {
                 return new compta\DAO\UserDAO($app['db']);
             }),
         ),
     ),
     'security.role_hierarchy' => array(
         'ROLE_ADMIN' => array('ROLE_USER'),
     ),
     'security.access_rules' => array(
         array('^/admin', 'ROLE_ADMIN'),
     ),
 ));

$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../var/logs/app_compta.log',
    'monolog.name' => 'compta'));
 
if (isset($app['debug']) && $app['debug']) {
    $app->register(new Silex\Provider\HttpFragmentServiceProvider());
    
}

// Register services


$app['dao.user'] = $app->share(function ($app) {
    return new compta\DAO\UserDAO($app['db']);
});

$app['dao.user_group'] = $app->share(function ($app) {
    return new compta\DAO\UserGroupDAO($app['db']);
});

$app['dao.depense'] = $app->share(function ($app) {
   return new compta\DAO\DepensesDAO($app['db']);
});

// Register error handler
$app->error(function (\Exception $e, $code) use ($app) {
    switch ($code) {
        case 403:
            $message = 'Access denied.';
            break;
        case 404:
            $message = 'The requested resource could not be found.';
            break;
        default:
            $message = "Something went wrong.";
    }
    
});
// Register JSON data decoder for JSON requests
$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
});

