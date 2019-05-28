<?php include_once 'header.php'; ?>
<?php 

include_once 'scripts/database.php';
include_once 'scripts/contato.php';

$database = new Database();
$db = $database->getConexao();

$contato = new Contato($db);

if($_POST){

    $contato->nome = $_POST['nome'];
    $contato->telefone = $_POST['telefone'];
    $contato->email = $_POST['email'];

    if($contato->inserir()){
        echo "Contato inserido com sucesso";
    }else{
        echo "Erro ao inserir contato";
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

<?php include_once 'footer.php'; ?>