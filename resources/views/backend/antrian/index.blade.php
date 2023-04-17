@extends('layouts.backend.master')
@section('title')
    Loket Management
@endsection

@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Nomor Antrian</h4>
                </div>
                <div class="card-body text-center">
                    <h1 class="antri">
                        {{ $data->nomor }}
                    </h1>
                </div>
                <div class="card-footer text-center">
                    <h4 class="mb-0">{{ $data->loket->tujuan }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Setting Antrian</h4>
                </div>
                <div class="card-body text-center">
                    <form action="{{ route('v1.antrian.next') }}" method="POST" class="mb-3">
                        @csrf
                        <input type="text" hidden name="antrian" value="{{ $data->nomor }}">
                        <input type="text" hidden name="kode" value="{{ $data->loket->kode }}">
                        <button type="submit" class="btn w-100 btn-primary">
                            Panggil Selanjutnya
                            <i class="bi bi-arrow-right-square-fill"></i>
                        </button>
                    </form>
                    <button type="button" id="ulangi" class="btn w-100 btn-danger">
                        <i class="bi bi-arrow-repeat"></i>
                        Ulangi Panggilan
                    </button>
                </div>
                <div class="card-footer">
                    <p class="text-center text-muted">
                        Apabila Pelanggan Tidak Ada Hingga Panggilan 3x Maka Silahkan Lanjutkan Nomor Antrian
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@600&display=swap" rel="stylesheet">
    <style>
        .antri {
            font-family: 'DynaPuff', cursive;
            font-weight: 600;
            font-size: 80px
        }
    </style>
@endsection

@section('scripts')
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=jQZ2zcdq"></script>
    @if (session('finish'))
        <script>
            responsiveVoice.speak("Nomor Antrian, " + '{{ $data->nomor }}' +
                ", menuju, loket, " + '{{ $data->loket->tujuan }}',
                "Indonesian Male", {
                    rate: 0.8,
                    pitch: 1,
                    volume: 100
                });
        </script>
    @endif
    <script>
        $('#ulangi').click(function() {
            responsiveVoice.speak("Kami Ulangi, " + " Nomor Antrian, " + '{{ $data->nomor }}' +
                ", menuju, loket, " + '{{ $data->loket->tujuan }}',
                "Indonesian Male", {
                    rate: 0.8,
                    pitch: 1,
                    volume: 100
                });
        });
    </script>
@endsection
