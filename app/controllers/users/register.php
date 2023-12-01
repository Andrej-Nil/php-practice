<?php
$title = 'Register';

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    $db = \myfrm\App::get(\myfrm\Db::class);


//    require_once CORE . '/classes/Validator.php';

    $data = load(['name', 'email', 'password']);

    if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0 ){
        $data['avatar'] = $_FILES['avatar'];
    } else {
        $data['avatar'] = [];
    }


    $validator = new \myfrm\Validator();


    $validation = $validator->validate($data, [
            'name' => [
                'required' => false,
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
            'avatar' => [
//                'required' => false,
                'ext' => 'jpg|png',
                'size' => 1_048_576
            ]
        ]
    );

    if (!$validation->hasErrors()) {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $res = $db->query(
            "INSERT INTO users (`name`, `email`, `password`) VALUES (?, ?, ?)",
            [$data['name'], $data['email'], $data['password'] ]
        );
        if ($res) {
            $_SESSION['success'] = 'OK';
            if(!empty($data['avatar']['name'])){



            $id = $db->getInsertId();
            $file_ext = get_file_ext($data['avatar']['name']);

            $dir = '/avatars/' . date('Y') . '/' . date('m') . '/' . date('d');
            if(!is_dir(UPLOADS . $dir)) {
                  mkdir(UPLOADS . $dir, 0755, true);
            }
            $file_path = UPLOADS . "{$dir}/avatar-{$id}.{$file_ext}";
            $file_url = "/uploads{$dir}/avatar-{$id}.{$file_ext}";

            if(move_uploaded_file($data['avatar']['tmp_name'], $file_path)){
                $db->query("UPDATE users SET avatar = ? WHERE id = ?", [$file_url, $id]);
            } else {
                error_log(
                    "[" . date('Y-m-d H:m:s') . "] Error upload avatar" . PHP_EOL,
                    3,
                    ERRORS_LOG
                );
            }
            }

        } else {
            $_SESSION['error'] = 'DB Error';
        }
        redirect(PATH);
    }
}

require_once VIEWS . '/users/register.tpl.php';

