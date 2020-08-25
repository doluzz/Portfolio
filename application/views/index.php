<!DOCTYPE html>
<html lang="en">


<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger item-home" href="#">Home</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger item-cv" href="#">Curriculum Vitæ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger item-portfolio" href="#">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger item-contact" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Masthead -->
<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                    <h1 class="text-uppercase text-white font-weight-bold">Dorian Auneau</h1>
                <hr class="divider my-4">
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 font-weight-light mb-5">Professional developer</p>
                <!-- <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a> -->
            </div>
        </div>
    </div>
</header>

<!-- About Section -->
<section class="page-section bg-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0">Curriculum Vitæ!</h2>
                <hr class="divider light my-4">
                <p class="text-white-50 mb-4">Petit résumer de mon parcours et mes compétences !</p>
                <a class="btn btn-light btn-xl js-scroll-trigger" href="<?= base_url() ?>assets/CVDorianAuneau.pdf">Voir le CV ici!</a>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="page-section">
    <div class="container">
        <h2 class="text-center mt-0">Portfolio</h2>
        <hr class="divider my-4">
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fas fa-4x fa-gem text-primary mb-4"></i>
                    <h3 class="h4 mb-2">Biographie</h3>
                    <p class="text-muted mb-0">Agé de 18 ans, Dorian Auneau est un étudiant ...</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
                    <h3 class="h4 mb-2">Formations</h3>
                    <p class="text-muted mb-0">Actuellement titulaire d'un Bac scientifique et du permis B.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fas fa-4x fa-globe text-primary mb-4"></i>
                    <h3 class="h4 mb-2">Expériences</h3>
                    <p class="text-muted mb-0">Stage d'observation <br> Job d'été</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                    <h3 class="h4 mb-2">Compétences</h3>
                    <p class="text-muted mb-0">Python, SQL, Java, PHP, ...</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
                <a class="btn btn-primary btn-xl js-scroll-trigger" href=<?= base_url('portfolio') ?>>Voir plus</a>
        </div>
    </div>
</section>

<section class="page-section bg-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0">Contactez moi!</h2>
                <hr class="divider light my-4">
                <p class="text-white-50 mb-4">Cliquez ci-dessous pour me contacter!</p>
                <a class="btn btn-light btn-xl js-scroll-trigger" href=<?= base_url('contact') ?>>Page contact!</a>
            </div>
        </div>
    </div>
</section>
</body>

</html>
