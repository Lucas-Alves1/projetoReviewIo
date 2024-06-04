<?php

require_once 'conecta.php';

$query = "SELECT * FROM GAME";
$stmt = $pdo->prepare($query);
$stmt->execute();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- GLIGHTBOX -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
    <!-- ICONS -->
    <script defer type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script defer nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <title>Minhas avaliações - Review.Io</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <main class="list">
        <div class="container">
            <article class="list--text">
                <h1>Meus Jogos</h1>
                <p>Confira abaixo todos as suas avaliações... <br>até o momento</p>

                <a class="button btn-secondary" href="index.php">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </article>
            <article class="list--wrapper">
                <?php
                    while ($result = $stmt->fetch()) {
                    echo '<div class="list--item">';
                        echo '<img src="' . $result['img'] . '" alt="Imagem do jogo" class="glightbox">';
                        
                        echo '<div class="info">';
                            echo '<h3>' . $result['name'] . '</h3>';
                            echo '<span>ID: ' . $result['id_game'] . '</span>';
                            echo '<span>' . $result['data'] . '</span>';
                            echo '<h4><strong>' . $result['aval'] . '</strong>/100</h4>';
                            echo '<p>"' . $result['desc'] . '"<p>';
                            echo '<div class="btns">';
                                echo '<a class="button btn-secondary" href="edit_form.php?id=' . $result['id_game'] . '">
                                    <ion-icon name="pencil"></ion-icon>
                                </a>';
                                echo '<a class="button btn-secondary" href="#" onclick="confirmDelete(' . $result['id_game'] . ')">
                                    <ion-icon name="trash"></ion-icon>
                                </a>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    }


                    $result = null;
                    $stmt = null;
                    $pdo = null;
                ?>
            </article>
        </div>
    </main>

    
    <script>
        // init lib
        const lightbox = GLightbox();
        
        function confirmDelete(id) {
            if (confirm('Tem certeza que deseja excluir esse cadastro?')) {
                window.location.href = 'delete.php?id=' + id;
            }
        }
    </script>
</body>