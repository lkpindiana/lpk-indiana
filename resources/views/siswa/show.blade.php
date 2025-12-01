@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Tambah Siswa') }}</div>

                    <div class="card-body">
                        <h5>Detail Siswa</h5>
                        <div class="row">
                            <div class="col-md-8">

                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control text-uppercase"
                                            value="{{ $siswa->nama }}" disabled>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10 mt-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $siswa->jenis_kelamin == 'p' ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="pria">Pria</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                {{ $siswa->jenis_kelamin == 'w' ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="wanita">Wanita</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="tempat_lahir" class="col-sm-2 col-form-label">TTL</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control text-uppercase"
                                                    value="{{ $siswa->tempat_lahir }}" disabled>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control"
                                                    value="{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d M Y') }}"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control text-capitalize" disabled>{{ $siswa->alamat }}</textarea>
                                    </div>
                                </div>

                                <div class="mb-3
                                            row">
                                    <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $siswa->telepon }}" disabled>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="pendidikan_terakhir" class="col-sm-2 col-form-label">Pend. Terakhir</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" disabled>
                                            <option>{{ strtoupper($siswa->pendidikan_terakhir) }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="mapel" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" disabled>
                                            @if ($siswa->mapel == 'ap')
                                                <option>Aplikasi Perkantoran</option>
                                            @endif
                                            @if ($siswa->mapel == 'dg')
                                                <option>Design Graphic</option>
                                            @endif
                                            @if ($siswa->mapel == 'pg')
                                                <option>Pemrogaman</option>
                                            @endif
                                            @if ($siswa->mapel == 'jk')
                                                <option>Jaringan Komputer</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="foto" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <a href="{{ route('siswa.edit', $siswa->id) }}"
                                            class="btn btn-warning mt-3 w-25">Edit</a>
                                        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger mt-3 w-25"
                                                onclick="return confirm('Data akan dihapus, anda yakin?')">Delete</button>
                                        </form>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <h6>Foto</h6>
                                <img src="{{ '/assets/img/foto-siswa/' . $siswa->foto }}" class="img-thumbnail"
                                    id="previewFoto">
                                <br>
                                <span class="text-sm">File: {{ $siswa->foto }}</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
