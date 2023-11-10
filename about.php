<?php
$title = 'About';
$post =
    '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda cum dolor esse explicabo officia qui quibusdam saepe tenetur vel.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda cum dolor esse explicabo officia qui quibusdam saepe tenetur vel.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda cum dolor esse explicabo officia qui quibusdam saepe tenetur vel.</p>';

$recent_posts = [
    1 => [
        'title' => 'An item',
        'slug' => lcfirst(str_replace(' ', '-', 'An item')),
    ],

    2 => [
        'title' => 'A second item',
        'slug' => lcfirst(str_replace(' ', '-', 'A second item')),
    ],

    3 => [
        'title' => 'Элемент',
        'slug' => lcfirst(str_replace(' ', '-', 'A third item')),
    ],

    4 => [
        'title' => 'Элемент',
        'slug' => lcfirst(str_replace(' ', '-', 'A fourth item')),
    ],

    5 => [
        'title' => 'Элемент',
        'slug' => lcfirst(str_replace(' ', '-', 'And a fifth one')),
    ],

];


require_once 'about.tpl.php';