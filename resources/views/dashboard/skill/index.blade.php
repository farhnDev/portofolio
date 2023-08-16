@extends('dashboard.layout')

@section('content')
    {{-- <div class="pb-3">
        <a href="{{ route('halaman.index') }}" class="btn btn-primary">
            Kembali
        </a>
    </div> --}}
    <form action="{{ route('skill.update') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">PROGRAMMING LANGUAGES & TOOLS</label>
            <input type="text" class="form-control form-control-sm skill" name="_language" id="judul"
                aria-describedby="helpId" placeholder="Apa Saja Skill Mu!" value="{{ get_meta_value('_language') }}">
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">WORKFLOW</label>
            <textarea class="form-control summernote" rows="5" id="isi" name="_workflow">
                {{ get_meta_value('_workflow') }}
         </textarea>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection

{{-- jadi ini itu karena dalam script js nya itu 
    hanya yang memiliki variable skill saja, 
    kalau pada halaman yang skil nya tidak ada, maka tidak akan terbaca
     --}}
@push('child-scripts')
    <script>
        $(document).ready(function() {
            $('.skill').tokenfield({
                autocomplete: {
                    source: [{!! $skill !!}],
                    delay: 100
                },
                showAutocompleteOnFocus: true
            });
        });
    </script>
@endpush
