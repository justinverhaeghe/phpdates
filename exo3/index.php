<?php
$date = new DateTime();
$formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::NONE, IntlDateFormatter::NONE);
$formatterEn = new IntlDateFormatter('en_EN', IntlDateFormatter::MEDIUM, IntlDateFormatter::MEDIUM);
$formatter->setPattern('EEEE dd MMMM y');
// $formatterEn->setPattern('EEEE dd MMMM y');
$dateFr = $formatter->format($date);
$dateEn = $formatterEn->format($date);

?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handjet:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/assets/css/style.css">
    <title>PHP Dates - Exercice 3</title>
</head>
<!-- Header -->

<body>
    <header class="d-flex flex-column justify-content-center align-items-center text-light">
        <h1>PHP Dates</h1>
        <h2>Exercice 3</h2>
    </header>
    <main>
        <!-- Consigne de l'exercice -->
        <div class="text-center p-4">
            <p>Consigne : Afficher la date courante avec le jour de la semaine et le mois en toutes lettres (ex : mardi
                2 août 2016)
                Bonus : Le faire en français.
            </p>


        </div>
        <hr>
        <!-- Réponse -->
        <div class="text-center ">

            <p>
                La date du jour est la suivante : <?= ucwords($dateFr) ?>
            </p>
            <p>
                Today's date : <?= ucwords($dateEn) ?>
            </p>

        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>