<?php include_once 'header.php'; ?>
<?php 

include_once 'scripts/database.php';
include_once 'scripts/contato.php';

$database = new Database();
$db = $database->getConnection();

$contato = new Contato($db);


if($_POST){
 
    // set product property values
    $contato->nome = $_POST['nome'];
    $contato->telefone = $_POST['telefone'];
    $contato->email = $_POST['email'];
     
    // create the product
    if($contato->create()){
        echo "<div class='alert alert-success'>Product was created.</div>";
    }
 
    // if unable to create the product, tell the user
    else{
        echo "<div class='alert alert-danger'>Unable to create product.</div>";
    }
}

?>

<h1 class="text-center">Agenda de Contato</h1>

<div class="container">
    <div class="row">
        <div class="col">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <table class="table table-hover table-bordered">
                    <tr>
                        <td>Nome</td>
                        <td><input type="text" name="nome" class="form-control" /   ></td>
                    </tr>
                    <tr>
                        <td>Telefone</td>
                        <td><input type="text" name="telefone" class="form-control" /   ></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" class="form-control" /   ></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" class="btn btn-primary">Inserir</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<?php 
$stmt = $contato->realAll();
$num = $stmt->rowCount();
?>
<h2 class="text-center">Lista de Contato</h2>
<div class="container">
    <div class="row">
        <div class="col">
            <?php 

            if($num>0){

                echo "<table class='table table-hover table-bordered'>";
                    echo "<tr>";
                        echo "<th>Nome</th>";
                        echo "<th>Telefone</th>";
                        echo "<th>Email</th>";
                        echo "<th>Ação</th>";
                    echo "</tr>";

                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                        extract($row);

                        echo "<tr>";
                            echo "<td>{$nome}</td>";
                            echo "<td>{$telefone}</td>";
                            echo "<td>{$email}</td>";
                            echo "<td>";
                            
                            echo "
                                <a href='exibir.php?id={$id}' class='btn btn-primary left-margin'>
                                    <span class='glyphicon glyphicon-exibir'></span> Exibir
                                </a>
                                <a href='editar.php?id={$id}' class='btn btn-info left-margin'>
                                    <span class='glyphicon glyphicon-edit'></span> Exibir
                                </a>
                                <a delete-id='{$id}' class='btn btn-danger delete-object'>
                                    <span class='glyphicon glyphicon-remove'></span> Delete
                                </a>";
                            
                            echo "</td>";
                        echo "</tr>";

                    }

                echo "</table>";
            
            }else{
                echo "<div class='alert alert-info'>Nenhum contato encontrado</div>";
            }

            ?>
        </div>
    </div>
</div>


<?php include_once 'footer.php'; ?>