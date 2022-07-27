<?php

namespace Model;
use \PDO;

class Sql extends PDO{

    public $conn;

    public function __construct(){

        $this->conn = new PDO("mysql:host=localhost; dbname=audaz", "root", "");
    }

    private function setParams($statement, $parameters = array()){
        foreach ($parameters as $key => $value) {
            $this->setParam($statement, $key, $value);
        }
    }

    private function setParam($statement, $key, $value){

        $statement->bindParam($key, $value);
    }

    public function execQuery($rawQuery, $params = array()){

        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $stmt;
    }

    public function select($rawQuery, $params = array()): array{

        $stmt = $this->execQuery($rawQuery, $params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Metodo para transações
    public function execTransaction($statements,$params = array()){

        try {

            $this->conn->beginTransaction();

                $ids=[];

                foreach($statements as $stmt){

                    $this->execQuery($stmt,$params);
                    $id = $this->conn->lastInsertId();
                    array_push($ids,$id);

                }

                $this->conn->commit();

            return (array(
               "success" => 1,
               "ids" => $ids
            ));

        } catch (\Exception $e) {

            $this->conn->rollBack();

            return (array(
                "success" => 0,
                "error" => $e->getMessage()
            ));
        }
        
    }
}

