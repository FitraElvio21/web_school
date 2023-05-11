@extends('frontend.main')

@section('title')
Detail About
@endsection

@section('content')
<!--header-->
@include('frontend.includes.header')
<!--//header-->
<!-- inner banner -->
<div class="inner-banner">
    <section class="w3l-breadcrumb">
        <div class="container">
            <h4 class="inner-text-title font-weight-bold mb-sm-3 mb-2">{{ $about->judul }}</h4>
        </div>
    </section>
</div>
<!-- //inner banner -->
<!-- about section -->
<section class="w3l-servicesblock py-md-5 py-4">
    <div class="container pb-2">
        <div class="row align-items-center">
            <div class="col-lg-6 left-wthree-img pr-lg-4">
                <img src="/images/about/{{ $about->gambar }}" width="80%" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6 about-right-faq align-self mb-lg-0 mb-5 pl-xl-5">
                <h6>About Us</h6>
                <h3 class="title-big mb-3"><?= $about['judul']?></h3><br>
                <p class=""><?= $about['description']?></p><br>
                <p class=""><?= $about['visi']?></p><br>
                <p class=""><?= $about['misi']?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //about section -->
@endsection
