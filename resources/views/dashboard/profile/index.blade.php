@extends('dashboard.layout')

@section('content')
    {{-- <div class="pb-3">
        <a href="{{ route('halaman.index') }}" class="btn btn-primary">
            Kembali
        </a>
    </div> --}}
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-between">
            <div class="col-5">
                <div class="mb-3">
                    <h3>Profile</h3>
                    @if (get_meta_value('_foto'))
                        <img style="max-width: 100px; max-height:100px"
                            src="{{ asset('foto') . '/' . get_meta_value('_foto') }}" alt="">
                    @endif
                    <label for="_foto" class="form-label">Foto</label>
                    <input type="file" class="form-control form-control-sm Profile" name="_foto" id="_foto"
                        aria-describedby="helpId" placeholder="Apa Saja Profile Mu!" value="{{ get_meta_value('_foto') }}">
                </div>
                <div class="mb-3">
                    <label for="_kota" class="form-label">Kota</label>
                    <input type="text" class="form-control form-control-sm" name="_kota" id="_kota"
                        value="{{ get_meta_value('_kota') }}">
                </div>
                <div class="mb-3">
                    <label for="_provinsi" class="form-label">Provinsi</label>
                    <input type="text" class="form-control form-control-sm" name="_provinsi" id="_provinsi"
                        value="{{ get_meta_value('_provinsi') }}">
                </div>
                <div class="mb-3">
                    <label for="_nohp" class="form-label">Nomor Hp</label>
                    <input type="text" class="form-control form-control-sm" name="_nohp" id="_nohp"
                        value="{{ get_meta_value('_nohp') }}">
                </div>
                <div class="mb-3">
                    <label for="_email" class="form-label">Email</label>
                    <input type="text" class="form-control form-control-sm" name="_email" id="_email"
                        value="{{ get_meta_value('_email') }}">
                </div>
            </div>
            <div class="col-5">
                <div class="mb-3">
                    <h3>Akun SosMed</h3>
                    <label for="_whatsapp" class="form-label">WhatsApp</label>
                    <input type="text" class="form-control form-control-sm" name="_whatsapp" id="_whatsapp"
                        aria-describedby="helpId" placeholder="Sertakan Url" value="{{ get_meta_value('_whatsapp') }}">
                </div>
                <div class="mb-3">
                    <label for="_instagram" class="form-label">Instagram</label>
                    <input type="text" class="form-control form-control-sm" name="_instagram"
                        id="_instagram"placeholder="Sertakan Url" value="{{ get_meta_value('_instagram') }}">
                </div>
                <div class="mb-3">
                    <label for="_linkedin" class="form-label">Linkedin</label>
                    <input type="text" class="form-control form-control-sm" name="_linkedin"
                        id="_linkedin"placeholder="Sertakan Url" value="{{ get_meta_value('_linkedin') }}">
                </div>
                <div class="mb-3">
                    <label for="_github" class="form-label">Github</label>
                    <input type="text" class="form-control form-control-sm" name="_github"
                        id="_github"placeholder="Sertakan Url" value="{{ get_meta_value('_github') }}">
                </div>
            </div>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection

{{-- jadi ini itu karena dalam script js nya itu 
    hanya yang memiliki variable skill saja, 
    kalau pada halaman yang skil nya tidak ada, maka tidak akan terbaca
     --}}
