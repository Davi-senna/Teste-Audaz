<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style.css">
    <script src="../../assets/js/script.js"></script>
    <title>Teste prático</title>
</head>

<body>

    <?php

    use Controller\Controller_Operator;
    use Controller\Controller_Fare;


    if (isset($_GET['id'])) {

        require_once("../../autoload.php");
        $instanceController_Operator = new Controller_Operator;
        $instanceController_Fare = new Controller_Fare;

        $results = $instanceController_Operator->getOperator($_GET['id']);
        $operator = $results[0];

        $fares = $instanceController_Fare->getFares($_GET['id']);

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
                <?php foreach ($fares as $fare) { ?>
                    <li onmouseleave="replace('btn-disable<?php echo $fare['id']?>','item-list-fare<?php echo $fare['id']?>')">

                        <span onmouseenter="replace('item-list-fare<?php echo $fare['id']?>','btn-disable<?php echo $fare['id']?>')"  id="item-list-fare<?php echo $fare['id']?>" class="item-list-fare">R$ <?php echo $fare['value']?></span>

                        <button class="hidden-ativo btn-disable" id="btn-disable<?php echo $fare['id']?>">Desativar</button>

                    </li>
                <?php } ?>
            </ul>
        </section>


    <?php } ?>

</body>

</html>