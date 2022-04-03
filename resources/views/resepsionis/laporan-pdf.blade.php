<table border="1px">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Tamu</th>
            <th>Tanggal Cek-In</th>
            <th>Tanggal Cek-Out</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data['reservasi'] as $no => $item)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $data['tamu']->where('id', $item->id_tamu)->first()->nama_tamu }}</td>
                <td>{{ $item->check_in }}</td>
                <td>{{ $item->check_out }}</td>
                <td>{{ $item->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
