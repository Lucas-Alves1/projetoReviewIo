<?php

require_once 'conecta.php';

$query = "SELECT * FROM GAME";
$stmt = $pdo->prepare($query);
$stmt->execute();

echo "<h1>Lista de Jogos</h1>";
while ($result = $stmt->fetch()) {
    echo 'ID: ' . $result['id_game'] . '<br>';
    echo 'Nome: ' . $result['name'] . '<br>';
    echo 'Descrição: ' . $result['desc'] . '<br>';
    echo 'Avaliação: ' . $result['aval'] . '<br>';
    echo 'Imagem: <img src="' . $result['img'] . '" alt="Imagem do jogo" style="max-width: 100px;"><br>';
    echo 'Data: ' . $result['data'] . '<br>';
    echo '<a href="edit_form.php?id=' . $result['id_game'] . '">Editar</a><br><br>';
}

$result = null;
$stmt = null;
$pdo = null;

?>

<button class="btn btn-primary">
    <a href="index.php">Voltar</a>
</button>