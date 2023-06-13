<?php
//require('actions/securityAction.php')
?>






<!DOCTYPE html>
<html lang="fr">

<?php include 'includes/head.php'; ?>

<body>

    <!-------HEADER-------->

<?php include 'includes/navbar.php'; ?>

    <!--------MAIN-------->

    <main>


        <?php if (isset($_SESSION['connect'])) { ?>

            <?php
            if (isset($_GET['success'])) {
                echo '<div class="alert success">Vous êtes maintenant connecté.</div>';
            } ?>
            <small><a href="logout.php">Déconnexion</a></small>

        <?php } else {
            if (isset($_GET['error'])) {
                if (isset($_GET['message'])) {
                    echo '<div class="alert error">' . htmlspecialchars($_GET['message']) . '</div>';
                }
            }
        } ?>


        <div class="centralContainer"> <!--Créé pour le changement de thème-->
            <section id="welcome">
                <h1>Bienvenu sur <strong>l'oiseauthèque</strong> !</h1>
                <p>Ce site a pour but de promouvoir les oiseaux de la France métropolitaine et leur sauvegarde.</p>
                <p>Il se veut accessible et ludique, pour que tout les âges puissent s'y retrouver afin de partager leur passion de l'ornithologie ou simplement leur émerveillement des créatures à plumes, ainsi que leur protection.</p>
                <p>Vous trouverez sur ce site:</p>
                <ul>
                    <li>Des fiches d'oiseaux détaillés</li>
                    <li>Des conseils lorsque vous trouvez un oiseau</li>
                    <li>Des coordonnées pour avoir des conseils professionnels ou un lieu pour amener un oiseau blessé</li>
                    <li>Un forum baptisé "les pies bavardes"</li>
                    <li>Un espace quizz pour tester vos connaissances</li>
                    <li>Des articles</li>
                </ul>
                <p>N'hésitez pas à créer un compte et participer autour de notre passion commune !</p>
                <p>Bonne navigation sur notre site !</p>
            </section>

            <!-----DEBUT SLIDER----->

            <div class="titleSlider">
                <h2>Une sélection d'oiseaux:</h2>
            </div>

            <div id="birdSlider">
                <div class="slides">
                    <div id="slide" class="slide">
                        <!--voir birds.js et birds.json-->
                    </div>
                </div>
            </div>

            <!-----FIN SLIDER----->

        </div>
    </main>

    <!-------FOOTER--------->

<?php include 'includes/footer.php'; ?>



<script src="./script/birds.js"></script>

<script src="./script/scriptSlider.js"></script>

</body>

</html>