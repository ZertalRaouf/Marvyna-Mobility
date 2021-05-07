<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!-- Font Import -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}" rel="stylesheet"/>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/front/css/main.css')}}" rel="stylesheet" />

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>

    <title>@yield('title',env('APP_NAME'))</title>
</head>
<body>

<!-- Nav Start -->
<section id="navbar" class="bg-white py-4">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light text-capitalize px-0">

            <a class="navbar-brand font-weight-bold" href="{{url('/')}}">
                <img src="{{asset('assets/front/images/logo2.svg')}}" alt="logo" height="30">
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
                style="border: 1px solid white">
                <i class="fas fa-bars text-bootstrap"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto text-center my-4 my-lg-0">
                    <li class="nav-item ml-0 ml-lg-4">
                        <a class="nav-link text-dark" href="{{url('/')}}">Accueil</a>
                    </li>
                    <li class="nav-item ml-0 ml-lg-4">
                        <a class="nav-link text-dark" href="javascript:void(0)">À propos</a>
                    </li>
                    <li class="nav-item ml-0 ml-lg-4">
                        <a class="nav-link text-dark" href="javascript:void(0)">Contactez Nous</a>
                    </li>
                    <li class="nav-item ml-0 ml-lg-4">
                        <a href="javascript:void(0)" class="btn bg-bootstrap text-white nav-link rounded-pill px-4 shadow-sm mt-4 mt-lg-0" data-toggle="modal" data-target="#loginModal">Se connecter</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>
<!-- Nav End -->

<!-- Presentation Section Start -->
<section class="py-75 bg-white">
    <div class="container">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-lg-5 text-center text-lg-left">
                <h2 class="font-weight-bold">
                    Marvyna <span class="text-bootstrap">Mobilité</span>
                </h2>
                <p class="my-5 text-justify">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                </p>
                <a href="javascript:void(0)" class="btn bg-bootstrap text-decoration-none text-white rounded-pill py-3 px-5 text-capitalize shadow-sm">
                    Essayer l'application<i class="fab fa-google-play ml-2"></i>
                </a>

            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <img
                    src="{{asset('assets/front/images/cover.svg')}}"
                    alt="image"
                    class="img-fluid w-100"
                />
            </div>
        </div>
    </div>
</section>
<!-- Presentation Section End -->

<!-- Footer Start -->
<footer class="bg-bootstrap2">
    <!-- Footer Links -->
    <div class="container text-center text-md-left pt-75 text-light">

        <!-- Grid row -->
        <div class="row d-flex justify-content-between">

            <!-- Grid column -->
            <div class="col-lg-3 mb-4">
                <!-- Links -->
                <div class="card border-0 bg-bootstrap">
                    <div class="card-body">
                        <div class="text-capitalize font-weight-bold h5">
                            Marvyna Mobilité
                        </div>
                        <p class="mt-5 mb-4 py-0">
                            Marvyna Mobilité est une société spécialisée dans le secteur d'activité des transports routiers réguliers de voyageurs.
                        </p>
                        <div>
                            <a href="#" class="mr-4 text-white text-decoration-none">
                                <i class="fab fa-facebook fa-2x"></i>
                            </a>
                            <a href="#" class="mr-4 text-white text-decoration-none">
                                <i class="fab fa-twitter fa-2x"></i>
                            </a>
                            <a href="#" class="text-white text-decoration-none">
                                <i class="fab fa-instagram fa-2x"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-lg-3 mb-4">
                <!-- Links -->
                <div class="card border-0 bg-transparent">
                    <div class="card-body">
                        <div class="text-capitalize font-weight-bold h5">
                            Liens utiles
                        </div>
                        <p class="mt-5">
                            <a href="https://github.com/ZertalRaouf/Marvyna-Mobility" class="text-decoration-none text-white">Procédures d'installation</a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-lg-3 mb-4">
                <!-- Links -->
                <div class="card border-0 bg-transparent">
                    <div class="card-body">
                        <div class="text-capitalize font-weight-bold h5">
                            Menu
                        </div>
                        <p class="mt-5">
                            <a href="{{url('/')}}" class="text-decoration-none text-white">Accueil</a>
                        </p>
                        <p>
                            <a href="#" class="text-decoration-none text-white">À Propos</a>
                        </p>
                        <p>
                            <a href="#" class="text-decoration-none text-white">Nous Contacter</a>
                        </p>
                        <p>
                            <a href="{{route('admin.login.form')}}" class="text-decoration-none text-white">Compte administrateur</a>
                        </p>
                        <p>
                            <a href="{{route('driver.login.form')}}" class="text-decoration-none text-white">Compte chauffeur</a>
                        </p>
                        <p>
                            <a href="{{route('user.login.form')}}" class="text-decoration-none text-white">Compte parent</a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-lg-3 mb-4">
                <!-- Links -->
                <div class="card border-0 bg-transparent">
                    <div class="card-body">
                        <div class="text-capitalize font-weight-bold h5">
                            Contectez Nous
                        </div>
                        <p class="mt-5">
                            <i class="fa fa-map-marker-alt mr-2 text-yellow"></i>7 Rue de la Croix Villecoq, 95280 Jouy-le-Moutier
                        </p>
                        <p>
                            <i class="fas fa-mobile-alt mr-2 text-yellow"></i>+33 621 82 40 22

                        </p>
                        <p>
                            <i class="fa fa-envelope mr-2 text-yellow"></i>contact@marvyna.com
                        </p>
                    </div>
                </div>
            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->
    </div>
    <!-- Footer Links -->

    <hr />

    <!-- Copyright -->
    <div
        class="footer-copyright text-center pb-3 text-light">
        <script type="text/javascript">
            document.write(new Date().getFullYear());
        </script>
        Copyright: © All rights reserved |
        <a href="https://www.linkedin.com/in/zertalraouf/" class="text-decoration-none text-white">
            <strong>ZERTAL Raouf</strong>
        </a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer End -->

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="{{route('user.login.form')}}" class="btn bg-bootstrap text-white nav-link text-white rounded-pill px-4 py-3 shadow-sm mb-4">Compte parent</a>
                <a href="{{route('driver.login.form')}}" class="btn bg-bootstrap text-white nav-link text-white rounded-pill px-4 py-3 shadow-sm mb-4">Compte chauffeur</a>
                <a href="{{route('admin.login.form')}}" class="btn bg-bootstrap text-white nav-link text-white rounded-pill px-4 py-3 shadow-sm mb-4">Compte administrateur</a>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->
<script src="{{asset('assets/front/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>

</body>
</html>

