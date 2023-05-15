@extends('frontend.main')

@section('title')
Detail Organisasi
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
<section class="w3l-teams-32-main py-5">
    <div class="teams-32 py-md-4">
        <div class="container">
            <div class="title-main text-center mx-auto mb-4">
                <h3 class="title-big">Organisasi</h3>
            </div>
            <div class="row main-contteam-32 mt-sm-5 pt-lg-2">
                @forelse ($organisasi as $item)
                    <div class="col-lg-3 col-6 team-main-19">
                        <div class="column-19">
                            <a href="#team"><img class="img-fluid" src="/images/organisasi/{{ $item->gambar }}"
                                    alt=" "></a>
                        </div>
                        <div class="right-team-9">
                            <h6><a href="#team" class="title-team-32"><?=$item->organisasi ?></a></h6>
                            {{-- <p class="sm-text-32">{{ $item->deskripsi }}</p> --}}
                            <p><?= $item->deskripsi ?></p>
                        </div>
                    </div>
                @empty
                    <h3>Organisasi belum tersedia</h3>
                @endforelse
            </div>
        </div>
    </div>
</section>
<!-- //about section -->
@endsection

