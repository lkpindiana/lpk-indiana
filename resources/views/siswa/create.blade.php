@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Tambah Siswa') }}</div>

                    <div class="card-body">
                        <h5>Form Tambah Siswa</h5>
                        <form action="{{ route('siswa.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">

                                    <div class="mb-3 row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" placeholder="Nama Lengkap"
                                                value="{{ old('nama') }}">
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
                                                    {{ old('jenis_kelamin') == 'p' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="pria">Pria</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input
                                                    class="form-check-input 
                                                @error('jenis_kelamin') is-invalid @enderror"
                                                    type="radio" name="jenis_kelamin" id="wanita" value="w"
                                                    {{ old('jenis_kelamin') == 'w' ? 'checked' : '' }}>
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
                                                        value="{{ old('tempat_lahir') }}">
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
                                                        value="{{ old('tanggal_lahir') }}">
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
                                                placeholder="Alamat Lengkap">{{ old('alamat') }}</textarea>
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
                                            <input type="tel"
                                                class="form-control @error('telepon') is-invalid @enderror" id="telepon"
                                                name="telepon" placeholder="Telepon (+62 xxx xxx xxx)"
                                                value="{{ old('telepon') }}" maxlength="15">
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
                                                <option value="">.:: Pendidikan Terakhir ::.</option>
                                                <option value="sd"
                                                    {{ old('pendidikan_terakhir') == 'sd' ? 'selected' : '' }}>SD</option>
                                                <option value="smp"
                                                    {{ old('pendidikan_terakhir') == 'smp' ? 'selected' : '' }}>SMP
                                                </option>
                                                <option value="sma"
                                                    {{ old('pendidikan_terakhir') == 'sma' ? 'selected' : '' }}>SMA
                                                </option>
                                                <option value="d3"
                                                    {{ old('pendidikan_terakhir') == 'd3' ? 'selected' : '' }}>D3</option>
                                                <option value="s1"
                                                    {{ old('pendidikan_terakhir') == 's1' ? 'selected' : '' }}>S1</option>
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
                                                <option value="">.:: Mata Pelajaran ::.</option>
                                                <option value="ap" {{ old('mapel') == 'ap' ? 'selected' : '' }}>
                                                    Aplikasi Perkantoran
                                                </option>
                                                <option value="dg" {{ old('mapel') == 'dg' ? 'selected' : '' }}>Design
                                                    Graphic
                                                </option>
                                                <option value="pg" {{ old('mapel') == 'pg' ? 'selected' : '' }}>
                                                    Pemrogaman
                                                </option>
                                                <option value="jk" {{ old('mapel') == 'jk' ? 'selected' : '' }}>
                                                    Jaringan Komputer
                                                </option>
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
                                            <input class="form-control @error('foto') is-invalid @enderror" type="file"
                                                id="foto" name="foto" value="{{ old('foto') }}">
                                            @error('foto')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                            <button type="submit" class="btn btn-success mt-3 w-25">Simpan</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <h6>Foto</h6>
                                    <img src="/assets/img/no-profile.jpg" class="img-thumbnail" id="previewFoto">
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

                            document.getElementById("telepon").addEventListener("input", function(e) {
                                const v = this.value.replace(/\D/g, "").slice(0, 12);
                                v = v.replace(/(\d{4})(\d)/, "$1-$2");
                                v = v.replace(/(\d{4}-\d{4})(\d)/, "$1-$2");
                                this.value = v;
                            })
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
