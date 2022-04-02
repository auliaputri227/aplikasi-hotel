@extends('main-template')
@section('content')
    <h1 class="pb-3 pt-3">Edit Data Kamar</h1>
    <div class="card shadow mb-4 py-3 mb-5">
        <div class="card-body w-75 m-auto">
            <form action="{{ route('kamar_update', ['id' => $kamar->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="id_tipe">Tipe Kamar</label>
                    <select name="id_tipe" id="id_tipe" class="form-control mb-3" id="exampleFormControlSelect1">
                        @foreach ($tipe_kamar_all as $item)
                            <option value="{{ $item->id }}" {{ $kamar->id_tipe == $item->id ? 'selected' : '' }}>
                                {{ $item->tipe_kamar }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control mb-3">
                        @foreach ($status as $st)
                            <option value="{{ $st->id }}" {{ $kamar->id_status == $st->id ? 'selected' : '' }}>
                                {{ $st->status }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <a href="{{ route('kamar') }}" class="btn btn-primary mt-3 w-25">Kembali</a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-danger mt-3 w-25 float-right">Update</button>
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label for="exampleFormControlFile1">Harga</label>
                    <input type="text" class="form-control mb-3" id="exampleFormControl" value="{{ $tipe_kamar->harga }}">
                </div>
                <div class="form-floating">
                    <label for="floatingTextarea2">Deskripsi</label>
                    <textarea class="form-control mb-3" placeholder="Leave a comment here" id="floatingTextarea2"
                        style="height: 100px">{{ $tipe_kamar->deskripsi }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary w-25 float-right">Update</button> --}}
            </form>
        </div>
    </div>
@endsection
