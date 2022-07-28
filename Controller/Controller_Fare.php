<?php

namespace Controller;

use Model\Fare;

class Controller_Fare{

    private $instanceModel;

    //Select methods...

        public function getFares($id_operator){
            $results = $this->instanceModel->selectFares($id_operator);
            return $results;
        }

    //...Select methods

    //Exception methods...

        public function setFare($data){

            extract($data);

            $results = $this->instanceModel->insertFare($value,$id_operator);

            return $results;
        }

        public function deleteFare($id_operator,$id){

            $results = $this->instanceModel->deleteFare($id_operator,$id);

            return $results;
        }

    //...Exception methods

    public function __construct(){
        $this->instanceModel = new Fare();
    }
}
