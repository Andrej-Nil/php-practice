<?php
require CONFIG . '/routes.php';
$uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'] , '/');

if(array_key_exists($uri, $routes)){
    if(file_exists(CONTROLLERS . "/$routes[$uri]")){
        require CONTROLLERS . "/$routes[$uri]";
    }else{
        abort();
    }
} else {
    abort();
}
//if($uri === ''){
//require CONTROLLERS . '/index.php';
//} elseif ($uri === 'about') {
//require CONTROLLERS . '/about.php';
//} elseif ($uri === 'post'){
//dd("SHOW POST");
//} else {
//    abort();
//}
