<?php 

require_once("../init.php");
require_once("../header.php");
require_once("../function.php");

if (isset($_GET['action']) && $_GET['action'] == "disconnection") {
    unset($_SESSION["member"]); // je vide ma session pour me déconnecter
}

if (userConnected()) {
    header("location:back.php");
    exit();
}

$error = "";

if ($_POST) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
    $stmt->bindValue(':pseudo', $_POST['pseudo']);
    $stmt->execute();
    $member = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($member) {
        // Vérifier si le mdp rentré correspond à celui stocké en BDD pour ce pseudo
        if (password_verify($_POST['password'], $member['password'])) {
            // Le mot de passe est correct, on peut créer la session
            $_SESSION["member"]["pseudo"] = $member["pseudo"];
            header("location:back.php");
            exit();
        } else {
            $error = "<div class='alert alert-warning' role='alert'>
                Vérifier votre mot de passe !
            </div>";
        }
    } else {
        $error = "<div class='alert alert-warning' role='alert'>
            Vérifier votre pseudo !
        </div>";
    }
    
}
?>


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
                </ul>
            </div>
        </div>
</nav>

<body class="bg-dark text-white">

<h1 class="col-lg-6 mx-auto mt-5 mb-5 text-center">Bienvenue dans le back office !</h1>

<div class="col-lg-6 mx-auto">
    <form method="POST" action="">
        <div class="form-group mb-4">
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" class="form-control" id="pseudo" aria-describedby="pseudo" placeholder="pseudo">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
        </div>
        <button type="submit" class="btn btn-dark">Connection</button>
    </form>
</div>


</body>
