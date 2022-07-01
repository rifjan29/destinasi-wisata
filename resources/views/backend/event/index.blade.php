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
                                <div>
                                    <a href="{{ route('events.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-responsive-data2 p-5">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Foto</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Bahasa</th>
                                            <th>Waktu</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="w-25">
                                                    <img src="{{ asset('img/events/'.$item->photos) }}" alt="" class="w-25 img-fluid">
                                                </td>
                                                <td>{{ ucwords( $item->title ) }}</td>
                                                <td>{!! $item->deskripsi !!}</td>
                                                <td>{{ $item->status == 'en' ? 'Inggris' : 'Indonesia' }}</td>
                                                <td>{{ date('d-m-Y', strtotime($item->waktu)); }}</td>
                                                <td>
                                                    <div class="table-data-feature d-flex justify-content-start">
                                                        <a href="{{ route('events.edit',$item->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <form action="{{ route('events.destroy',$item->id) }}" method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" onclick="return confirm('Hapus Data ?')" class="item" id="delete" data-id="{{ $item->id }}" data-toggle="modal" data-placement="top" title="Delete" data-target="#exampleModal">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" align="center" >Tidak ada data</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
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
        $(document).ready(function() {
            $(document).on('click','#delete',function(e){
                let id = $(this).attr('data-id');
                $('#id').val(id);
            })
        })
    </script>
@endpush
