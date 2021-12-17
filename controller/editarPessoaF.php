<?php
if (isset($_POST['editarPF'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];

    $pdo = require_once '../pdo/connection.php';

    $sql = "UPDATE pessoa SET nome = ?, email = ?, cpf = ? WHERE idPessoa = ?";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $nome, PDO::PARAM_STR);
    $sth->bindParam(2, $email, PDO::PARAM_STR);
    $sth->bindParam(3, $cpf, PDO::PARAM_STR);
    $sth->bindParam(4, $id, PDO::PARAM_INT);
    $sth->execute();
    unset($sth);
    unset($pdo);          
    header("location: ../view/listaPessoaF.php");
}
?>