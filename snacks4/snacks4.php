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


if (isset($_GET['voto-max']) && !empty($_GET['voto-max']) && $_GET['voto-max'] >= 1 && $_GET['voto-max'] <= 10) {
    $classiFiltrate = [];
    foreach ($classi as $classe => $studenti) {
        $classiFiltrate[$classe] = [];
        foreach ($studenti as $studente) {
            if ($studente['voto_medio'] <= $_GET['voto-max']) {
                array_push($classiFiltrate[$classe], $studente);
            }
        }
    }
} else {
    $classiFiltrate = $classi;
}
if (isset($_GET['fav-lang']) && !empty($_GET['fav-lang'])) {
    $currentArray = [];
    foreach ($classiFiltrate as $classe => $studenti) {
        $currentArray[$classe] = [];
        foreach ($studenti as $studente) {
            if (strtolower($studente['linguaggio_preferito']) === strtolower($_GET['fav-lang'])) {
                array_push($currentArray[$classe], $studente);
            }
        }
        $classiFiltrate = $currentArray;
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
        <form class="form-control p-3 mb-3" action="snacks4.php" method="GET">
            <h3 class="fw-semibold">Filtra:</h3>
            <!-- <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="voto-suff" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Voto sufficiente
                </label>
            </div> -->
            <div class="w-25 mb-3">
                <label class="form-label" for="flexCheckDefault">
                    Voto Massimo:
                </label>
                <input class="form-control" type="number" name="voto-max" min="1" max="10">
            </div>
            <div class="w-25 mb-3">
                <label class="form-label" for="flexCheckDefault">
                    Linguaggio preferito:
                </label>
                <input class="form-control" type="text" name="fav-lang">
            </div>
            <button type="submit" class="btn btn-primary px-4 me-2">Filtra</button>
            <button type="reset" class="btn btn-warning px-4">Reset</button>
        </form>
        <?php foreach ($classiFiltrate as $classe => $studenti) { ?>
            <div class="card p-3 my-4 rounded-3">
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