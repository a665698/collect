<?php 

session_start();

require_once "../vendor/autoload.php";

$config = ['settings' => [
    'addContentLengthHeader' => false,
    'displayErrorDetails' => true,
    'determineRouteBeforeAppMiddleware' => true,
    'db' => [
        'driver' => 'mysql',
        'host' => '121.40.52.21',
        'database' => 'iwebmall_dev',
        'username' => 'dev_user',
        'password' => '9xujqm',
        'charset' => 'utf8',
        'collation' => 'utf8_general_ci',
        'prefix' => 'imall_'
    ]
]];

$app = new \Slim\App($config);

$container = $app->getContainer();

// $container['notFoundHandler'] = function ($container) {
//     return function ($request, $response) use ($container){
//         return $container['response']
//             ->withStatus(404)
//             ->withHeader('Content-Type', 'text/html')
//             ->write('Page not found');
//     };
// };

// $container['db'] = function ($container) {
//     $capsule = new \Illuminate\Database\Capsule\Manager;
//     $capsule->addConnection($container['settings']['db']);
//     $capsule->setAsGlobal();
//     $capsule->bootEloquent();
//     return $capsule;
// };


// $container['notAllowedHandler'] = function ($container) {
//     return function ($request, $response, $methods) use ($container) {
//         return $container['response']
//             ->withStatus(405)
//             ->withHeader('Allow', implode(', ', $methods))
//             ->withHeader('Content-type', 'text/html')
//             ->write('Method must be one of: ' . implode(', ', $methods));
//     };
// };

// $container['errorHandler'] = function ($container) {
//     return function ($request, $response, $exception) use ($container) {
//         return $container['response']->withStatus(500)
//             ->withHeader('Content-Type', 'text/html')
//             ->write('Something went wrong!');
//     };
// };

$container['csrf'] = function ($container) {
    return new \Slim\Csrf\Guard();
};

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
        'cache' => false
    ]);
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

// csrf验证
// $app->add($container->get('csrf'));

$app->add(new \App\Middleware\Login($container));

require_once "../app/route.php";

$app->run();




