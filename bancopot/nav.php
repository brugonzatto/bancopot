<?php
require_once './model/Conta.php';
$conta = new Conta();
$dadosConta = $conta->getContaByPessoa($_SESSION['id']);
?>
<nav class="col-3">
    <div class="blc_saldo">
        <p>Saldo em conta</p>
        <h2><?= $dadosConta['saldo'] ?></h2>
        <p>Informações da conta:</p>
        <h5>Agência: <?= $dadosConta['agencia'] ?></h5>
        <h5>Conta Corrente: <?= $dadosConta['contacorrente'] ?></h5>
    </div>    
        
     <ul>
    
        <li><a href="home.php">Saldo</a></li>
        <li><a href="extrato.php">Extrato</a></li>
        <li><a href="">Extrato por período</a></li>
        <li><a href="logout.php">Sair</a></li>
    </ul>
</nav>
