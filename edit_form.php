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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Editar Jogo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="edit">
        <div class="container">
            <h1>Editar Jogo</h1>
            <form action="atualiza.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                
                <label for="name">Nome do Jogo:</label>
                <input type="text" name="name" id="name" value="<?php echo $name; ?>" required>
        
                <label for="desc">Descrição:</label>
                <textarea name="desc" id="desc"><?php echo $desc; ?></textarea>
        
                <label for="aval">Avaliação:</label>
                <input type="number" name="aval" id="aval" value="<?php echo $aval; ?>" required>
        
                <label for="img">Imagem Atual:</label>
                <img src="<?php echo $img; ?>" alt="Imagem do jogo">
                <label for="img">Nova Imagem (opcional):</label>
                <input type="file" name="img" id="img">
        
                <label for="data">Data:</label>
                <input type="date" name="data" id="data" value="<?php echo $data; ?>">
        
                <input type="submit" value="Atualizar">
            </form>
        </div>
    </main>
</body>
</html>