<?php
class PdoHelper {
	
	const DBHOST = "localhost";
	const DBUSER = "root";
	const DBPASSWORD = "";
	const DBNAME = "bancopot";
	
	private $hostdb;
	private $userdb;
	private $password;
	private $dbname;


	function __construct(
	$host = self::DBHOST, 
	$user = self::DBUSER, 
	$pass = self::DBPASSWORD, 
	$dbname = self::DBNAME) {
	$this->hostdb = $host;
	$this->userdb = $user;
	$this->password = $pass;
	$this->dbname = $dbname;
}
	
	public function getConnection() {
		try {
			
			$dbh = new PDO ( "mysql:host={$this->hostdb};dbname={$this->dbname}", $this->userdb, $this->password, 
			array (
					PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" 
			) );
			
			return $dbh;
		} catch ( PDOException $e ) {
			
			print "Erro de conexao: " . $e->getMessage () . "<br/>\n";
			
			die ();
		}
	}
	
}

?>