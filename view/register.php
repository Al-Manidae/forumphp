<?php
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    require_once "../includes/head.php";
    require_once "../controllers/registerControl.php";
?>
    <title>Lunarpunk : Nouveau compte</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Stalinist+One|Oxanium|Barlow">
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
<div id="bg_grad"></div>

<header class="offline">
    <a href="../index.php"><h1>Lunarpunk</h1></a>
    <h2>Nouveau compte</h2>
</header>

<main>
    <form action="../controllers/registerControl.php" method="post" id="signup" class="form" enctype="multipart/form-data">
        <div class="form-field">
            <label for="surname">Nom : </label>
            <input type="text" name="surname" id="surname"
            autocomplete="off" placeholder="Nom">
            <?php
            if (isset($_SESSION["errorNom"]) && $_SESSION["errorNom"]==1) {
                echo '<small>Renseignez un nom</small>';
            }
            ?>
        </div>

        <div class="form-field">
            <label for="firstname">Prénom : </label>
            <input type="text" name="firstname" id="firstname"
            autocomplete="off" placeholder="Prénom">
            <?php
            if (isset($_SESSION["errorPrenom"]) && $_SESSION["errorPrenom"]==1) {
                echo '<small>Renseignez un prénom</small>';
            }
            ?>
        </div>

        <div class="form-field">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email"
            autocomplete="off" placeholder="E-mail">
            <?php
            if (isset($_SESSION["errorMailRegister"]) && $_SESSION["errorMailRegister"]==1) {
                echo '<small>Renseignez une adresse email valide</small>';
            }
            if (isset($_SESSION["errorMailExist"]) && $_SESSION["errorMailExist"]==1) {
                echo '<small>Adresse email déjà utilisé</small>';
            }
            ?>
        </div>

        <div class="form-field">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password"
            autocomplete="off" placeholder="Mot de passe">
            <?php
            if (isset($_SESSION["errorMdpRegister"]) && $_SESSION["errorMdpRegister"]==1) {
                echo '<small>Le mot de passe doit avoir au moins 8 caractères, dont une minuscule,une majuscule, un chiffre et un caractère spécial parmi les suivants #+-^[]</small>';
            }
            ?>
        </div>

        <div class="form-field">
            <label for="confirm-password">Confirmez le mot de passe</label>
            <input type="password" name="confirm-password"
            id="confirm-password" autocomplete="off" placeholder="Confirmez le mot de passe">
            <?php
            if (isset($_SESSION["errorMdpConfirm"]) && $_SESSION["errorMdpConfirm"]==1) {
                echo '<small>Confirmation différante de votre mot de passe</small>';
            }
            ?>
        </div>

        <div class="form-field">
            <label for="profile-picture">Image de profile</label>
            <input type="file" name="profile-picture"
            id="profile-picture" autocomplete="off">
        </div>

        <div id="divSubmit" class="form-field error success">
            <input id="submit" type="submit" value="Créer le compte">
        </div>
    </form>
    <div class="accountBox">
        <img src="../images/icon-logIn.svg" alt="icone de connexion">
        <p>Vous avez déjà un compte ?</p>
        <button onclick="location.href='login.php'" class="yellow">Connectez-vous</button>
    </div>
</main>

</body>
</html>