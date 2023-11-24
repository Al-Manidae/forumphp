<?php
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();

    if (!isset($_SESSION["user"]) || empty($_SESSION["user"])) {
        header('location: ../index.php');
    }

    require_once "../includes/head.php";
    require_once "../controllers/mercWorkControl.php";
?>
    <title>Lunarpunk : Forum - Boulots de Merc</title>
    <link rel="stylesheet" href="../css/category.css">
</head>
<body>
<div id="bg_grad"></div>

<header class="online">
    <div>
        <a href="forum-home.php"><h1>Lunarpunk</h1></a>
        <h2>Forum</h2>        
    </div>
    <?php
    require_once "../includes/header.php";
    ?>
</header>

<main>
    <div id="subjects">
        <div id="subjectHeader">
            <h3>Forum - Boulots de Merc</h3>
            <form action="../controllers/mercWorkControl.php" method="post">
                <input type="text" name="discussionTitle" id="discussionTitle" placeholder="Titre du sujet">
                <button class="yellow" type="submit">Créer un sujet</button>
            </form>
        </div>
        
        <table>
            <tbody id="subjectList">
                <?php
                foreach ($rows as $row) {
                    echo'
                    <tr>
                        <td><a href="discution.php?id='.$row['idDiscu'].'">'.$row['nameDiscu'].'</a></td>
                        <td class="infoAutor"><a href="discution.php?id='.$row['idDiscu'].'">Créé le '.$row['timeStartDiscu'].' par '.$row['nomUser'].' '.$row['prenomUser'].'</a></td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    require_once "../includes/navbar.php";
    ?>
</main>

<!-- <script src="../javascript/subjects.js"></script> -->
<script src="../javascript/headerOnline.js"></script>
</body>
</html>