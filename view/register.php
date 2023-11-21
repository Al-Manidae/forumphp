<?php
    require_once "../includes/head.php";
?>
    <title>Lunarpunk : Nouveau compte</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Stalinist+One|Oxanium|Barlow">
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
<div id="bg_grad"></div>

<header class="offline">
    <a href="../index.html"><h1>Lunarpunk</h1></a>
    <h2>Nouveau compte</h2>
</header>

<main>
    <form action="../controllers/registerControl.php" id="signup" class="form">
        <div class="form-field">
            <label for="surname">Nom : </label>
            <input type="text" name="surname" id="surname"
            autocomplete="off" placeholder="Nom">
            <small></small>
        </div>

        <div class="form-field">
            <label for="firstname">Prénom : </label>
            <input type="text" name="firstname" id="firstname"
            autocomplete="off" placeholder="Prénom">
            <small></small>
        </div>

        <div class="form-field">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email"
            autocomplete="off" placeholder="E-mail">
            <small></small>
        </div>

        <div class="form-field">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password"
            autocomplete="off" placeholder="Mot de passe">
            <small></small>
        </div>

        <div class="form-field">
            <label for="confirm-password">Confirmez le mot de passe</label>
            <input type="password" name="confirm-password"
            id="confirm-password" autocomplete="off" placeholder="Confirmez le mot de passe">
            <small></small>
        </div>

        <div id="divSubmit" class="form-field error success">
            <input id="submit" type="submit" value="Créer le compte">
        </div>
    </form>
    <div class="accountBox">
        <img src="../images/icon-logIn.svg" alt="icone de connexion">
        <p>Vous avez déjà un compte ?</p>
        <button onclick="location.href='login.html'" class="yellow">Connectez-vous</button>
    </div>
</main>

<!-- <script src="../javascript/signUp.js"></script> -->
</body>
</html>