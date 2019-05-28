<?php 

class Contato{

	private $conn;
	private $tabela = "contato";

	public $id;
	public $nome;
	public $telefone;
	public $email;

	public function __construct($db){

		$this->conn = $db;
	}

	function inserir(){

		$query = "INSERT INTO 
					" . $this->tabela . "
				SET  
					nome=:nome, telefone=:telefone, email=:email";
	
		$stmt = $this->conn->prepare($query);

		$this->nome=htmlspecialchars(strip_tags($this->nome));
		$this->telefone=htmlspecialchars(strip_tags($this->telefone));
		$this->email=htmlspecialchars(strip_tags($this->email));

		$stmt->bindParam(":nome", $this->nome);
		$stmt->bindParam(":telefone", $this->telefone);
		$stmt->bindParam(":email", $this->email);

		if($stmt->execute()){
			return True;
		}else{
			return False;
		}
		
	}

}

?>