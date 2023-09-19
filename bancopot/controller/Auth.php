<?php
require_once '../model/Pessoa.php';

// verificando se o email e o senhaa existem no banco de dados
$email = isset($_POST["email"]) ? addslashes(trim($_POST["email"])) : FALSE;
$senha = isset($_POST["senha"]) ? trim($_POST["senha"]) : FALSE;

if (!$email || !$senha) {
    echo "<script>alert('Você deve digitar seu E-mail e Senha para acessar o sistema.');</script>";
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL= ../index.php'>";
    exit;
}

$pessoa = new Pessoa();
$dados = $pessoa->getPessoaByEmail($email);

if (!empty($dados) && $senha === $dados[0]['senha']) { // p verificar senha sem criptografia
    session_start();

    $_SESSION["id"] = $dados[0]["id"];
    $_SESSION["nome"] = $dados[0]["nome"];
    $_SESSION["email"] = $dados[0]["email"];
    $_SESSION["cpf"] = $dados[0]["cpf"];
    $_SESSION["nascimento"] = $dados[0]["nascimento"];
    $_SESSION["senha"] = $dados[0]["senha"];


    header("Location: ../home.php");
    exit;
} elseif (!empty($dados) && sha1($senha) !== $dados[0]['senha']) {
    echo "<script>alert('Senha incorreta.');</script>";
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL= ../index.php'>";
    exit();
} else {
    echo "<script>alert('Verifique o e-mail e senha.');</script>";
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL= ../index.php'>";
    exit();
}
?>