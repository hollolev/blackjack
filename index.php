<?php session_start() ?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlackJack</title>
    <link rel="stylesheet" href="style.css">

    <link rel="apple-touch-icon" sizes="180x180" href="kep/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="kep/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="kep/favicon-16x16.png">
    <link rel="manifest" href="kep/site.webmanifest">
</head>

<body>
    <div class="card">
        <h1><img id="logo" src="kep/playing-cards.svg" alt="kep">BlackJack</h1>
        <form action="jatek.html">
            <div>
                <h2>Adj meg egy összeget ($):</h2>
                <?php $_SESSION["bank"] = '<input type="number">'; ?>
                
            </div>
            <button id="start" type="submit">START</button>
        </form>
    </div>
</body>

</html>
