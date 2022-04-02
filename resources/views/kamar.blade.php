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
    {{-- tipe superior --}}
    <div class="container-fluid mt-5 pt-5">
        <span class="text-center fw-bold pt-5 pb-5 d-block" style="font-size: 50px">Our Rooms</span>
        <div class="row justify-content-center">
            @foreach ($tipe_kamar as $tk)
                <div class="col-md-4 pt-2">
                    <div class="card m-auto" style="width: 90%">
                        <img src="{{ asset('assets/' . $tk->foto) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="card-title fs-2 fw-bold text-center text-capitalize">{{ $tk->tipe_kamar }}
                            </div>
                            <div class="card-text m-auto ">{{ $tk->deskripsi }}</div>
                            <button class="btn btn-outline-warning w-75 m-auto d-block mt-4 res" data-bs-toggle="modal"
                                data-bs-target="#bookModal" data-id="{{ $tk->id }}">Book Now!</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Reservasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('stored_res') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_tipe" id="id_tipe">
                    <input type="hidden" name="total" id="totals">
                    <div class="modal-body">
                        <div class="fs-5 fw-bold">Data diri</div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                                        <input type="text" class="form-control mb-3" name="nama_pemesan"
                                            id="nama_pemesan">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="nama_pemesan" class="form-label">No Identitas</label>
                                        <input type="text" class="form-control mb-3" name="no_identitas"
                                            id="no_identitas">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="no_hp" class="form-label">No Hp</label>
                                        <input type="number" class="form-control mb-3" name="no_hp" id="no_hp">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control mb-3" name="email" id="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="jumlah" class="form-label">Jumlah Kamar</label>
                                        <input type="number" class="form-control mb-3" name="jumlah" id="jumlah">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="check_in" class="form-label">Check In</label>
                                        <input type="date" class="form-control mb-3" name="check_in" id="check_in"
                                            data-date-format="DD/MMM/YYYY" placeholder="dd/mm/yyyy">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="check_out" class="form-label">Check Out</label>
                                        <input type="date" class="form-control mb-3" name="check_out" id="check_out"
                                            data-date-format="DD/MMM/YYYY" placeholder="dd/mm/yyyy">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input bkg" type="radio" name="bkng" id="saya_tamu"
                                                value="1" checked>
                                            <label class="form-check-label" for="saya_tamu">
                                                Saya Tamu
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input bkg" type="radio" name="bkng"
                                                id="booking_orng" value="0">
                                            <label class="form-check-label" for="booking_orng">
                                                Saya booking untuk seseorang
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="is-tamu" class="d-none">
                            <div class="fs-5 fw-bold mb-2">Nama Tamu</div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <label for="nama_tamu" class="form-label">Nama Tamu</label>
                                    <input type="text" class="form-control" name="nama_tamu" id="nama_tamu">
                                </div>
                            </div>
                        </div>
                        <div class="fs-5 fw-bold mb-2">Total Harga</div>
                        <div class="card">
                            <div class="card-header" style="background-color: white">
                                <div class="container">
                                    <div class="row justify-content-evenly">
                                        <div class="col-md-6">
                                            <span class="text-start d-block fw-bold fs-5">Total</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="text-end d-block fw-bold fs-5" id="total">Rp 3.280.000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div class="row justify-content-evenly mb-3">
                                        <div class="col-md-8">
                                            <span class="text-start d-block fs-5" id="tipe">Duluxe 1(Night)</span>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="text-end d-block fs-5" id="harga">Rp 2.710.744</span>
                                        </div>
                                    </div>
                                    <div class="row justify-content-evenly mb-3">
                                        <div class="col-md-8">
                                            <span class="text-start d-block fs-5">Taxes and fees</span>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="text-end d-block fs-5" id="tax-ser">Rp 569.256</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script>
        $('.bkg').click(function() {
            if ($(this).val() == '0') {
                $('#is-tamu').removeClass('d-none');
                $('#nama_tamu').val('');
            } else if ($(this).val() == '1') {
                $('#is-tamu').addClass('d-none');
            }
        });

        const tipeKamar = {!! json_encode($tipe_kamar) !!};

        function findIdTipe(id) {
            const find = tipeKamar.find(x => x.id === id);

            return find;
        };

        function hitungSelisihHari(tgl1, tgl2) {
            var tglKedua = tgl2;
            var tglPertama = tgl1;
            return tglKedua - tglPertama;
        }

        $('.res').click(function() {
            const id = $(this).data('id');
            const dataTipe = findIdTipe(id);


            $('#check_out').change(function() {
                let check_in = new Date($('#check_in').val()).getTime();
                let check_out = new Date($(this).val()).getTime();

                // let jumlah_malam = hitungSelisihHari(check_in, check_out);
                let Difference_In_Days = (Math.abs(check_in - check_out) / 86400000);
                let per_malam = dataTipe.harga * Difference_In_Days;

                let tax = dataTipe.harga * 0.11;
                let service = dataTipe.harga * 0.10;

                let tax_serv = tax + service;
                let total = Number(tax_serv) + Number(per_malam);

                if (check_in == check_out || check_out <= check_in) {
                    $(this).addClass('is-invalid');
                    $('#total').html('Rp 0');
                    $('#tax-ser').html('Rp 0');
                } else {
                    $(this).removeClass('is-invalid');
                    $('#total').html('Rp ' + new Intl.NumberFormat().format(total).replaceAll(',',
                        '.'));
                    $('#totals').val(total);
                    $('#tax-ser').html('Rp ' + new Intl.NumberFormat().format(tax_serv).replaceAll(',',
                        '.'));
                }
            });

            $('#tipe').html(dataTipe.tipe_kamar.charAt(0).toUpperCase() + dataTipe.tipe_kamar.slice(1))
            $('#harga').html('Rp ' + new Intl.NumberFormat().format(dataTipe.harga).replaceAll(',', '.'));
            $('#tax-ser').html('Rp 0');
            $('#total').html('Rp 0');
            $('#id_tipe').val(dataTipe.id);
        });
    </script>
</body>

</html>
