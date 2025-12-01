@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Siswa') }}</div>

                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-md-6">
                                <a href="{{ route('siswa.create') }}" class="btn btn-success w-25">Tambah</a>
                                <a href="{{ route('siswa.export') }}" class="btn btn-danger w-25" target="_blank">Export
                                    PDF</a>
                            </div>
                            <div class="col-md-6">
                                <form action="{{ route('siswa.index') }}" method="get">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="cari" name="cari"
                                            placeholder="Pencarian ...." value="{{ $cari ?? '' }}">
                                        <button class="btn btn-primary" type="submit">Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('delete'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('delete') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Nama Lengkap</th>
                                        <th class="text-center">L/P</th>
                                        <th>Telp</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @forelse ($siswa as $i => $row)
                                        <tr>
                                            <td class="text-center">
                                                {{ $loop->iteration + ($siswa->currentPage() - 1) * $siswa->perPage() }}
                                            </td>
                                            <td>{{ ucwords($row->nama) }}</td>
                                            <td class="text-center">{{ $row->jenis_kelamin == 'p' ? 'Pria' : 'Wanita' }}
                                            </td>
                                            <td>
                                                <a href="https://wa.me/62{{ $row->telepon }}" target="_blank"
                                                    class="text-success text-decoration-none">{{ $row->telepon }}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('siswa.show', $row->id) }}"
                                                    class="text-decoration-none text-primary">Detail</a> |
                                                <a href="{{ route('siswa.edit', $row->id) }}"
                                                    class="text-decoration-none text-warning">Edit</a> |
                                                <form action="{{ route('siswa.destroy', $row->id) }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        class="text-danger text-decoration-none btn btn-link mx-0 px-0"
                                                        onclick="return confirm('Data akan dihapus, anda yakin?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Data tidak tersedia</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $siswa->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
