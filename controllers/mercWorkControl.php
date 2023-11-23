<?php
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    require_once "../includes/connectBd.php";
    $con = connectdb();

    date_default_timezone_set("Europe/Paris");

    $req = "SELECT discution.idDiscu, discution.nameDiscu, discution.timeStartDiscu, discution.idCat, discution.idUser, utilisateur.nomUser, utilisateur.prenomUser FROM discution JOIN utilisateur ON utilisateur.idUser=discution.idUser WHERE idCat=2";
    $res = $con->query($req);
    $rows = $res->fetchAll();

    if ($_SERVER['REQUEST_METHOD']==='POST') {
        $sujet= $_POST['discussionTitle'];
        $date = new DateTime() ;

        if ($sujet=='') {
            header('location: ../view/forum-mercWork.php');
        }else{
            $req = $con ->prepare('INSERT INTO discution (nameDiscu, timeStartDiscu, idCat, idUser) VALUES (?,?,?,?)');
            $req -> execute(array($sujet, $date->format('d/m/Y à H:i:s'), 2, $_SESSION['idUser']) );
            header('refresh : 0 ; url=../view/forum-mercWork.php');
        }
    }





?>