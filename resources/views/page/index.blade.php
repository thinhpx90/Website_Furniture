@extends('page.layout.default')

@section('content')

    <!-- ========================  Header content ======================== -->

    <section class="header-content">

        <div class="owl-slider">

            @foreach($slide as $key => $value)
                <!-- === slide item === -->

                <div class="item" style="background-image:url({{ filter_var($value->image, FILTER_VALIDATE_URL) ? $value->image : asset(Storage::url('public/uploads/' . $value->image)) }})">
                    <div class="box">
                        <div class="container">
                            <h2 class="title animated h1" data-animation="fadeInDown">{{ $value->name }}</h2>
                            <div class="animated" data-animation="fadeInUp">
                                {!! $value->description !!}
                            </div>
                            <div class="animated" data-animation="fadeInUp">
                                <a href="{{ $value->link }}" target="_blank" class="btn btn-main" ><i class="fad fa-info"></i> Thông tin chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div> <!--/owl-slider-->
    </section>

    <!-- ========================  Icons slider ======================== -->

    <section class="owl-icons-wrapper owl-icons-frontpage">

        <!-- === header === -->

        <header class="hidden">
            <h2>Product categories</h2>
        </header>

        <div class="container">

            <div class="owl-icons">

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-sofa"></i>
                        <figcaption>Sofa</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-armchair"></i>
                        <figcaption>Ghế bành</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-chair"></i>
                        <figcaption>Chairs</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-dining-table"></i>
                        <figcaption>Bàn ăn</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-media-cabinet"></i>
                        <figcaption>Kệ tivi</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-table"></i>
                        <figcaption>Bàn khách</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-bookcase"></i>
                        <figcaption>Giá sách</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-bedroom"></i>
                        <figcaption>Giường</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-nightstand"></i>
                        <figcaption>Tủ đầu giường</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-children-room"></i>
                        <figcaption>NT Trẻ em</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-kitchen"></i>
                        <figcaption>Phòng bếp</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-bathroom"></i>
                        <figcaption>Phòng tắm</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-wardrobe"></i>
                        <figcaption>Tủ quần áo</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-shoe-cabinet"></i>
                        <figcaption>Tủ giày</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-office"></i>
                        <figcaption>Văn phòng</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-lightning"></i>
                        <figcaption>Đèn</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-carpet"></i>
                        <figcaption>Thảm</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-accessories"></i>
                        <figcaption>Phụ kiện</figcaption>
                    </figure>
                </a>

            </div> <!--/owl-icons-->
        </div> <!--/container-->
    </section>

    <!-- ========================  Products widget ======================== -->

    <section class="products">

        <div class="container">

            <!-- === header title === -->

            <header>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 text-center">
                        <h2 class="title">Popular products</h2>
                        <div class="text">
                            <p>Check out our latest collections</p>
                        </div>
                    </div>
                </div>
            </header>

            <div class="row">

                <!-- === product-item === -->
                @foreach($product as $key => $value)
                    <div class="col-md-4 col-xs-6">

                        <article>
                            <div class="info">
                                {{-- <span class="add-favorite added">
                                    <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                                </span> --}}
                                <span>
                                    <a href="#productid1" class="mfp-open" data-title="Quick wiew" data-id="{{ $value->id }}"><i class="icon icon-eye"></i></a>
                                </span>
                            </div>
                            <div class="btn btn-add" data-data="{{ $value }}">
                                <i class="icon icon-cart"></i>
                            </div>
                            <div class="figure-grid">
                                @if($value->promotion_price != null)
                                    <span class="label label-info">-{{ $value->promotion_price }}%</span>
                                @endif
                                @if(strtotime ('+1 month', strtotime($value->created_at)) > strtotime(now()))
                                    <span class="label label-warning">New</span>
                                @endif
                                <div class="image">
                                    <a href="#productid1" class="mfp-open" data-id="{{ $value->id }}">
                                        <img src="{{ filter_var($value->images[0]->image, FILTER_VALIDATE_URL) ? $value->images[0]->image : asset(Storage::url('public/uploads/' . $value->images[0]->image)) }}" alt="" width="360" />
                                    </a>
                                </div>
                                <div class="text">
                                    <h2 class="title h4"><a href="product.html">{{ $value->name }}</a></h2>
                                    @if($value->promotion_price != null)
                                        <sub>{{ number_format($value->unit_price) }} VND</sub>
                                        <sup>{{ number_format($value->unit_price - $value->unit_price*$value->promotion_price/100) }} VND</sup>
                                    @else
                                        <sup>{{ number_format($value->unit_price) }} VND</sup>
                                    @endif
                                    <span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach

            </div> <!--/row-->
            <!-- === button more === -->

            <div class="wrapper-more">
                <a href="{{ route('page.product.list') }}" class="btn btn-main">View store</a>
            </div>

            <!-- ========================  Product info popup - quick view ======================== -->

            <div class="popup-main mfp-hide" id="productid1">

                <!-- === product popup === -->

                <div class="product">

                </div> <!--/product-->
            </div> <!--popup-main-->
        </div> <!--/container-->
    </section>

    <!-- ========================  Stretcher widget ======================== -->

    <section class="stretcher-wrapper">

        <!-- === stretcher header === -->

        <header class="hidden">
            <!--remove class 'hidden'' to show section header -->
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 text-center">
                        <h1 class="h2 title">Popular categories</h1>
                        <div class="text">
                            <p>
                                Whether you are changing your home, or moving into a new one, you will find a huge selection of quality living room furniture,
                                bedroom furniture, dining room furniture and the best value at Furniture factory
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- === stretcher === -->

        <ul class="stretcher">

            <!-- === stretcher item === -->

            <li class="stretcher-item" style="background-image:url({{ asset('') }}page-assets/assets/images/unnamed.jpg);">
                <!--logo-item-->
                <div class="stretcher-logo">
                    <div class="text">
                        <span class="f-icon f-icon-bedroom"></span>
                        <span class="text-intro">Phòng ngủ</span>
                    </div>
                </div>
                <!--main text-->
                <figure>
                    <h4>Modern furnishing projects</h4>
                    <figcaption>New furnishing ideas</figcaption>
                </figure>
                <!--anchor-->
                <a href="#">Anchor link</a>
            </li>

            <!-- === stretcher item === -->

            <li class="stretcher-item" style="background-image:url({{ asset('') }}page-assets/assets/images/living_room.png);">
                <!--logo-item-->
                <div class="stretcher-logo">
                    <div class="text">
                        <span class="f-icon f-icon-sofa"></span>
                        <span class="text-intro">Phòng khách</span>
                    </div>
                </div>
                <!--main text-->
                <figure>
                    <h4>Furnishing and complements</h4>
                    <figcaption>Discover the design table collection</figcaption>
                </figure>
                <!--anchor-->
                <a href="#">Anchor link</a>
            </li>

            <!-- === stretcher item === -->

            <li class="stretcher-item" style="background-image:url({{ asset('') }}page-assets/assets/images/office.jpg);">
                <!--logo-item-->
                <div class="stretcher-logo">
                    <div class="text">
                        <span class="f-icon f-icon-office"></span>
                        <span class="text-intro">Phong làm việc</span>
                    </div>
                </div>
                <!--main text-->
                <figure>
                    <h4>Which is Best for Your Home</h4>
                    <figcaption>Wardrobes vs Walk-In Closets</figcaption>
                </figure>
                <!--anchor-->
                <a href="#">Anchor link</a>
            </li>

            <!-- === stretcher item === -->

            <li class="stretcher-item" style="background-image:url({{ asset('') }}page-assets/assets/images/bep.jpg);">
                <!--logo-item-->
                <div class="stretcher-logo">
                    <div class="text">
                        <span class="f-icon f-icon-kitchen"></span>
                        <span class="text-intro">Phòng bếp</span>
                    </div>
                </div>
                <!--main text-->
                <figure>
                    <h4>Keeping Things Minimal</h4>
                    <figcaption>Creating Your Very Own Bathroom</figcaption>
                </figure>
                <!--anchor-->
                <a href="#">Anchor link</a>
            </li>

            <!-- === stretcher item more=== -->

            <li class="stretcher-item more">
                <div class="more-icon">
                    <span data-title-show="Show more" data-title-hide="+"></span>
                </div>
                <a href="#"></a>
            </li>

        </ul>
    </section>

    <!-- ========================  Blog Block ======================== -->

    <section class="blog blog-block">

        <div class="container">

            <!-- === blog header === -->

            <header>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 text-center">
                        <h2 class="title">Interior ideas</h2>
                        <div class="text">
                            <p>Keeping things minimal</p>
                        </div>
                    </div>
                </div>
            </header>

            <div class="row">

                <!-- === blog item === -->

                <div class="col-sm-4">
                    <article>
                        <a href="article.html">
                            <div class="image">
                                <img src="{{ asset('') }}page-assets/assets/images/office.jpg" alt="" />
                            </div>
                            <div class="entry entry-block">
                                <div class="date">28 Mart 2017</div>
                                <div class="title">
                                    <h2 class="h3">Creating the Perfect Gallery Wall </h2>
                                </div>
                                <div class="description">
                                    <p>
                                        You’ve finally reached this point in your life- you’ve bought your first home, moved
                                        into your very own apartment, moved out of the dorm room or you’re finally downsizing
                                        after all of your kids have left the nest.
                                    </p>
                                </div>
                            </div>
                            <div class="show-more">
                                <span class="btn btn-main btn-block">Read more</span>
                            </div>
                        </a>
                    </article>
                </div>

                <!-- === blog item === -->

                <div class="col-sm-4">
                    <article>
                        <a href="article.html">
                            <div class="image">
                                <img src="{{ asset('') }}page-assets/assets/images/office.jpg" alt="" />
                            </div>
                            <div class="entry entry-block">
                                <div class="date">25 Mart 2017</div>
                                <div class="title">
                                    <h2 class="h3">Making the Most Out of Your Kids Old Bedroom</h2>
                                </div>
                                <div class="description">
                                    <p>
                                        You’ve finally reached this point in your life- you’ve bought your first home, moved
                                        into your very own apartment, moved out of the dorm room or you’re finally downsizing
                                        after all of your kids have left the nest.
                                    </p>
                                </div>
                            </div>
                            <div class="show-more">
                                <span class="btn btn-main btn-block">Read more</span>
                            </div>
                        </a>
                    </article>
                </div>

                <!-- === blog item === -->

                <div class="col-sm-4">
                    <article>
                        <a href="article.html">
                            <div class="image">
                                <img src="{{ asset('') }}page-assets/assets/images/office.jpg" alt="" />
                            </div>
                            <div class="entry entry-block">
                                <div class="date">28 Mart 2017</div>
                                <div class="title">
                                    <h2 class="h3">Have a look at our new projects!</h2>
                                </div>
                                <div class="description">
                                    <p>
                                        You’ve finally reached this point in your life- you’ve bought your first home, moved
                                        into your very own apartment, moved out of the dorm room or you’re finally downsizing
                                        after all of your kids have left the nest.
                                    </p>
                                </div>
                            </div>
                            <div class="show-more">
                                <span class="btn btn-main btn-block">Read more</span>
                            </div>
                        </a>
                    </article>
                </div>

            </div> <!--/row-->
            <!-- === button more === -->

            <div class="wrapper-more">
                <a href="ideas.html" class="btn btn-main">View all posts</a>
            </div>

        </div> <!--/container-->
    </section>

    <!-- ========================  Banner ======================== -->

    <section class="banner" style="background-image:url({{ asset('') }}page-assets/assets/images/background_title.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8 text-center">
                    <h2 class="title">Our story</h2>
                    <p>
                        We believe in creativity as one of the major forces of progress. With this idea, we traveled throughout Italy to find exceptional
                        artisans and bring their unique handcrafted objects to connoisseurs everywhere.
                    </p>
                    <p><a href="about.html" class="btn btn-clean">Read full story</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================  Blog ======================== -->

    <section class="blog">

        <div class="container">

            <!-- === blog header === -->

            <header>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 text-center">
                        <h1 class="h2 title">Blog</h1>
                        <div class="text">
                            <p>Latest news from the blog</p>
                        </div>
                    </div>
                </div>
            </header>

            <div class="row">

                <!-- === blog item === -->

                <div class="col-sm-4">
                    <article>
                        <a href="article.html">
                            <div class="image" style="background-image:url({{ asset('') }}page-assets/assets/images/bep.jpg)">
                                <img src="{{ asset('') }}page-assets/assets/images/bep.jpg" alt="" />
                            </div>
                            <div class="entry entry-table">
                                <div class="date-wrapper">
                                    <div class="date">
                                        <span>MAR</span>
                                        <strong>08</strong>
                                        <span>2017</span>
                                    </div>
                                </div>
                                <div class="title">
                                    <h2 class="h5">The 3 Tricks that Quickly Became Rules</h2>
                                </div>
                            </div>
                            <div class="show-more">
                                <span class="btn btn-main btn-block">Read more</span>
                            </div>
                        </a>
                    </article>
                </div>

                <!-- === blog item === -->

                <div class="col-sm-4">
                    <article>
                        <a href="article.html">
                            <div class="image" style="background-image:url({{ asset('') }}page-assets/assets/images/bep.jpg)">
                                <img src="{{ asset('') }}page-assets/assets/images/bep.jpg" alt="" />
                            </div>
                            <div class="entry entry-table">
                                <div class="date-wrapper">
                                    <div class="date">
                                        <span>MAR</span>
                                        <strong>03</strong>
                                        <span>2017</span>
                                    </div>
                                </div>
                                <div class="title">
                                    <h2 class="h5">Decorating When You're Starting Out or Starting Over</h2>
                                </div>
                            </div>
                            <div class="show-more">
                                <span class="btn btn-main btn-block">Read more</span>
                            </div>
                        </a>
                    </article>
                </div>

                <!-- === blog item === -->

                <div class="col-sm-4">
                    <article>
                        <a href="article.html">
                            <div class="image" style="background-image:url({{ asset('') }}page-assets/assets/images/bep.jpg)">
                                <img src="{{ asset('') }}page-assets/assets/images/bep.jpg" alt="" />
                            </div>
                            <div class="entry entry-table">
                                <div class="date-wrapper">
                                    <div class="date">
                                        <span>MAR</span>
                                        <strong>01</strong>
                                        <span>2017</span>
                                    </div>
                                </div>
                                <div class="title">
                                    <h2 class="h5">What does your favorite dining chair say about you?</h2>
                                </div>
                            </div>
                            <div class="show-more">
                                <span class="btn btn-main btn-block">Read more</span>
                            </div>
                        </a>
                    </article>
                </div>

            </div> <!--/row-->
            <!-- === button more === -->

            <div class="wrapper-more">
                <a href="blog-grid.html" class="btn btn-main">View all posts</a>
            </div>

        </div> <!--/container-->
    </section>

    <!-- ========================  Instagram ======================== -->

    <section class="instagram">

        <!-- === instagram header === -->

        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8 text-center">
                        <h2 class="h2 title">Follow us <i class="fab fa-instagram fa-2x "></i> Instagram </h2>
                        <div class="text">
                            <p>@InstaFurnitureFactory</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- === instagram gallery === -->

        <div class="gallery clearfix">
            <a class="item" href="#">
                <img src="{{ asset('') }}page-assets/assets/images/square-1.jpg" alt="Alternate Text" />
            </a>
            <a class="item" href="#">
                <img src="{{ asset('') }}page-assets/assets/images/square-2.jpg" alt="Alternate Text" />
            </a>
            <a class="item" href="#">
                <img src="{{ asset('') }}page-assets/assets/images/square-3.jpg" alt="Alternate Text" />
            </a>
            <a class="item" href="#">
                <img src="{{ asset('') }}page-assets/assets/images/square-4.jpg" alt="Alternate Text" />
            </a>
            <a class="item" href="#">
                <img src="{{ asset('') }}page-assets/assets/images/square-5.jpg" alt="Alternate Text" />
            </a>
            <a class="item" href="#">
                <img src="{{ asset('') }}page-assets/assets/images/square-6.jpg" alt="Alternate Text" />
            </a>

        </div> <!--/gallery-->

    </section>

@endsection
