@extends('frontend.main')

@section('title')
    Home
@endsection
@section('content')
    <!--header-->
    @include('frontend.includes.header')
    <!--//header-->

    <!-- banner section -->
    {{-- carousel --}}
    <section id="home" class="w3l-banner">
        <!-- Carousel -->
        <div id="kampus" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#kampus" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#kampus" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#kampus" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                @foreach ($carousel as $index => $item)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ '/images/carousel/' . $item->gambar }}" alt="{{ $item->gambar }}"
                            class="d-block w-100">
                        <div class="carousel-caption">
                            <h3>{{ $item->judul }}</h3>
                            <p>{{ $item->description }}</p>
                            {{-- tampilkan tombol hanya di slide carousel pertama --}}

                            @php
                                // buat int untuk tanggal sekarang
                                $timestamp1 = strtotime(date("Y-m-d"));
                                $tanggal_sekarang = intval($timestamp1);

                                // buat int untuk tanggal_buka
                                $timestamp2 = strtotime($golongan_terakhir->tanggal_buka);
                                $tanggal_buka = intval($timestamp2);

                                // buat int untuk tanggal_tutup
                                $timestamp3 = strtotime($golongan_terakhir->tanggal_tutup);
                                $tanggal_tutup = intval($timestamp3);


                            @endphp
                            {{-- tampilkan tombol hanya di slide carousel yang pertama --}}
                            @if ($index == 0)
                                {{-- cek apakah tanggal sekarang itu lebih dari/sama dengan tanggalbuka DAN --}}
                                {{-- tanggal sekarang kurang dari sama dengan tanggal_tutup --}}
                                {{-- jika benar, maka tampilkan tombol --}}
                                @if ($tanggal_sekarang >= $tanggal_buka && $tanggal_sekarang <= $tanggal_tutup )
                                    <a href="" class="btn btn-primary btn-lg">Daftar Golongan {{ $golongan_terakhir->golongan }}</a>
                                @endif

                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#kampus" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#kampus" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>
    {{-- //carousel --}}
    <!-- //banner section -->
    <!-- banner bottom section -->
    <div class="w3l-index-block4 pb-5">
        <div class="features-bg pb-lg-5 pt-lg-4 py-4">
            <div class="container">
                <div class="title-main text-center mx-auto mb-md-4">
                    <h3 class="title-big">Jurusan</h3>
                    <p class="sub-title mt-2">Kampus kami menyediakan beberapa jurusan yang berakreditasi A</p>
                </div>
                <div class="row">
                    @foreach ($jurusan as $item)
                        <div class="col-lg-4 col-md-6 features15-col-text d-flex align-items-stretch">
                            <a href="{{ '/detail-jurusan/' . $item->id_jurusan }}"
                                class="d-flex feature-unit align-items-center">
                                <div class="col-4">
                                    <div class="features15-info">
                                        <img src="{{ '/images/jurusan/' . $item->foto }}" alt="{{ $item->foto }}"
                                            width="100" height="100">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="features15-para">
                                        <h4>{{ $item->jurusan }}</h4>
                                        <p>{{ $item->description }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="text-center my-5">
                    <a class="btn button-style button-2 mt-lg-10 mt-4" href="/more-jurusan">Lihat Selengkapnya<i
                            class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- //banner bottom section -->
    <!-- middle section -->
    <section class="w3l-servicesblock py-md-5 py-4">
        <div class="container pb-2">
            <div class="row align-items-center">
                <div class="col-lg-6 left-wthree-img pr-lg-4">
                    <img src="/images/about/{{ $about->gambar }}" width="300" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 about-right-faq align-self mb-lg-0 mb-5 pl-xl-5">
                    <h6>About Us</h6>
                    <h3 class="title-big mb-3"><?= $about['judul'] ?></h3>
                    <p class=""> <?= substr($about->description, 0, 300) . '...' ?></p>
                    <a class="btn button-style button-2 mt-lg-5 mt-4" href="{{ '/detail-about/' . $item->id_about }}">Lihat
                        Selengkapnya<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- //middle section -->
    {{-- services
    <section class="service-section">
        <div class="title-main text-center mx-auto mb-4">
            <h3 class="title-big">Services</h3>
        </div>
        <div class="row">
            @foreach ($service as $item)
                <div class="column service-column">
                    <div class="card service-card">
                        <div class="features15-info">
                            <img src="{{ '/images/service/' . $item->icon }}" alt="{{ $item->icon }}" width="100"
                                height="100">
                        </div>
                        <h3 class="service-title">{{ $item->title }}</h3>
                        <p class="service-content">{{ $item->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section> --}}
    {{-- //services --}}
    <!-- organisasi -->
    <section class="w3l-teams-32-main py-5">
        <div class="teams-32 py-md-4">
            <div class="container">
                <div class="title-main text-center mx-auto mb-4">
                    <h3 class="title-big">Organisasi</h3>
                </div>
                <div class="row main-contteam-32 mt-sm-5 pt-lg-2 ">
                    @forelse ($organisasi as $item)
                        <div class="col-lg-3 col-6 team-main-19 ">
                            <div class="column-19">
                                <a href="#team"><img class="img-fluid" src="/images/organisasi/{{ $item->gambar }}"
                                        alt=" "></a>
                            </div>
                            <div class="right-team-9">
                                <h6><a href="#team" class="title-team-32">{{ $item->organisasi }}</a></h6>
                                {{-- <p class="sm-text-32">{{ $item->deskripsi }}</p> --}}
                                <p>
                                    <?= substr($item->deskripsi, 0, 80) . '...' ?>
                                </p>
                            </div>
                        </div>
                    @empty
                        <h3>Organisasi belum tersedia</h3>
                    @endforelse
                </div>
                <div class="text-center my-5">
                    <a class="btn button-style button-2 mt-lg-10 mt-4" href="/detail-organisasi">Lihat Selengkapnya<i
                            class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- //organisasi -->
    <!-- testimonials -->
    <section class="w3l-companies-hny-6 position-relative">
        <div class="cusrtomer-layout py-5">
            <div class="container py-md-4 py-3">
                <div class="title-heading-w3 text-center mx-auto">
                    <h3 class="title-big">Testimoni</h3>
                </div>
                <div id="owl-demo1" class="owl-carousel owl-theme mt-5">
                    @forelse ($testimoni as $item)
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <div class="testi-des">
                                        <div class="test-img"><img src="images/testimoni/{{ $item->foto }}"
                                                class="img-fluid" width="75" alt="/">
                                        </div>
                                        <div class="peopl">
                                            <h3>{{ $item->nama }}</h3>
                                            <p class="indentity">{{ $item->pekerjaan }}</p>
                                        </div>
                                    </div>
                                    <blockquote>
                                        <p>{{ $item->pesan }}</p>
                                    </blockquote>
                                    <quote></quote>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="quote-special">
                <i class="fa fa-quote-left" aria-hidden="true"></i>
            </div>
        </div>
    </section>
    <!--//testimonials-->
    <!-- blog section -->
    <div class="w3l-grids-block-5 py-5">
        <section id="grids5-block" class="pt-md-4 pb-md-5 py-4 mb-5">
            <div class="container">
                <div class="title-main text-center mx-auto mb-4">
                    <h3 class="title-big">Berita Terkini</h3>
                    <p class="sub-title mt-2">Berita terbaru dari sekolah</p>
                </div>
                <div class="row mt-sm-5 pt-lg-2">
                    @forelse ($berita as $item)
                        <div class="col-lg-4 col-sm-5 d-flex align-items-stretch">
                            <div class=" grids5-info">
                                <a href="{{ '/detail-berita/' . $item->id_berita }}"><img class="berita-gambar"
                                        src="{{ '/images/berita/' . $item->gambar }}" alt="{{ $item->gambar }}"></a>
                                <div class="blog-info">
                                    <h5>{{ $item->author . ' - ' . $item->tanggal_post }}</h5>
                                    <h4><a href="{{ '/detail-berita/' . $item->id_berita }}">{{ $item->judul }}</a></h4>
                                    <p>
                                        <?= substr($item->isi, 0, 50) . '...' ?>
                                    </p>
                                    <a href="{{ '/detail-berita/' . $item->id_berita }}">Lihat
                                        Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3>Berita tidak tersedia</h3>
                    @endforelse
                </div>
                <div class="text-center my-5">
                    <a class="btn button-style button-2 mt-lg-10 mt-4" href="/more-berita">Lihat Selengkapnya<i
                            class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </section>
    </div>
    <!-- //blog section -->
    {{-- prestasi --}}
    <div class="w3l-grids-block-5 py-5">
        <section id="grids5-block" class="pt-md-4 pb-md-5 py-4 mb-5">
            <div class="container">
                <div class="title-main text-center mx-auto mb-4">
                    <h3 class="title-big">Prestasi Telkom Schools</h3>
                    <p class="sub-title mt-2"></p>
                </div>
                <div class="row mt-sm-5 pt-lg-2">
                    @forelse ($prestasi as $item)
                        <div class="col-lg-4 col-sm-5 d-flex align-items-stretch">
                            <div class=" grids5-info">
                                <a href="{{ '/detail-prestasi/' . $item->id_prestasi }}"><img class="prestasi-gambar"
                                        src="{{ '/images/prestasi/' . $item->gambar }}" alt="{{ $item->gambar }}"></a>
                                <div class="blog-info">
                                    <h5>{{ $item->author . ' - ' . $item->tanggal_post }}</h5>
                                    <h4><a href="{{ '/detail-prestasi/' . $item->id_prestasi }}">{{ $item->judul }}</a>
                                    </h4>
                                    <p>
                                        <?= substr($item->description, 0, 0) . '...' ?>
                                    </p>
                                    <a href="{{ '/detail-prestasi/' . $item->id_prestasi }}">Lihat
                                        Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3>Prestasi tidak tersedia</h3>
                    @endforelse
                </div>
                <div class="text-center my-5">
                    <a class="btn button-style button-2 mt-lg-10 mt-4" href="/more-prestasi">Lihat Selengkapnya<i
                            class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </section>
    </div>
    {{-- //prestasi --}}
    <!-- footer -->
@endsection
