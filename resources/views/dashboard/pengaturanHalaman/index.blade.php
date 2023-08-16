@extends('dashboard.layout')

@section('content')
    {{-- <div class="pb-3">
        <a href="{{ route('halaman.index') }}" class="btn btn-primary">
            Kembali
        </a>
    </div> --}}
    <form action="{{ route('pengaturanHalaman.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="" class="col-sm-2">About</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_halaman_about" id="_halaman_about">
                    <option value="">_pilih_</option>
                    @foreach ($datahalaman as $item)
                        <option value="{{ $item->id }}"
                            {{ get_meta_value('_halaman_about') == $item->id ? 'selected' : '' }}>
                            {{ $item->judul }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2">Interest</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_halaman_interest" id="_halaman_interest ">
                    <option value="">_pilih_</option>
                    @foreach ($datahalaman as $item)
                        <option value="{{ $item->id }}"
                            {{ get_meta_value('_halaman_interest ') == $item->id ? 'selected' : '' }}>
                            {{ $item->judul }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2">Awards</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="_halaman_awards" id="_halaman_awards">
                    <option value="">_pilih_</option>
                    @foreach ($datahalaman as $item)
                        <option value="{{ $item->id }}"
                            {{ get_meta_value('_halaman_awards') == $item->id ? 'selected' : '' }}>
                            {{ $item->judul }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection

{{-- jadi ini itu karena dalam script js nya itu 
    hanya yang memiliki variable skill saja, 
    kalau pada halaman yang skil nya tidak ada, maka tidak akan terbaca
     --}}
