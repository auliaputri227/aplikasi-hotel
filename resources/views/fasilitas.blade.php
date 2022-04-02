<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/60a2617bc9.js" crossorigin="anonymous"></script>

    <title>Hello, world!</title>
</head>

<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">HOTEL 22</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link me-3 active" aria-current="page" href="{{ route('index') }}">Home</a>
                    <a class="nav-link me-3" href="{{ route('kamars') }}">Kamar</a>
                    <a class="nav-link me-3" href="{{ route('fasilitas') }}">Fasilitas</a>
                </div>
            </div>
        </div>
    </nav>
    {{-- penutup navbar --}}

    {{-- slide --}}
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="{{ asset('assets/slide_1.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="{{ asset('assets/slide_2.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/slide_3.jpg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- penutup slide --}}

    {{-- fasilitas --}}
    <div class="container mt-5 pt-5">
        <h1>FASILITAS HOTEL</h1>
        <div class="row justify-content-evenly mb-4 mt-5 ms-5">
            <div class="col-md-4">
                <div class="card text-center border-0">
                    <div class="card-body">
                        <i class="fa fa-coffee fs-1"></i>
                    </div>
                    <div class="card-text fs-2">
                        Cofee Shop
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center border-0">
                    <div class="card-body">
                        <i class="fa fa-burger fs-1"></i>
                    </div>
                    <div class="card-text fs-2">
                        Free Breackfast
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center border-0">
                    <div class="card-body">
                        <i class="fa fa-laptop fs-1"></i>
                    </div>
                    <div class="card-text fs-2">
                        Workspace
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-evenly mb-5 mt-4 ms-5">
            <div class="col-md-4">
                <div class="card text-center border-0">
                    <div class="card-body">
                        <i class="fa fa-umbrella-beach fs-1"></i>
                    </div>
                    <div class="card-text fs-2">
                        Beach
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center border-0">
                    <div class="card-body">
                        <i class="fa fa-wifi fs-1"></i>
                    </div>
                    <div class="card-text fs-2">
                        Free Wi-Fi
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center border-0">
                    <div class="card-body">
                        <i class="fa fa-glass-cheers fs-1"></i>
                    </div>
                    <div class="card-text fs-2">
                        Bar
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- penutup fasilitas --}}

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
