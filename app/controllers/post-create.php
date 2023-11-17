<?php
use myfrm\Validator;
require_once CORE . '/classes/Validator.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fillable = ['title', 'excerpt', 'content'];

    $data = load($fillable);


    // validation

    $validator = new Validator();
    $validation = $validator->validate($data, [
        'title' => [
            'required' => true,
            'min' => 5,
            'max' => 190,
        ],
        'excerpt' => [
            'required' => true,
            'min' => 5,
            'max' => 190,
        ],
        'content' => [
            'required' => true,
            'min' => 10,
        ]
    ]);

   if($validation->hasErrors()){
       print_arr($validation->getErrors());
   }else{
       echo 'SUCCESS';
   }

die;


//
//    if(empty($data['title'])){
//        $errors['title'] = 'Title is required';
//    }
//    if(empty($data['excerpt'])){
//        $errors['excerpt'] = 'Excerpt is required';
//    }
//    if(empty($data['content'])){
//        $errors['content'] = 'Content is required';
//    }

    if(empty($errors)){

        $res =  $db->query(
            "INSERT INTO posts (`title`, `excerpt`, `content`) VALUES (:title, :excerpt, :content2)",
            $data
        );

        if($res){
            echo 'OK';
        } else{
            echo 'Db error';
        }

//        redirect('/posts/create');
    }

}



$title = "Новый пост";

require_once VIEWS . '/post-create.tpl.php';
