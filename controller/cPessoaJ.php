<?php

class cPessoaJ {
    public function inserir() {
        if(isset($_POST['salvarJS'])){
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];
            $cnpj = $_POST['cnpj'];
            $site = $_POST['site'];
            $nomeF = $_POST['nomeF'];
            
            $pdo = require_once '../pdo/connection.php';
            $sql = "insert into pessoa (nome, telefone, email, endereco, cnpj, site, nomeFantasia) values (?,?,?,?,?,?,?)";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $nome, PDO::PARAM_STR);
            $sth->bindParam(2, $telefone, PDO::PARAM_STR);
            $sth->bindParam(3, $email, PDO::PARAM_STR);
            $sth->bindParam(4, $endereco, PDO::PARAM_STR);
            $sth->bindParam(5, $cnpj, PDO::PARAM_STR);
            $sth->bindParam(6, $site, PDO::PARAM_STR);
            $sth->bindParam(7, $nomeF, PDO::PARAM_STR);
            $sth->execute();
            unset($sth);
            unset($pdo);
        }
    }
    
    public function getPessoaJ() {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select idPessoa, nome, email, cnpj from pessoa where cpf is null";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
        unset($sth);
        unset($pdo);
    }
    
    public function deleteJS() {
        if (isset($_POST['deleteJS'])) {
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

    public function getPessoaJById($id) {
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