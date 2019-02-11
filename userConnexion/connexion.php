<?php
require_once 'connexionbdd.php';
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['userLogin'])) {
    header('Location: index.php');
}
if (!empty($_POST)){
    $req = $pdo->prepare('SELECT * FROM user WHERE userLogin = :userLogin');
    $req->execute([
        'userLogin' => $_POST['userLogin']
    ]);
    $res = $req->fetch(PDO::FETCH_ASSOC);
    $mdpCorrect = password_verify($_POST['userMdp'], $res['userMdp']);
    if (!$res || !$mdpCorrect) {
        echo 'Mauvais login ou mot de passe !';
    } else {
        $_SESSION['idUser'] = $res['idUser'];
        $_SESSION['userLogin'] = $res['userLogin'];
        header('Location: index.php');
    }
}
?>

<form action="connexion.php" method="POST">
    <label for="userLogin">Login : </label><input type="text" name="userLogin" id="login"><br>
    <label for="userMdp">Mot de passe : </label><input type="password" name="userMdp" id="motdepasse"><br>
    <input type="submit" value="Se connecter">
</form>
<p><a href="inscription.php">Je n'ai pas encore de compte</a></p>
<p> <a href="index.php">Acceder aux articles</a> </p>
