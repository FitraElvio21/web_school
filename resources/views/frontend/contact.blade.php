@extends('frontend.main')

@section('title')
Contact Us
@endsection
@section('content')
<!--header-->
@include('frontend.includes.header')
<!--//header-->
<!-- inner banner -->
<div class="inner-banner">
    <section class="w3l-breadcrumb">
        <div class="container">
            <h4 class="inner-text-title font-weight-bold mb-sm-3 mb-2">Contact Us</h4>
            <ul class="breadcrumbs-custom-path">
                <li><a href="index.html">Home</a></li>
                <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span> Contact Us</li>
            </ul>
        </div>
    </section>
</div>
<!-- //inner banner -->
<!-- contact -->
<section class="contact py-5" id="contact">
    <div class="container py-md-4 py-3">
        <div class="title-main text-center mx-auto mb-md-4">
            <h3 class="title-big">Tinggalkan Pesan Anda</h3>
        </div>
        <div class="main-grid-contact">
            <div class="row mt-5 mx-0">
                <!-- map -->
                <div class="col-lg-6 map mt-lg-0 mt-3">
                    <?= $about->map_embed ?>
                </div>
                <!-- contact form -->
                <div class="col-lg-6 content-form-right p-0">
                    <div class="form-w3ls p-md-5 p-4">
                        <h4 class="mb-4 sec-title-w3">Send us a message</h4>
                        <form method="post" action="#">
                            <div class="row">
                                <div class="col-sm-6 form-group pr-sm-1">
                                    <input class="form-control" type="text" name="w3lName" id="w3lName"
                                        placeholder="First Name" required="">
                                </div>
                                <div class="col-sm-6 form-group pl-sm-1">
                                    <input class="form-control" type="text" name="w3lName" id="w3lName"
                                        placeholder="Last Name" required="">
                                </div>
                            </div><br>
                            <div class="form-group">
                                <input class="form-control" type="email" name="w3lSender" id="w3lSender"
                                    placeholder="Email" required="">
                            </div><br>
                            <div class="form-group">
                                <textarea class="form-control" name="w3lMessage" id="w3lMessage"
                                    placeholder="Message" required=""></textarea>
                            </div><br>
                            <div class="input-group1 text-right">
                                <button class="btn button-style" type="submit">Submit
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //contact -->
<!-- support -->

<!-- support -->


@endsection
