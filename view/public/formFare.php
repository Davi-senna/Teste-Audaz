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

    if (isset($_GET['operator'])) {

    ?>
        <section class="content">

            <div class="card-form">

                <div class="container-h1" id="title-fare">
                    <h1>Cadastro de Tarifa</h1>
                </div>


                <form action="../view_fare.php" method="post">
                    <div id="form-fare" class="container-form">
                        <div class="form-group">
                            <label for="nome">Valor da tarifa:</label>
                            <input class="input-form" type="number" step="any" required placeholder="Digite o nome da operadora" name="value" id="value">
                            <input type="hidden" name="id_operator" value="<?php echo $_GET['operator']?>">
                        </div>

                        <div class="form-group">
                            <button class="button-submit" type="submit">Cadastrar</button>
                        </div>
                    </div>
                </form>


            </div>

        </section>
    <?php

    }

    ?>
</body>

</html>