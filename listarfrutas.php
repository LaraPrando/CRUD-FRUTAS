<?php include_once ('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body class="container-formulario">
    <h1>lista de frutas</h1>
<?php

$stmt = $pdo->query('SELECT * FROM frutas');
$frutas = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (count($frutas) == 0) {
    echo '<p>Nada marcado.</p>';
} else {
    echo '<table border="1">';
    echo '<thead>
            <tr><th>Nome</th>
            <th>tamanho</th>
            <th>peso</th>
            <th>quantidade</th>
            <th>preco</th>
            <th colspan="2">Opções</th>
            </tr>
            </thead>';
    echo '<tbody>';

    foreach ($frutas as $fruta) {
        echo '<tr>';
        echo '<td>' . $fruta['nome'] . '</td>';
        echo '<td>' . $fruta['tamanho'] . '</td>';
        echo '<td>' . $fruta['peso'] . '</td>';
        echo '<td>' . $fruta['quantidade'] . '</td>';
        echo '<td>' . $fruta['preco'] . '</td>';
        echo '<td><a ;" href="atualizar.php?id=' . $fruta['id'] . '">Atualizar</a></td>';
        echo '<td><a ;" href="deletar.php?id=' . $fruta['id'] . '">Deletar</a></td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
}
?>
<button><a href="indexprod.php"><--</a></button>
</body>
</html>