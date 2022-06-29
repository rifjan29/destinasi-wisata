@extends('layouts.backend.template')
@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <strong>{{ ucwords(str_replace('-',' ',Request::segment(2))) }}</strong>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="p-4">
                                <form action="{{ route('category-events.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="">Judul</label>
                                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="validationServer03" placeholder="Masukkan Judul">
                                            @error('judul')
                                                <div class="invalid-feedback">
                                                    {{ $message }}.
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Deskripsi</label>
                                            <textarea id="summernote" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="10"></textarea>
                                            @error('deskripsi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}.
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Waktu</label>
                                            <input type="date" name="waktu" class="form-control @error('waktu') is-invalid @enderror" id="validationServer03" placeholder="Masukkan Waktu">
                                            @error('waktu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}.
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3 ">
                                            <label for="">Pilihan Bahasa</label>
                                            <div class="form-check">
                                                <input class="form-check-input @error('lang') is-invalid @enderror" type="radio" name="lang" id="exampleRadios1" value="id">
                                                <label class="form-check-label" for="exampleRadios1">
                                                  Indonesia
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input @error('lang') is-invalid @enderror" type="radio" name="lang" id="exampleRadios2" value="en">
                                                <label class="form-check-label" for="exampleRadios2">
                                                  Inggris
                                                </label>
                                                @error('lang')
                                                    <div class="invalid-feedback text-danger">
                                                        {{ $message }}.
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Foto</label>
                                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="validationServer03" placeholder="Masukkan Foto">
                                            @error('foto')
                                                <div class="invalid-feedback">
                                                    {{ $message }}.
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                            </div>
                        </div>
                        <div class="card-footer p-4">
                            <div class="d-flex justify-content-end">
                                    <div class="mx-2">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                    <button type="reset" class="btn btn-outline-danger">Batal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTAINER-->
@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Masukkan Deskripsi...',
            tabsize: 2,
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
                ['height', ['height']],
            ],
        });
    });
</script>
@endpush
