<?php
require_once '../model/Pessoa.php';
require_once '../model/Conta.php';
require_once '../model/PdoHelper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $nascimento = $_POST["nascimento"];
    $senha = $_POST["senha"]; // senha fornecida pelo cliente

    // Criar uma instância da classe Pessoa
    $pessoa = new Pessoa();

    // Criar um hash da senha fornecida pelo usuário
    $senhaCriptografada = sha1($senha); // hash da senha fornecida pelo cliente

    // Array com os dados do usuário e insira no banco de dados
    $dadosPessoa = array(
        "nome" => $nome,
        "email" => $email,
        "cpf" => $cpf,
        "nascimento" => $nascimento,
        "senha" => $senhaCriptografada 
    );

    // Chama o método de inserção da classe Pessoa
    $idInserido = $pessoa->insert($dadosPessoa);

    // Verifica se a inserção na tabela "pessoa"
    if ($idInserido) {
        
        
        // Dados da conta
        $agencia = 1234; 
        $contacorrente = mt_rand(100000, 999999); // n de conta aleatório
        $saldo = 0; // Saldo inicial
        $pessoa_id = $idInserido;

       
        $conta = new Conta();

        // Array com os dados da conta e insira no banco de dados
        $dadosConta = array(
            "agencia" => $agencia,
            "contacorrente" => $contacorrente,
            "saldo" => $saldo,
            "pessoa_id" => $pessoa_id
        );

        // método de inserção da classe Conta
        $idContaInserida = $conta->insert($dadosConta);

          if ($idContaInserida) {
            // Redirecionar home.php após o cadastro bem-sucedido
            header("Location: ../home.php");
            exit(); 
        } else {
            // Tratar erros de inserção na tabela "conta", se houver algum
            echo "Ocorreu um erro ao cadastrar a conta. Por favor, tente novamente.";
        }
        } else {
        // Tratar erros de inserção na tabela "pessoa", se houver algum
        echo "Ocorreu um erro ao cadastrar. Por favor, tente novamente.";
        }
}
?>
