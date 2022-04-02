@extends('main-template')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('fasha_tambah') }}" class="btn btn-primary mb-4"> Tambah Fasilitas</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTables_fahot" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Fasilitas</th>
                            <th>Keterangan</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fasha as $no => $item)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $item->nama_fasilitas }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('assets/' . $item->image) }}" alt="" height="50" width="50">
                                <td>
                                    <form action="{{ route('fasha_destroy', ['id' => $item->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group">
                                            <a href="{{ route('edit_fasha', ['id' => $item->id]) }}"
                                                class="btn btn-info">Edit</a>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </div>
                                    </form>
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
            $('#dataTables_fahot').DataTable();
        });
    </script>
@endsection
