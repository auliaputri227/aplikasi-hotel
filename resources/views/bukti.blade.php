<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti</title>
</head>

<body>
    <div
        style="width: 75%; display: block; margin: 5% auto; border: 1px solid black; font-family: Arial, Helvetica, sans-serif;">
        <h1 style="text-align: center; font-family: Arial, Helvetica, sans-serif;">HOTEL 22</h1>
        <h2 style="text-align: center; font-family: Arial, Helvetica, sans-serif;">Jln. Raya Bogor No.111 Bogor Jawa
            Barat</h2>
        <h2 style="text-align: center; font-family: Arial, Helvetica, sans-serif;">Telp. (021) 162791582</h2>
        <div
            style="border: 1px solid black; display: block; margin: 0 auto; text-align: center; padding: 0.5%; font-size: 18px; width: 95%; font-weight: bold;background-color: lightgray;">
            Bukti
            Pemesanan Kamar
        </div>
        <table style="width: 100%; padding: 5% 0 5% 10%;">
            <tr>
                <td style="padding-right: 10%; padding-bottom: 2%">ID Reservasi : {{ $data['reservasi']->uid }}</td>
                <td style="padding-right: 10%; padding-bottom: 2%">Tanggal Reservasi :
                    {{ date('d/m/Y', strtotime(Carbon\Carbon::now())) }}</td>
            </tr>
            <tr>
                <td style="padding-right: 10%; padding-bottom: 2%">Tgl. Check In :
                    {{ date('d/m/Y', strtotime($data['reservasi']->check_in)) }}</td>
                <td style="padding-right: 10%; padding-bottom: 2%">Nama : {{ $data['tamu']->nama_pemesan }}</td>
            </tr>
            <tr>
                <td style="padding-right: 10%; padding-bottom: 2%">Telp. : {{ $data['tamu']->telp_tamu }}</td>
                <td style="padding-right: 10%; padding-bottom: 2%">Jumlah Kamar :
                    {{ $data['reservasi']->jumlah_kamar }}</td>
            </tr>
        </table>
        <div style="padding-bottom: 10%;">
            <table border="1px" style="width: 80%; margin: 0 auto; background-color: lightgray;">
                <tr style="text-align: center;">
                    <th style="padding: 0.5%;background-color: white;">Kode</th>
                    <th style="padding: 0.5%;background-color: white;">Type Kamar</th>
                    <th style="padding: 0.5%;background-color: white;">No.Kamar</th>
                    <th style="padding: 0.5%;background-color: white;">Total Harga</th>
                </tr>
                @foreach ($data['reserved'] as $rs)
                    <tr>
                        <td style="text-align: center; background-color: white">{{ $data['tamu']->bukti }}</td>
                        <td style="text-align: center; background-color: white">
                            {{ $data['tipe']->where('id', $data['reservasi']->id_tipe)->first()->tipe_kamar }}
                        </td>
                        <td style="text-align: center; background-color: white">
                            {{ $data['kamar']->where('id', $rs->id_kamar)->first()->no_kamar }}</td>
                        <td style="text-align: center; background-color: white">Rp
                            {{ str_replace(',', '.', number_format($data['reservasi']->total)) }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
