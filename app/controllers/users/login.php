<?php

$title = 'Login';


if($_SERVER["REQUEST_METHOD"] === "POST"){
    $db = \myfrm\App::get(\myfrm\Db::class);
    $validator = new \myfrm\Validator();
    $data = load(['email', 'password']);
    $validation = $validator->validate($data, [
            'password' => [
                'required' => true
            ],
            'email' => [
                'email' => true,
            ]
        ]
    );



    if (!$validation->hasErrors()) {
        if(!$user = $db->query("SELECT * FROM users WHERE email=?", [$data['email']])->find()){
            $_SESSION['error'] = 'Wrong email or password';
            redirect();
        }
        if(!password_verify($data['password'], $user['password'])){
            $_SESSION['error'] = 'Wrong email or password';
            redirect();
        };

        foreach ($user as $key => $value) {
            if($key !== 'password'){
                $_SESSION['user'][$key] = $value;
            }
        }
        $_SESSION['success'] = 'Successful login';
        redirect(PATH);

    }
}

require_once VIEWS . '/users/login.tpl.php';