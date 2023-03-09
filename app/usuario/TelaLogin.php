<?php
    include("../config/cabecalho.php");
?>

<div class="container">
    <h1>Login</h1>
    <form action="" method="POST">
        <label for="login">Login</label>
        <input type="text" name="login" id="login" placeholder="Informe seu login" required>

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" placeholder="Informe sua senha" required>

        <button type="submit">Enviar</button>
    </form>

    <?php
        //conectar com o banco de dados
        include("../conexao.php");

        //formulario foi enviado?
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $login = $_POST["login"];
            $senha = $_POST["senha"];

            $sql = "SELECT * FROM usuario WHERE login = :login and senha = :senha";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":login", $login);
            $stmt->bindValue(":senha", $senha);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if($result){
                header("Location: TelaListagem.php");
                exit;
            }else{
                echo "<div class='error'>Falha ao login com o usuário</div>";
            }
        }
    ?>
</div>

<?php
    include("../config/rodape.php");
?>