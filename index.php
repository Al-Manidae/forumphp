<?php
    require_once "controllers/deco.php";

    require_once "includes/head.php";
?>

    <title>Lunarpunk : Acceuil</title>
    <link rel="stylesheet" href="css/homeOut.css">
</head>
<body>
<div id="bg_grad"></div>

<header class="offline">
    <h1>Lunarpunk</h1>
    <h2>Acceuil</h2>
</header>

<main>
    <div class="accountBox">
        <img src="images/icon-register.svg" alt="icone d'inscription">
        <p>Vous êtes nouveau ici ?</p>
        <button onclick="location.href='view/register.php'" class="yellow" type="button">Créez un compte</button>
    </div>
    <div class="accountBox">
        <img src="images/icon-logIn.svg" alt="icone de connexion">
        <p>Vous avez déjà un compte ?</p>
        <button onclick="location.href='view/login.php'" class="yellow">Connectez-vous</button>
    </div>
</main>

</body>
</html>