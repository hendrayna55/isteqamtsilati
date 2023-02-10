@extends('dashboard.index')
@section('title', 'Berita')
@section('content')

    <style>
        .scroll {
            width: 100%;
            overflow-y: scroll;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{url('/admin/berita')}}">Berita</a></li>
                            <li class="breadcrumb-item active">Berita</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Menu Berita -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #343a40;">
                        <h3 class="card-title">Berita</h3>
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
                            Tambah Berita
                        </button>
                        <!-- Modal Tambah Start -->
                        <div class="modal fade text-left" id="tambah" tabindex="-1" aria-labelledby="tambahLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahLabel">Tambah Berita</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form action="{{ url('/admin/berita/create') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Judul</label>
                                                <input class="form-control @error('judul') is-invalid @enderror"
                                                    name="judul" placeholder="Enter..." value="">
                                                @error('judul')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="editor" placeholder="Enter..."
                                                    value=""></textarea>
                                                @error('body')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <select name="kategori_id" id="" class="form-control">
                                                    <option disabled selected value="">Pilih Kategori</option>
                                                    @foreach ($kategori as $data)
                                                        <option value="{{ $data->id }}">{{ $data->nama_kategori }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('kategori_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
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
                                                <label>Status</label>
                                                <select name="is_active" id="" class="form-control">
                                                    <option disabled selected value="">Pilih Status</option>
                                                    <option value="1">Publish</option>
                                                    <option value="0">Draft</option>
                                                </select>
                                                @error('kategori_id')
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
                        {{-- {{ $errors }} --}}
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered projects ">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>
                                            Judul
                                        </th>
                                        <th>
                                            slug
                                        </th>
                                        <th>
                                            Deskripsi
                                        </th>
                                        <th>
                                            Kategori
                                        </th>
                                        <th>
                                            Author
                                        </th>
                                        <th>
                                            Gambar
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($berita as $data)
                                        <tr style="text-align: justify;">
                                            <td>
                                                {{ $data->judul }}
                                            </td>
                                            <td>
                                                {{ $data->slug }}
                                            </td>
                                            <td>
                                                {!! $data->body !!}
                                            </td>
                                            <td>
                                                {{ $data->kategori->nama_kategori }}
                                            </td>
                                            <td>
                                                {{ $data->user->name }}
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/' . $data->gambar) }}"
                                                    style="display:block; margin:auto; max-width: 100%">
                                            </td>
                                            <td>
                                                @if ($data->is_active == 1)
                                                    Publish
                                                @elseif ($data->is_active == 0)
                                                    Draft
                                                @endif
                                            </td>
                                            <td class="project-actions text-center">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#ubah{{$data->id}}">
                                                    <i class="fas fa-edit"></i>
                                                    Ubah
                                                </button>
                                                <!-- Modal Ubah Start -->
                                                <div class="modal fade text-left" id="ubah{{$data->id}}" tabindex="-1"
                                                    aria-labelledby="ubahLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="ubahLabel">Ubah Berita</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <form
                                                                    action="{{ url('/admin/berita/update') }}/{{ $data->id }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label>Judul</label>
                                                                        <input
                                                                            class="form-control @error('judul') is-invalid @enderror"
                                                                            name="judul" placeholder="Enter..."
                                                                            value="{{ $data->judul }}">
                                                                        @error('judul')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Deskripsi</label>
                                                                        <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="editor2"
                                                                            placeholder="Enter..." value="{{ $data->body }}" >{{ $data->body }}</textarea>
                                                                        @error('body')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Kategori</label>
                                                                        <select name="kategori_id" id=""
                                                                            class="form-control">
                                                                            <option value="{{ $data->kategori_id }}">
                                                                                {{ $data->kategori->nama_kategori }}
                                                                            </option>
                                                                            @foreach ($kategori as $d)
                                                                                <option value="{{ $d->id }}">
                                                                                    {{ $d->nama_kategori }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('kategori_id')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Gambar</label>
                                                                        <img src="{{ asset('storage/' . $data->gambar) }}"
                                                                            style="display:block; margin:auto; max-width: 100%">
                                                                        <input type="file"
                                                                            class="form-control @error('gambar') is-invalid @enderror"
                                                                            name="gambar" id="image"
                                                                            onchange="previewImage()">
                                                                        @error('logo')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Status</label>
                                                                        <select name="is_active" id=""
                                                                            class="form-control">
                                                                            <option value="{{ $data->is_active }}">
                                                                                {{ $data->is_active == 1 ? 'Publish' : 'Draft' }}
                                                                            </option>
                                                                            <option value="1">Publish</option>
                                                                            <option value="0">Draft</option>
                                                                        </select>
                                                                        @error('kategori_id')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary btn-sm"
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
                                                    data-target="#destroy{{ $data->id }}">
                                                    <i class="fas fa-trash"></i>
                                                    Hapus
                                                </button>
                                                <!-- Modal Ubah Start -->
                                                <div class="modal fade text-left" id="destroy{{ $data->id }}"
                                                    tabindex="-1" aria-labelledby="destroyLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="destroyLabel">Delete</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- form start -->
                                                                <p>apakah anda yakin ingin menghapus data ini?</p>
                                                                <!-- form end -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="{{ url('/admin/berita') }}"
                                                                    class="btn btn-success btn-sm">kembali</a>
                                                                <a href="{{ url('/admin/berita/destroy') }}/{{ $data->id }}"
                                                                    class="btn btn-danger btn-sm">delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Hapus End -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Menu Berita Kategori -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #343a40;">
                        <h3 class="card-title">Kategori Berita</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                            data-target="#tambahhh">
                            <i class="fas fa-plus"></i>
                            Tambah Kategori Berita
                        </button>
                        <!-- Modal Tambah Start -->
                        <div class="modal fade text-left" id="tambahhh" tabindex="-1" aria-labelledby="tambahLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahLabel">Tambah Kategori Berita</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form action="{{ url('/admin/berita/create/kategori') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Kategori Berita</label>
                                                <input class="form-control @error('nama_kategori') is-invalid @enderror"
                                                    name="nama_kategori" placeholder="Enter..." value="">
                                                @error('nama_kategori')
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
                        {{-- {{ $errors }} --}}
                        <table class="table table-striped table-bordered projects">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>
                                        Kategori
                                    </th>
                                    <th>
                                        Slug
                                    </th>
                                    <th>
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $data)
                                    <tr style="text-align: justify;">
                                        <td>
                                            {{ $data->nama_kategori }}
                                        </td>
                                        <td>
                                            {{ $data->slug }}
                                        </td>
                                        <td class="project-actions text-center">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#ubahhh{{$data->id}}">
                                                <i class="fas fa-edit"></i>
                                                Ubah
                                            </button>
                                            <!-- Modal Ubah Start -->
                                            <div class="modal fade text-left" id="ubahhh{{$data->id}}" tabindex="-1"
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
                                                            <form
                                                                action="{{ url('/admin/berita/update/kategori') }}/{{ $data->id }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label>Kategori</label>
                                                                    <input class="form-control" name="nama_kategori"
                                                                        placeholder="Enter..."
                                                                        value="{{ $data->nama_kategori }}">
                                                                    @error('nama_kategori')
                                                                        <div class="invalid-feedback">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-secondary btn-sm"
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
                                                data-target="#destroy{{ $data->id }}">
                                                <i class="fas fa-trash"></i>
                                                Hapus
                                            </button>
                                            <!-- Modal Ubah Start -->
                                            <div class="modal fade text-left" id="destroy{{ $data->id }}"
                                                tabindex="-1" aria-labelledby="destroyLabel" aria-hidden="true">
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
                                                            <a href="{{ url('/admin/berita') }}"
                                                                class="btn btn-success btn-sm">kembali</a>
                                                            <a href="{{ url('/admin/berita/destroy/kategori') }}/{{ $data->id }}"
                                                                class="btn btn-danger btn-sm">delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Hapus End -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
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
