<?php
$d1 = new DateTime('2016-05-16');
$d2 = new DateTime();
$ecart = $d1->diff($d2);
$diffEnJours = $ecart->days;

?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handjet:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/assets/css/style.css">
    <title>PHP Dates - Exercice 5</title>
</head>
<!-- Header -->

<body>
    <header class="d-flex flex-column justify-content-center align-items-center text-light">
        <h1>PHP Dates</h1>
        <h2>Exercice 5</h2>
    </header>
    <main>
        <!-- Consigne de l'exercice -->
        <div class="text-center p-4">
            <p>Consigne : Afficher le nombre de jour qui sépare la date du jour avec le 16 mai 2016.
            </p>


        </div>
        <hr>
        <!-- Réponse -->
        <div class="text-center ">

            <p>L'écart entre aujourd'hui et le 16 Mai 2016 est de : <?= $diffEnJours ?> Jours</p>


        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>