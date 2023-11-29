<?php
$title = 'Register';

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    $db = \myfrm\App::get(\myfrm\Db::class);


//    require_once CORE . '/classes/Validator.php';
    $fillable = ['name', 'email', 'password'];

    $data = load($fillable);

    $validator = new \myfrm\Validator();


    $validation = $validator->validate($data, [
            'name' => [
                'required' => true,
                'min' => 5,
                'max' => 100,
            ],
            'email' => [
                'email' => true,
                'max' => 100,
                'unique' => 'users:email'
            ],
            'password' => [
                'required' => true,
                'min' => 6,
            ],
        ]
    );
    if (!$validation->hasErrors()) {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $res = $db->query(
            "INSERT INTO users (`name`, `email`, `password`) VALUES (:name, :email, :password)",
            $data
        );
        if ($res) {
            $_SESSION['success'] = 'OK';
        } else {
            $_SESSION['error'] = 'DB Error';
        }
        redirect(PATH);
    }
}

require_once VIEWS . '/users/register.tpl.php';

