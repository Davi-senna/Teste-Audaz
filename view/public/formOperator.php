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

    <section class="content">

        <div class="card-form">

            <div class="container-h1">
                <h1>Cadastro de Operadora</h1>
            </div>


            <form action="../view_operator.php" method="post">
                <div class="container-form">
                    <div class="form-group">
                        <label for="name">Nome da operadora:</label>
                        <input class="input-form" type="text" required placeholder="Digite o nome da operadora" name="name" id="name">
                    </div>
                    
                    <div class="form-group">
                        <textarea placeholder="Descrição" name="description" id="description" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <button class="button-submit"type="submit">Cadastrar</button>
                    </div>
                </div>
            </form>


        </div>

    </section>

</body>

</html>