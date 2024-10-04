<!-- Con un form passare come parametri GET name, mail e age e verificare (cercando i metodi che non conosciamo nella documentazione) che name sia più lungo di 3 caratteri, che mail contenga un punto e una chiocciola e che age sia un numero. Se tutto è ok stampare "Accesso riuscito", altrimenti "Accesso negato" -->

<?php
$name = $_GET['name'];
$mail = $_GET['mail'];
$age = $_GET['age'];

if (strlen($name) > 3 && is_numeric($age)) {
    echo 'Accesso riuscito';
} else {
    echo 'Accesso negato';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snacks 2</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css'
        integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=='
        crossorigin='anonymous' />
</head>

<body>
    <form class="w-50" action="snacks2.php" method="GET">
        <div class="mb-3">
            <input class="form-control" type="text" name="name" id="name" placeholder="Name">
        </div>
        <div class="mb-3">
            <input class="form-control" type="email" name="mail" placeholder="Mail">
        </div>
        <div class="mb-3">
            <input class="form-control" type="text" name="age" placeholder="Age">
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</body>

</html>