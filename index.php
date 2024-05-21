<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Review.Io - Avalie seus jogos, séries e filmes favoritos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="main">
        <div class="container">            
            <h1>Review.Io</h1>
            <h2>Avalie suas obras favoritas!</h2>
                
            <form action="processa_upload.php" method="post" enctype="multipart/form-data">
                <div class="mt-3">
                    <label class="form-label" for="name">Nome do Jogo<span>*</span>:</label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Digite o nome do jogo" required>
                </div>
                <div class="mt-3">
                    <label class="form-label" for="aval" min="0" max="100" maxlength="3">Avaliação<span>*</span>:</label>
                    <input class="form-control" type="number" name="aval" id="aval" placeholder="Dê uma nota de 1 à 100!" required>
                </div>
                <div class="mt-3">
                    <label class="form-label" for="data">Data<span>*</span>:</label>
                    <input class="form-control" type="date" name="data" id="data" placeholder="data" required>
                </div>
                <div class="mt-3">
                    <label class="form-label" for="img">Imagem<span>*</span>:</label>
                    <input class="form-control form-control-lg" type="file" name="img" id="img" placeholder="Selecione a imagem" required>
                </div>
                <div class="mt-3">
                    <label class="form-label" for="desc" placeholder="Deixe sua avaliação">Opinião:</label>
                    <textarea class="form-control" name="desc" id="desc" placeholder="Suas melhores palavras..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Salvar</button>
            </form>
    
            <a href="edit.php" class="mt-3">Meus jogos</a>
        </div>
    </main>
</body>
</html>
