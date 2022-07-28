<?php

namespace Controller;

use Model\Operator;

class Controller_Operator{

    private $instanceModel;

    //Select methods...

        public function getAll(){
            $results = $this->instanceModel->selectAll();
            return $results;
        }

        public function getOperator($id){
            $results = $this->instanceModel->selectOperator($id);
            return $results;
        }

    //...Select methods

    //Exception methods...

        public function setOperator($data){

            extract($data);

            $results = $this->instanceModel->insertOperator($name,$description);

            return $results;
        }

    //...Exception methods

    public function __construct(){
        $this->instanceModel = new Operator();
    }
}
