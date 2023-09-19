<?php
require_once 'PdoHelper.php';

abstract class Crud extends PdoHelper
{
    private $table;
    private $primaryKey;

    function __construct($table, $primaryKey)
    {
        $this->table = $table;
        $this->primaryKey = $primaryKey;
    }

    public function insert(array $data)
    {
        // O código para inserção aqui
    }

    public function update(array $data)
    {
        // O código para atualização aqui
    }

    public function create(array $data)
    {
        $columns = implode(', ', array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$values})";
        
        $pdo = (new PdoHelper())->getConnection();
        
        try {
            $pdo->beginTransaction();
            $stmt = $pdo->exec($sql);
            $id = $pdo->lastInsertId();
            $pdo->commit();
        } catch (PDOException $e) {
            $pdo->rollback();
            print "Error!: " . $e->getMessage() . "</br>";
            die();
        }
        
        return $id;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id";
        
        $pdo = (new PdoHelper())->getConnection();
        
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "</br>";
            die();
        }
        
        return $result;
    }
}
?>
