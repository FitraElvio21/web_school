@extends('frontend.main')

@section('title')
Detail Prestasi
@endsection

@section('content')
<!--header-->
@include('frontend.includes.header')
<!--//header-->
<!-- inner banner -->
<div class="inner-banner">
    <section class="w3l-breadcrumb">
        <div class="container">
            <h4 class="inner-text-title font-weight-bold mb-sm-3 mb-2">{{ $prestasi->judul }}</h4>
            <b>{{ $prestasi->author }} / {{ $prestasi->tanggal_post }}</b>
        </div>
    </section>
</div>
<!-- //inner banner -->
<!-- about section -->
<section class="w3l-text-6 py-5" id="about">
    <div class="container mb-5">
        <img src="/images/prestasi/{{ $prestasi->gambar }}" alt="" class="img-resposive img-fluid" style="display: block; margin: auto;"/>
        <p class="mb-3 mt-5">
            <p class=""><?= $prestasi['description']?></p><br>
        </p>
    </div>
</section>
<!-- //about section -->
@endsection

