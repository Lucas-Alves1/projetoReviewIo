<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- ICONS -->
    <script defer type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script defer nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <title>Review.Io - Avalie seus jogos, séries e filmes favoritos</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <main class="return">
        <div class="container">
            <?php

            require_once 'conecta.php';

            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $query = "DELETE FROM GAME WHERE id_game = :id_game";
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(':id_game', $id);

                if ($stmt->execute()) {
                    echo '<h1>Dado apagado com sucesso.</h1>';
                } else {
                    echo '<h1>Erro ao apagar o dado.</h1>';
                }

                $stmt = null;
                $pdo = null;
            } else {
                echo '<h1>ID não fornecido.</h1>';
            }

            ?>

            <div class="btns">
                <a class="button btn-secondary" href="index.php">Início</a>
                <a class="button btn-primary" href="edit.php">Ver meus jogos</a>
            </div>
        </div>
    </main>
</body>
</html>