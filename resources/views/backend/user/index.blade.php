@extends('layouts.backend.template')
@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container">

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <strong>Edit Profil</strong>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.update',Auth::user()->id) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="form-row form-group">
                                    <div class="col-md-12 mb-3 ">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="validationServer03" placeholder="Masukkan Nama" value="{{ old('name',$data->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}.
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3 ">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="validationServer03" placeholder="Masukkan Email" value="{{ old('email',$data->email) }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}.
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer">
                                <button type="submit" class="btn btn-success">Simpan Data</button>
                                <button type="reset" class="btn btn-outline-danger">Batal</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <strong>Ganti Password</strong>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.editPassword') }}" method="post" enctype="multipart/form">
                                @csrf
                                <div class="form-row form-group mt-3">
                                    <label for="password">Password Baru</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" data-toggle="password" autocomplete="current-password" value="{{old('password')}}" placeholder="Password Baru">
                                    @error('password')
                                        <small class="text-danger">
                                            {{ $message }}.
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-row form-group mt-3">
                                    <label for="konfirmasiPassword">Konfirmasi Password</label>
                                    <input type="password" name="konfirmasiPassword" id="konfirmasiPassword" class="form-control @error('konfirmasiPassword') is-invalid @enderror" data-toggle="password" autocomplete="current-password" value="{{old('konfirmasiPassword')}}" placeholder="Konfirmasi Password">
                                    @error('konfirmasiPassword')
                                        <small class="text-danger">
                                            {{ $message }}.
                                        </small>
                                    @enderror
                                </div>
                        </div>
                        <div class="card-footer">
                                <button type="submit" class="btn btn-success">Simpan Data</button>
                                <button type="reset" class="btn btn-outline-danger">Batal</button>
                            </form>
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
<!-- Optional JavaScript; choose one of the two! -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous">
</script>
<script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click','#delete',function(e){
                let id = $(this).attr('data-id');
                $('#id').val(id);
            })
        })
    </script>
@endpush
