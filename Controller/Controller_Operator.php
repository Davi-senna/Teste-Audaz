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

    public function __construct(){
        $this->instanceModel = new Operator();
    }
}
