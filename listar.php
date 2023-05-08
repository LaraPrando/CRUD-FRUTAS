<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
   <div class="container-formulario"> 
    <h1>Finalizar cadastro</h1>

    
<?php
$stmt = $pdo->query('SELECT * FROM cliente ORDER by id');
$cliente = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (count($cliente) == 0) {
    echo '<p>Nenhum compromisso agendado.</p>';
} else {
    echo '<table border="1">';
    echo '<thead>
            <tr><th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Data</th>
            <th colspan="2">Opções</th>
            </tr>
            </thead>';
    echo '<tbody>';

    foreach ($cliente as $clientes) {
        echo '<tr>';
        echo '<td>' . $clientes['nome'] . '</td>';
        echo '<td>' . $clientes['email'] . '</td>';
        echo '<td>' . $clientes['telefone'] . '</td>';
        echo '<td>' . date('d/m/y', strtotime($clientes['data'])) . '</td>';
        echo '<td><a ;" href="atualizar.php?id=' . $clientes['id'] . '">Atualizar</a></td>';
        echo '<td><a ;" href="deletar.php?id=' . $clientes['id'] . '">Deletar</a></td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
}
?>
<button><a href="index.php"><--</a></button>
    </div>
</body>
</html>