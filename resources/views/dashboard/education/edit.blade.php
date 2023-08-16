@extends('dashboard.layout')

@section('content')
    <div class="pb-3">
        <a href="{{ route('education.index') }}" class="btn btn-primary">
            Kembali
        </a>
    </div>

    <form action="{{ route('education.update', $data->id) }}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="judul" class="form-label">Intansi</label>
            <input type="text" class="form-control form-control-sm" name="judul" aria-describedby="helpId"
                placeholder="Intansi" value="{{ $data->judul }}">
        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Fakultas</label>
            <input type="text" class="form-control form-control-sm" name="info1" id="info1"
                aria-describedby="helpId" placeholder="Fakultas" value="{{ $data->info1 }}">
        </div>
        <div class="mb-3">
            <label for="info2" class="form-label">Program Studi</label>
            <input type="text" class="form-control form-control-sm" name="info2" id="info1"
                aria-describedby="helpId" placeholder="Program Studi" value="{{ $data->info2 }}">
        </div>
        <div class="mb-3">
            <label for="info3" class="form-label">IPK</label>
            <input type="text" class="form-control form-control-sm" name="info3" id="info1"
                aria-describedby="helpId" placeholder="IPK" value="{{ $data->info3 }}">
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-auto">Tanggal Mulai</div>
                <div class="col-auto">
                    <input type="date" class="form-control 
                    form-control-sm" name="tgl_mulai"
                        placeholder="dd/mm/yy" value="{{ $data->tgl_mulai }}">
                </div>
                <div class="col-auto">Tanggal Akhir</div>
                <div class="col-auto">
                    <input type="date" class="form-control
                    form-control-sm" name="tgl_akhir"
                        placeholder="Tanggal Akhir" value="{{ $data->tgl_akhir }}">
                </div>
            </div>
        </div>
        {{-- <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea class="form-control summernote" rows="5" name="isi">{{ $data->isi }}</textarea>
        </div> --}}
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection
