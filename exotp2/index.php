<?php
$weekDays = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
$englishdays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
$months = ['01' => 'Janvier', '02' => 'Février', '03' => 'Mars', '04' => 'Avril', '05' => 'Mai', '06' => 'Juin', '07' => 'Juillet', '08' => 'Août', '09' => 'Septembre', '10' => 'Octobre', '11' => 'Novembre', '12' => 'Décembre'];
$currentYear = isset($_GET['year']) ? $_GET['year'] : date("Y");
$currentMonth = isset($_GET['month']) ? $_GET['month'] : date("m");
$currentDate = $currentYear . '-' . $currentMonth . '-01';
$dateObj = DateTime::createFromFormat('Y-m-d', $currentDate);
$date = new DateTime();
$daysInMonths = cal_days_in_month(CAL_GREGORIAN, $dateObj->format('m'), $dateObj->format('Y'));
$firstDay = $dateObj->format('l');
$indexFirstDay = array_search($firstDay, $englishdays);
$lastDay = new DateTime($currentYear . '-' . $currentMonth . '-' . $daysInMonths);
$lday = $lastDay->format(('l'));
$indexLastDay = array_search($lday, $englishdays);
$today = $date->format('d');
$birthdays = ['28-07' => 'Nicolas Personne', '02-09' => 'Alicia Bazin', '30-07' => 'Allan Baguet', '22-11' => 'Pierre Demaret', '26-05' => 'Justin Verhaeghe', '16-09' => 'Anne Piau', '25-07' => 'Valentin Sucaud', '24-11' => 'Sébastien Leroy', '20-12' => 'Cyril Giros', '18-05' => 'Victor Grimaux',];

?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handjet:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Phudu&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./public/assets/css/style.css">
    <script defer src="./public/assets/js/script.js"></script>
    <title>PHP Dates - Exercice TP</title>
</head>
<!-- Header -->

<body>
    <header class="d-flex flex-column justify-content-center align-items-center text-light">
        <h1>PHP Dates</h1>
        <h2>Exercice TP</h2>
    </header>
    <main>
        <!-- Consigne de l'exercice -->
        <div class="text-center p-1">
            <p>Consigne : Faire un formulaire avec deux listes déroulantes. La première sert à choisir le mois, et le
                deuxième permet d'avoir l'année.
                En fonction des choix, afficher un calendrier. </p>
        </div>
        <hr>
        <!-- Réponse -->
        <div class="container-fluid text-center">
            <div class="row justify-content-center">
                <div class="col-4">
                    <form action="" method="get" id="myForm">
                        <!-- Select du mois -->
                        <select name="month" id="month" class="form-select mb-3" onchange="this.form.submit()">
                            <option value="" disabled>-- Veuillez sélectionner un mois--</option>
                            <?php
                            foreach ($months as $key => $value) { ?>
                                <option <?= $key == $currentMonth ? 'selected' : '' ?> value="<?= $key ?>">
                                    <?= $value ?>
                                </option>
                            <?php }
                            ?>
                        </select>
                </div>
                <div class="col-4">
                    <!-- Select de l'année -->
                    <select name="year" id="year" class="form-select mb-3" onchange="this.form.submit()">
                        <option value="" disabled selected>-- Selectionner une année --</option>
                        <?php
                        for ($year = 2100; $year >= 1950; $year--) { ?>
                            <option <?= $year == $currentYear ? 'selected' : '' ?> value="<?= $year ?>">
                                <?= $year ?>
                            </option>
                        <?php }
                        ?>
                    </select>
                </div>
                <!-- Liens vers Aujourd'hui -->
                <div class="col-3">
                    <a href="./?month=<?= $date->format('m') ?>&year=<?= $date->format('Y') ?>" class="btn btn-outline-success">Aujourd'hui</a>
                </div>
                </form>

                <!-- Réponse par défaut -->
                <?php if (!isset($_GET['month']) || !isset($_GET['year'])) { ?>
                    <div class="container-fluid text-center">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <p>Sélectionnez un mois et une année pour afficher le calendrier.</p>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <!-- Affichage du mois et de l'année encadré de boutons pour +1 ou -1 mois -->
                    <h2 class="pt-3"><a href="./?month=<?= $dateObj->modify('-1 month')->format('m') ?>&year=<?= $dateObj->format('Y') ?>"><i class="bi bi-arrow-left-square-fill" style="font-size: 2rem; color: #2b4570;"></i></a>
                        <?= $months[$_GET['month']] . ' ' . $_GET['year'] ?> <a href="./?month=<?= $dateObj->modify('+2 month')->format('m') ?>&year=<?= $dateObj->format('Y') ?>"><i class="bi bi-arrow-right-square-fill" style="font-size: 2rem; color: #2b4570;"></i></a>
                    </h2>
                <?php } ?>
            </div>
        </div>
        <!-- Affichage du Calendrier en PHP -->
        <div class="container-fluid">
            <div class="row">
                <div class="col d-flex justify-content-center p-5">
                    <table class="">
                        <thead>
                            <tr><?php $j = 1;
                                foreach ($weekDays as $key => $value) { ?>
                                    <th class="p-4 scope=" row""><?= $value ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < $daysInMonths + $indexFirstDay + (6 - $indexLastDay); $i++) { ?>
                                <?php if ($i == 0) { ?>
                                    <tr>
                                    <?php } elseif ($i % 7 == 0) { ?>
                                    </tr>
                                    <tr>
                                    <?php } ?>
                                    <?php if ($i < $indexFirstDay || $j > $daysInMonths) { ?>
                                        <td></td>
                                    <?php } else { ?>
                                        <td class="<?= $j == $today && $date->format('m') == $currentMonth && $date->format('Y') == $currentYear ? 'red' : '' ?>">
                                            <?= $j ?>
                                            <?php
                                            $j = DateTime::createFromFormat('d', $j)->format('d');
                                            if (array_key_exists("$j-$currentMonth", $birthdays)) { ?>
                                                <span class="birthday"> <?= $birthdays["$j-$currentMonth"] ?> </span>
                                            <?php } ?>
                                        </td>
                                    <?php $j++;
                                    } ?>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>