<?php

use myfrm\Validator;

global $db;


require_once CORE . '/classes/Validator.php';
$fillable = ['title', 'excerpt', 'content'];

$data = load($fillable);

$validator = new Validator();


$validation = $validator->validate($data, [
        'title' => [
            'required' => true,
            'min' => 5,
            'max' => 190,
        ],
        'excerpt' => [
            'required' => true,
            'min' => 10,
            'max' => 190,
        ],
        'content' => [
            'required' => true,
            'min' => 10,
        ],
        'email' => [
            'required' => true,
        ],
        'password' => [
            'required' => true,
            'min' => 6,
        ],
        'repassword' => [
            'match' => 'password',
        ]
    ]
);
if (!$validation->hasErrors()) {
    $res = $db->query(
        "INSERT INTO posts (`title`, `excerpt`, `content`) VALUES (:title, :excerpt, :content)",
        $data
    );
    if ($res) {
        $_SESSION['success'] = 'OK';
    } else {
        $_SESSION['error'] = 'DB Error';
    }
    redirect('/');
} else {
    require VIEWS . '/posts/create.tpl.php';
}
