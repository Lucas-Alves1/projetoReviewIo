<?php

require_once 'conecta.php';

$query = "SELECT * FROM GAME";
$stmt = $pdo->prepare($query);
$stmt->execute();

while ($result = $stmt->fetch()) {
    echo 'id_game: ' . $result['id_game'] . '<br>';
    echo 'nome: ' . $result['name'] . '<br>';
    echo 'descrição: ' . $result['desc'] . '<br>';
    echo 'avaliação: ' . $result['aval'] . '<br>';
    // echo 'imagem: ' . $result['img'] . '<br>';
    echo 'data: ' . $result['data'] . '<br>';
    echo '<img src="' . $result['img'] . '" alt="Imagem do jogo"><br><br>';
}

$result = null;
$stmt = null;
$pdo = null;

?>