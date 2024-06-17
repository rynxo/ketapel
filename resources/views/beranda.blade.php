<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PONDOK DATA MEDIA</title>
        <link rel="icon" type="image/x-icon" href="{{ asset("land/assets/pdm.png")}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset("land/css/styles.css")}}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg-gradient fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5 ">
                <a class="navbar-brand" href="#page-top">PONDOK DATA</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto ">
                        <li class="nav-item"><a class="nav-link " href="#about">Tentang Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        @auth
                            <li class="nav-item"><a class="nav-link" href="/home">Dashboard</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="text-white mb-4">Tentang Pondok Data</h2>
                        <p class="text-white-50">
                            Sebuah Perusahaan yang bergerak pada bidang layanan internet yang dapat memenuhi kebutuhan internet anda. Berdiri sejak 2018, saat ini kami sudah memiliki pelanggan lebih dari
                            {{ $pl }} pelanggan di sekitar area Bantul dan Kulon Progo
                        </p>
                    </div>
                </div>
                <img class="mb-5" height="150" src="{{ asset("land/assets/img/purih.png")}}" alt="..." />
            </div>
        </section>
        <!-- Layanan-->
        <section class="projects-section bg-light" id="layanan">
            <div class="container mb-5">
                <form action="/cariLayanan" method="get" class="row input-group-newsletter">
                    @csrf
                    <div class="col-9 ms-5">
                        <input type="text" name="cari" placeholder="Cari Layanan...." class="p-3 form-control" id="emailAddress">
                    </div>
                    <div class="col-2">
                        <button class="btn btn-dark">CARI</button>
                    </div>
                </form>
            </div>
            <div class="container px-4 px-lg-5">
                @if(session('ly') && session('ly')->isNotEmpty())
                    @foreach(session('ly') as $layanan)
                        <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                            <div class="col-xl-6 col-lg-7"><img class="img-fluid mb-3 mb-lg-0 gambar" src="{{ asset('/storage/'.$layanan->fotoLayanan) }}" alt="..." height="300"/></div>
                            <div class="col-xl-6 col-lg-5">
                                <div class="featured-text text-center text-lg-left">
                                    <h1>{{ $layanan->namaLayanan }}</h1>
                                    <p class="text-black-50 mb-0">{{ $layanan->infoLayanan }}</p>
                                    <h6 class="mt-2">Rp. {{ number_format($layanan->harga, 0, ',', '.') }}/Bulan</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach ($ly as $lay)
                        <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                            <div class="col-xl-6 col-lg-7"><img class="img-fluid mb-3 mb-lg-0 gambar" src="{{ asset('/storage/'.$lay->fotoLayanan) }}" alt="..." height="300"/></div>
                            <div class="col-xl-6 col-lg-5">
                                <div class="featured-text text-center text-lg-left">
                                    <h1>{{ $lay->namaLayanan }}</h1>
                                    <p class="text-black-50 mb-0">{{ $lay->infoLayanan }}</p>
                                    <h6 class="mt-2">Rp. {{ number_format($lay->harga, 0, ',', '.') }}/Bulan</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
        <!-- contact-->
        <section class="signup-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-secondary mb-2"></i>
                                <h4 class="m-0">Alamat</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="text-black-50">Srandakan, Bantul, DI Yogyakarta</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-secondary mb-2"></i>
                                <h4 class="m-0">Email</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="text-black-50">Pondokdm@Gmail.com</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-secondary mb-2"></i>
                                <h4 class="m-0">Nomor Whatsapp</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="text-black-50">+62 851 - 3521 - 3452</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact-section bg-black">
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-whatsapp"></i></a>
                    <a class="mx-2" href="https://maps.app.goo.gl/FXxoYVQSZQYN3TgU8"><i class="fas fa-map-marked-alt"></i></a>
                </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Pondok Data Media {{ date('Y') }}</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset("land/js/scripts.js") }}"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
