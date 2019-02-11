<?php

if (!isset($_SESSION['idUser']) && !isset($_SESSION['userLogin'])) {
    header('Location: connexion.php');
}
?>
