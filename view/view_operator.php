<?php

require_once("../autoload.php");

use Controller\Controller_Operator;

if (count($_POST) > 0) {

    $instanceController = new Controller_Operator;
    echo (json_encode($instanceController->setOperator($_POST)));
    header("Location:../index.php?success=true&&message=Operadora inserida com sucesso");
} else {
    echo (json_encode([
        "success" => false,
        "error" => "Nenhum parâmetro foi passado, verifique os dados enviados!"
    ]));
    header("Location:../index.php?success=false&&message=Não foi possível inserir essa operadora");
}
