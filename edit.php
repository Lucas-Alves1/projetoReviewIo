<?php

require_once 'conecta.php';

$query = "SELECT * FROM GAME";
$stmt = $pdo->prepare($query);
$stmt->execute();

while ($result = $stmt->fetch()) {
    echo 'ID: ' . $result['id_game'] . '<br>';
    echo 'Nome: ' . $result['name'] . '<br>';
    echo 'Descrição: ' . $result['desc'] . '<br>';
    echo 'Avaliação: ' . $result['aval'] . '<br>';
    echo 'Imagem: <img src="' . $result['img'] . '" alt="Imagem do jogo" style="max-width: 100px;"><br>';
    echo 'Data: ' . $result['data'] . '<br>';
    echo '<a href="edit_form.php?id=' . $result['id_game'] . '">Editar</a><br>';
    echo '<a href="#" onclick="confirmDelete(' . $result['id_game'] . ')">Excluir</a><br><br>';
}

$result = null;
$stmt = null;
$pdo = null;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Minhas avaliações - Review.Io</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="list">
        <div class="container">
            <h1>Meus Jogos</h1>
        </div>
    </main>
    
    <script>
        function confirmDelete(id) {
            if (confirm('Tem certeza que deseja excluir esse cadastro?')) {
                window.location.href = 'delete.php?id=' + id;
            }
        }
    </script>
</body>