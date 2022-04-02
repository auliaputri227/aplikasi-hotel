@extends('main-template')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Tamu</th>
                            <th>Tanggal Cek-In</th>
                            <th>Tanggal Cek-Out</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservasi as $no => $item)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $tamu->where('id', $item->id_tamu)->first()->nama_tamu }}</td>
                                <td>{{ $item->check_in }}</td>
                                <td>{{ $item->check_out }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-info cek" data-toggle="modal" data-target="#konfirmModal"
                                            data-id="{{ $item->id_tamu }}">Check In</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="konfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="konfirm" action="" method="POST">
                        @csrf
                        <label for="" class="form-label">Kode Reservasi</label>
                        <input type="text" class="form-control" name="kode_reservasi">
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary"
                        onclick="event.preventDefault();document.getElementById('konfirm').submit();">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "lengthMenu": [100]
            });

            $('.cek').click(function() {
                console.log(true);
                let id = $(this).data('id');
                $('#konfirm').attr('action', "daftar-tamu/check-in/" + id);
            });
        });
    </script>
@endsection
