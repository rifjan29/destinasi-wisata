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
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="">Kategori</label>
                                            <input type="text" name="" class="form-control" value="{{ $data->name }}" id="">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Maps</label>
                                            {!! $data->peta_maps !!}
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Keterangan</label>
                                            <textarea name="keterangan" class="form-control" placeholder="Masukkan Keterangan" id="" cols="30" rows="10" readonly>{{ $data->keterangan }}</textarea>
                                        </div>
                                        <div class="col-md-12 mb-3 ">
                                            <label for="">Pilihan Bahasa</label>
                                            <div class="form-check">
                                                <input readonly class="form-check-input" type="radio" name="lang" id="exampleRadios1" value="id" {{ $data->status == 'id' ? 'checked' : ''}}>
                                                <label class="form-check-label" for="exampleRadios1">
                                                  Indonesia
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input readonly class="form-check-input" type="radio" name="lang" id="exampleRadios2" value="en" {{ $data->status == 'en' ? 'checked' : ''}}>
                                                <label class="form-check-label" for="exampleRadios2">
                                                  Inggris
                                                </label>
                                            </div>
                                        </div>
                                    </div>
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
