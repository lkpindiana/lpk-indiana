@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <div class="row g-2 align-item-center justify-content-center text-center fw-bold">
                            <div class="col-md-3">Jumlah Siswa <br> <span class="h1">{{ $jml_siswa }}</span></div>
                            <div class="col-md-3">Jumlah Mapel <br> <span class="h1">4</span></div>
                            <div class="col-md-3">Jumlah Instruktur <br> <span class="h1">5</span></div>
                            <div class="col-md-3">Jumlah Staf <br> <span class="h1">12</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
