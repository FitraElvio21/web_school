@extends('frontend.main')

@section('title')
Detail Jurusan
@endsection

@section('content')
<!--header-->
@include('frontend.includes.header')
<!--//header-->
<!-- inner banner -->
<div class="inner-banner">
    <section class="w3l-breadcrumb">
        <div class="container">
            <h4 class="inner-text-title font-weight-bold mb-sm-3 mb-2"></h4>
        </div>
    </section>
</div>
<!-- //inner banner -->
<!-- about section -->
<section class="w3l-text-6 py-5" id="about">
    <div class="container mb-5">
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
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //about section -->
@endsection

