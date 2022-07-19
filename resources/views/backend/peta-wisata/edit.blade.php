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
                                <form action="{{ route('peta-wisata.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="">Judul</label>
                                            <input type="text" name="title" id="" value="{{ old('title',$data->title) }}" class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan Judul">
                                            @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}.
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            {!! $data->peta_maps !!}
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Maps</label>
                                            <input type="text" name="maps" id="" class="form-control @error('maps') is-invalid @enderror" placeholder="Masukkan Embed Maps">
                                            <div class="my-3">
                                                <small>Contoh : <a href="https://www.embedmymap.com/" target="_blank" rel="noopener noreferrer" class="btn btn-secondary">Google Maps Generator</a></small>
                                            </div>
                                            @error('kategori_maps')
                                                <div class="invalid-feedback">
                                                    {{ $message }}.
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Keterangan</label>
                                            <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukkan Keterangan" id="" cols="30" rows="10">{{ old('keterangan',$data->keterangan) }}</textarea>
                                            @error('keterangan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}.
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3 ">
                                            <label for="">Pilihan Bahasa</label>
                                            <div class="form-check">
                                                <input class="form-check-input @error('lang') is-invalid @enderror" type="radio" name="lang" id="exampleRadios1" value="id" {{ $data->status == 'id' ? 'checked' : ''}}>
                                                <label class="form-check-label" for="exampleRadios1">
                                                  Indonesia
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input @error('lang') is-invalid @enderror" type="radio" name="lang" id="exampleRadios2" value="en" {{ $data->status == 'en' ? 'checked' : ''}}>
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
