
<ul class="infoConnect">
        <?php
        if (isset($_SESSION["user"]) && $_SESSION["user"]==1) {
        echo '<li><img class="pictureUser" src="'.$_SESSION['profilePictureUser'].'">Bienvenue '. $_SESSION['nomUser'].' '.$_SESSION['prenomUser'].'</li>';
        }
        ?>        
        <li>Nous sommes le : <span id="date"></li>
        <?php
        if (isset($_SESSION["user"]) && $_SESSION["user"]==1) {
        echo '<li>Vous vous êtes connecté à : '.$_SESSION['dateLogin']-> format('H:i:s').'</li>';
        }
        ?>   
        
    </ul>
    <img id="burgerOpn" class="burgerBtn" src="../images/menu-burger.svg" alt="menu burger">
    <div id="overlay" class="overlay hidden"></div>
    <section id="burgerModal" class="burgerModal hidden">
        <img id="burgerClo" class="burgerBtn" src="../images/close-burger.svg" alt="menu burger">
        <ul class="navbar">
            <li>
                <button onclick="location.href='../view/forum-home.php'" class="blue" type="button">Acceuil</button>
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