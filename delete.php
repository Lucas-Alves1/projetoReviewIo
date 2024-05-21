<?php

require_once 'conecta.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM GAME WHERE id_game = :id_game";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id_game', $id);

    if ($stmt->execute()) {
        echo 'Dado apagado com sucesso.';
    } else {
        echo 'Erro ao apagar o dado.';
    }

    $stmt = null;
    $pdo = null;
} else {
    echo 'ID não fornecido.';
}

?>

<a href="index.php">Voltar</a>
<a href="edit.php">Meus jogos</a>