@extends('layouts.backend.template')
@push('css')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
{{-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> --}}
@endpush
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
                                <form action="{{ route('contact-us.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <!-- Example 2 -->
                                        <div class="col-md-3 mb-3 text-center">
                                            <label for=""><i style="font-size: 50px" class="{{ $data->icon }}"></i></label>

                                        </div>
                                        <div class="col-md-9 mb-3">
                                            <label for="">icon</label>
                                            <input class="icp demo form-control @error('icon') is-invalid @enderror" name="icon" value="{{ old('icon',$data->icon) }}"  type="text">
                                            @error('icon')
                                                <div class="invalid-feedback">
                                                    {{ $message }}.
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Kontak</label>
                                            <input type="text" name="kontak" class="form-control @error('kontak') is-invalid @enderror" value="{{ old('kontak',$data->link) }}" id="validationServer03" placeholder="Masukkan Kontak">
                                            @error('kontak')
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
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(document).ready(() => {
        $('.demo').iconpicker();
    });
</script>
@endpush
