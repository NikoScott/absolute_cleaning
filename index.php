<?php

    require_once("header.php");

    $pdo = new PDO('mysql:host=localhost;dbname=absolute_cleaning', 'root', 'root');

    // Récupérer les informations du traitement hydrofuge
    $stmt1 = $pdo->query("SELECT titre, description, photo FROM photos WHERE id = 1");
    $traitementHydrofuge = $stmt1->fetch(PDO::FETCH_ASSOC);
    
    // Récupérer les informations du projet avant
    $stmt2 = $pdo->query("SELECT titre, description FROM photos WHERE id = 2");
    $projetAvant = $stmt2->fetch(PDO::FETCH_ASSOC);
    
    // Récupérer les informations du projet après
    $stmt3 = $pdo->query("SELECT titre, description FROM photos WHERE id = 3");
    $projetApres = $stmt3->fetch(PDO::FETCH_ASSOC);
    

?>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">
                <img src="./assets/img/logo_AC.jpeg" alt="logo" style="width: 180px;"> </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"> Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Nos services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Nos réalisations</a></li>
                    <li class="nav-item"><a class="nav-link" href="#signup">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="./admin/">Back-Office</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">Absolute Cleaning</h1>
                    <h2 class="text-white-50 mx-auto mt-5 mb-5">
                        Nous sommes une entreprise de nettoyage haute pression basée sur la Côte d'Azur, spécialisée
                        dans les services de rénovation. Notre expertise réside dans la restauration de diverses
                        surfaces, et nous sommes fiers de proposer des services de nettoyage de qualité supérieure pour
                        répondre aux besoins spécifiques de nos clients.</h2>
                    <a class="btn btn-light" href="#about">DEVIS GRATUIT</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="about-section text-center" id="about">
        <div class="container px-4">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-10">
                    <h2 class="text-white mb-4">NOS SERVICES</h2>
                    <p class="text-white">
                        Que vous soyez un professionnel ou un particulier à la recherche de solutions de nettoyage pour
                        différentes surfaces, nous sommes là pour vous aider. Notre équipe mettra en œuvre tous les
                        moyens nécessaires afin de répondre de manière optimale à vos besoins spécifiques.
                    </p>
                    <table class="text-white">

                        <tr>
                            <th> TRAITEMENT HYDROFUGE</th>
                        </tr>
                        <td>
                            <ul>
                                Le traitement hydrofuge offre une protection et une imperméabilisation efficaces de la
                                surface traitée. Il prévient la croissance de micro-végétaux et confère une durabilité
                                accrue à vos surfaces après leur nettoyage. Il est recommandé de faire appliquer ce
                                traitement par un professionnel afin d'éviter tout risque de détérioration ultérieure de
                                la surface. En outre, en fonction du type d'hydrofuge que vous choisissez, il peut
                                donner un aspect satiné ou mat à la surface, tout en procurant un effet déperlant à la
                                pluie, empêchant ainsi toute absorption par la surface traitée.
                            </ul>
                        </td>
                    </table>
                    <table class="d-flex justify-content-center text-white text-center mt-5">
                        <tr>
                            <th>POUR LES PARTICULIERS :</th>
                            <th>POUR LES PROFESSIONNELS :</th>
                        </tr>
                        <tr>
                            <td class="p-4">
                                <ul>
                                    <li>Nettoyage de façades résidentielles</li>
                                    <li> Entretien et nettoyage de terrasses privées</li>
                                    <li> Traitement et rénovation de toitures</li>
                                    <li>Services de nettoyage pour domaines privés</li>
                                </ul>
                            </td>
                            <td class="p-4">
                                <ul>
                                    <li>Nettoyage de façades de commerces</li>
                                    <li>Entretien et nettoyage de terrasses commerciales</li>
                                    <li>Traitement et rénovation de toitures commerciales</li>
                                    <li>Services de nettoyage pour copropriétés</li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- <img class="img-fluid" src="assets/img/" alt="..." /> -->
        </div>
    </section>
    <!-- Projects-->
    <section class="projects-section bg-light" id="projects">
        <div class="container px-4 px-lg-5">


        <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
            <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="<?= $traitementHydrofuge['photo']; ?>"
                    alt="<?php echo $traitementHydrofuge['titre']; ?>" /></div>
            <div class="col-xl-4 col-lg-5">
                <div class="featured-text text-center text-lg-left">
                    <h4><?php echo $traitementHydrofuge['titre']; ?></h4>
                    <p class="text-black-50 mb-0"><?php echo $traitementHydrofuge['description']; ?></p>
                </div>
            </div>
        </div>


            <!-- Featured Project Row-->
            <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="assets/img/hydro.jpeg"
                        alt="hydrofuge" /></div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>TRAITEMENT HYDROFUGE</h4>
                        <p class="text-black-50 mb-0">Ce produit hydrofuge crée une barrière protectrice qui empêche
                            l'eau de pénétrer dans la surface traitée. Il repousse l'eau et les liquides, empêchant leur
                            absorption. Cela permet de prévenir les dommages causés par l'humidité tels que la formation
                            de moisissures, de champignons ou de taches d'eau.</p>
                    </div>
                </div>
            </div>
            <!-- Project One Row-->
            <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                <div class="col-lg-6"><img class="img-fluid" src="assets/img/avant-1.png" alt="..." /></div>
                <div class="col-lg-6">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4 class="text-white">Avant</h4>
                                <p class="mb-0 text-white-50"> Sol infecté de micro-végétaux et de moisissures </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project Two Row-->
            <div class="row gx-0 justify-content-center">
                <div class="col-lg-6"><img class="img-fluid" src="assets/img/apres-1.png" alt="..." /></div>
                <div class="col-lg-6 order-lg-first">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-right">
                                <h4 class="text-white">Après</h4>
                                <p class="mb-0 text-white-50"> Voici l'effet d'un nettoyage haute pression ! </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Signup-->
    <section class="signup-section" id="signup">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                    <h2 class="text-white mb-5"> Contactez nous pour votre devis gratuit !</h2>
                    <div class="row justify-content-center mb-5">
                        <div class="col-lg-10">
                            <div class="container mt-2">
                                <form method="POST" action="">
                                    <div class="d-flex mb-5">
                                        <div class="form-group pe-1">
                                            <!-- <label for="prenom">Prénom :</label> -->
                                            <input type="text" placeholder="Prénom" class="form-control" id="prenom"
                                                name="prenom" required>
                                        </div>

                                        <div class="form-group ps-1">
                                            <!-- <label for="nom">Nom :</label> -->
                                            <input type="text" placeholder="Nom" class="form-control" id="nom" name="nom"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group mb-5">
                                        <!-- <label for="email">Email :</label> -->
                                        <input type="email" placeholder="Email" class="form-control" id="email" name="email"
                                            required>
                                    </div>

                                    <div class="form-group mb-5">
                                        <!-- <label for="phone">Téléphone :</label> -->
                                        <input type="tel" placeholder="Téléphone" class="form-control" id="phone" name="phone">
                                    </div>

                                    <div class="form-group mb-5">
                                        <!-- <label for="message">Message :</label> -->
                                        <textarea class="form-control" placeholder="Message" id="message" name="message" rows="4"
                                            required></textarea>
                                    </div>

                                    <p class="mt-4 hidden">  </p>

                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-dark shadow-lg" name="submit"
                                            id="submit-btn">Envoyer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Contact-->
                    <div class="d-flex justify-content-around">
                        <div class="col-md-5 mb-3 mb-md-0 p-4">
                            <div class="card py-4 h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-map-marked-alt text-muted mb-2"></i>
                                    <h4 class="text-uppercase m-0">Adresse</h4>
                                    <hr class="my-4 mx-auto" />
                                    <div class="small text-black-50">5 Rue Jean Jaures, 06400 Cannes</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-3 mb-md-0 p-4">
                            <div class="card py-4 h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-envelope text-muted mb-2"></i>
                                    <h4 class="text-uppercase m-0">Email</h4>
                                    <hr class="my-4 mx-auto" />
                                    <div class="small text-black-50"><a href="#!">absolutecleaning06@gmail.com</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 mb-3 mb-md-0 p-4">
                            <div class="card py-4 h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-mobile-alt text-muted mb-2"></i>
                                    <h4 class="text-uppercase m-0">Téléphone</h4>
                                    <hr class="my-4 mx-auto" />
                                    <div class="small text-black-50">+33 6 25 43 31 86</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="social d-flex justify-content-center">
                        <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; Absolute Cleaning</div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>