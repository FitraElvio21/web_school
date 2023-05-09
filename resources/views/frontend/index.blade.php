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
                        <div class="col-lg-4 col-md-6 features15-col-text">
                            <a href="courses.html" class="d-flex feature-unit align-items-center">
                                <div class="col-4">
                                    <div class="features15-info">
                                        <img src="{{ '/images/jurusan/' . $item->foto }}" alt="{{ $item->foto }}"
                                            width="75" height="60">
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
                    <h3 class="title-big mb-3">We provide the best <br>Online Courses</h3>
                    <p class="">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo,
                        ultrices in ligula. Semper at tempufddfel. Lorem ipsum dolor sit amet.
                        Lorem ipsum viverra feugiat.</p>
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
                    <a class="btn button-style button-2 mt-lg-5 mt-4" href="about.html">Read More<i
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
                <div class="row main-contteam-32 mt-sm-5 pt-lg-2">
                    @forelse ($organisasi as $item)
                        <div class="col-lg-3 col-6 team-main-19">
                            <div class="column-19">
                                <a href="#team"><img class="img-fluid" src="/images/organisasi/{{ $item->gambar }}"
                                        alt=" "></a>
                            </div>
                            <div class="right-team-9">
                                <h6><a href="#team" class="title-team-32">{{ $item->organisasi }}</a></h6>
                                <p class="sm-text-32">{{ $item->deskripsi }}</p>
                            </div>
                        </div>
                    @empty
                        <h3>Organisasi belum tersedia</h3>
                    @endforelse

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
                    <h3 class="title-big">What Our People Say</h3>
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
                    <p class="sub-title mt-2">Cum doctus civibus efficiantur in imperdiet deterruisset. Cras efficitur,
                        metus
                        gravida suscipit cursus, dui diam pre lorem id
                        lectus.</p>
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
    <footer class="w3l-footer-22 position-relative mt-5 pt-5">
        <div class="footer-sub">
            <div class="container">
                <div class="text-txt">
                    <div class="row sub-columns">
                        <div class="col-lg-4 col-md-6 col-sm-8 sub-one-left">
                            <h6>About </h6>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab.</p>
                            <div class="columns-2">
                                <ul class="social">
                                    <li><a href="#facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                                    </li>
                                    <li><a href="#linkedin"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
                                    </li>
                                    <li><a href="#twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                                    </li>
                                    <li><a href="#google"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                                    </li>
                                    <li><a href="#github"><span class="fa fa-github" aria-hidden="true"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-4 mt-sm-0 mt-5 sub-two-right">
                            <h6>Quick links</h6>
                            <ul>
                                <li><a href="index.html"><span class="fa fa-angle-double-right mr-2"></span>Home</a>
                                </li>
                                <li><a href="about.html"><span class="fa fa-angle-double-right mr-2"></span>About</a>
                                </li>
                                <li><a href="courses.html"><span class="fa fa-angle-double-right mr-2"></span>Courses</a>
                                </li>
                                <li><a href="contact.html"><span class="fa fa-angle-double-right mr-2"></span>Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-sm-6 sub-two-right pl-lg-5 mt-lg-0 mt-sm-5 mt-4">
                            <h6>Help & Support</h6>
                            <ul>
                                <li><a href="#live"><span class="fa fa-angle-double-right mr-2"></span>Live
                                        Chart</a></li>
                                <li><a href="#faq"><span class="fa fa-angle-double-right mr-2"></span>Faq</a>
                                </li>
                                <li><a href="#support"><span class="fa fa-angle-double-right mr-2"></span>Support</a>
                                </li>
                                <li><a href="#terms"><span class="fa fa-angle-double-right mr-2"></span>Terms
                                        of Services</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-sm-6 sub-one-left mt-lg-0 mt-sm-5 mt-4">
                            <h6>Contact </h6>
                            <div class="column2">
                                <div class="href1"><span class="fa fa-envelope-o" aria-hidden="true"></span><a
                                        href="mailto:info@example.com">info@example.com</a>
                                </div>
                                <div class="href2"><span class="fa fa-phone" aria-hidden="true"></span><a
                                        href="tel:+44-000-888-999">+44-000-888-999</a>
                                </div>
                                <div>
                                    <p class="contact-para"><span class="fa fa-map-marker"
                                            aria-hidden="true"></span>London, 235 Terry, 10001</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- copyright -->
        <div class="copyright-footer text-center">
            <div class="container">
                <div class="columns">
                    <p>@2020 Online Study. All rights reserved. Design by <a href="https://w3layouts.com/"
                            target="_blank"> W3Layouts</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- //copyright -->
    </footer>
    <!-- //footer -->

    <!-- Js scripts -->
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-level-up" aria-hidden="true"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- //move top -->

    <!-- common jquery plugin -->
    <script src="frontend_assets/js/jquery-3.3.1.min.js"></script>
    <!-- //common jquery plugin -->

    <!-- theme switch js (light and dark)-->
    <script src="frontend_assets/js/theme-change.js"></script>
    <script>
        function autoType(elementClass, typingSpeed) {
            var thhis = $(elementClass);
            thhis.css({
                "position": "relative",
                "display": "inline-block"
            });
            thhis.prepend('<div class="cursor" style="right: initial; left:0;"></div>');
            thhis = thhis.find(".text-js");
            var text = thhis.text().trim().split('');
            var amntOfChars = text.length;
            var newString = "";
            thhis.text("|");
            setTimeout(function() {
                thhis.css("opacity", 1);
                thhis.prev().removeAttr("style");
                thhis.text("");
                for (var i = 0; i < amntOfChars; i++) {
                    (function(i, char) {
                        setTimeout(function() {
                            newString += char;
                            thhis.text(newString);
                        }, i * typingSpeed);
                    })(i + 1, text[i]);
                }
            }, 1500);
        }

        $(document).ready(function() {
            // Now to start autoTyping just call the autoType function with the
            // class of outer div
            // The second paramter is the speed between each letter is typed.
            autoType(".type-js", 200);
        });
    </script>
    <!-- //theme switch js (light and dark)-->

    <!-- magnific popup -->
    <script src="frontend_assets/js/jquery.magnific-popup.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',

                fixedContentPos: false,
                fixedBgPos: true,

                overflowY: 'auto',

                closeBtnInside: true,
                preloader: false,

                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });

            $('.popup-with-move-anim').magnificPopup({
                type: 'inline',

                fixedContentPos: false,
                fixedBgPos: true,

                overflowY: 'auto',

                closeBtnInside: true,
                preloader: false,

                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-slide-bottom'
            });
        });
    </script>
    <!-- //magnific popup -->

    <!-- MENU-JS -->
    <script>
        $(window).on("scroll", function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function() {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function() {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function() {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!-- //MENU-JS -->

    <!-- for testimonials carousel -->
    <script src="frontend_assets/js/owl.carousel.js"></script>
    <script>
        $(document).ready(function() {
            $("#owl-demo1").owlCarousel({
                loop: true,
                margin: 20,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 1,
                        nav: false
                    },
                    1000: {
                        items: 1,
                        nav: true,
                        loop: true
                    }
                }
            })
        })
    </script>
    <!-- //for testimonials carousel -->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function() {
            $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- //disable body scroll which navbar is in active -->

    <!--bootstrap-->
    <script src="frontend_assets/js/bootstrap.min.js"></script>
    <!-- //bootstrap-->
    <!-- //Js scripts -->
    </body>

    </html>
@endsection
