<?php
// $actualTimestamp = time();
// $pastTimestamp = mktime(14, 0, 0, 2, 8, 2016);

$actualDate = new DateTime();
$pastDate = new DateTime('2016/08/02 15:00:00');
$actualTimestamp = $actualDate->getTimestamp();
$pastTimestamp = $pastDate->getTimestamp();

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
    <title>PHP Dates - Exercice 4</title>
</head>
<!-- Header -->

<body>
    <header class="d-flex flex-column justify-content-center align-items-center text-light">
        <h1>PHP Dates</h1>
        <h2>Exercice 4</h2>
    </header>
    <main>
        <!-- Consigne de l'exercice -->
        <div class="text-center p-4">
            <p>Consigne : Afficher le timestamp du jour. <br>
                Afficher le timestamp du mardi 2 août 2016 à 15h00.
            </p>


        </div>
        <hr>
        <!-- Réponse -->
        <div class="text-center ">

            <p>La timestamp du jour est le suivante : <?= $actualTimestamp ?></p>
            <p>La timestamp du mardi 2 août 2016 à 15h00 est le suivante : <?= $pastTimestamp ?></p>

        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>