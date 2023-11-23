<?php
if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();

require_once "../includes/connectBd.php";

$con = connectdb();

if ($_SERVER['REQUEST_METHOD'] === 'POST') { //récup données du form
    $mail = $_POST['email'];
    $mdp = $_POST['password'];
    $mailExist = $con->prepare('SELECT * FROM utilisateur WHERE mailUser=?'); //recherche toutle s mail dans le bdd
    $mailExist->execute([$mail]); //vérifie si le mail du form existe dans la bdd
    $user = $mailExist->fetch(); //vas chercher le mail dans la bdd
    $pass = 'SELECT * FROM utilisateur Where mailUser = "' . $_POST['email'] . '"'; //cherche le mdp corespondant au mail du form
    $responce = $con->query($pass); //execution de la recherche
    $row = $responce->fetch(); //va cercher le mdp dans la bdd
    date_default_timezone_set('Europe/Paris'); // utc+1 pour l'heure
    if (!$user) {
        $_SESSION['errorMail']=1;
        $_SESSION['errorMdp']=0;
        header('location: ../view/login.php'); //si tout condistion fausse, reste sur la page login
    } else if (!password_verify($mdp, $row['mdpUser'])) {
        $_SESSION['errorMdp']=1;
        $_SESSION['errorMail']=0;
        header('location: ../view/login.php');
    } else {
        $_SESSION['errorMdp']=0;
        $_SESSION['errorMail']=0;
        $_SESSION['user']=1;
        header('location: ../view/forum-home.php'); //si tout condistion vrai, envois sur la page forum
    }

}

// if (!$user || !password_verify($mdp, $row['mdpUser'])) {
//     header('location: ../view/login.php'); //si tout condistion fausse, reste sur la page login
// }else{
//     header('location: ../view/forum-home.php'); //si tout condistion vrai, envois sur la page forum
// }
?>