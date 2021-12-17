<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (!isset($_SESSION['logado']) && $_SESSION['logado'] != true) {
    header("Location: view/login.php");
} else {
    echo $_SESSION['usuario'] . " | " . $_SESSION['email'];
    echo " | <a href= 'controller/logout.php'>Sair</a>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Página inicial</h1>
        <br><br>
        <button onclick="location.href = 'view/cadUsuario.php'">Cadastro de Usuário</button>
        <button onclick="location.href = 'view/cadPessoaF.php'">Cadastro de Pessoa Fisica</button>
        <button onclick="location.href = 'view/cadPessoaJ.php'">Cadastro de Pessoa Jurídica</button>

    </body>
</html>
