<?php
use tmntzpizza\Controllers\UserController;
use tmntzpizza\Controllers\PageController;
use tmntzpizza\Controllers\OrderController;
use tmntzpizza\Controllers\ShopController;
global $router;
$router = new AltoRouter();
$baseURI = str_replace(
    '/index.php',
    '',
    $_SERVER['SCRIPT_NAME']
);
$router->setBasePath($baseURI);
//definition des routes
// $router->map(
//     // methode HTTP a surveiller
//     'GET',
//     // url à matcher
//     '/user/home/',
//     // fonction qui devra être appelée si la route est validée
//     function(){
//         $controller = new UserController();
//         $controller->home();
//     },
//     'user-home'
// );
// ---------------------------------- //
// PAGE CONTROLLER ----------------- //
$router->map(
    'GET',
    '/card/',
    function(){
        $controller = new PageController();
        $controller->list();
    },
    'card-list'
);
$router->map(
    'GET',
    '/card/[i:id]/',
    function() {
        $controller = new PageController();
        $controller->showOne();
    },
    'card-showOne'
);
$router->map(
    'GET',
    '/card/type/[i:id]/',
    function() {
        $controller = new PageController();
        $controller->typeList();
    },
    'card-typeList'
);
// ORDER CONTROLLER -------------------- //
$router->map(
    'GET',
    '/order/delivery/',
    function() {
        $controller = new OrderController();
        $controller->delivery();
    },
    'order-delivery'
);
$router->map(
    'GET',
    '/order/pickup/',
    function() {
        $controller = new OrderController();
        $controller->pickup();
    },
    'order-pickup'
);
$router->map(
    'GET',
    '/order/home/',
    function() {
        $controller = new OrderController();
        $controller->home();
    },
    'order-home'
);
$router->map(
    'GET',
    '/order/paiment/',
    function() {
        $controller = new OrderController();
        $controller->paiment();
    },
    'order-paiment'
);
$router->map(
    'GET',
    '/order/state/',
    function() {
        $controller = new OrderController();
        $controller->state();
    },
    'order-state'
);
$router->map(
    'GET',
    '/order/state/ready/',
    function() {
        $controller = new OrderController();
        $controller->ready();
    },
    'order-ready'
);
// shop order controller :
$router->map(
    'GET',
    '/shop/card/[i:id]/',
    function() {
        $controller = new ShopController();
        $controller->showOne();
    },
    'shop-card-showOne'
);
$router->map(
    'GET',
    '/shop/card/type/[i:id]/',
    function() {
        $controller = new ShopController();
        $controller->typeList();
    },
    'shop-card-typeList'
);
$match = $router->match();
if($match) {
    $functionToCall = $match['target'];
    $functionToCall();
}