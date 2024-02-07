<?php

require_once("init.php");
require_once("header.php");



// une fois l'inscription faite -> redirgier vers la page de connection


$error = "";
$registrationOK = false;

if ($_POST) {

    // vérifier que le pseudo fait au moins 3 caractères et max 20
    if (strlen($_POST["pseudo"]) < 3 || strlen($_POST["pseudo"]) > 20) {
        $error .= "<div class='alert alert-danger' role='alert'>
                Pseudo entre 3 et 20 caractères !
            </div>";
    }

    if(empty($error)) {

        // Vérifier que le pseudo n'existe pas en BDD
        $stmt = $pdo->query("SELECT * FROM users WHERE pseudo = '$_POST[pseudo]' ");
        
        if($stmt->rowCount() == 0) { // si j'ai pas de membre qui ont le pseudo renseigné lors de l'inscription

            // crypter le mot de passe
            if (!empty($_POST["password"])) {
                $_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
            }            

            $nbrLinesInserted = $pdo->exec("INSERT INTO users (pseudo, password)
                VALUES(
                    '$_POST[pseudo]',
                    '$_POST[password]'
                )");

            if($nbrLinesInserted > 0) {

                $error = "<div class='alert alert-success' role='alert'>
                    Votre inscription s'est correctement effectuée !
                </div>";

                $error .= "<br> <a href='admin/index.php'>Se connecter</a>";
                $registrationOK = true;
            }
        } else {
            $error = "<div class='alert alert-warning' role='alert'>
                    Votre pseudo n'est pas disponible !
                </div>";
        }
    }
}

?>

<?= $error; ?>

<?php if(!$registrationOK) { ?>

<body class="bg-dark text-white">

<h1 class="col-lg-6 mx-auto mt-5 mb-5 text-center">inscription !</h1>

<div class="col-lg-6 mx-auto">
    <form method="POST" action="">
        <div class="form-group mb-4">
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" class="form-control" id="pseudo" aria-describedby="pseudo" placeholder="Pseudo">
        </div>
        <div class="form-group mb-3">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
        </div>
        <button type="submit" class="btn btn-dark">Inscription</button>
    </form>
</div>

</body>
<?php } ?>