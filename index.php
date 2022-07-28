<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Teste prático</title>
</head>


<body>

    <section class="header">
        <div id="container-big-title">
            <h1 class="big-title">Operadoras</h1>
        </div>
        <div class="container-link">
            <a href="view/public/formOperator.php">Adicionar +</a>
        </div>
    </section>

    <section class="content">

        <ul class="container-list">

            <?php
            require_once("autoload.php");

            use Controller\Controller_Operator;

            $instanceController = new Controller_Operator;
            $operators = $instanceController->getAll();
            foreach ($operators as $operator) {
            ?>
                <a href="view/public/profileOperator.php?id=<?php echo $operator['id'] ?>">
                    <li>
                        <?php echo $operator['name'] ?>
                    </li>
                </a>

            <?php
            }
            ?>
        </ul>

    </section>


</body>

</html>