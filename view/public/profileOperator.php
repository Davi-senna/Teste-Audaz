<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style.css">
    <title>Teste prático</title>
</head>

<body>

    <?php

    use Controller\Controller_Operator;


    if (isset($_GET['id'])) {

        require_once("../../autoload.php");
        $instanceController = new Controller_Operator;
        $results = $instanceController->getOperator($_GET['id']);
        $operator = $results[0]

    ?>

        <section id="header-profile" class="header">
            <div>
                <h1 class="big-title"><?php echo $operator['name'] ?></h1>
            </div>
            <div class="container-link">
                <a href="formFare.php?operator=<?php echo $operator['id'] ?>">Adicionar Tarifa +</a>
            </div>
        </section>

        <section id="content-profile">
            <h1>
                Tarifas ativas:
            </h1>

            <ul id="list-fare">
                <li>
                    R$ 200,00
                </li>
                <li>
                    R$ 400,00
                </li>
            </ul>
        </section>


    <?php } ?>

</body>

</html>