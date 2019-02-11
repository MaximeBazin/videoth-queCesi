<?php
try{
    $dns_bdd = 'mysql:host=mysql-maximebazin.alwaysdata.net;dbname=maximebazin_videotheque';
    $user_bdd = '170198_max';
    $pass_bdd = 'fuck';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    $pdo = new PDO($dns_bdd, $user_bdd, $pass_bdd, $options);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
 ?>
