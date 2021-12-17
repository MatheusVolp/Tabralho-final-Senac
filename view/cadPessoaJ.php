<!DOCTYPE html>

<?php
session_start();
if (!isset($_SESSION['logadoM']) && $_SESSION['logadoM'] != true) {
    header("Location: login.php");
}else{
    echo $_SESSION['usuarioM'] . " | " . $_SESSION['emailM'];
    echo " | <a href='../controller/logout.php'>Sair</a>";
}
require_once '../controller/cPessoaJ.php';
$cadJS = new cPessoaJ();
?> 
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Language" content="pt-br">
        <title></title>
    </head>
    <body>
        <h1>Cadastro de Pessoa Jurídica</h1>
        <form action="<?php $cadJS->inserir(); ?>" method="POST">
            <input type="text" required placeholder="Nome aqui..." name="nome"/>
            <br><br>
            <input type="tel" required placeholder="Telefon aqui..." name="telefone"/>
            <br><br>
            <input type="email" required placeholder="E-mail aqui..." name="email"/>
            <br><br>
            <input type="text" placeholder="Endereço aqui..." name="endereco"/>
            <br><br>
            <input type="text" required placeholder="CNPJ aqui..." minlength="11" maxlength="11" name="cnpj"/>
            <br><br>
            <input type="text" placeholder="Site aqui..." minlength="10" maxlength="10" name="site"/>
            <br><br>
            <input type="text" placeholder="Nome Fantasia aqui..." minlength="10" maxlength="10" name="nomeF"/>
            <br><br>
            <input type="submit" value="Salvar" name="salvarJS">
            <input type="reset" value="Limpar" name="limpar">
            <input type="button" value="Voltar"
                   onclick="location.href = '../index.php'"/>
            <br><br>
            <input type="button" value="Lista Usuários" onclick="location.href='listaPessoaJ.php'">
        </form>
        <?php
        // put your code here
        ?>
    </body>