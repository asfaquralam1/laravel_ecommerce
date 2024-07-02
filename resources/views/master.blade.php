<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Fontawsome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <title>Laravel</title>
    <link rel="icon" href="{{ asset('image/favicon.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('image/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>

<body>
    @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
        </div>
    @endif
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img
                src="https://marketplace.canva.com/EAFYecj_1Sc/1/0/1600w/canva-cream-and-black-simple-elegant-catering-food-logo-2LPev1tJbrg.jpg"
                alt="img" width="50" height="50"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            <div class="navbar-text" style="display: flex;">
                <a class="nav-link" href="#">
                    <i class="fas fa-user"></i>
                </a>
                <a class="nav-link" href="#">
                    <i class="fas fa-shopping-basket"></i>
                </a>
            </div>
        </div>
        </div>
    </nav>

    <section id="banner">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://t3.ftcdn.net/jpg/03/16/91/28/360_F_316912806_RCeHVmUx5LuBMi7MKYTY5arkE4I0DcpU.jpg"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://t3.ftcdn.net/jpg/03/16/91/28/360_F_316912806_RCeHVmUx5LuBMi7MKYTY5arkE4I0DcpU.jpg"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://t3.ftcdn.net/jpg/03/16/91/28/360_F_316912806_RCeHVmUx5LuBMi7MKYTY5arkE4I0DcpU.jpg"
                        class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section id="product" style="padding-top: 20px;padding-bottom: 20px;">
        <div class="container">
            <h1 style="text-align: center;padding: 10px 10px;">Products</h1>
            <div class="row ">
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="https://ricardcamarena.com/letern/images/bot_1.jpg" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">title</h5>
                            <p class="card-text" style="text-align: justify;">Tk 10000</p>
                            <a href="#" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="https://ricardcamarena.com/letern/images/bot_1.jpg" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">title</h5>
                            <p class="card-text" style="text-align: justify;">Tk 10000</p>
                            <a href="#" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="https://ricardcamarena.com/letern/images/bot_1.jpg" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">title</h5>
                            <p class="card-text" style="text-align: justify;">Tk 10000</p>
                            <a href="#" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="https://ricardcamarena.com/letern/images/bot_1.jpg" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> title</h5>
                            <p class="card-text" style="text-align: justify;">Tk 10000</p>
                            <a href="#" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    {{-- <section id="newsletter" style="padding-top: 20px;padding-bottom: 20px; background-color: #65CCB7;">
        <div class="container">
            <div class="row">
                <div class="col-6" style="text-align: center;">
                    <div class="mb-4" style="font-weight: 900;">Join
                        2,000+ subscribers</div>
                    <div class="text-lg">Stay in the loop with everything you need to know.</div>
                </div>
                <div class="col-6">
                    <input type="text" placeholder="Enter your email" class="newslatter-input">
                    <button type="submit" class="subscribe-btn">Subscribe</button>
                </div>
            </div>
        </div>
    </section> --}}

    <section id="footer" style="padding-top: 20px">
        <div class="container">
            <div class="row ">
                <div class="col-3">
                    <img src="https://marketplace.canva.com/EAFYecj_1Sc/1/0/1600w/canva-cream-and-black-simple-elegant-catering-food-logo-2LPev1tJbrg.jpg"
                        alt="img" width="50" height="50">
                    <p>Address</p>
                    <p>Email</p>
                    <p>phone</p>
                </div>
                <div class="col-3">
                    <h4>Quick Links</h4>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                    </ul>
                </div>
                <div class="col-3">
                    <h4>Information</h4>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                    </ul>
                </div>
                <div class="col-3">
                    <h4 style="text-align: center;">Stay with Us</h4>
                    <div class="social-icon">
                        <a class="nav-link" href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="nav-link" href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a class="nav-link" href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="nav-link" href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
