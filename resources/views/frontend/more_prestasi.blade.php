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
            <h4 class="inner-text-title font-weight-bold mb-sm-3 mb-2"></h4>
        </div>
    </section>
</div>
<!-- //inner banner -->
<!-- about section -->
<div class="w3l-grids-block-5 py-5">
    <section id="grids5-block" class="pt-md-4 pb-md-5 py-4 mb-5">
        <div class="container">
            <div class="title-main text-center mx-auto mb-4">
                <h3 class="title-big">Prestasi Telkom Schools</h3>
            </div>
            <div class="row mt-sm-5 pt-lg-2">
                @forelse ($prestasi as $item)
                    <div class="col-lg-4 col-sm-5 d-flex align-items-stretch">
                        <div class=" grids5-info">
                            <a href="{{ '/detail-prestasi/' . $item->id_prestasi }}"><img class="prestasi-gambar"
                                    src="{{ '/images/prestasi/' . $item->gambar }}" alt="{{ $item->gambar }}"></a>
                            <div class="blog-info">
                                <h4><a href="{{ '/detail-prestasi/' . $item->id_prestasi }}">{{ $item->judul }}</a></h4>
                                <p>
                                    <?= substr($item->description, 0, 0) . '...' ?>
                                </p><br>
                                <a href="{{ '/detail-prestasi/' . $item->id_prestasi }}">Lihat
                                    Selengkapnya....</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3>Prestasi tidak tersedia</h3>
                @endforelse
            </div>
            </div>
        </div>
    </section>
</div>
<!-- //about section -->
@endsection

