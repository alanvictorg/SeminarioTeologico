<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels nice to relax.
|
*/

require __DIR__.'/../bootstrap/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);


//$app->get('/cowsay', function() use($app) {
//    $app['monolog']->addDebug('cowsay');
//    return "<pre>".\Cowsayphp\Cow::say("Cool beans")."</pre>";
//});
//
//$dbopts = parse_url(getenv('DATABASE_URL'));
//$app->register(new Csanquer\Silex\PdoServiceProvider\Provider\PDOServiceProvider('pdo'),
//    array(
//        'pdo.server' => array(
//            'driver'   => 'pgsql',
//            'user' => $dbopts["user"],
//            'password' => $dbopts["pass"],
//            'host' => $dbopts["host"],
//            'port' => $dbopts["port"],
//            'dbname' => ltrim($dbopts["path"],'/')
//        )
//    )
//);
//
//$app->get('/db/', function() use($app) {
//    $st = $app['pdo']->prepare('SELECT name FROM test_table');
//    $st->execute();
//
//    $names = array();
//    while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
//        $app['monolog']->addDebug('Row ' . $row['name']);
//        $names[] = $row;
//    }
//
//    return $app['twig']->render('database.twig', array(
//        'names' => $names
//    ));
//});