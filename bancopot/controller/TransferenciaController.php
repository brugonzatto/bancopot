<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dir = getcwd();
    require_once $dir . '/model/Conta.php';

    $valor = $_POST["valor"];
    $conta_destino = $_POST["conta_destino"];

    if (!is_numeric($conta_destino)) {
        echo "A conta de destino não é válida.";
    } else {
        $conta_destino = intval($conta_destino);

       
        if (!is_numeric($valor)) {
            echo "O valor inserido não é válido.";
        } else {
            $valor = floatval($valor);

            $idPessoa = $_SESSION['id'];
            $conta = new Conta();
            $dadosConta = $conta->getContaByPessoa($idPessoa);

            //  se o saldo é suficiente para a transferência
            if ($dadosConta['saldo'] >= $valor) {
                // executar a transferência para a conta de destino
                $contaOrigem = $dadosConta['id']; // ID da conta de origem

                // realizarTransferencia da classe Movimentacao
                $movimentacao = new Movimentacao();
                $resultadoTransferencia = $movimentacao->realizarTransferencia($contaOrigem, $conta_destino, $valor);

                if ($resultadoTransferencia) {
                    echo "Transferência realizada com sucesso. Novo saldo: R$ " . number_format($dadosConta['saldo'] - $valor, 2, ',', '.');
                } else {
                    echo "Erro ao realizar a transferência.";
                }
            } else {
                echo "Saldo insuficiente para realizar a transferência.";
        
                header("Location: transferencia.php");
                exit; 
            }
        }
    }
}
?>
