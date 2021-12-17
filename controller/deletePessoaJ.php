<?php

if (isset($_POST['deleteJS'])) {
    $id = $_POST['idPessoa'];

    $pdo = require_once '../pdo/connection.php';
    $sql = "delete from pessoa where idPessoa = ?";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $id, PDO::PARAM_INT);
    $sth->execute();
    unset($sth);
    unset($pdo);
    header("Location: ../view/listaPessoaJ.php");
}

?>