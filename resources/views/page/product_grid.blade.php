@extends('page.layout.default')

@section('css')
    <style>
        .pagination-wrapper nav{
            background-color: #eeeeee;
        }
    </style>
@endsection

@section('content')

    <!-- ======================== Main header ======================== -->

    <section class="main-header" style="background-image:url(assets/images/gallery-3.jpg)">
        <header>
            <div class="container">
                <h1 class="h2 title">Shop</h1>
                <ol class="breadcrumb breadcrumb-inverted">
                    <li><a href="index.html"><span class="icon icon-home"></span></a></li>
                    <li><a href="category.html">Product Category</a></li>
                    <li><a class="active" href="products-grid.html">Product Sub-category</a></li>
                </ol>
            </div>
        </header>
    </section>

    <!-- ========================  Icons slider ======================== -->

    <section class="owl-icons-wrapper">

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
                        <figcaption>Armchairs</figcaption>
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
                        <figcaption>Dining tables</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-media-cabinet"></i>
                        <figcaption>Media storage</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-table"></i>
                        <figcaption>Tables</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-bookcase"></i>
                        <figcaption>Bookcase</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-bedroom"></i>
                        <figcaption>Bedroom</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-nightstand"></i>
                        <figcaption>Nightstand</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-children-room"></i>
                        <figcaption>Children room</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-kitchen"></i>
                        <figcaption>Kitchen</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-bathroom"></i>
                        <figcaption>Bathroom</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-wardrobe"></i>
                        <figcaption>Wardrobe</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-shoe-cabinet"></i>
                        <figcaption>Shoe cabinet</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-office"></i>
                        <figcaption>Office</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-bar-set"></i>
                        <figcaption>Bar sets</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-lightning"></i>
                        <figcaption>Lightning</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-carpet"></i>
                        <figcaption>Varpet</figcaption>
                    </figure>
                </a>

                <!-- === icon item === -->

                <a href="#">
                    <figure>
                        <i class="f-icon f-icon-accessories"></i>
                        <figcaption>Accessories</figcaption>
                    </figure>
                </a>

            </div> <!--/owl-icons-->
        </div> <!--/container-->
    </section>

    <!-- ======================== Products ======================== -->

    <section class="products">
        <div class="container">

            <header class="hidden">
                <h3 class="h3 title">Product category grid</h3>
            </header>

            <div class="row">

                <!-- === product-filters === -->

                <div class="col-md-3 col-xs-12">
                    <div class="filters">
                        <!--Price-->
                        <div class="filter-box active">
                            <div class="title">Giá</div>
                            <div class="filter-content">
                                <div class="price-filter">
                                    <input type="text" id="range-price-slider" value="" name="range" />
                                </div>
                            </div>
                        </div>
                        <!--Type-->
                        <div class="filter-box active">
                            <div class="title">
                                Loại sản phẩm
                            </div>
                            <div class="filter-content">
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-type" id="typeIdAll" checked="checked">
                                    <label for="typeIdAll">All <i>(1200)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-type" id="typeId1">
                                    <label for="typeId1">Sofa <i>(20)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-type" id="typeId2">
                                    <label for="typeId2">Armchairs <i>(12)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-type" id="typeId3">
                                    <label for="typeId3">Chairs <i>(80)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-type" id="typeId4">
                                    <label for="typeId4">Dining tables <i>(140)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-type" id="typeId5">
                                    <label for="typeId5">Media storage <i>(20)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-type" id="typeId6">
                                    <label for="typeId6">Tables <i>(10)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-type" id="typeId7">
                                    <label for="typeId7">Bookcase <i>(450)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-type" id="typeId8">
                                    <label for="typeId8">Nightstands <i>(750)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-type" id="typeId9">
                                    <label for="typeId9">Children room <i>(960)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-type" id="typeId10">
                                    <label for="typeId10">Kitchen <i>(44)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-type" id="typeId11">
                                    <label for="typeId11">Bathroom <i>(5)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-type" id="typeId12">
                                    <label for="typeId12">Wardrobe <i>(80)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-type" id="typeId13">
                                    <label for="typeId13">Shoe cabinet <i>(23)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-type" id="typeId14">
                                    <label for="typeId14">Office <i>(24)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-type" id="typeId15">
                                    <label for="typeId15">Bar sets <i>(92)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-type" id="typeId16">
                                    <label for="typeId16">Lightning <i>(1120)</i></label>
                                </span>
                            </div>
                        </div> <!--/filter-box-->
                        <!--Material-->
                        <div class="filter-box active">
                            <div class="title">
                                Không gian đặt
                            </div>
                            <div class="filter-content">
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-material" id="matIdAll">
                                    <label for="matIdAll">All <i>(450)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-material" id="matId1">
                                    <label for="matId1">Blend <i>(11)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-material" id="matId2">
                                    <label for="matId2">Leather <i>(12)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-material" id="matId3">
                                    <label for="matId3">Wood <i>(80)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-material" id="matId4">
                                    <label for="matId4">Shell <i>(80)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-material" id="matId5">
                                    <label for="matId5">Metal <i>(80)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-material" id="matId6">
                                    <label for="matId6">Aluminium <i>(80)</i></label>
                                </span>
                                <span class="checkbox">
                                    <input type="radio" name="radiogroup-material" id="matId7">
                                    <label for="matId7">Acrilic <i>(80)</i></label>
                                </span>
                            </div>
                        </div> <!--/filter-box-->
                        <!--close filters on mobile / update filters-->
                        <div class="toggle-filters-close btn btn-main">
                            Update search
                        </div>

                    </div> <!--/filters-->
                </div>

                <!--product items-->

                <div class="col-md-9 col-xs-12">

                    <div class="sort-bar clearfix">
                        <div class="sort-results pull-left">
                            <!--Items counter-->
                            <span>Showing all <strong>50</strong> of <strong>3,250</strong> items</span>
                        </div>
                        <!--Sort options-->
                        <div class="sort-options pull-right">
                            <span class="hidden-xs">Sort by</span>
                            <select>
                                <option value="1">Name</option>
                                <option value="2">Popular items</option>
                                <option value="3">Price: lowest</option>
                                <option value="4">Price: highest</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">

                        @foreach($product as $key => $value)
                            <div class="col-md-6 col-xs-6">

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

                    </div><!--/row-->
                    <!--Pagination-->
                    <div class="pagination-wrapper">
                        {{ $product->links(('pagination::bootstrap-4')) }}
                    </div>

                </div> <!--/product items-->

            </div><!--/row-->
            <!-- ========================  Product info popup - quick view ======================== -->

            <div class="popup-main mfp-hide" id="productid1">

                <!-- === product popup === -->

                <div class="product">

                </div> <!--/product-->
            </div> <!--popup-main-->
        </div><!--/container-->
    </section>

@endsection
