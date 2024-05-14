<?php

require_once 'conecta.php';

$id = $_POST['id'];
$name = $_POST['name'];
$desc = $_POST['desc'];
$aval = $_POST['aval'];
$data = $_POST['data'];
$imgPath = null;

if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['img']['name']);

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile)) {
        $imgPath = $uploadFile;
    } else {
        echo "Erro ao fazer o upload do arquivo.";
        exit;
    }
}

$query = "UPDATE GAME SET name = :name, desc = :desc, aval = :aval, data = :data" . ($imgPath ? ", img = :img" : "") . " WHERE id_game = :id_game";
$stmt = $pdo->prepare($query);

$stmt->bindValue(':name', $name);
$stmt->bindValue(':desc', $desc);
$stmt->bindValue(':aval', $aval);
$stmt->bindValue(':data', $data);
if ($imgPath) {
    $stmt->bindValue(':img', $imgPath);
}
$stmt->bindValue(':id_game', $id);

$stmt->execute();
echo 'Quantidade de registros atualizados: ' . $stmt->rowCount() . '<br>';

$stmt = null;
$pdo = null;

?>