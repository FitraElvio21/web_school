@extends('frontend.main')

@section('title')
Detail Berita
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
                                <h4><a href="{{ '/detail-berita/' . $item->id_berita }}">{{ $item->judul }}</a></h4>
                                <p>
                                    <?= substr($item->isi, 0, 200) . '...' ?>
                                </p><br>
                                <a href="{{ '/detail-berita/' . $item->id_berita }}">Lihat
                                    Selengkapnya....</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3>Berita tidak tersedia</h3>
                @endforelse
            </div>
            </div>
        </div>
    </section>
</div>
<!-- //about section -->
@endsection

