<?php 
$dir = getcwd();
require_once $dir . '/controller/TransferenciaController.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<?php include "header.php" ?>
    <div class="container d-flex mvh100">
        <?php include "nav.php" ?>
        <main class="col">
            <ul class="item-acesso">
                <li>
                    <div class="d-flex align-items-center">
                        <i class="lni lni-arrow-up"></i> 
                        <h1>Transferência Bancária</h1>
                    </div>
                    <form action="" method="post">
                        <div class="d-flex align-items-end gap15 mt30">
                            <span class="text-left colInput">
                                <label for="conta_destino">Conta de Destino</label>
                                <input type="text" name="conta_destino" class="input-text" required/>
                            </span>
                            <span class="text-left colInput">
                                <label for="valor">Valor</label>
                                <input type="text" name="valor" class="input-text" required/>
                            </span>
                            <button type="submit" class="btn">Transferir</button>
                        </div>
                    </form>
                </li>
            </ul>
        </main>
    </div>
    <?php include "footer.php" ?>
</body>
</html>