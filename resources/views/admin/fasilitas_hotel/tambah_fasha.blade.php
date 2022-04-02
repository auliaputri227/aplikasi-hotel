@extends('main-template')
@section('content')
    <h1 class="pb-3 pt-3">Edit Data Fasilitas Hotel</h1>
    <div class="card shadow mb-4 py-3 mb-5">
        <div class="card-body w-75 m-auto">
            <form action="{{ route('fasha_stored') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">Foto</label>
                        <input type="file" class="form-control mb-3" name="foto" id="img-upl">
                    </div>
                    <div class="col-md-6">
                        <label for="exampleFormControlFile1">Nama Fasilitas </label>
                        <input type="text" class="form-control mb-3" id="exampleFormControl"
                             name="nama_fasilitas">
                    </div>
                </div>
                <div class="form-floating">
                    <label for="floatingTextarea2">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control mb-3" placeholder="Leave a comment here" id="floatingTextarea2"
                        style="height: 100px"></textarea>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <a href="{{ route('fasha') }}" class="btn btn-primary mt-3 w-25">Kembali</a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-danger mt-3 w-25 float-right">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
