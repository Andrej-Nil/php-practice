<?php
global $db;
$title = 'About';
$post ='<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda cum dolor esse explicabo officia qui quibusdam saepe tenetur vel.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda cum dolor esse explicabo officia qui quibusdam saepe tenetur vel.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda cum dolor esse explicabo officia qui quibusdam saepe tenetur vel.</p>';
$recent_posts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 3")->findAll();
require_once VIEWS . '/about.tpl.php';