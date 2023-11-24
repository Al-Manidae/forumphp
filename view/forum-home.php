<?php
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();

    if (!isset($_SESSION["user"]) || empty($_SESSION["user"])) {
        header('location: ../index.php');
    }

    require_once "../includes/head.php";
?>
    <title>Lunarpunk : Acceuil</title>
    <link rel="stylesheet" href="../css/homeOnline.css">
</head>
<body>
<div id="bg_grad"></div>

<header class="online">
    <div>
        <h1>Lunarpunk</h1>
        <h2>Acceuil</h2>        
    </div>
    <?php
    require_once "../includes/header.php";
    ?>
</header>

<main>
    <div id="categoryList">
        <div class="categorie">
            <h3>Fer et Chrome</h3>
            <img src="../images/IronAndChrome.png" alt="illutration de la categorie Fer et Chrome">
            <p>Lorem ipsum dolor sit amet consectetur. Nisl venenatis urna pellentesque nibh.</p>
            <button onclick="location.href='forum-ironNchrome.php'" class="yellow" type="button">Discuter de ce sujet</button>
        </div>
        <div class="categorie">
            <h3>Boulots de Merc</h3>
            <img src="../images/MercWork.png" alt="illutration de la categorie Boulots de Merc">
            <p>Lorem ipsum dolor sit amet consectetur. Nisl venenatis urna pellentesque nibh.</p>
            <button onclick="location.href='forum-mercWork.php''" class="yellow" type="button">Discuter de ce sujet</button>
        </div>
        <div class="categorie">
            <h3>Quotidien</h3>
            <img src="../images/DailyLife.png" alt="illutration de la categorie Quotidien">
            <p>Lorem ipsum dolor sit amet consectetur. Nisl venenatis urna pellentesque nibh.</p>
            <button onclick="location.href='forum-dailyLife.php'" class="yellow" type="button">Discuter de ce sujet</button>
        </div>
    </div>

    <?php
    require_once "../includes/navbar.php";
    ?>
</main>

<script src="../javascript/headerOnline.js"></script>
</body>
</html>