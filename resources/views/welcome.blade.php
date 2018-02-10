@extends('layouts.lesser.main')

@section('header')
    @include('layouts.lesser.inc.header')
@endsection

@section('content')
    <div id="fh5co-intro-section">
        <div class="container">
            <div class="row">

                <div class="container">
                    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel" data-slide-to="1"></li>
                            <li data-target="#carousel" data-slide-to="2"></li>
                        </ol>
                        <!-- Carousel items -->
                        <div class="carousel-inner carousel-zoom">
                            <div class="active item"><img class="img-responsive" src="lesser/images/model1.jpg"
                                                          width="100%" height="50%">
                                <div class="carousel-caption">
                                    <h2>Title</h2>
                                    <p>Description</p>
                                </div>
                            </div>
                            <div class="item"><img class="img-responsive" src="lesser/images/model2.jpg" width="100%"
                                                   height="50%">
                                <div class="carousel-caption">
                                    <h2>Title</h2>
                                    <p>Description</p>
                                </div>
                            </div>
                            <div class="item"><img class="img-responsive" src="lesser/images/model3.jpg" width="100%"
                                                   height="50%">
                                <div class="carousel-caption">
                                    <h2>Title</h2>
                                    <p>Description</p>
                                </div>
                            </div>
                        </div>
                        <!-- Carousel nav -->
                        <a class="carousel-control left" href="#carousel" data-slide="prev">‹</a>
                        <a class="carousel-control right" href="#carousel" data-slide="next">›</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
        <h2>Check out our houses</h2>
        <p>HOUSE CATEGORIES</p>
    </div>
    <div id="fh5co-featured-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="#" class="featured-grid" style="background-image: url(lesser/images/model1.jpg);">
                        <div class="desc">
                            <h3>Clustered Bungalow</h3>
                            <span>Web Design</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#" class="featured-grid featured-grid-2"
                       style="background-image: url(lesser/images/model2.jpg);">
                        <div class="desc">
                            <h3>Bungalow</h3>
                            <span>Application</span>
                        </div>
                    </a>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="featured-grid featured-grid-2"
                               style="background-image: url(lesser/images/model3.jpg);">
                                <div class="desc">
                                    <h3>Townhouse</h3>
                                    <span>Illustration</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="featured-grid featured-grid-2"
                               style="background-image: url(lesser/images/model4.jpg);">
                                <div class="desc">
                                    <h3>Captured</h3>
                                    <span>Photo</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="fh5co-services-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
                    <h2>Our Awesome Services</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 services-inner text-center">
                    <span><i class="sl-icon-graph"></i></span>
                    <h3>Finance Dashboard</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics,
                        a large language ocean.</p>
                </div>
                <div class="col-md-4 services-inner text-center">
                    <span><i class="sl-icon-heart"></i></span>
                    <h3>Made with Love</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics,
                        a large language ocean.</p>
                </div>
                <div class="col-md-4 services-inner text-center">
                    <span><i class="sl-icon-key"></i></span>
                    <h3>Help &amp; Support</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics,
                        a large language ocean.</p>
                </div>

            </div>
        </div>
    </div>
    <div id="fh5co-blog-section" class="fh5co-grey-bg-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
                    <h2>Our Recent Blog</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="blog-inner">
                        <a href="#"><img class="img-responsive" src="images/image_4.jpg" alt="Blog"></a>
                        <div class="desc">
                            <h3><a href="#">New iPhone 6 Released</a></h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                                the Semantics, a large language ocean.</p>
                            <p><a href="#" class="btn btn-primary btn-outline with-arrow">Read More<i
                                            class="icon-arrow-right"></i></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="blog-inner">
                        <a href="#"><img class="img-responsive" src="images/image_5.jpg" alt="Blog"></a>
                        <div class="desc">
                            <h3><a href="#">Start your day with a beautiful appearance</a></h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                                the Semantics, a large language ocean.</p>
                            <p><a href="#" class="btn btn-primary btn-outline with-arrow">Read More<i
                                            class="icon-arrow-right"></i></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="blog-inner">
                        <a href="#"><img class="img-responsive" src="images/image_6.jpg" alt="Blog"></a>
                        <div class="desc">
                            <h3><a href="#">Bookmarksgrove right</a></h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                                the Semantics, a large language ocean.</p>
                            <p><a href="#" class="btn btn-primary btn-outline with-arrow">Read More<i
                                            class="icon-arrow-right"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="fh5co-client-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
                    <h2>Our Happy Clients</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="testimony">
                        <span class="quote"><i class="icon-quote-right"></i></span>
                        <blockquote>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                                the Semantics, a large language ocean.</p>
                            <span>Athan Smith, via <a href="#" class="icon-twitter twitter-color"></a></span>
                        </blockquote>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="testimony">
                        <span class="quote"><i class="icon-quote-right"></i></span>
                        <blockquote>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                                the Semantics, a large language ocean.</p>
                            <span>Athan Smith, via <a href="#" class="icon-google-plus googleplus-color"></a></span>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <footer id="fh5co-footer" role="contentinfo">

        <div class="container">
            <div class="col-md-3 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
                <h3>CONTACT DETAILS</h3>
                <p>09152911239 - Marc Celemin</p>
                <p>092821543934</p>
            </div>
            <div class="col-md-6 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
                <h3>Our Location</h3>
                <ul class="float">
                    <li><a href="#">Batangas</a></li>
                    <li><a href="#">Lipa</a></li>
                    <li><a href="#">Tanauan</a></li>
                    <li><a href="#">Sto Tomas</a></li>
                </ul>
                <ul class="float">
                    <li><a href="#">Calamba</a></li>
                    <li><a href="#">Laguna</a></li>
                    <li><a href="#">Quezon</a></li>
                    <li><a href="#">Rizal</a></li>
                </ul>

            </div>

            <div class="col-md-2 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
                <h3>Follow Us</h3>
                <ul class="fh5co-social">
                    <li><a href="#"><i class="icon-twitter"></i> Twitter</a></li>
                    <li><a href="#"><i class="icon-facebook"></i> Facebook</a></li>
                    <li><a href="#"><i class="icon-google-plus"></i> Google Plus</a></li>
                    <li><a href="#"><i class="icon-instagram"></i> Instagram</a></li>
                </ul>
            </div>


            <div class="col-md-12 fh5co-copyright text-center">
                <p>&copy; 2018 MC Realty & Services </p>
            </div>

        </div>
    </footer>
@endsection