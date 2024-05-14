<!DOCTYPE html>
<html>
<head>
    <title>Review.Io - Avalie seus jogos, séries e filmes favoritos</title>
</head>
<body>
    <h1>Banco de Dados - SQLITE - PHP</h1>
    <h2>Arquivos</h2>
    <a href='conecta.php'>conecta.php</a><br>
    <a href='cria_tabela.php'>cria_tabela.php</a><br>
    <a href='insere.php'>insere.php</a><br>
    <a href='select.php'>select.php</a><br>
    <a href='atualiza.php'>atualiza.php</a><br>

    <br>

    <form action="processa_upload.php" method="post" enctype="multipart/form-data">
        <label for="name">Nome do Jogo:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="desc">Descrição:</label>
        <textarea name="desc" id="desc"></textarea><br>

        <label for="aval">Avaliação:</label>
        <input type="number" name="aval" id="aval" required><br>

        <label for="img">Imagem:</label>
        <input type="file" name="img" id="img" required><br>

        <label for="data">Data:</label>
        <input type="date" name="data" id="data"><br>

        <input type="submit" value="Enviar">
    </form>

    <a href="edit.php">Editar meus jogos</a>
</body>
</html>
