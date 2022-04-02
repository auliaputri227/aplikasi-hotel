@extends('main-template')
@section('content')
    <h1 class="pb-3 pt-3">Edit Data Fasilitas Kamar</h1>
    <div class="card shadow mb-4 py-3 mb-5">
        <div class="card-body w-75 m-auto">
            <form action="{{ route('faska_update', ['id' => $faska->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="id_tipe">Tipe Kamar</label>
                    <select class="form-control mb-3" id="id_tipe" name="id_tipe">
                            @foreach ($tipe_kamar_all as $item)
                                <option value="{{ $item->id }}" {{ $faska->id_tipe == $item->id ? 'selected' : '' }}>
                                    {{ $item->tipe_kamar }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_fasilitas">Nama Fasilitas </label>
                    <input type="text" class="form-control mb-3" name="nama_fasilitas"
                        value="{{ $faska->nama_fasilitas }}">
                </div>
                <button type="submit" class="btn btn-primary w-25 float-right">Update</button>
            </form>
        </div>
    </div>
@endsection
