<?php
require('./actions/database.php'); //require est un équivalent de include mais plus sécurisé, car si il y a une erreur il ne permettra pas d'afficher le reste du code ci dessous


//Validation du formulaire
if(isset($_POST['validate'])){ //vérifier si utilisateur clic sur le bouton

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

    if (!$response['success']) {
        // Le reCaptcha n'est pas valide
        $errorMsg = "Veuillez cochez la case prouvant que vous n'êtes pas un robot";
    }

    //vérifier si l'utilisateur a complété tout les champs
    elseif(!empty($_POST['username']) && !empty($_POST['mail']) && !empty($_POST['password'])){

        //Données de l'utilisateur
        $username     = htmlspecialchars($_POST['username']);
        $email        = htmlspecialchars($_POST['mail']);
        $password     = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $imageId      = 1;
        $userTypeId   = 2;

        // Vérifier si le pseudo est déjà utilisé
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo_utilisateur FROM utilisateur WHERE pseudo_utilisateur = ?');
        $checkIfUserAlreadyExists->execute(array($username));

        if($checkIfUserAlreadyExists->rowCount() != 0){  // Si un pseudo identique est trouvé
            $errorMsg = "L'utilisateur existe déjà";
        }
        // Vérifier si le format de l'email est le bon
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMsg = "Veuillez entrer une adresse mail valide";
        }
        else {
            // Vérifier si l'adresse email est déjà utilisée
            $checkIfMailAlreadyExists = $bdd->prepare('SELECT mail_utilisateur FROM utilisateur WHERE mail_utilisateur = ?');
            $checkIfMailAlreadyExists->execute([$email]);

            if($checkIfMailAlreadyExists->rowCount() != 0) { // Si un email identique est trouvé
                $errorMsg = "Adresse mail déjà utilisée";
            }
            else {
                // Entrer les informations de l'utilisateur dans la base de données
                $insertUserOnWebsite = $bdd->prepare('INSERT INTO utilisateur(pseudo_utilisateur, mail_utilisateur, mdp_utilisateur, Id_image, Id_type_utilisateur) VALUES (?, ?, ?, ?, ?)');
                $insertUserOnWebsite->execute(array($username, $email, $password, $imageId, $userTypeId));
                
                //$testMsg = "Vous êtes inscrit";
                
                // Récupérer les information de l'utilisateur
                $getInfosOfThisUserReq = $bdd->prepare('SELECT Id_Utilisateur FROM utilisateur WHERE pseudo_utilisateur = ? && mail_utilisateur = ?');
                $getInfosOfThisUserReq->execute(array($username, $email));

                $usersInfos = $getInfosOfThisUserReq->fetch();

                // Pour authentifier l'utilisateur (récupération de ses données dans des variables sessions)
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['Id_Utilisateir'];
                $_SESSION['username'] = $usersInfos['pseudo_utilisateur'];
                $_SESSION['email'] = $usersInfos['mail_utilisateur'];

                // Redirection vers une autre page
                header("Location: accueil.php");
                exit(); // Terminer l'exécution du script ici
            }
        }

    } else {
        $errorMsg = "Veuillez compléter tous les champs";
    }
}
?>
