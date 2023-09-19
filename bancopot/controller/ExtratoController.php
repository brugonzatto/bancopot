<?php 

if($_POST){


$dir = getcwd();
require_once $dir . '\model\Conta.php';

    $valor = $_POST["valor"];
    $idPessoa = $_SESSION['id'];
    $conta = new Conta();
    $dadosConta = $conta->getContaByPessoa($idPessoa);


    $movimentacao = array(
        'acao' => $acao,
        'valor' => $valor,
        'data_movimentacao' => $data_movimentacao,
        'conta_id' => $conta_id
    );

    $novoSaldo = $dadosConta['saldo'] - $valor;

    $conta->update([
        "saldo" => $novoSaldo, 
        "id" => $dadosConta['id']
    ]);
}





