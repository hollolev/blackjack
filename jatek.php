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
            <div class="card-dealer" id="cardplayer1id">
                <p class="number" id="kartya1"></p>
            </div>

            <div class="card-dealer" style="background-color: darkgray;" id="cardplayer2id">
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
        <div id="player_cards" class="player-cards">

            <div class="card-player">
                <p class="playernumber" id="p_num1"></p>
            </div>

            <div class="card-player">
                <p class="playernumber" id="p_num2"></p>
            </div>
        </div>

        <button class="hit" onclick="hit()">Ütés</button>

        <button class="stand" onclick="stand()">Tart</button>

        <p id="osztolapok"></p>
        <p id="jatekoslapok"></p>
    </div>

    <script>
        function randomSzam() {
            const min = 2;
            const max = 11;
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        function csekk(number) {
            const lista = document.getElementsByClassName(number);
            var x = 0;
            for (let index = 0; index < lista.length; index++) {
                const element = lista[index];
                x = x + element.textContent * 1;
            }
            console.log(x);
            return x;
        }

        function vizsgalat() {
            if (csekk("number") > csekk("playernumber") && csekk("playernumber") > !21 && csekk("number") > !21) {
                alert("Az Osztó nyert!");
            } else if (csekk("playernumber") > csekk("number") && csekk("playernumber") > !21 && csekk("number") > !21) {
                alert("A Játékos nyert!");
            } else {
                alert("Döntetlen!");
            }
        }

        let clicked = false;

        function stand() {
            if (clicked) return;
            clicked = true;
            const randomSzam2 = Math.floor(Math.random() * 10) + 2;
            document.getElementById("cardplayer2id").style.backgroundColor = "white";
            const elem = document.getElementById("kartya2");
            elem.innerHTML = randomSzam2;

            csekk("number");

            setTimeout(() => {
                vizsgalat();
            }, 1000);
        }

        function hit() {
            if (clicked) return;
            const div = document.createElement("div");
            const p = document.createElement("p");
            div.classList.add("card-player");
            p.classList.add("playernumber");
            const random = randomSzam();
            p.textContent = random;

            document.getElementById("player_cards").appendChild(div);
            div.appendChild(p);

            const osszeg = csekk("playernumber");

            if (osszeg >= 21) {
                stand();
            }
        }

        const elem1 = document.getElementById("p_num1");
        elem1.innerHTML = randomSzam();
        const elem2 = document.getElementById("p_num2");
        elem2.innerHTML = randomSzam();
        const elem3 = document.getElementById("kartya1");
        elem3.innerHTML = randomSzam();

        window.onload = () => {
            csekk("number");
            csekk("playernumber");
        }




        // fetch("new.php")
        //     .then(res => res.text())
        //     .then(dat => {
        //         main(dat);
        //     })

        // function main(x) {
        //     console.log(x);
        // }
    </script>

</body>

</html>