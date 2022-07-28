<?php

namespace Model;
use Model\Sql;
use \Exception;

class Operator{

    private $sql;
    private $name;
    private $description;

    
    //Getters and setters...

        /**
         * Get the value of name
         */ 
        public function getName()
        {
            return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
            $this->name = $name;

            return $this;
        }

        /**
         * Get the value of description
         */ 
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
            $this->description = $description;

            return $this;
        }

    //...Getters and setters

    //Select methods...

        public function selectAll(){
                
            try{

                $results = $this->sql->select("SELECT * FROM operator");
                return $results;

            }catch(Exception $e){

                return[
                    "success" => false,
                    "error" => $e->getMessage()
                ];
                
            }

        }

        public function selectOperator($id){
                
            try{

                $results = $this->sql->select("SELECT * FROM operator WHERE id = $id");
                return $results;

            }catch(Exception $e){

                return[
                    "success" => false,
                    "error" => $e->getMessage()
                ];
                
            }

        }


        public function loadData(){
            
            $data = array(
                'name' => $this->getName(),
                'description' => $this->getDescription(),
            );

            return $data;

        }

    //...Select methods

    //Fedding methods...

        protected function feed_class($name,$description){
            $this->setName($name);
            $this->setDescription($description);
        }

    //...Fedding methods

    //Execution methods...

        public function insertOperator($raw_name,$raw_description){
            
            try{

                $this->feed_class($raw_name,$raw_description);
                $data = $this->loadData();
                extract($data);

                $this->sql->execQuery("INSERT INTO operator (name,description) VALUES('$name','$description')");

                return[
                    "success" => true,
                ];

            }catch(Exception $e){

                return [
                    "success" => false,
                    "error" => $e->getMessage()
                ];

            }

        }

    //...Execution methods



    public function __construct(){
        $this->sql = new sql();
    }
}