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

    public function __construct(){
        $this->instanceModel = new Fare();
    }
}
