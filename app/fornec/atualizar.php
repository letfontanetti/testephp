<?php

    include("../conexao.php");

    if(!isset($_GET['id'])){
        die("Fornecedor não existe");
    }

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $tel = $_POST['tel'];
    $razao_social = $_POST['razao_social'];
    $email = $_POST['email'];
    $conta = $_POST['conta'];
    $agencia = $_POST['agencia'];

    if(isset($id) && isset($nome) && isset($tel) && isset($razao_social) && isset($email) && isset($conta) && isset($agencia)){
        $sql = "UPDATE fornec SET nome = :nome, telefone = :telefone, razao_social = :razao_social, email = :email, conta = :conta, agencia = :agencia WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":telefone", $tel);
        $stmt->bindValue(":razao_social", $razao_social);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":conta", $conta);
        $stmt->bindValue(":agencia", $agencia);
        $stmt->execute();

        header("Location: TelaListagem.php");
        exit();

    }else{
        die("Dados do fomulário não preenchidos");
    }