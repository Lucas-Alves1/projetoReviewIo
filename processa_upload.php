<?php

require_once "conecta.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $aval = $_POST['aval'];
    $data = $_POST['data'];

    // Verificar se um arquivo foi enviado
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $uploadDir = 'uploads/'; // Diretório onde as imagens serão salvas
        $uploadFile = $uploadDir . basename($_FILES['img']['name']);

        // Verifica se o diretório de upload existe, caso contrário, cria
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Move o arquivo enviado para o diretório de upload
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
