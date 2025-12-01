@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Edit Siswa') }}</div>

                    <div class="card-body">
                        <h5>Form Edit Siswa</h5>
                        <form action="{{ route('siswa.update', $siswa->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-8">

                                    <div class="mb-3 row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" placeholder="Nama Lengkap"
                                                value="{{ $siswa->nama }}">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10 mt-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                                    type="radio" name="jenis_kelamin" id="pria" value="p"
                                                    {{ $siswa->jenis_kelamin == 'p' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="pria">Pria</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input
                                                    class="form-check-input 
                                                @error('jenis_kelamin') is-invalid @enderror"
                                                    type="radio" name="jenis_kelamin" id="wanita" value="w"
                                                    {{ $siswa->jenis_kelamin == 'w' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="wanita">Wanita</label>
                                            </div>
                                            @error('jenis_kelamin')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="tempat_lahir" class="col-sm-2 col-form-label">TTL</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text"
                                                        class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                        id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir"
                                                        value="{{ $siswa->tempat_lahir }}">
                                                    @error('tempat_lahir')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="date"
                                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                        id="tanggal_lahir" name="tanggal_lahir" placeholder="Tempat Lahir"
                                                        value="{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('Y-m-d') }}">
                                                    @error('tanggal_lahir')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat"
                                                placeholder="Alamat Lengkap">{{ $siswa->alamat }}</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                class="form-control @error('telepon') is-invalid @enderror" id="telepon"
                                                name="telepon" placeholder="Telepon (+62 xxx xxx xxx)"
                                                value="{{ $siswa->telepon }}" maxlength="15">
                                            @error('telepon')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="pendidikan_terakhir" class="col-sm-2 col-form-label">Pend.
                                            Terakhir</label>
                                        <div class="col-sm-10">
                                            <select class="form-select @error('pendidikan_terakhir') is-invalid @enderror"
                                                id="pendidikan_terakhir" name="pendidikan_terakhir">
                                                <option value="sd"
                                                    {{ $siswa->pendidikan_terakhir == 'sd' ? 'selected' : '' }}>SD</option>
                                                <option value="smp"
                                                    {{ $siswa->pendidikan_terakhir == 'smp' ? 'selected' : '' }}>SMP
                                                </option>
                                                <option value="sma"
                                                    {{ $siswa->pendidikan_terakhir == 'sma' ? 'selected' : '' }}>SMA
                                                </option>
                                                <option value="d3"
                                                    {{ $siswa->pendidikan_terakhir == 'd3' ? 'selected' : '' }}>D3</option>
                                                <option value="s1"
                                                    {{ $siswa->pendidikan_terakhir == 's1' ? 'selected' : '' }}>S1</option>
                                            </select>
                                            @error('pendidikan_terakhir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="mapel" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                                        <div class="col-sm-10">
                                            <select class="form-select @error('mapel') is-invalid @enderror"
                                                id="mapel" name="mapel">
                                                <option value="ap" {{ $siswa->mapel == 'ap' ? 'selected' : '' }}>
                                                    Aplikasi Perkantoran</option>
                                                <option value="dg" {{ $siswa->mapel == 'dg' ? 'selected' : '' }}>
                                                    Desain Graphic
                                                </option>
                                                <option value="pg" {{ $siswa->mapel == 'pg' ? 'selected' : '' }}>
                                                    Pemrogaman
                                                </option>
                                                <option value="jk" {{ $siswa->mapel == 'jk' ? 'selected' : '' }}>
                                                    Jaringan Komputer</option>
                                            </select>
                                            @error('mapel')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="fotoLama" value="{{ $siswa->foto }}">
                                            <input class="form-control @error('foto') is-invalid @enderror" type="file"
                                                id="foto" name="foto">
                                            @error('foto')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                            <span class="text-sm">Nama file saat ini: {{ $siswa->foto }}</span>
                                            <br>
                                            <button type="submit" class="btn btn-success mt-3 w-25">Simpan</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <h6>Foto</h6>
                                    <img src="{{ $siswa->foto ? '/assets/img/foto-siswa/' . $siswa->foto : '/assets/img/no-profile.jpg' }}"
                                        class="img-thumbnail" id="previewFoto">
                                </div>

                            </div>
                        </form>

                        <script>
                            document.getElementById("foto").addEventListener("change", function(e) {
                                const foto = e.target.files[0];
                                if (foto) {
                                    document.getElementById("previewFoto").src = URL.createObjectURL(foto);
                                }
                            })
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
