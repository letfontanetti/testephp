<?php

    include("../conexao.php");

    if(!isset($_GET['id'])){
        die("Usuário não existe");
    }

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $login = $_POST['login'];

    if(isset($id) && isset($nome) && isset($email) && isset($login)){
        $sql = "UPDATE * FROM usuario SET nome = :nome, login = :login, email = :email WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":login", $login);
        $stmt->bindValue(":email", $email);
        $stmt->execute();

        header("Location: TelaListagem.php");
        exit();

    }else{
        die("Dados do fomulário não preenchidos");
    }