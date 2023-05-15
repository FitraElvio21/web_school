@extends('frontend.main')

@section('title')
    GTK
@endsection

@section('content')
    <!--header-->
    @include('frontend.includes.header')
    <!--//header-->
    <!-- inner banner -->
    <div class="inner-banner">
        <section class="w3l-breadcrumb">
            <div class="container">
                <h4 class="inner-text-title font-weight-bold mb-sm-3 mb-2">GTK</h4>
            </div>
        </section>
    </div>
    <!-- //inner banner -->
    <!-- about section -->
    <div class="w3l-grids-block-5 py-5">
        <section id="grids5-block" class="pt-md-4 pb-md-5 py-4 mb-5">
            <div class="container">
                <div class="card-group">

                    <div class="row">
                        @foreach ($guru as $item)
                        {{-- mx = margin horizontal --}}
                        {{-- my = margin vertikal --}}
                            <div class="col-md-2 mx-2 my-2 sm-2 text-center d-flex align-items-stretch">
                                <div class="card " style="width: 15rem;">
                                    <img src="{{ '/images/guru/' . $item->gambar }}" class="card-img-top"
                                        alt="{{ $item->gambar }}">
                                    <div class="card-body">
                                        <p class="card-text">{{ $item->nama }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </section>
    </div>
    <!-- //about section -->
@endsection
