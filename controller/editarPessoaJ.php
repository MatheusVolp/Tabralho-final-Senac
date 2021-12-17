<?php
if (isset($_POST['editarJS'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cnpj = $_POST['cnpj'];

    $pdo = require_once '../pdo/connection.php';

    $sql = "UPDATE pessoa SET nome = ?, email = ?, cnpj = ? WHERE idPessoa = ?";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $nome, PDO::PARAM_STR);
    $sth->bindParam(2, $email, PDO::PARAM_STR);
    $sth->bindParam(3, $cnpj, PDO::PARAM_STR);
    $sth->bindParam(4, $id, PDO::PARAM_INT);
    $sth->execute();
    unset($sth);
    unset($pdo);          
    header("location: ../view/listaPessoaJ.php");
}
?>