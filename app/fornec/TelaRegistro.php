<?php
    include("../config/cabecalho.php");
?>

<div class="container">
    <h1>Registro de fornecedor</h1>
    <form action="" method="POST">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Informe seu nome" required>

        <label for="telefone">Telefone</label>
        <input type="tel" name="tel" id="tel" placeholder="Informe seu telefone" required maxlength="20">

        <label for="empresa">Nome da empresa</label>
        <input type="text" name="empresa" id="empresa" placeholder="Informe o nome da sua empresa" required>

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" placeholder="Informe seu email" required>

        <label for="conta">Conta bancária</label>
        <input type="number" name="conta" id="conta" placeholder="Informe sua conta bancária" required>

        <label for="agencia">Agência bancária</label>
        <input type="number" name="agencia" id="agencia" placeholder="Informe sua agência bancária" required>

        <button type="submit">Enviar</button>
    </form>

    <?php
        //conectar com o banco de dados
        include("../conexao.php");

        //formulario foi enviado?
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST["nome"];
            $tel = $_POST["tel"];
            $empresa = $_POST["empresa"];
            $email = $_POST["email"];
            $conta = $_POST["conta"];
            $agencia = $_POST["agencia"];

            $sql = "INSERT INTO fornec(nome, telefone, razao_social, email, conta, agencia) VALUES (:nome, :tel, :empresa, :email, :conta, :agencia)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":tel", $tel);
            $stmt->bindValue(":empresa", $empresa);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":conta", $conta);
            $stmt->bindValue(":agencia", $agencia);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                echo "<div class='sucess'>Fornecedor cadastrado com sucesso</div>";
            }else{
                echo "<div class='error'>Falha ao registrar o fornecedor</div>";
            }

            //fechar a conexão
            $conexao = null;
        }
    ?>
</div>

<?php
    include("../config/rodape.php");
?>