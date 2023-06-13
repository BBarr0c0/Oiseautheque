<?php
require('./actions/database.php'); //require est un équivalent de include mais plus sécurisé, car si il y a une erreur il ne permettra pas d'afficher le reste du code ci dessous

// Validation du formulaire
if(isset($_POST['validate'])) {
    
    // Vérification du reCaptcha
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => '6LdyZXAmAAAAAJZEKJnsCG0VdqkMVi5rsS1YHMT7',
        'response' => $recaptchaResponse
    );

    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result, true);

    if(!$response['success']) {
        // Le reCaptcha n'est pas valide
        $errorMsg = "Veuillez cocher la case prouvant que vous n'êtes pas un robot";
    }else{  
        // Vérification des autres champs du formulaire
        if(!empty($_POST['username']) && !empty($_POST['password'])) {

            // Données de l'utilisateur
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            // Vérifier si le pseudo existe
            $checkIfUserExists = $bdd->prepare('SELECT * FROM utilisateur WHERE pseudo_utilisateur = ?');
            $checkIfUserExists->execute(array($username));

            if($checkIfUserExists->rowCount() > 0) {
                // Pseudo existant, vérifier le mot de passe
                $infoUser = $checkIfUserExists->fetch();
                if(password_verify($password, $infoUser['mdp_utilisateur'])) {
                    // Mot de passe correct, l'utilisateur est connecté
                    $testMsg = "Vous êtes connecté";
                }else{
                    // Mot de passe incorrect
                    $errorMsg = "Mot de passe incorrect";
                }
            }else{
                // Pseudo inexistant
                $errorMsg = "L'utilisateur n'existe pas";
            }
        }else{
            // Champs du formulaire non remplis
            $errorMsg = "Veuillez compléter tous les champs";
        }
    }
}

?>