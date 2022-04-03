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
    <div class="container-fluid">
        <div class="container py-5">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="text-center">HOTEL 22</h2>
                    <h4 class="text-center">Jln. Raya Bogor No.111 Bogor Jawa Barat</h4>
                    <h4 class="text-center">Telp. (021) 162791582</h4>
                    <h5 class="text-center border bg-light">Bukti Pemesanan Kamar</h5>
                    <div class="container overflow-hidden p-5">
                        <div class="row gy-5">
                            <div class="col-6">
                                <div class="">ID Reservasi : {{ $data['reservasi']->uid }}</div>
                            </div>
                            <div class="col-6">
                                <div class="">Tanggal Reservasi :
                                    {{ date('d/m/Y', strtotime(Carbon\Carbon::now())) }}</div>
                            </div>
                            <div class="col-6">
                                <div class="">Tgl. Check In :
                                    {{ date('d/m/Y', strtotime($data['reservasi']->check_in)) }}</div>
                            </div>
                            <div class="col-6">
                                <div class="">Nama : {{ $data['tamu']->nama_pemesan }}</div>
                            </div>
                            <div class="col-6">
                                <div class="">Telp. : {{ $data['tamu']->telp_tamu }}</div>
                            </div>
                            <div class="col-6">
                                <div class="">Jumlah Kamar : {{ $data['reservasi']->jumlah_kamar }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr class="border-4 text-center">
                                <th scope="col">Kode</th>
                                <th scope="col">Type Kamar</th>
                                <th scope="col">No.Kamar</th>
                                <th scope="col">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['reserved'] as $rs)
                                <tr>
                                    <td class="text-center">{{ $data['tamu']->bukti }}</td>
                                    <td class="text-center">
                                        {{ $data['tipe']->where('id', $data['reservasi']->id_tipe)->first()->tipe_kamar }}
                                    </td>
                                    <td class="text-center">
                                        {{ $data['kamar']->where('id', $rs->id_kamar)->first()->no_kamar }}</td>
                                    <td class="text-center">
                                        Rp {{ str_replace(',', '.', number_format($data['reservasi']->total)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center py-3">
                <a href="{{ route('download', ['id' => $data['reservasi']->uid]) }}" class="btn btn-primary"
                    target="_blank" id="dwn"><i class="fas fa-file-download px-2"></i> Download Bukti</a>
            </div>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script>
        $('#dwn').click(function() {
            setTimeout(() => {
                $(this).html('<i class="fas fa-arrow-alt-circle-left px-2"></i> Kembali');
                $(this).attr('href', 'http://127.0.0.1:8000/index');
                $(this).attr('target', '');
            }, 1000);
        });
    </script>
</body>

</html>
