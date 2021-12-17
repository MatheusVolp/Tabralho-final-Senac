<?php

class cPessoaF {
    public function inserir() {
        if(isset($_POST['salvarPF'])){
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];
            $cpf = $_POST['cpf'];
            $rg = $_POST['rg'];
            $sexo = $_POST['sexo'];
            
            $pdo = require_once '../pdo/connection.php';
            $sql = "insert into pessoa (nome, telefone, email, endereco, cpf, rg, sexo) values (?,?,?,?,?,?,?)";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $nome, PDO::PARAM_STR);
            $sth->bindParam(2, $telefone, PDO::PARAM_STR);
            $sth->bindParam(3, $email, PDO::PARAM_STR);
            $sth->bindParam(4, $endereco, PDO::PARAM_STR);
            $sth->bindParam(5, $cpf, PDO::PARAM_STR);
            $sth->bindParam(6, $rg, PDO::PARAM_STR);
            $sth->bindParam(7, $sexo, PDO::PARAM_STR);
            $sth->execute();
            unset($sth);
            unset($pdo);
        }
    }
    
    public function getPessoaF() {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select idPessoa, nome, email, cpf from pessoa where cnpj is null";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
        unset($sth);
        unset($pdo);
    }
    
    public function deletePF() {
        if (isset($_POST['deletePF'])) {
            $id = $_POST['idPessoa'];

            $pdo = require_once '../pdo/connection.php';
            $sql = "delete from pessoa where idPessoa = ?";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $id, PDO::PARAM_INT);
            $sth->execute();
            unset($sth);
            unset($pdo);
            header("Location: ../view/listaPessoaF.php");

        }
    }

    public function getPessoaFById($id) {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select * from pessoa where idPessoa = $id";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        unset($sth);
        unset($pdo);
        return $result;
    }
}