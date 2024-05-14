<?php

require_once 'conecta.php';

$name = $_POST['name'];
$desc = $_POST['desc'];
$aval = $_POST['aval'];
$img = $_POST['img'];
$data = $_POST['data'];

$query = "INSERT INTO GAME (name, desc, aval, img, data) VALUES (:name, :desc, :aval, :img, :data)";
$stmt = $pdo->prepare($query); // evita SQL injection

$stmt->bindValue(':name', $name);
$stmt->bindValue(':desc', $desc);
$stmt->bindValue(':aval', $aval);
$stmt->bindValue(':img', $img);
$stmt->bindValue(':data', $data);

$stmt->execute();
echo 'Quantidade total de registros: ' . $stmt->rowCount() . '<br>';
echo 'ID do último registro inserido: ' . $pdo->lastInsertId();

$stmt = null;
$pdo = null;

?>