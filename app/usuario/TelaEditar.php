<?php
    include("../config/cabecalho.php");
    include("../conexao.php");

    //saber se o ID do usuario foi passado
    if(!isset($_GET['id'])){
        die("ID do usuário inválido");
    }

    //obtem o id do usuário
    $id = $_GET['id'];

    $sql = "SELECT * FROM usuario WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$row){
        die("Usuário não encontrado");
    }
    ?>

    <div class="container">
        <h1>Edição de usuário</h1>
        <form action="<?php echo "atualizar.php?id={$id}" ?>" method="POST">
            <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Informe seu nome" required value="<?php echo $row['nome'] ?>">

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="Informe seu email" required value="<?php echo $row['email'] ?>">

            <label for="login">Login</label>
            <input type="text" name="login" id="login" placeholder="Informe seu login" required value="<?php echo $row['login'] ?>">

            <button type="submit">Atualizar</button>
        </form>
    </div>

    <?php
        include("../config/rodape.php");
    ?>