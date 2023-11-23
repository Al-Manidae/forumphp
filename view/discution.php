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
    
    $reqMsg = "SELECT message.idMsg, message.timeMsg, message.contentMsg , message.idDiscu, message.idUser FROM message JOIN utilisateur ON utilisateur.idUser=message.idUser JOIN discution ON discution.idDiscu=message.idDiscu WHERE discution.idDiscu='".$_GET['id']."' ORDER BY message.idMsg DESC";

    if ($_SERVER['REQUEST_METHOD']==='POST') {
        $sujet= $_POST['discussionTitle'];
        $date = new DateTime() ;

        if ($sujet=='') {
            header('location: ../view/forum-dailyLife.php');
        }else{
            $req = $con ->prepare('INSERT INTO discution (nameDiscu, timeStartDiscu, idCat, idUser) VALUES (?,?,?,?)');
            $req -> execute(array($sujet, $date->format('d/m/Y à H:i:s'), 3, $_SESSION['idUser']) );
            header('refresh : 0 ; url=../view/forum-dailyLife.php');
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
                </tr>
                
            </tbody>
        </table>
        
        <div id="subjectHeader">
            <p>Votre commentaire</p>
            <div>
                <textarea name="myInput" id="myInput" placeholder="Votre commentaire" rows="5" cols="33"></textarea>
                <button onclick="newElement()" class="yellow" type="button">Commenter</button>
            </div>
        </div>
    </div>

    <?php
    require_once "../includes/navbar.php";
    ?>
</main>

<script src="../javascript/discussion.js"></script>
<script src="../javascript/headerOnline.js"></script>
</body>
</html>