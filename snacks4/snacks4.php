<?php
include __DIR__ . '/snacks4data.php';

$classiFiltrate;
$currentArray;
// if (isset($_GET['voto-suff']) && $_GET['voto-suff'] === 'on') {
//     $classiFiltrate = [];
//     foreach ($classi as $classe => $studenti) {
//         $classiFiltrate[$classe] = [];
//         foreach ($studenti as $studente) {
//             if ($studente['voto_medio'] >= 6) {
//                 // $classiFiltrate[$classe] = $studente;
//                 array_push($classiFiltrate[$classe], $studente);
//             }
//         }
//     }
// } else {
//     $classiFiltrate = $classi;
// }
if (isset($_GET['voto-min']) && isset($_GET['voto-max']) && $_GET['voto-min'] < $_GET['voto-max'] && !empty($_GET['voto-min']) && !empty($_GET['voto-max'])) {
    // Controllo del voto massimo
    if ($_GET['voto-max'] >= 1 && $_GET['voto-max'] <= 10) {
        $classiVotoMax = [];
        foreach ($classi as $classe => $studenti) {
            $classiVotoMax[$classe] = [];
            foreach ($studenti as $studente) {
                if ($studente['voto_medio'] <= $_GET['voto-max']) {
                    array_push($classiVotoMax[$classe], $studente);
                }
            }
            $classiFiltrate = $classiVotoMax;
        }
    }
    // Controllo del voto minimo
    if ($_GET['voto-min'] >= 1 && $_GET['voto-min'] <= 10) {
        $classiVotoMin = [];
        foreach ($classiFiltrate as $classe => $studenti) {
            $classiVotoMin[$classe] = [];
            foreach ($studenti as $studente) {
                if ($studente['voto_medio'] >= $_GET['voto-min']) {
                    array_push($classiVotoMin[$classe], $studente);
                }
            }
            $classiFiltrate = $classiVotoMin;
        }
    }
} else {
    $classiFiltrate = $classi;
}

// Controllo del linguaggio preferito
if (isset($_GET['fav-lang']) && !empty($_GET['fav-lang'])) {
    $classiFavLang = [];
    foreach ($classiFiltrate as $classe => $studenti) {
        $classiFavLang[$classe] = [];
        foreach ($studenti as $studente) {
            if (strtolower($studente['linguaggio_preferito']) === strtolower($_GET['fav-lang'])) {
                array_push($classiFavLang[$classe], $studente);
            }
        }
        $classiFiltrate = $classiFavLang;
    }
}

if (isset($_GET['max-age']) && isset($_GET['min-age']) && $_GET['max-age'] > $_GET['min-age'] && !empty($_GET['max-age']) && !empty($_GET['min-age'])) {
    // Controllo l'età massima dello studente
    if ($_GET['max-age'] >= 15 && $_GET['max-age'] <= 100) {
        $classiAge = [];
        foreach ($classiFiltrate as $classe => $studenti) {
            $classiAge[$classe] = [];
            foreach ($studenti as $studente) {
                if ($studente['anni'] <= $_GET['max-age']) {
                    array_push($classiAge[$classe], $studente);
                }
            }
            $classiFiltrate = $classiAge;
        }
    }
    // Controllo l'età minima dello studente
    if ($_GET['min-age'] >= 15 && $_GET['min-age'] <= 100) {
        $classiAge = [];
        foreach ($classiFiltrate as $classe => $studenti) {
            $classiAge[$classe] = [];
            foreach ($studenti as $studente) {
                if ($studente['anni'] >= $_GET['min-age']) {
                    array_push($classiAge[$classe], $studente);
                }
            }
            $classiFiltrate = $classiAge;
        }
    }
}

// Controllo del testo cercato
if (isset($_GET['text-searched']) && !empty($_GET['text-searched'])) {
    $classiName = [];
    foreach ($classiFiltrate as $classe => $studenti) {
        $classiName[$classe] = [];
        foreach ($studenti as $studente) {
            $formattedName = strtolower($studente['nome']);
            $formattedSurname = strtolower($studente['cognome']);
            $formattedText = strtolower($_GET['text-searched']);
            if (str_contains($formattedName, $formattedText) || str_contains($formattedSurname, $formattedText)) {
                array_push($classiName[$classe], $studente);
            }
        }
        $classiFiltrate = $classiName;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snack 4</title>
    <!-- Bootstrap 5 -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css'
        integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=='
        crossorigin='anonymous' />
</head>

<body>
    <div class="container">
        <form class="form-control p-3 my-3 w-50 mx-auto" action="snacks4.php" method="GET">
            <h3 class="fw-semibold">Filtra:</h3>
            <!-- <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="voto-suff" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Voto sufficiente
                </label>
            </div> -->
            <div class="w-50 mb-3">
                <label class="form-label" for="text-searched">
                    Cerca:
                </label>
                <input class="form-control" id="text-searched" type="text-searched" name="text-searched"
                    value="<?= $_GET['text-searched'] ?>">
            </div>
            <div class="d-flex gap-3">
                <div class="w-50 mb-3">
                    <label class="form-label" for="max-age">
                        Età massima:
                    </label>
                    <input class="form-control" id="max-age" type="number" name="max-age" min="15" max="100"
                        value="<?= $_GET['max-age'] ?>">
                </div>
                <div class="w-50 mb-3">
                    <label class="form-label" for="min-age">
                        Età minima:
                    </label>
                    <input class="form-control" id="min-age" type="number" name="min-age" min="15" max="100"
                        value="<?= $_GET['min-age'] ?>">
                </div>
            </div>
            <div class="d-flex gap-3">
                <div class="w-50 mb-3">
                    <label class="form-label" for="voto-max">
                        Voto Massimo:
                    </label>
                    <input class="form-control" id="voto-max" type="number" name="voto-max" min="1" max="10"
                        value="<?= $_GET['voto-max'] ?>">
                </div>
                <div class="w-50 mb-3">
                    <label class="form-label" for="voto-min">
                        Voto Minimo:
                    </label>
                    <input class="form-control" id="voto-min" type="number" name="voto-min" min="1" max="10"
                        value="<?= $_GET['voto-min'] ?>">
                </div>
            </div>
            <div class="w-50 mb-3">
                <label class="form-label" for="fav-lang">
                    Linguaggio preferito:
                </label>
                <input type="text" class="form-control" id="fav-lang" name="fav-lang" value="<?= $_GET['fav-lang'] ?>">
            </div>
            <button type="submit" class="btn btn-primary px-4 me-2">Filtra</button>
            <button type="reset" class="btn btn-warning px-4">Reset</button>
        </form>
        <?php foreach ($classiFiltrate as $classe => $studenti) { ?>
            <div class="card p-4  my-4 rounded-3 mx-auto">
                <h2><?= $classe ?></h2>
                <div class="row">
                    <?php foreach ($studenti as $studente) { ?>
                        <div class="col-4">
                            <div class="card mb-3">
                                <img src="<?= $studente['immagine'] ?>" class="card-img-top" alt="<?= $studente['nome'] ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $studente['nome'] . ' ' . $studente['cognome'] ?></h5>
                                    <p class="card-text">Anni: <?= $studente['anni'] ?></p>
                                    <p class="card-text">Voto medio: <?= $studente['voto_medio'] ?></p>
                                    <p class="card-text">Linguaggio preferito: <?= $studente['linguaggio_preferito'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>

</body>

</html>