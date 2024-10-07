<!-- Creare una funzione che controlli se una parola (o una frase) sia palindroma, senza usare funzioni built-in, e ritorni true se lo e', false altrimenti. Testarla attraverso una chiamata GET via form. -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snack 5</title>
    <!-- Bootstrap 5 -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css'
        integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=='
        crossorigin='anonymous' />
</head>

<body>
    <form action="function.php" method="GET" class="p-2">
        <div class="mb-3">
            <label class="form-label" for="user-text">Inserisci una parola:</label>
            <input class="form-control w-25" id="user-text" type="text" name="userText">

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>