<?php

require_once 'conecta.php';

$id = $_GET['id'];

$query = "SELECT * FROM GAME WHERE id_game = :id_game";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':id_game', $id);
$stmt->execute();

$result = $stmt->fetch();
if ($result) {
    $name = $result['name'];
    $desc = $result['desc'];
    $aval = $result['aval'];
    $img = $result['img'];
    $data = $result['data'];
} else {
    echo "Registro não encontrado.";
    exit;
}

?>

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

    <title>Editar - Review.Io</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <main class="edit">
        <div class="container">
            <article class="edit--text">
                <h1>Editar Jogo</h1>

                <a class="button btn-secondary" href="edit.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </article>
            <article class="edit--form">
                <form action="atualiza.php" method="post">
                    <div class="row">
                        <label class="form-label" for="id">ID:</label>
                        <input class="form-control" type="text" disabled name="id" value="<?php echo $id; ?>">
                        <!-- oculto -->
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                    </div>
                    <div class="row">
                        <label class="form-label" for="name">Nome do Jogo:</label>
                        <input class="form-control" type="text" name="name" id="name" value="<?php echo $name; ?>" required>
                    </div>
                    <div class="row">    
                        <label class="form-label" for="img">Imagem Atual:</label>
                        <img src="<?php echo $img; ?>" alt="Imagem do jogo">
                        <label class="form-label" for="img">Nova Imagem:</label>
                        <input class="form-control" type="file" name="img" id="img" required>
                    </div>
                    <div class="row">
                        <label class="form-label" for="desc">Nova descrição:</label>
                        <textarea class="form-control" placeholder="Suas novas melhores palavras..." name="desc" id="desc"><?php echo $desc; ?></textarea>
                    </div>
                    <div class="row">
                        <label class="form-label" for="aval">Nova avaliação:</label>
                        <input class="form-control" type="number" name="aval" id="aval" value="<?php echo $aval; ?>" required>
                    </div>
                    <div class="row">
                        <label class="form-label" for="data">Data:</label>
                        <input class="form-control" type="date" name="data" id="data" value="<?php echo $data; ?>">
                    </div>
                    <div class="d-flex justify-content-center gap-4 mt-5">
                        <button type="submit" class="button btn-primary">Atualizar</button>
                        <a role="button" href="edit.php" class="button btn-secondary">Cancelar</a>
                    </div>
                </form>
            </article>
        </div>
    </main>
</body>
</html>