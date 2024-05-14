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
    <title>Editar Jogo</title>
</head>
<body>
    <h1>Editar Jogo</h1>
    <form action="atualiza.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <label for="name">Nome do Jogo:</label>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>" required><br>

        <label for="desc">Descrição:</label>
        <textarea name="desc" id="desc"><?php echo $desc; ?></textarea><br>

        <label for="aval">Avaliação:</label>
        <input type="number" name="aval" id="aval" value="<?php echo $aval; ?>" required><br>

        <label for="img">Imagem Atual:</label>
        <img src="<?php echo $img; ?>" alt="Imagem do jogo" style="max-width: 200px;"><br>
        <label for="img">Nova Imagem (opcional):</label>
        <input type="file" name="img" id="img"><br>

        <label for="data">Data:</label>
        <input type="date" name="data" id="data" value="<?php echo $data; ?>"><br>

        <input type="submit" value="Atualizar">
    </form>
</body>
</html>