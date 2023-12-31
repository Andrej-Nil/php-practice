<?php


const MIDDLEWARE = [
    'auth' => \myfrm\middleware\Auth::class,
    'guest' => \myfrm\middleware\Guest::class
];


// Posts
$router->get('', 'posts/index.php');
$router->get('posts', 'posts/show.php');
$router->get('posts/create', 'posts/create.php')->only('auth');
$router->post('posts', 'posts/store.php');
$router->delete('posts', 'posts/destroy.php');


//Pages

$router->get('about', 'about.php');
$router->get('contact', 'contact.php');

//User
$router->add('register', 'users/register.php', ['GET', 'POST'])->only('guest');
//$router->get('register', 'users/register.php')->only('guest');
//$router->post('register', 'users/store.php')->only('guest');
//$router->get('login', 'users/login.php')->only('guest');
$router->add('login', 'users/login.php', ['GET', 'POST'])->only('guest');
$router->get('logout', 'users/logout.php')->only('auth');

//dump($router);

//$router->post()
//$router->get()
//$routes = [
//    ''      => 'index.php',
//    'about' => 'about.php',
//    'post'  => 'show.php',
//    'posts/create' => 'post-store.php'
//];