<?php
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
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
        </div>

        <div class="form-field">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password"
            autocomplete="off" placeholder="Mot de passe">
        </div>
        
        <div class="form-field">
            <?php
            if (isset($_SESSION["errorInfo"]) && $_SESSION["errorInfo"]==1) {
                echo '<small>Adresse mail ou mots de passe incorrect</small>';
            }elseif (isset($_SESSION["errorActive"]) && $_SESSION["errorActive"]==1) {
                echo '<small>Ce compte n\'a pas encore été activé.</small>';
            }else {
                # pas d'erreur
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