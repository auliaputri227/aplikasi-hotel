<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
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

    <div class="container-fluid pt-5 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <label for="">Check in</label>
                <input type="date" name="" id="" class="form-control rounded-0">
            </div>
            <div class="col-md-2">
                <label for="">Check out</label>
                <input type="date" name="" id="" class="form-control rounded-0">
            </div>
            <div class="col-md-2">
                <label for="">Jumlah Kamar</label>
                <input type="number" name="" id="" class="form-control rounded-0">
            </div>
            <div class="col-md-2 pt-4">
                <button class="btn btn-secondary w-100 rounded-0">Pesan</button>
            </div>
        </div>
    </div>

    <div class="container mb-5 mt-5">
        <h1 class="text-center pb-3">TENTANG KAMI</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit maxime magnam perspiciatis quaerat at
            dignissimos fugit omnis, nulla fugiat provident neque maiores enim culpa id exercitationem quibusdam nihil
            veritatis cum perferendis minima ipsa repellat. Facere saepe pariatur, corrupti animi porro, rem alias
            aliquid hic adipisci quae, fugit asperiores sed eius nesciunt aspernatur. Nam nostrum, amet totam enim
            accusantium molestias eaque quos architecto sapiente et repudiandae sunt hic maiores reiciendis. Suscipit
            voluptates mollitia placeat expedita, ea animi voluptatum alias voluptatem a quod, asperiores modi error qui
            provident adipisci. Cupiditate dolores nihil dignissimos voluptas quo, nobis mollitia quas temporibus
            aspernatur id aliquam.</p>
    </div>
    <div class="container mt-4 mb-5 pb-5">
        <span class="fs-5 fw-bold">Based on 17,182 reviews</span>
        <div class="row">
            <div class="col-md-5">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-3">
                        <label for="" class="form-label">Fantastic</label>
                    </div>
                    <div class="col-md-9">
                        <div class="progress rounded-pill">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 25%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-3">
                        <label for="" class="form-label">Very Good</label>
                    </div>
                    <div class="col-md-9">
                        <div class="progress rounded-pill">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 25%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-3">
                        <label for="" class="form-label">Satisfying</label>
                    </div>
                    <div class="col-md-9">
                        <div class="progress rounded-pill">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 25%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-3">
                        <label for="" class="form-label">Average</label>
                    </div>
                    <div class="col-md-9">
                        <div class="progress rounded-pill">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 25%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-3">
                        <label for="" class="form-label">Poor</label>
                    </div>
                    <div class="col-md-9">
                        <div class="progress rounded-pill">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 25%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
