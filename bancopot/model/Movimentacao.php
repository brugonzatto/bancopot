<?php
require_once 'Crud.php';

class Movimentacao extends Crud
{
    protected $id;
    protected $acao;
    protected $valor;
    protected $data_movimentacao;
    protected $conta_id;
    protected $conta_destino; 
    private $table = "movimentacao";
    private $primaryKey = "id";

    public function __construct()
    {
        parent::__construct($this->table, $this->primaryKey);
    }

    
    public function realizarTransferencia($conta_origem, $conta_destino, $valor)
    {
        // saldo suficiente na conta origem
        $conta_origem = $this->getById($conta_origem);

        if ($conta_origem['saldo'] >= $valor) {
            // criar geristro para saque
            $this->create([
                'acao' => 'Transferência para ' . $conta_destino,
                'valor' => -$valor, 
                'data_movimentacao' => date('Y-m-d'),
                'conta_id' => $conta_origem['id'],
                'conta_destino' => $conta_destino,
            ]);

            // atualizar o saldo conta origem
            $this->updateSaldo($conta_origem['id'], $conta_origem['saldo'] - $valor);

            // criar geristro para deposito
            $conta_destino = $this->getById($conta_destino);
            $this->create([
                'acao' => 'Transferência de ' . $conta_origem['id'],
                'valor' => $valor,
                'data_movimentacao' => date('Y-m-d'),
                'conta_id' => $conta_destino['id'],
                'conta_destino' => $conta_origem['id'],
            ]);

            // atualizar o saldo da conta de destino
            $this->updateSaldo($conta_destino['id'], $conta_destino['saldo'] + $valor);

            return true; // A transferência foi realizada.
        }
            return false; // Saldo insuficiente na conta de origem
    }

            // metodo para atualizar o saldo de uma conta
            private function updateSaldo($contaId, $novoSaldo)
    {
            $this->update(['saldo' => $novoSaldo], ['id' => $contaId]);
    }
}