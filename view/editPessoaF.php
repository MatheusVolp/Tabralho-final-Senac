<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['logado']) && $_SESSION['logado'] != true) {
    header("Location: login.php");
} else {
    echo $_SESSION['usuario'] . " | " . $_SESSION['email'];
    echo " | <a href='../controller/logout.php'>Sair</a>";
}

require_once '../controller/cPessoaF.php';
$id = 0;
if (isset($_POST['editarPessoaF'])) {
    $id = $_POST['idPessoa'];
}
$listaPF = new cPessoaF();
$lis = $listaPF->getPessoaFById($id);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Pessoa Física</title>
    </head>
    <body>
        <h1>Editar Pessoa Física</h1>
        <form action="../controller/editarPessoaF.php" method="POST">
            <input type="text" value="<?php echo $lis[0]['idPessoa']; ?>" name="id"/>
            <br><br>
            <input type="text" required value="<?php echo $lis[0]['nome']; ?>" name="nome"/>
            <br><br>
            <input type="email" required value="<?php echo $lis[0]['email']; ?>" name="email"/>
            <br><br>
            <input type="number" required value="<?php echo $lis[0]['cpf']; ?>" name="cpf"/>
            <br><br>
            <input type="submit" value="Salvar Alterações" name="editarPF"/>
            <input type="button" value="Cancelar"
                   onclick="location.href = 'listaPessoaF.php'"/>
        </form>
    </body>
</html>
