@extends('dashboard.layout')

{{-- ini b:yield di gunakan untuk isi content section --}}
@section('content')
    <p class="card-title">Halaman Quy</p>
    {{-- {{ route }} ini adalah menuju ke halaman.create yang sudah di sediakan sama laravel  --}}
    <div class="pb-3"><a href="{{ route('halaman.create') }}" class="btn btn-primary">+ Tambah Halamaan</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Judul</th>
                    <th class="col-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>
                            <a href="{{ route('halaman.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form id="deleteFormHalaman{{ $loop->iteration }}"
                                action="{{ route('halaman.destroy', $item->id) }}" class="d-inline" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" name="submit">Hapus</button>
                            </form>
                            <div class="modal fade" id="deleteConfirmationModalHalaman{{ $loop->iteration }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus data ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                id="batalHapusHalaman{{ $loop->iteration }}">Tidak</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                                id="confirmDeleteHalaman{{ $loop->iteration }}">Ya</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
