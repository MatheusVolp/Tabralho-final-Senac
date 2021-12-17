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
$cadPF = new cPessoaF();
$listaPF = $cadPF->getPessoaF(); 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Language" content="pt-br">
        <title></title>
    </head>
    <body>
    <br><br>
    <button onclick="location.href='cadPessoaF.php'">Voltar</button>
        
        <h1>Lista de Usuários</h1>
        <table>
                <tr>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>e-mail</th>
                    <th>CPF</th>
                </tr>
                <?php foreach ($listaPF as $user): ?>
                <tr>
                    <td><?php echo $user['idPessoa'] ?></td>
                    <td><?php echo $user['nome'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['cpf'] ?></td>
                    <td>
                        <?php if($user['email'] != $_SESSION['emailM']){ ?>
                            <form action="../controller/deletePessoaF.php" method="POST">
                            <input type="hidden" value="<?php echo $user['idPessoa']; ?>" name="idPessoa">
                            <input type="submit" name="deletePF" value="Deletar">
                        </form>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if($user['email'] != $_SESSION['emailM']){ ?>
                            <form action="editPessoaF.php" method="POST">
                            <input type="hidden" value="<?php echo $user['idPessoa']; ?>" name="idPessoa">                       
                            <input type="submit" name="editarPessoaF" value="Editar">
                        </form>
                        <?php } ?>
                    </td>
                </tr>
                <?php endforeach; ?> 
        </table>
        <br>
        
    </body>
</html>
