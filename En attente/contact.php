<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../logos/faviconpie.png">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <title>Contact - Oiseauthèque</title>
</head>
<body>

    <!-------HEADER-------->

    <input id="theme" type="checkbox" title="Changer de thème"><!--POUR FAIRE THEME EN CSS-->
    <header>
        <div class="navBar">
            <div class="logoNavBar">
                <a href="./accueil.php">
                    <img src="../logos/logoPieTrans.png" alt="Une pie vue d'en haut avec la France en fond" title="Accueil">
                    <p>Accueil</p>
                </a>
            </div>
            <nav class="centerNavBar">
                <label for="toggle">☰</label>
                <input type="checkbox" id="toggle">
                <ul class="centerMenu">
                    <li class="liOiseautheque">
                        <a href="./l'oiseauthèque.html">L'oiseauthèque</a>
                    </li>
                    <li class="liSauvetage">
                        <a href="./sauvetage.html">Sauvetage</a>
                    </li>
                    <li class="liForum">
                        <a href="./forum-les-pies-bavardes.html">Forum</a>
                    </li>
                    <li class="liJeux">
                        <a href="./jeux.html">Jeux</a>
                    </li>
                    <li class="liArticles">
                        <a href="./articles.html">Articles</a>
                    </li>
                </ul>
            </nav>
            <div class="idNavBar">
                <ul class="menu">
                    <li class="liConnexion">
                        <a href="./se-connecter.php">S'identifier</a>
                        <ul class="subMenu">
                            <li class="liSubMenu">
                                <a href="./se-connecter.php">Se connecter</a>
                            </li>
                            <li class="liSubMenu">
                                <a href="./creer-un-compte.php" >Créer un compte</a>
                            </li>
                        </ul>
                    </li>
                    <li class="theme">
                        <div class="themeL">
                            <img src="../logos/logoThemeSombre.png" alt="btnJN" title="Changer de thème">
                        </div>
                        <div class="themeD">
                            <img src="../logos/logoThemeClair.png" alt="btnJN" title="Changer de thème">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="banner">
            <img id="imgDay" src="../logos/BanniereClaireTitreOiseautheque_50.jpg" alt="oiseaudiurne">
            <img id="imgNight" src="../logos/BanniereSombreTitreOiseautheque_50.jpg" alt="oiseaunocturne">
        </div>
    </header>

    <!--------MAIN-------->

    <main>
        <div class="centralContainer">
            <p>A VENIR</p>
        </div>
    </main>

    <!-------FOOTER--------->

    <footer>
        <div class="logoFooter">
            <a href="./accueil.php">
                <img src="../logos/logoPieTrans.png" alt="pie" title="Accueil">
            </a>
        </div>
        <div class="centralFooter">
            <h5>Copyright 2022 
                <a href="./accueil.php">Oiseauthèque.fr</a> - Tous droits réservés.
            </h5>
            <p>
                <a href="./qui-sommes-nous.html"><span class="symbHoverFooter">|</span>Qui sommes-nous ?<span class="symbHoverFooter">|</span></a>
            </p>
            <p>
                <a href="./contact.html"><span class="symbHoverFooter">|</span>Contact<span class="symbHoverFooter">|</span></a>
            </p>
        </div>
        <div class="reseaux">
            <h5>Nos réseaux:</h5>
            <a href="https://www.facebook.com">
                <img src="../logos/logoFacebook.png" alt="lgfacebook" title="Facebook">
            </a>
            <a href="https://www.twitter.com">
                <img src="../logos/logoTwitter.png" alt="lgtwitter" title="Twitter">
            </a>
        </div>
    </footer>
</body>
</html>