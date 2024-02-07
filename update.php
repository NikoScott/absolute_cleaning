<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $photoId = $_POST["photo_id"];
    $title = $_POST["title"];

    // Traitez les photos et descriptions
    $photo = $_FILES["photo"];
    $descriptions = $_POST["descriptions"];

    // Parcourez les photos et descriptions avec un index numérique
    foreach ($photo["tmp_name"] as $index => $tmpName) {
        // Ici, $tmpName contiendra le chemin temporaire de la photo téléversée
        // Vous pouvez les déplacer vers le répertoire de destination avec move_uploaded_file() comme indiqué précédemment

        $description = $descriptions[$index];
        // Ici, $description contiendra la description correspondante à la photo en cours de traitement
        // Vous pouvez les enregistrer dans votre base de données

        // Par exemple, pour enregistrer les données dans une base de données avec PDO :
        $pdo = new PDO('mysql:host=localhost;dbname=absolute_cleaning', 'root', 'root');

            // Vérifiez si l'ID de la photo existe déjà dans la table
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM photos WHERE id = :id");
        $stmt->bindParam(':id', $photoId);
        $stmt->execute();

        if ($stmt->fetchColumn() > 0) {
            // Si l'ID existe, mettez à jour le titre
            $stmt = $pdo->prepare("UPDATE photos SET titre = :titre WHERE id = :id");
            $stmt->bindParam(':titre', $title);
            $stmt->bindParam(':id', $photoId);
            $stmt->execute();
        } else {
            // Si l'ID n'existe pas, insérez une nouvelle photo avec l'ID spécifié
            $stmt = $pdo->prepare("INSERT INTO photos (id, titre, description) VALUES (:id, :titre, :description)");
            $stmt->bindParam(':id', $photoId);
            $stmt->bindParam(':titre', $title);
            $stmt->bindParam(':description', $description);
            $stmt->execute();
        }
    }

    // Redirigez l'utilisateur vers la page du back-office après le traitement
    header("Location: admin/back.php");
    exit;
}
?>