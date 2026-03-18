<?php session_start(); ?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlackJack</title>
    <link rel="stylesheet" href="jatek.css">

    <link rel="apple-touch-icon" sizes="180x180" href="kep/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="kep/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="kep/favicon-16x16.png">
    <link rel="manifest" href="kep/site.webmanifest">
</head>

<body>
    <div class="container">
        <h2>Osztó</h2>
        <div class="dealer-cards">
            <div class="card-dealer" style="background-color: darkgray"; id="cardplayer1id" onclick="myFunction()">
                <p class="number" id="kartya1"></p>
            </div>

            <div class="card-dealer" style="background-color: darkgray;" id="cardplayer2id" onclick="myFunction2()">
                <p class="number" id="kartya2"></p>
            </div>
        </div>
        <div class="bet">
            <h3>Bank: $<?php echo $_SESSION['bank']; ?> </h3>
            <div class="bet-body">
                <p style="margin-left: 30px;">Tét: $<?php echo $_SESSION['tet']; ?> </p>
            </div>
            <div class="bet-buttons">
                <button class="bet-button" id="plus">+</button>
                <button class="bet-button" id="minus">-</button>
            </div>
        </div>

        <h2>Játékos</h2>
        <div class="player-cards">

            <div class="card-player">
                <p class="number"> <?php echo rand(2, 11); ?> </p>
            </div>

            <div class="card-player">
                <p class="number"> <?php echo rand(2, 11); ?> </p>
            </div>
        </div>

        <button class="hit">Ütés</button>

        <form method="post">
            <button class="stand">Tart</button>
        </form>
    </div>

    <script>
        let clicked1 = false;

        function myFunction() {
            if (clicked1) return;
            clicked1 = true;
            const randomSzam1 = Math.floor(Math.random() * 10) + 2;
            document.getElementById("cardplayer1id").style.backgroundColor = "white";
            const elem = document.getElementById("kartya1");
            elem.innerHTML = randomSzam1;
        }

        let clicked2 = false;

        function myFunction2() {
            if (clicked2) return;
            clicked2 = true;
            const randomSzam2 = Math.floor(Math.random() * 10) + 2;
            document.getElementById("cardplayer2id").style.backgroundColor = "white";
            const elem = document.getElementById("kartya2");
            elem.innerHTML = randomSzam2;
        }

        fetch("new.php")
        .then( res => res.text() )
        .then( dat => { main(dat); })
        function main(x){
            console.log(x);
        }
    </script>

</body>

</html>