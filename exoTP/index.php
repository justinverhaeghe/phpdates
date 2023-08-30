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
$today = $date->format('d');
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
        <div class="text-center p-4">
            <p>Consigne : Faire un formulaire avec deux listes déroulantes. La première sert à choisir le mois, et le
                deuxième permet d'avoir l'année.
                En fonction des choix, afficher un calendrier. </p>

        </div>
        <hr>
        <!-- Réponse -->
        <div class="text-center">
            <form action="" method="get">
                <select name="month" id="month" required>
                    <option value="" disabled selected>-- Veuillez sélectionner un mois--</option>
                    <?php
                    foreach ($months as $key => $value) { ?>
                        <option value="<?= $key ?>"><?= $value ?></option>
                    <?php }
                    ?>
                </select>

                <select name="year" id="year" required>
                    <option value="" disabled>-- Selectionner une année --</option>
                    <?php
                    for ($year = 2100; $year >= 1950; $year--) { ?>
                        <option <?= $year == $currentYear ? 'selected' : 'false' ?> value="<?= $year ?>">
                            <?= $year ?>
                        </option>
                    <?php }
                    ?>
                </select>

                <button type="submit">Afficher</button>
            </form>

            <h3 class="pt-3"><?= $months[$_GET['month']] . ' ' . $_GET['year'] ?></h3>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col d-flex justify-content-center p-5">
                    <table class="">
                        <thead>
                            <tr><?php $j = 1;
                                foreach ($weekDays as $key => $value) { ?>
                                    <th class="p-5 scope=" row""><?= $value ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < $daysInMonths + $indexFirstDay; $i++) { ?>
                                <?php if ($i == 0) { ?>
                                    <tr>
                                    <?php } elseif ($i % 7 == 0) { ?>
                                    </tr>
                                    <tr>
                                    <?php } ?>
                                    <?php if ($i < $indexFirstDay) { ?>
                                        <td></td>
                                    <?php } else { ?>

                                        <td class="<?= $j == $today && $date->format('m') == $currentMonth && $date->format('Y') == $currentYear ? 'red' : '' ?>">
                                            <?= $j ?></td>
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