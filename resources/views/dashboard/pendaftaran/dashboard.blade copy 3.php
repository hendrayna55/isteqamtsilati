@extends('dashboard.index')
@section('title', 'Home')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content Visi Admin -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #343a40;">
                        <h3 class="card-title">Dashboard</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                            data-target="#tambah">
                            <i class="fas fa-plus"></i>
                            Tambah
                        </button>
                        <!-- Modal Tambah Start -->
                        <div class="modal fade text-left" id="tambah" tabindex="-1" aria-labelledby="tambahLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahLabel">Tambah Logo & Deskripsi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form action="{{ url('/admin/dashboard/create') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Gambar</label>
                                                <input type="file"
                                                    class="form-control @error('gambar') is-invalid @enderror"
                                                    name="gambar" id="image" onchange="previewImage()">
                                                @error('logo')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Judul</label>
                                                <input class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="Enter..."
                                                    value="">
                                                @error('deskripsi')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="editor"
                                                    placeholder="Enter..." value=""></textarea>
                                                @error('deskripsi')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Link Video</label>
                                                <input class="form-control @error('video') is-invalid @enderror" name="video" placeholder="Enter..."
                                                    value="">
                                                @error('video')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                            </div>
                                        </form>
                                        <!-- form end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Tambah End -->
                        <!-- {{ $errors }} -->
                        <table class="table table-striped table-bordered projects">
                            <thead>
                                <tr style="text-align: center;">
                                    <th style="width: 10%">
                                        Gambar
                                    </th>
                                    <th style="width: 15%">
                                        Judul
                                    </th>
                                    <th style="width: 15%">
                                        Deskripsi
                                    </th>
                                    <th style="width: 15%">
                                        Link Video
                                    </th>
                                    <th style="width: 10%">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($home as $data) --}}
                                <tr style="text-align: justify;">
                                    <td>
                                        {{-- <img src="{{ asset('storage/' . $data->logo) }}" style="display:block; margin:auto; max-width: 100%"> --}}
                                    </td>
                                    <td>
                                        {{-- {{$data->judul}} --}}
                                    </td>
                                    <td>
                                        {{-- {{$data->deskripsi}} --}}
                                    </td>
                                    <td>
                                        {{-- {{$data->deskripsi}} --}}
                                    </td>
                                    <td class="project-actions text-center">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#ubah">
                                            <i class="fas fa-edit"></i>
                                            Ubah
                                        </button>
                                        <!-- Modal Ubah Start -->
                                        <div class="modal fade text-left" id="ubah" tabindex="-1"
                                            aria-labelledby="ubahLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ubahLabel">Ubah Dashboard</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- form start -->
                                                        <form action="{{ url('/admin/dashboard/update') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Gambar</label>
                                                                {{-- <img src="{{ asset('storage/' . $data->logo) }}" style="display:block; margin:auto; max-width: 100%"> --}}
                                                                <input type="file"
                                                                    class="form-control @error('gambar') is-invalid @enderror"
                                                                    name="gambar" value="" id="image"
                                                                    onchange="previewImage()">
                                                                @error('gambar')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Judul</label>
                                                                <input class="form-control" name="Judul" id="editor2" placeholder="Enter..." value="">
                                                                @error('Judul')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Deskripsi</label>
                                                                <textarea class="form-control" name="deskripsi" id="editor2" placeholder="Enter..." value=""></textarea>
                                                                @error('deskripsi')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Link Video</label>
                                                                <input class="form-control" name="video" placeholder="Enter..." value="">
                                                                @error('video')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Tutup</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-sm">Simpan</button>
                                                            </div>
                                                        </form>
                                                        <!-- form end -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Ubah End -->
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#destroy">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                        <!-- Modal Ubah Start -->
                                        <div class="modal fade text-left" id="destroy" tabindex="-1"
                                            aria-labelledby="destroyLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="destroyLabel">Delete</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- form start -->
                                                        <p>apakah anda yakin ingin menghapus data ini?</p>
                                                        <!-- form end -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{ url('/admin/dashboard') }}"
                                                            class="btn btn-success btn-sm">kembali</a>
                                                        <a href="{{ url('/admin/dashboard/destroy') }}/"
                                                            class="btn btn-danger btn-sm">delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Hapus End -->
                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <!-- <div class="card-footer" style="display: block;">
    Footer
    </div> -->
                    <!-- /.card-footer-->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('script')
    <script>
        let editor;
        ClassicEditor
            .create(document.querySelector('#editor2'))
            .then(edit => {
                editor = edit;
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
