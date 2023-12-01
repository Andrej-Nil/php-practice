<?php

namespace myfrm;

use PDO;
use PDOException;
use PDOStatement;

final class Db
{
    private $connection;
    private PDOStatement $stmt;
    private static $instance = null;

    private function __construct(){}


    public static function getInstance(){
        if(self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    public function getConnection(array $db_config)
    {
        if ($this->connection instanceof PDO) {
            return $this;
        }
        $dns = "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset={$db_config['charset']}";

        try {
            $this->connection = new PDO($dns, $db_config['username'], $db_config['password'], $db_config['options']);
            return $this;
        } catch (PDOException $e) {
//            echo "DB Error: {$e->getMessage()}";
            abort(500);
        }

    }

    public function query($query, $params = [])
    {
        try{
            $this->stmt = $this->connection->prepare($query);
            $this->stmt->execute($params);

        }catch (PDOException $e){
            error_log(
                "[" . date('Y-m-d H:m:s') . "] DB Error: {$e->getMessage()}" . PHP_EOL,
                3,
                ERRORS_LOG
            );
            return false;
        }
        return $this;
    }

    public function findAll()
    {
       return $this->stmt->fetchAll();
    }

    public function find()
    {
        return $this->stmt->fetch();
    }
    public function findOrFail() {
        $res = $this->find();
        if(!$res){
            abort();
        }else{
           return $res;
        }

    }

    public function rowCount(){
        return $this->stmt->rowCount();
    }
    public function getCount(){
        return $this->stmt->fetchColumn();
    }

    public function getInsertId(){
        return $this->connection->lastInsertId();
    }

}
