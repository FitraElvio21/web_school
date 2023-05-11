@extends('frontend.main')

@section('title')
    Home
@endsection
@section('content')
    <!--header-->
    @include('frontend.includes.header')
    <!--//header-->

    <!-- banner section -->
    <section id="home" class="w3l-banner py-5">
        <div class="container pt-5 pb-md-4">
            <div class="row align-items-center">
                <div class="col-md-6 banner-left pt-md-0 pt-5">
                    <h3 class="mb-sm-4 mb-3 title">This is the new way<br> to Learn <span class="type-js"><span
                                class="text-js">Online</span></span></h3>
                    <div class="mt-md-5 mt-4 mb-lg-0 mb-4">
                        <a class="btn button-style" href="about.html">Get Started<i class="fa fa-angle-double-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-md-6 banner-right mt-md-0 mt-4">
                    <img class="img-fluid" src="frontend_assets/images/b1.png" alt=" ">
                </div>
            </div>
        </div>
    </section>
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
                            <a href="courses.html" class="d-flex feature-unit align-items-center">
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
                    <a class="h4 text-danger" href="/detail-jurusan">Lihat Selengkapnya <i class="fa fa-angle-double-right"></i></a>
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
                    <img src="frontend_assets/images/img1.jpg" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 about-right-faq align-self mb-lg-0 mb-5 pl-xl-5">
                    <h6>About Us</h6>
                    <h3 class="title-big mb-3"><?= $about['judul']?></h3>
                    <p class=""> <?= substr($about->description, 0, 90) . '...' ?></p>
                    <div class="row mt-lg-5 mt-4 mb-2">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center left-insp-art">
                                <img src="frontend_assets/images/book.png" alt="" class="img-fluid mr-3">
                                <h6>Enhance your Skills</h6>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-sm-0 mt-4">
                            <div class="d-flex align-items-center left-insp-art">
                                <img src="frontend_assets/images/book2.png" alt="" class="img-fluid mr-3">
                                <h6>Start Online Learning</h6>
                            </div>
                        </div>
                    </div>
                    <a class="btn button-style button-2 mt-lg-5 mt-4" href="{{ '/detail-about/' . $item->id_about }}">Lihat Selengkapnya<i
                            class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- //middle section -->
    <!-- teams 32 block -->
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
                                    <?= substr($item->deskripsi, 0, 100) . '...' ?>
                                </p>
                            </div>
                        </div>
                    @empty
                        <h3>Organisasi belum tersedia</h3>
                    @endforelse
                </div>
                <div class="text-center my-5">
                    <a class="h4 text-danger" href="/detail-organisasi">Lihat Selengkapnya <i class="fa fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- //teams 32 block -->
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
                        <div class="col-lg-4 col-sm-6">
                            <div class=" grids5-info">
                                <a href="{{ '/detail-berita/' . $item->id_berita }}"><img
                                        src="{{ '/images/berita/' . $item->gambar }}" alt="{{ $item->gambar }}"></a>
                                <div class="blog-info">
                                    <h4><a href="{{ '/detail-berita/' . $item->id_berita }}">{{ $item->judul }}</a></h4>
                                    <p>
                                        <?= substr($item->isi, 0, 100) . '...' ?>
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
            </div>
        </section>
    </div>
    <!-- //blog section -->
    <!-- footer -->
@endsection
