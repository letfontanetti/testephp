<?php
    include("../config/cabecalho.php");
?>

<div class="container">
    <h1>Registro de usuário</h1>
    <form action="" method="POST">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Informe seu nome" required>

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" placeholder="Informe seu email" required>

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
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $login = $_POST["login"];
            $senha = $_POST["senha"];

            $sql = "INSERT INTO usuario(nome, email, login, senha) VALUES (:nome, :email, :login, :senha)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":login", $login);
            $stmt->bindValue(":senha", $senha);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                echo "<div class='sucess'>Usuário cadastrado com sucesso</div>";
            }else{
                echo "<div class='error'>Falha ao registrar o usuário</div>";
            }

            //fechar a conexão
            $conexao = null;
        }
    ?>
</div>

<?php
    include("../config/rodape.php");
?>