<?php

require_once("../autoload.php");

use Controller\Controller_Operator;

if(count($_POST) > 0){
    echo(json_encode($_POST));
}else{
    echo(json_encode([
        "success" => false,
        "error" => "Nenhum parâmetro foi passado, verifique os dados enviados!"
    ]));
}