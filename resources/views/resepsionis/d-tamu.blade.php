@extends('main-template')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <button class="btn btn-success mb-3 mr-3" id="excel"><i class="fas fa-file-excel pr-2"></i> Export
                Excel</button>
            <a href="{{ route('export-pdf') }}" class="btn btn-danger mb-3"><i class="fas fa-file-pdf pr-2"></i> Export
                PDF</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Tamu</th>
                            <th>Tanggal Cek-In</th>
                            <th>Tanggal Cek-Out</th>
                            <th>Status</th>
                            <th class="act">Action</th>
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
                                <td class="act">
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
    <script src="{{ asset('assets/table2excel/dist/table2excel.js') }}"></script>
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

            var table2excel = new Table2Excel();
            $('#excel').click(function() {
                $('.act').addClass('d-none');
                table2excel.export(document.querySelectorAll("#dataTable"), 'daftar-tamu');
                setTimeout(() => {
                    $('.act').removeClass('d-none');
                }, 1000);
            });
        });
    </script>
@endsection
