@extends('dashboard.layout')

{{-- ini b:yield di gunakan untuk isi content section --}}
@section('content')
    <p class="card-title">Education</p>
    {{-- {{ route }} ini adalah menuju ke halaman.create yang sudah di sediakan sama laravel  --}}
    <div class="pb-3"><a href="{{ route('education.create') }}" class="btn btn-primary">+ Tambah Education</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Intansi</th>
                    <th>Fakultas</th>
                    <th>Program Studi</th>
                    <th>IPK</th>
                    <th>Tanggal Mulai </th>
                    <th>Tanggal Akhir </th>
                    <th class="col-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->info1 }}</td>
                        <td>{{ $item->info2 }}</td>
                        <td>{{ $item->info3 }}</td>
                        {{-- ini tgl, kita acoser dulu di modelnya --}}
                        <td>{{ $item->tgl_mulai_indo }}</td>
                        <td>{{ $item->tgl_akhir_indo }}</td>
                        <td>
                            <a href="{{ route('education.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form id="deleteFormEducation{{ $loop->iteration }}"
                                action="{{ route('education.destroy', $item->id) }}" class="d-inline" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" name="submit">Hapus</button>
                            </form>
                            <div class="modal fade" id="deleteConfirmationModalEducation{{ $loop->iteration }}"
                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                id="batalHapusEducation{{ $loop->iteration }}">Tidak</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                                id="confirmDeleteEducation{{ $loop->iteration }}">Ya</button>
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
