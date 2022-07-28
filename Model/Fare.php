<?php

namespace Model;
use Model\Sql;
use \Exception;

class Fare{

    private $sql;
    private $value;
    private $id_operator;
    
    
    //Getters and setters...
    
        /**
         * Get the value of value
         */ 
        public function getValue()
        {
            return $this->value;
        }
        
        /**
         * Set the value of value
         *
         * @return  self
         */ 
        public function setValue($value)
        {
            $this->value = $value;
        
            return $this;
        }
        
        /**
         * Get the value of id_operator
         */ 
        public function getId_operator()
        {
            return $this->id_operator;
        }
        
        /**
         * Set the value of id_operator
         *
         * @return  self
         */ 
        public function setId_operator($id_operator)
        {
            $this->id_operator = $id_operator;
        
            return $this;
        }

    //...Getters and setters

    //Select methods...

        public function selectFares($id_operator){
                
            try{

                $results = $this->sql->select("SELECT * FROM fare WHERE id_operator = $id_operator");
                return $results;

            }catch(Exception $e){

                return[
                    "success" => false,
                    "error" => $e->getMessage()
                ];
                
            }

        }

    //...Select methods

    //Execution methods...

        public function insertFare($value,$id_operator){
                
            try{

                $this->sql->execQuery("CALL insertFare($value,$id_operator,1,@success)");
                $results = $this->sql->select("SELECT @success");
                if($results[0]["@success"]){
                    return[
                        "success" => 1,
                    ];
                }else{
                    throw new Exception("Tarifa já existe");
                }
                

            }catch(Exception $e){

                return [
                    "success" => false,
                    "error" => $e->getMessage()
                ];

            }

        }

        public function deleteFare($id_operator,$id){
                
            try{

                $this->sql->execQuery("DELETE FROM fare where id_operator=$id_operator AND id = $id");

                return[
                    "success" => 1,
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