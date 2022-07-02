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
                                <form action="{{ route('destinasi.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row form-group">
                                        <div class="col-md-12 mb-3 ">
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
                                        <div class="col-md-4 mb-3">
                                            <label for="">Provinsi</label>
                                            <select name="id_provinsi" id="provinsi" class="select2 form-control">
                                                <option value=""> -- Pilih Provinsi -- </option>
                                                @foreach ($provinsi as $item)
                                                <option value="{{ $item->province_id }}"> {{ ucwords( $item->province ) }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_provinsi')
                                                <small class="text-danger ">
                                                    {{ $message }}.
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="">Kabupaten/Kota</label>
                                            <select name="id_kabupaten" id="kabupaten" class="select2 form-control">
                                                <option value="0"> Masukkan Keyword Kota/Kabupaten </option>
                                            </select>
                                            @error('id_kabupaten')
                                                <small class="text-danger ">
                                                    {{ $message }}.
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="">Kecamatan</label>
                                            <select name="id_kecamatan" id="kecamatan" class="select2 form-control js-example-basic-single">
                                                <option value="0"> Masukkan Keyword Kecamatan </option>
                                            </select>
                                            @error('id_kecamatan')
                                                <small class="text-danger ">
                                                    {{ $message }}.
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Alamat Lengkap</label>
                                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="" cols="30" rows="10"></textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}.
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Kategori Destinasi</label>
                                            <select name="kategori_destinasi" id="" class="form-control @error('kategori_destinasi')
                                                is-invalid
                                            @enderror">
                                                <option value="0"> --Pilih Kategori-- </option>
                                                @foreach ($data as $item)
                                                    <option value="{{ $item->id }}">{{ ucwords( $item->name ) }}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori_destinasi')
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
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="photos-preview h-100 rounded" style="background-color: #e5e5e5">
                                                        <div class=" ">
                                                            <img src="" class="img-fluid rounded d-flex align-items-center " id="photosPreview" alt="Foto Pengguna">
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
