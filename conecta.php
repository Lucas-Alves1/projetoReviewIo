<?php

define("DATABASE", "database.sqlite3"); // criação de constante

try {
    $pdo = new PDO('sqlite:' . DATABASE); // cria / conecta
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

// Comentar esta linha após testar
// echo "conectado";

?>