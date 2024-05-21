<?php

require_once "conecta.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $aval = $_POST['aval'];
    $data = $_POST['data'];

    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $uploadDir = 'uploads/'; // diretório das imgs
        $uploadFile = $uploadDir . basename($_FILES['img']['name']);

        // cria 
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // move o arquivo
        if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile)) {
            $imgPath = $uploadFile;
            $stmt = $pdo->prepare("INSERT INTO GAME (name, desc, aval, img, data) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$name, $desc, $aval, $imgPath, $data]);

            echo "Jogo inserido com sucesso!";
        } else {
            echo "Erro ao fazer o upload do arquivo.";
        }
    } else {
        echo "Erro no envio do arquivo.";
    }
}

$pdo = null; // Encerra a conexão com o banco de dados

?>
