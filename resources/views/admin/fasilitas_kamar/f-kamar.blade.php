@extends('main-template')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
             <a href="{{ route('faska_tambah') }}" class="btn btn-primary mb-4"> Tambah Fasilitas</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable_fkamar" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tipe Kamar</th>
                            <th>Nama Fasilitas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faska as $no => $item)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $tipe_kamar->where('id', $item->id_tipe)->first()->tipe_kamar }}</td>
                                <td>{{ $item->nama_fasilitas }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('edit_faska', ['id' => $item->id]) }}"
                                            class="btn btn-info">Edit</a>
                                        <form action="{{ route('faska_destroy', ['id' => $item->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#dataTable_fkamar').DataTable();
        });
    </script>
@endsection
