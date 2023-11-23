<?php
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    // if (!isset($_SESSION["user"])) {
    //     header('location: ../index.php');
    // } Fonctionne pas encore
    require_once "../includes/head.php";
    require_once "../includes/connectBd.php";
    $con = connectdb();

    date_default_timezone_set("Europe/Paris");

    $req = "SELECT * FROM discution WHERE idDiscu='".$_GET['id']."'";
    $res = $con->query($req);
    $row = $res->fetch();
    
    $reqMsg = "SELECT message.idMsg, message.timeMsg, message.contentMsg , message.idDiscu, message.idUser, utilisateur.nomUser, utilisateur.prenomUser FROM message JOIN utilisateur ON utilisateur.idUser=message.idUser JOIN discution ON discution.idDiscu=message.idDiscu WHERE discution.idDiscu='".$_GET['id']."' ORDER BY message.idMsg DESC";
    $resMsg = $con->query($reqMsg);
    $rowMsg = $resMsg->fetchAll();

    if ($_SERVER['REQUEST_METHOD']==='POST') {
        $msg= $_POST['myInput'];
        $date = new DateTime() ;

        if ($msg=='') {
            header('refresh : 0');
        }else{
            $req = $con ->prepare('INSERT INTO message (timeMsg, contentMsg, idDiscu , idUser) VALUES (?,?,?,?)');
            $req -> execute(array($date->format('d/m/Y H:i'), $msg, $_GET['id'], $_SESSION['idUser']) );
            header('refresh : 0');
        }
    }

?>
    <title>Lunarpunk : Forum - Discussion
    </title>
    <link rel="stylesheet" href="../css/discussion.css">
</head>
<body>
<div id="bg_grad"></div>

<header class="online">
    <div>
        <a href=""><h1>Lunarpunk</h1></a>
        <h2>Forum</h2>        
    </div>
    <?php
    require_once "../includes/header.php";
    ?>
</header>

<main>
    <div id="subjects">
        <h3>Forum - Discussion</h3>        
        <?php
        echo '<h3>'.$row['nameDiscu'].'</h3>';
        ?>
        <table>
            <tbody id="subjectList">
                <tr>
                    <td class="infoAutor">[compte supprimé] le 04/11/2074 (10:44)</td>
                    <td>[message supprimé par la moderation]</td>
                    <?php                    
                    foreach ($rowMsg as $row) {
                        echo '
                            <tr>
                                <td class="infoAutor">'.$row['nomUser'].' '.$row['prenomUser'].' le '.$row['timeMsg'].'</td>';
                                echo nl2br('<td>'.$row['contentMsg'].'</td>');
                        echo '</tr>';
                    }
                    ?>
                </tr>
                
            </tbody>
        </table>
        
        <div id="subjectHeader">
            <p>Votre commentaire</p>
            <form method="post">
                <textarea name="myInput" id="myInput" placeholder="Votre commentaire" rows="5" cols="33"></textarea>
                <button class="yellow" type="submit">Commenter</button>
            </form>
        </div>
    </div>

    <?php
    require_once "../includes/navbar.php";
    ?>
</main>

<script src="../javascript/headerOnline.js"></script>
</body>
</html>