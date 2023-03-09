<?php

    include("../conexao.php");

    //verificar se o id foi fornecido
    if(!isset($_GET['id'])){
        die("ID do fornecedor não foi fornecido");
    }else{
        $id = $_GET['id'];

        $sql = "DELETE FROM fornec WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        header("Location: Telalistagem.php");
        exit;
    }