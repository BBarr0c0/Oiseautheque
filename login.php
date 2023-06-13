<?php
require('actions/loginAction.php');
?>

<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>

<!-------HEADER-------->

<?php include 'includes/navbar.php'; ?>

<!--------MAIN-------->

    <main>
        <div class="centralContainer">
            <section class="sectConnexion">
                <h2>Connexion</h2>
                <form id="formConnexion" method="post" action="">

                    <?php 
                        if(isset($errorMsg)){
                            echo '<p>'.$errorMsg.'</p>';
                        }
                        if(isset($testMsg)){
                            echo '<p>'.$testMsg.'</p>';
                        }
                    ?>

                    
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <div class="g-recaptcha" data-sitekey="6LdyZXAmAAAAAJB3fdIbTQm3kyOEms-xqdtmduLW"></div>
                    

                    <label for="username">Nom d'utilisateur:</label>
                    <input type="text" name="username" id="username" size="25" required>
                    <label for="password">Mot de passe:</label>
                    <input type="password" name="password" id="password" size="25" required>
                    <input type="submit" name="validate" value="Se Connecter">
                </form>
                <a href="./signup.php">Pas de compte ? Créer en un !</a>
                <a href="https://www.youtube.com/watch?v=oI1ZN2H-gzA" target="_blank">Mot de passe oublié ?</a>
            </section>
        </div>
    </main>

<!-------FOOTER--------->

<?php include 'includes/footer.php'; ?>

</body>
</html>