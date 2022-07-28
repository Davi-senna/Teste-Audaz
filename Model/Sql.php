<?php

namespace Model;
use \PDO;

class Sql extends PDO{

    public $conn;

    public function __construct(){

        $this->conn = new PDO("mysql:host=localhost; dbname=audaz", "root", "");
    }

    public function execQuery($rawQuery, $params = array()){
        $stmt = $this->conn->prepare($rawQuery);
        $stmt->execute();
        return $stmt;
    }

    public function select($rawQuery, $params = array()): array{

        $stmt = $this->execQuery($rawQuery, $params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

