<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunarpunk : Acceuil</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Stalinist+One|Oxanium|Barlow">
    <link rel="stylesheet" href="../css/resetCSS.css">
    <link rel="stylesheet" href="../css/styleGlobal.css">
    <link rel="stylesheet" href="../css/homeOnline.css">
</head>
<body>
<div id="bg_grad"></div>

<header class="online">
    <div>
        <a href=""><h1>Lunarpunk</h1></a>
        <h2>Acceuil</h2>        
    </div>
    <ul class="infoConnect">
        <li>Bienvenue <span id="nom"></span></li>
        <li>Nous sommes le : <span id="date"></li>
        <li>Vous vous êtes connecté à : <span id="heure"></li>
    </ul>
    <img id="burgerOpn" class="burgerBtn" src="../images/menu-burger.svg" alt="menu burger">
    <div id="overlay" class="overlay hidden"></div>
    <section id="burgerModal" class="burgerModal hidden">
        <img id="burgerClo" class="burgerBtn" src="../images/close-burger.svg" alt="menu burger">
        <ul class="navbar">
            <li>
                <button onclick="location.href='register.html'" class="blue" type="button">Acceuil</button>
            </li>
            <li>
                <button onclick="location.href='register.html'" class="blue" type="button">Fer et Chrome</button>
            </li>
            <li>
                <button onclick="location.href='register.html'" class="blue" type="button">Boulots de Merc</button>
            </li>
            <li>
                <button onclick="location.href='register.html'" class="blue" type="button">Quotidien</button>
            </li>
        </ul>
        <ul class="modalInfoConnect">
            <li>Bienvenue <span id="modalNom"></span></li>
            <li>Nous sommes le : <span id="modalDate"></li>
            <li>Vous vous êtes connecté à : <span id="modalHeure"></li>
        </ul>
        <button onclick="location.href='../index.html'" class="yellow deconnexion" type="button">Déconnexion <img src="../images/icon-logOut.svg" alt="icone de Déconnexion"></button>
    </section>
</header>

<main>
    <div id="categoryList">
        <div class="categorie">
            <h3>Fer et Chrome</h3>
            <img src="../images/IronAndChrome.png" alt="illutration de la categorie Fer et Chrome">
            <p>Lorem ipsum dolor sit amet consectetur. Nisl venenatis urna pellentesque nibh.</p>
            <button onclick="location.href='forum-ironNchrome.html'" class="yellow" type="button">Discuter de ce sujet</button>
        </div>
        <div class="categorie">
            <h3>Boulots de Merc</h3>
            <img src="../images/MercWork.png" alt="illutration de la categorie Boulots de Merc">
            <p>Lorem ipsum dolor sit amet consectetur. Nisl venenatis urna pellentesque nibh.</p>
            <button onclick="location.href='forum-mercWork.html'" class="yellow" type="button">Discuter de ce sujet</button>
        </div>
        <div class="categorie">
            <h3>Quotidien</h3>
            <img src="../images/DailyLife.png" alt="illutration de la categorie Quotidien">
            <p>Lorem ipsum dolor sit amet consectetur. Nisl venenatis urna pellentesque nibh.</p>
            <button onclick="location.href='forum-dailyLife.html'" class="yellow" type="button">Discuter de ce sujet</button>
        </div>
    </div>

    <nav id="navigation">
        <ul class="navbar">
            <li>
                <button onclick="location.href='forum-home.html'" class="blue" type="button">Acceuil</button>
            </li>
            <li>
                <button onclick="location.href='forum-ironNchrome.html'" class="blue" type="button">Fer et Chrome</button>
            </li>
            <li>
                <button onclick="location.href='forum-mercWork.html'" class="blue" type="button">Boulots de Merc</button>
            </li>
            <li>
                <button onclick="location.href='forum-dailyLife.html'" class="blue" type="button">Quotidien</button>
            </li>
        </ul>
        <button onclick="location.href='../index.html'" class="yellow deconnexion" type="button">Déconnexion <img src="../images/icon-logOut.svg" alt="icone de Déconnexion"></button>
    </nav>
</main>

<script src="../javascript/headerOnline.js"></script>
</body>
</html>