<?php
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    require_once "../controllers/deco.php";
    require_once "../includes/head.php";
    require_once "../controllers/loginControl.php";
?>
    <title>Lunarpunk : Connexion</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<div id="bg_grad"></div>

<header class="offline">
    <a href="../index.php"><h1>Lunarpunk</h1></a>
    <h2>Connexion</h2>
</header>

<main>
    <form  action="../controllers/loginControl.php" id="signup" class="form" method="post">
        <div class="form-field">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email"
            autocomplete="off" placeholder="E-mail">
            <?php
            if (isset($_SESSION["errorMail"]) && $_SESSION["errorMail"]==1) {
                echo '<small>Adresse mail incorrect</small>';
            }
            ?>
        </div>

        <div class="form-field">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password"
            autocomplete="off" placeholder="Mot de passe">
            <?php
            if (isset($_SESSION["errorMdp"]) && $_SESSION["errorMdp"]==1) {
                echo '<small>Mot de passe incorrect</small>';
            }
            ?>
        </div>

        <div id="divSubmit" class="form-field error success">
            <input id="submit" type="submit" value="Vous connecter">
        </div>
    </form>
    <div class="accountBox">
        <img src="../images/icon-register.svg" alt="icone d'inscription">
        <p>Vous êtes nouveau ici ?</p>
        <button onclick="location.href='register.php'" class="yellow" type="button">Créer le compte</button>
    </div>
</main>

</body>
</html>