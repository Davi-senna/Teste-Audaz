<?php

require_once("../autoload.php");

use Controller\Controller_Fare;

if (count($_POST) > 0) {

    $instanceController = new Controller_Fare;
    $results = $instanceController->setFare($_POST);
    echo (json_encode($results));
    if ($results['success']) {
        header("Location:public/profileOperator.php?id=$_POST[id_operator]&&success=true&&message=tarifa inserida com sucesso");
    } else {
        header("Location:public/profileOperator.php?id=$_POST[id_operator]&&success=false&&message=$results[error]");
    }

} else if (count($_GET) > 0 && isset($_GET['stmt'])) {

    if ($_GET['stmt'] == 'delete') {

        $instanceController = new Controller_Fare;
        $results = $instanceController->deleteFare($_GET['id_operator'], $_GET['id']);
        echo json_encode($results);
        header("Location:public/profileOperator.php?id=$_GET[id_operator]&&success=true&&message=Tarifa deletada com sucesso!");
    } else {
        echo json_encode("Comando inexistente");
        header("Location:public/profileOperator.php?id=$_GET[id_operator]&&success=false&&message=Nenhum parâmetro foi passado, verifique os dados enviados!");
    }

}else {

    echo (json_encode([
        "success" => false,
        "error" => "Nenhum parâmetro foi passado, verifique os dados enviados!"
    ]));
    header("Location:../index.php?success=false&&message=Nenhum parâmetro foi passado, verifique os dados enviados!");

}
