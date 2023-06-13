<?php
require('./actions/database.php');
?>


<!DOCTYPE html>
<html lang="fr">

<?php include 'includes/head.php'; ?>

<body>

    <!-------HEADER-------->

    <?php include 'includes/navbar.php'; ?>

    <!--------MAIN-------->
    <?php
    $resultat = $bdd->query("SELECT * FROM fiche_oiseau");

    // Préparer la requête SELECT avec jointure
    $requete = $bdd->prepare("SELECT f.*, i.url_image FROM fiche_oiseau AS f LEFT JOIN image AS i ON f.Id_image = i.Id_image");
    // Exécuter la requête
    $requete->execute();

    // Vérifier les erreurs de requête
    if (!$resultat) {
        die("Erreur de requête : " . $e->getMessage());
    }

    // Récupérer les résultats
    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);

    // Traiter les résultats
    foreach ($resultats as $row) {
        // Afficher les données de chaque fiche d'oiseau
        echo "Nom de l'oiseau : " . $row["nom_oiseau"] . "<br>";
        echo "Description : " . $row["description_oiseau"] . "<br>";
        echo "Contenu : " . $row["contenu_oiseau"] . "<br>";
        echo "Localisation : " . $row["localisation_oiseau"] . "<br>";
        
    // Afficher l'image si elle existe
    if ($row["url_image"]) {
        echo '<img src="/Oiseautheque/assets/images/' . $row["url_image"] . '" alt="Image de l\'oiseau"><br>';
    } else {
        echo "Aucune image disponible<br>";
    }
}
    ?>

    <main>
        <div class="centralContainer">
            <p>A VENIR</p>
        </div>
    </main>

    <!-------FOOTER--------->

    <?php include 'includes/footer.php'; ?>

</body>
</html>