<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

require_once "../includes/connectBd.php";

$con = connectdb();

if ($_SERVER['REQUEST_METHOD']==='POST') { // récupère toutes les données du formulaire lors de la soumission
    $nom = $_POST['surname']; // variable nom sur le formulaire
    $prenom = $_POST['firstname']; // variable prénom sur le formulaire
    $mail = $_POST['email']; // variable mail sur le formulaire
    $mailExist = $con->prepare('SELECT * FROM utilisateur WHERE mailUser=?'); //recherche toutle s mail dans le bdd
    $mailExist->execute([$mail]); //vérifie si le mail du form existe dans la bdd
    $user = $mailExist->fetch(); //vas chercher le mail dans la bdd
    $mdp = $_POST['password']; // variable MDP sur le formulaire
    $mdpHash = password_hash($mdp, PASSWORD_BCRYPT); // cryptage du mot de passe
    $confirm_password = $_POST['confirm-password']; // variable confirm-password sur le formulaire
    $ppLocation = '../images/profiles/'; // chemin du répertoire vers les photos de profil
    $uploadPP = $ppLocation.basename($_FILES['profile-picture']['name']); // upload de la photo sélectionnée
    move_uploaded_file($_FILES['profile-picture']['tmp_name'], $uploadPP); // copie de la photo vers le répertoire désigné
    date_default_timezone_set('Europe/Paris'); // utc+1 pour l'heure
    $regmail = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
    $regpass = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[#\^\+\-\[\]])(?=.{8,})/';

    if ($nom=='') { // on vérifie si toutes les conditions sont fausses ou vides
        $_SESSION['errorNom']=1;
        $_SESSION['errorPrenom']=0;
        $_SESSION['errorMailRegister']=0;
        $_SESSION['errorMailExist']=0;
        $_SESSION['errorMdpRegister']=0;
        $_SESSION['errorMdpConfirm']=0;
        header('location: ../view/register.php'); // si une erreur est détectés, retour au register
    }else if ($prenom== ''){
        $_SESSION['errorNom']=0;
        $_SESSION['errorPrenom']=1;
        $_SESSION['errorMailRegister']=0;
        $_SESSION['errorMailExist']=0;
        $_SESSION['errorMdpRegister']=0;
        $_SESSION['errorMdpConfirm']=0;
        header('location: ../view/register.php'); 
    }else if ($mail=='' || !preg_match($regmail, $mail)){
        $_SESSION['errorNom']=0;
        $_SESSION['errorPrenom']=0;
        $_SESSION['errorMailRegister']=1;
        $_SESSION['errorMailExist']=0;
        $_SESSION['errorMdpRegister']=0;
        $_SESSION['errorMdpConfirm']=0;
        header('location: ../view/register.php'); 
    }else if ($user){
        $_SESSION['errorNom']=0;
        $_SESSION['errorPrenom']=0;
        $_SESSION['errorMailRegister']=0;
        $_SESSION['errorMailExist']=1;
        $_SESSION['errorMdpRegister']=0;
        $_SESSION['errorMdpConfirm']=0;
        header('location: ../view/register.php'); 
    }else if ($mdp=='' || !preg_match($regpass, $mdp)){
        $_SESSION['errorNom']=0;
        $_SESSION['errorPrenom']=0;
        $_SESSION['errorMailRegister']=0;
        $_SESSION['errorMailExist']=0;
        $_SESSION['errorMdpRegister']=1;
        $_SESSION['errorMdpConfirm']=0;
        header('location: ../view/register.php'); 
    }else if ($confirm_password!=$mdp){
        $_SESSION['errorNom']=0;
        $_SESSION['errorPrenom']=0;
        $_SESSION['errorMailRegister']=0;
        $_SESSION['errorMailExist']=0;
        $_SESSION['errorMdpRegister']=0;
        $_SESSION['errorMdpConfirm']=1;
        header('location: ../view/register.php'); 
    }else{ // si tout est bon
        $_SESSION['errorNom']=0;
        $_SESSION['errorPrenom']=0;
        $_SESSION['errorMailRegister']=0;
        $_SESSION['errorMailExist']=0;
        $_SESSION['errorMdpRegister']=0;
        $_SESSION['errorMdpConfirm']=0;
        $date=new DateTime(); // définition d'une nouvelle date/heure à l'instant de l'inscription
        $req= $con-> prepare('INSERT INTO utilisateur (nomUser, prenomUser, mailUser, mdpUser, profilePictureUser, dateRegister) VALUES (?, ?, ?, ?, ?, ?)'); // préparation à l'insertion des données dans la table utilisateur de la BDD
        $req->execute(array($nom, $prenom, $mail, $mdpHash, $uploadPP, $date-> format('d/m/Y'))); // insertion des valeurs dans la table utilisateur de la BDD ; $date-> format('d/m/Y') format personalisé de la date
        header('location: ../view/login.php'); // renvoie sur le login
    }

}


?>