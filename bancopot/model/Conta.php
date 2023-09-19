<?php
require_once 'Crud.php';

class Conta extends Crud{

    protected $id;
    protected $agencia;
    protected $contacorrente;
    protected $saldo;
    protected $pessoa_id;
    private $table = "conta";
    private $primaryKey = "id";

    public function __construct() {
        parent::__construct($this->table, $this->primaryKey);
    }

    public function getContaByPessoa($idPessoa = null){
        
        $query = "SELECT * FROM conta";
        if(null != $idPessoa){
            $query .= " WHERE pessoa_id = " . $idPessoa;
        }
        
        $dbh = (new PdoHelper())->getConnection();
        $stmt = $dbh->query($query);
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($dados)) {
            return $dados[0];
        } else {
            return null; 
        }
    }
    
    public function updateSaldo($contaId, $novoSaldo)
    {
        $pdo = (new PdoHelper())->getConnection();
        
        $sql = "UPDATE {$this->table} SET saldo = :saldo WHERE {$this->primaryKey} = :id";
        
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':saldo', $novoSaldo, PDO::PARAM_STR);
            $stmt->bindParam(':id', $contaId, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "</br>";
            die();
        }
    }
}
?>
