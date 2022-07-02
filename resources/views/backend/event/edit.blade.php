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
                                <form action="{{ route('events.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="">Judul</label>
                                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="validationServer03" value="{{ old('judul',$data->title) }}" placeholder="Masukkan Judul">
                                            @error('judul')
                                                <div class="invalid-feedback">
                                                    {{ $message }}.
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Deskripsi</label>
                                            <textarea id="summernote" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="10">{{ old('deskripsi',$data->deskripsi) }}</textarea>
                                            @error('deskripsi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}.
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col md-6 mb-3">
                                            <label for="">Kategori Event</label>
                                            <select name="kategori_event" id="" class="form-control">
                                                <option value=""> --Pilih Kategori-- </option>
                                                @foreach ($data_kategori as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $data->kategori_event_id ? 'selected' : ' ' }}>{{ ucwords( $item->name ) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Waktu</label>
                                            <input type="date" name="waktu" class="form-control @error('waktu') is-invalid @enderror" value="{{ $data->waktu }}" id="validationServer03" placeholder="Masukkan Waktu">
                                            @error('waktu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}.
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3 ">
                                            <label for="">Pilihan Bahasa</label>
                                            <div class="form-check">
                                                <input class="form-check-input @error('lang') is-invalid @enderror" type="radio" name="lang" id="exampleRadios1" value="id" {{ old('lang',$data->status) == 'id' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="exampleRadios1">
                                                  Indonesia
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input @error('lang') is-invalid @enderror" type="radio" name="lang" id="exampleRadios2" value="en" {{ old('lang',$data->status) == 'en' ? 'checked' : '' }}>
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
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="photos-preview h-100 rounded" style="background-color: #e5e5e5">
                                                        <div class=" ">
                                                            <img src="{{ asset('img/events/'.$data->photos) }}" class="img-fluid rounded d-flex align-items-center " id="photosPreview" alt="Foto Pengguna">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="file" id="photos" name="foto" class="form-control @error('foto') is-invalid @enderror" id="validationServer03" placeholder="Masukkan Foto">
                                                    @error('foto')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}.
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
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
<script>
    $(document).ready(() => {
        $('#photos').change(function () {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    $('#photosPreview')
                    .attr("src",event.target.result);
                };
                reader.readAsDataURL(file);
            }
        })
    });
</script>
@endpush
