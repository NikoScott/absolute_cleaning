<?php 

require_once("../init.php");

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['member']) || empty($_SESSION['member'])) {
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("location: index.php");
    exit();
}

require_once("../init.php");
require_once("../header.php");

?>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">
                <img src="../assets/img/logo_AC.jpeg" alt="logo" style="width: 180px;"> </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"> Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="./index.php?action=disconnection">Déconnection</a></li>
                </ul>
            </div>
        </div>
</nav>

<body class="bg-dark text-white">

    <div id="backoffice">

        <div class="d-flex justify-content-center">
        <!-- Formulaire pour modifier les photos -->
        
        <form action="../update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="photo_id" value="1">

            <p>Titre actuel : TRAITEMENT HYDROFUGE</p>
            <label class="mb-2">Nouveau titre :</label>
            <br>
            <input class="mb-2" type="text" name="title" id="titre">
            <br>
            <label>Description :</label>
            <br>
            <textarea name="descriptions[1]" rows="4" cols="50"></textarea>
            <br>
            <input type="file" name="photo[1]" accept="image/*">
            <br>

            <!-- <h3>Photo 2 : Avant</h3>
            <label>Description :</label>
            <br>
            <textarea name="description1" rows="4" cols="50"></textarea>
            <br>
            <input type="file" name="photo1" accept="image/*">
            <br><br>

            <h3>Photo 3 : Après</h3>
            <label>Description :</label>
            <br>
            <textarea name="description1" rows="4" cols="50"></textarea>
            <br>
            <input type="file" name="photo1" accept="image/*">
            <br><br> -->

            <input type="submit" value="Enregistrer les modifications">
        </form>
        </div>
    </div>

</body>
</html>
