<?php
class Contato{
 
    private $conn;
    private $table_name = "contato";
 
    public $id;
    public $nome;
    public $telefone;
    public $email;
    
 
    public function __construct($db){
        $this->conn = $db;
    }
 
 
    function create(){
 
 
        $query = "INSERT INTO
                    " . $this->table_name . "
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
            return true;
        }else{
            return false;
        }
 
    }

    function realAll(){

        $query = "SELECT 
                 id, nome, telefone, email
                 FROM 
                    " . $this->table_name . " 
                ORDER BY 
                    nome ASC";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        return $stmt;
    }


}

?>