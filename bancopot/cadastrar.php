<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <div class="container d-flex">
        <main class="col d-flex justify-content-center align-items-center vh100">
            <div class="blc_login">
                <i class="lni lni-bmw logo"></i>
                <form action="controller/CadastroController.php" method="post" accept-charset="utf-8">
                    <ul>
                        <li>
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" class="input-text" required/>
                        </li>
                        <li>
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" class="input-text" autocomplete="none" required/>
                        </li>
                        <li>
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf" class="input-text" required/>
                        </li>
                        <li>
                            <div class="form-group">
                            <label for="nascimento">Data de Nascimento</label>
                            <input type="date" name="nascimento" id="nascimento" class="form-control" required/>
                            </div>
                        </li>
                        
                        <li>
                            <label for="senha">Criar Senha</label>
                            <input type="password" name="senha" id="senha" class="input-text" required/>
                        </li>    
                            <label for="confirmar_senha">Confirmar Senha</label>
                            <input type="password" name="confirmar_senha" id="confirmar_senha" class="input-text" required/>
                        </li>
                        <li>
                            <button type="submit" class="btn">Cadastrar</button>
                        </li>
                                
                        
                   </ul>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
