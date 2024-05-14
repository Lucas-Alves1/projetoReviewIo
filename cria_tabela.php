<?php

require_once "conecta.php";

/*---- Cria tabela ----*/
$query = "CREATE TABLE IF NOT EXISTS GAME(
    id_game INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    desc TEXT,
    aval INTEGER NOT NULL,
    img TEXT,
    data DATE
)";

$pdo->exec($query); // o exec executa qualquer comando SQL na variável $query
echo "Tabela criada com sucesso!";
$pdo = null; // encerra a conexão com banco de dados

?>