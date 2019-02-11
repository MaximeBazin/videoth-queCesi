<?php
require_once 'connexionbdd.php';
session_start();
if (isset($_SESSION['idUser']) && isset($_SESSION['userLogin'])) {
    header('Location: index.php');
}
if (!empty($_POST)){
    $req = $pdo->prepare('INSERT INTO user (userLogin, userMdp)
    VALUES (:userLogin, :userMdp)');
    $req->execute([
        'userLogin' => $_POST['userLogin'],
        'userMdp' => password_hash($_POST['userMdp'], PASSWORD_DEFAULT),
    ]);
    header('Location: connexion.php');
}
?>
<form action="inscription.php" method="POST">
    <label for="userLogin">Login : </label> <input type="text" name="userLogin" id="login"><br>
    <label for="userMdp">Mot de passe : </label> <input type="password" name="userMdp" id="motdepasse"><br>
    <input type="submit" value="S'inscrire">
</form>
<p><a href="connexion.php">J'ai déjà un compte</a></p>
