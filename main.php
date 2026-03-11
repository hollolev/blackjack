<?php
session_start();

if (isset($_POST['kezdoertek'])) {
    $kezdoertek = $_POST['kezdoertek'];
    $_SESSION['kezdoertek'] = $kezdoertek;
    header('Location: jatek.php');
} else {
    header('Location: index.php');
}

$tet = 100;
$_SESSION['tet'] = $tet;
$_SESSION['bank'] = $kezdoertek - $tet;

?>