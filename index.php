<?php
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>cliente</title>
</head>
<body>
    <p style="backgroud: rgb(24, 113, 122); color: rgb(24, 113, 122); font-size: 60px; text-align: center;">Cadastro</p>

    <div class="container-formulario">
        
       
        <?php
        if (isset($_POST['submit'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $data = $_POST['data'];
            
        

        $stmt = $pdo->prepare('SELECT COUNT(*) FROM cliente WHERE nome = ? AND email = ?');
        $stmt->execute ([$nome, $email]);
        $count = $stmt->fetchColumn();

        if ($count > 0){
            $error = 'esse email/nome ja existe.';
        } else {

            $stmt = $pdo->prepare('INSERT INTO cliente (nome, email, telefone, data) 
            VALUES(:nome, :email, :telefone, :data)');
            $stmt->execute(['nome' => $nome, 'email' => $email, 'telefone' => $telefone, 'data' => $data]);
            if ($stmt->rowCount()) {
                echo '<span>Cadastro realizado com sucesso!</span>';
            } else {
                echo '<span>Erro ao cadastrar. Tente novamente mais tarde.</span>';
            }
        }
        if (isset($error)) {
            echo '<span>'.$error.'</span>';
        }
}
        ?>

        <form method="post">

        <label for="nome">Nome: &nbsp &nbsp</label><br>
        <input type="text" name="nome" required><br>

        <label for="email">E-mail: &nbsp&nbsp</label><br>
        <input type="email" name="email" required><br>

        <label for="telefone">Telefone:</label><br>
        <input type="text" name="telefone" maxlength="11" required><br>

        <label for="data">Data:  &nbsp &nbsp &nbsp </label><br>
        <input type="date" name="data" required><br><br>


        <div>
            <button type="submit" name="submit" value="agendar">Cadastrar</button>
            <button><a href="listar.php">Listar</a></button>
            <button><a href="indexprod.php">Produto</a></button>
    </div>

    </form>

</body>
</html>