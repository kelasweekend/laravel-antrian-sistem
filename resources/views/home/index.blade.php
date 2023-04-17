<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Antrian</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta http-equiv="refresh" content="3" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css"
        integrity="sha512-gMjQeDaELJ0ryCI+FtItusU9MkAifCZcGq789FrzkiM49D8lbDhoaUaIX4ASU187wofMNlgBJ4ckbrXM9sE6Pg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('fe/css/styles.css') }}">
</head>

<body>
    <main>
        <div class="container">
            <header>
                <div class="d-flex justify-content-between">
                    <img src="{{ asset('assets/logo.png') }}" width="200" alt="">
                    <div class="jam">
                        <h3 id="clock">23:57:00</h3>
                        <p class="mb-0" id="day">Minggu, 16 April 2023</p>
                    </div>
                </div>
            </header>

            <div class="row ads">
                <div class="col-9">
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2023/4/14/98e01865-e276-42ef-81da-6513ed1f1f7d.jpg.webp"
                                    class="d-block w-100 img-ads" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2023/4/14/98e01865-e276-42ef-81da-6513ed1f1f7d.jpg.webp"
                                    class="d-block w-100 img-ads" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2023/4/14/98e01865-e276-42ef-81da-6513ed1f1f7d.jpg.webp"
                                    class="d-block w-100 img-ads" alt="...">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card">
                        <h3 class="buka">Jam Buka</h3>
                        <h4>08:10</h4>
                        <hr>
                        <h3 class="tutup">Jam Tutup</h3>
                        <h4>17:30</h4>

                        {{-- <!-- <div class="rehat">
                            <img src="{{ asset('fe/img/coffee-cup.png') }}" width="150" alt="">
                            <h3>Sedang Istirahat</h3>
                            <p>Hingga 12:30</p>
                        </div> --> --}}
                    </div>
                </div>
            </div>

            <div class="info">
                <div class="d-flex">
                    <i class="fas fa-info-circle"></i>
                    <marquee direction="left">
                        Selamat Datang di Layanan Terpadu Samsat Bersama, Untuk Hari ini kami buka hingga 17.00
                    </marquee>
                </div>
            </div>

            <div class="row antri">
                @foreach ($data as $item)
                    <div class="col-3">
                        <div class="card">
                            <h4>Nomor Antrian</h4>
                            <h2 id="nomor-{{ $item->id }}">-</h2>
                            <p>{{ $item->tujuan }}</p>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-3">
                    <div class="card">
                        <h4>Nomor Antrian</h4>
                        <h2>A001</h2>
                        <p>Loket 2</p>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card">
                        <h4>Nomor Antrian</h4>
                        <h2>A001</h2>
                        <p>Loket 3</p>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card">
                        <h4>Nomor Antrian</h4>
                        <h2>A001</h2>
                        <p>Loket 4</p>
                    </div>
                </div> --}}
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="{{ asset('fe/js/scripts.js') }}"></script>

    @foreach ($data as $js)
        <script>
            $('document').ready(function() {
                setInterval(function() {
                    // getRealData('{{ $js->id }}')
                    var nomor = '{{ $js->id }}'
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        data: {
                            nomor: nomor
                        },
                        url: "/",
                        type: "POST",
                        dataType: 'json',
                        success: function(data) {
                            var id = '#nomor-' + nomor;
                            $(id).html(data);
                            console.log(data);
                        },
                        error: function() {
                            console.log('error');
                        }
                    });
                }, 1500); //request every x seconds
            });
        </script>
    @endforeach
</body>

</html>
