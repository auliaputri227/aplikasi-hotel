@extends('main-template')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('tambah_kamar') }}" class="btn btn-primary mb-4"> Tambah Kamar</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable_kamar" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Kamar</th>
                            <th>Tipe Kamar</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kamar as $no => $item)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $item->no_kamar }}</td>
                                <td>{{ $tipe_kamar->where('id', $item->id_tipe)->first()->tipe_kamar }}</td>
                                <td>
                                    <div class="badge badge-info">
                                        {{ $status->where('id', $item->id_status)->first()->status }}</div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('edit_kamar', ['id' => $item->id]) }}"
                                            class="btn btn-info">Edit</a>
                                        <form action="{{ route('kamar_destroy', ['id' => $item->id]) }}" method="post">
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
            $('#dataTable_kamar').DataTable();
        });
    </script>
@endsection
