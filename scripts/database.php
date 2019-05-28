<?php 

class Database{

	private $servidor = "localhost";
	private $db_nome  = "agenda";
	private $usuario  = "root";
	private $senha    = "";
	public  $conn;

	public function getConexao(){

		$this->conn = null;

		try{

			$this->conn = new PDO("mysql:servidor=" . $this->servidor . ";db_nome=" . $this->db_nome, $this->usuario, $this->senha);

		}catch(PDOException $exception){
			echo "Error na conexão: " .$exception->getMessage();
		}

		return $this->conn;
	}
}

?>