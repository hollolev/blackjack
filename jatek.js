const refreshBtn = document.getElementById("btnRefresh");

function handleClick() {
  window.location.reload();
}
refreshBtn.addEventListener("click", handleClick);

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
  const playerScore = csekk("playernumber");
  const dealerScore = csekk("number");

  console.log("Játékos pontszám:", playerScore);
  console.log("Osztó pontszám:", dealerScore);

  if (playerScore > 21) {
    alert("Az Osztó nyert!");
    return;
  }

  if (dealerScore > 21) {
    alert("A Játékos nyert!");
    return;
  }

  if (playerScore > dealerScore) {
    alert("A Játékos nyert!");
  } else if (dealerScore > playerScore) {
    alert("Az Osztó nyert!");
  } else {
    alert("Döntetlen!");
  }
}

function ujlap() {
  setTimeout(() => {
    const playerScore = csekk("playernumber");
    const dealerScore = csekk("number");

    if (playerScore <= 21 && dealerScore < 21 && playerScore >= dealerScore) {
      const div = document.createElement("div");
      const p = document.createElement("p");
      div.classList.add("card-dealer");
      p.classList.add("number");
      const random = randomSzam();
      p.textContent = random;

      document.getElementById("dealer_cards").appendChild(div);
      div.appendChild(p);
    }
  }, 1000);
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

  ujlap();

  setTimeout(() => {
    vizsgalat();
  }, 2000);
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
};

// fetch("new.php")
//     .then(res => res.text())
//     .then(dat => {
//         main(dat);
//     })

// function main(x) {
//     console.log(x);
// }
