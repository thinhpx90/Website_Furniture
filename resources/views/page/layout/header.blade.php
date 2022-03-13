<nav class="navbar-fixed">

    <div class="container">

        <!-- ==========  Top navigation ========== -->

        <div class="navigation navigation-top clearfix">
            <ul>
                <!--add active class for current page-->

                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>

                <li><a href="javascript:void(0);" class="open-login"><i class="icon icon-user"></i></a></li>
                <li><a href="javascript:void(0);" class="open-search"><i class="icon icon-magnifier"></i></a></li>
                <li><a href="javascript:void(0);" class="open-cart"><i class="icon icon-cart"></i> <span id="count">{{ Cart::count() }}</span></a></li>
            </ul>
        </div> <!--/navigation-top-->

        <!-- ==========  Main navigation ========== -->

        <div class="navigation navigation-main">

            <!-- Setup your logo here-->

            <a href="index.html" class="logo"><img src="{{ asset('') }}app-assets/assets/images/logo.png" alt="" /></a>

            <!-- Mobile toggle menu -->

            <a href="#" class="open-menu"><i class="icon icon-menu"></i></a>

            <!-- Convertible menu (mobile/desktop)-->

            <div class="floating-menu">

                <!-- Mobile toggle menu trigger-->

                <div class="close-menu-wrapper">
                    <span class="close-menu"><i class="icon icon-cross"></i></span>
                </div>

                <ul>
                    <li><a href="{{ route('page.index') }}">Trang chủ</a></li>

                    <!-- Multi-content dropdown -->

                    <li>
                        <a href="index.html">Danh mục<span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
                        <div class="navbar-dropdown">
                            <div class="navbar-box">

                                <!-- box-1 (left-side)-->

                                {{-- <div class="box-1">
                                    <div class="box">
                                        <div class="h2">Find your inspiration</div>
                                        <div class="clearfix">
                                            <p>Homes that differ in terms of style, concept and architectural solutions have been furnished by Furniture Factory. These spaces tell of an international lifestyle that expresses modernity, research and a creative spirit.</p>
                                            <a class="btn btn-clean btn-big" href="products-grid.html">Shop now</a>
                                        </div>
                                    </div>
                                </div> --}}

                                <!-- box-2 (right-side)-->

                                <div class="box-2">
                                    <div class="box clearfix">
                                        <div class="row">
                                            @foreach($menu as $value)
                                                <div class="col-md-4">
                                                    <ul>
                                                        <li class="label" style="width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                            {{ $value->name }}
                                                        </li>
                                                        @foreach($value->category as $v)
                                                            <li><a href="index.html">{{ $v->name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endforeach
                                        </div> <!--/row-->
                                    </div> <!--/box-->
                                </div> <!--/box-2-->
                            </div> <!--/navbar-box-->
                        </div> <!--/navbar-dropdown-->
                    </li>

                    <li><a href="shortcodes.html">Khuyến mại</a></li>

                    <li>
                        <a href="category.html">Blog</a>
                    </li>

                    <!-- Mega menu dropdown -->

                    {{-- <li>
                        <a href="#">Megamenu <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
                        <div class="navbar-dropdown">
                            <div class="navbar-box">
                                <div class="box-2">
                                    <div class="box clearfix">
                                        <div class="row">
                                            <div class="clearfix">
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li class="label">Seating</li>
                                                        <li><a href="javascript:void(0);">Benches</a></li>
                                                        <li><a href="javascript:void(0);">Submenu <span class="label label-warning">New</span></a></li>
                                                        <li><a href="javascript:void(0);">Chaises</a></li>
                                                        <li><a href="javascript:void(0);">Recliners</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li class="label">Storage</li>
                                                        <li><a href="javascript:void(0);">Bockcases</a></li>
                                                        <li><a href="javascript:void(0);">Closets</a></li>
                                                        <li><a href="javascript:void(0);">Wardrobes</a></li>
                                                        <li><a href="javascript:void(0);">Dressers <span class="label label-success">Trending</span></a></li>
                                                        <li><a href="javascript:void(0);">Sideboards </a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li class="label">Tables</li>
                                                        <li><a href="javascript:void(0);">Consoles</a></li>
                                                        <li><a href="javascript:void(0);">Desks</a></li>
                                                        <li><a href="javascript:void(0);">Dining tables</a></li>
                                                        <li><a href="javascript:void(0);">Occasional tables</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li class="label">Chairs</li>
                                                        <li><a href="javascript:void(0);">Dining Chairs</a></li>
                                                        <li><a href="javascript:void(0);">Office Chairs</a></li>
                                                        <li><a href="javascript:void(0);">Lounge Chairs <span class="label label-warning">Offer</span></a></li>
                                                        <li><a href="javascript:void(0);">Stools</a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li class="label">Kitchen</li>
                                                        <li><a href="javascript:void(0);">Kitchen types</a></li>
                                                        <li><a href="javascript:void(0);">Kitchen elements <span class="label label-info">50%</span></a></li>
                                                        <li><a href="javascript:void(0);">Bars</a></li>
                                                        <li><a href="javascript:void(0);">Wall decoration</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li class="label">Accessories</li>
                                                        <li><a href="javascript:void(0);">Coat Racks</a></li>
                                                        <li><a href="javascript:void(0);">Lazy bags <span class="label label-success">Info</span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li class="label">Beds</li>
                                                        <li><a href="javascript:void(0);">Beds</a></li>
                                                        <li><a href="javascript:void(0);">Sofabeds</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li class="label">Entertainment</li>
                                                        <li><a href="javascript:void(0);">Wall units <span class="label label-warning">Popular</span></a></li>
                                                        <li><a href="javascript:void(0);">Media sets</a></li>
                                                        <li><a href="javascript:void(0);">Decoration</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!--/box-->
                                </div> <!--/box-2-->
                            </div> <!--/navbar-box-->
                        </div> <!--/navbar-dropdown-->
                    </li> --}}

                    <!-- Simple menu link-->

                    <li><a href="shortcodes.html">Liên hệ</a></li>

                </ul>
            </div> <!--/floating-menu-->
        </div> <!--/navigation-main-->

        <!-- ==========  Search wrapper ========== -->

        <div class="search-wrapper">

            <!-- Search form -->
            <input class="form-control" placeholder="Search..." />
            <button class="btn btn-main btn-search">Go!</button>

            <!-- Search results - live search -->
            <div class="search-results">
                <div class="search-result-items">
                    <div class="title h4">Products <a href="#" class="btn btn-clean-dark btn-xs">View all</a></div>
                    <ul>
                        <li><a href="#"><span class="id">42563</span> <span class="name">Green corner</span> <span class="category">Sofa</span></a></li>
                        <li><a href="#"><span class="id">42563</span> <span class="name">Laura</span> <span class="category">Armchairs</span></a></li>
                        <li><a href="#"><span class="id">42563</span> <span class="name">Nude</span> <span class="category">Dining tables</span></a></li>
                        <li><a href="#"><span class="id">42563</span> <span class="name">Aurora</span> <span class="category">Nightstands</span></a></li>
                        <li><a href="#"><span class="id">42563</span> <span class="name">Dining set</span> <span class="category">Kitchen</span></a></li>
                        <li><a href="#"><span class="id">42563</span> <span class="name">Seat chair</span> <span class="category">Bar sets</span></a></li>
                    </ul>
                </div> <!--/search-result-items-->
                <div class="search-result-items">
                    <div class="title h4">Blog <a href="#" class="btn btn-clean-dark btn-xs">View all</a></div>
                    <ul>
                        <li><a href="#"><span class="id">01 Jan</span> <span class="name">Creating the Perfect Gallery Wall </span> <span class="category">Interior ideas</span></a></li>
                        <li><a href="#"><span class="id">12 Jan</span> <span class="name">Making the Most Out of Your Kids Old Bedroom</span> <span class="category">Interior ideas</span></a></li>
                        <li><a href="#"><span class="id">28 Dec</span> <span class="name">Have a look at our new projects!</span> <span class="category">Modern design</span></a></li>
                        <li><a href="#"><span class="id">31 Sep</span> <span class="name">Decorating When You're Starting Out or Starting Over</span> <span class="category">Best of 2017</span></a></li>
                        <li><a href="#"><span class="id">22 Sep</span> <span class="name">The 3 Tricks that Quickly Became Rules</span> <span class="category">Tips for you</span></a></li>
                    </ul>
                </div> <!--/search-result-items-->
            </div> <!--/search-results-->
        </div>

        <!-- ==========  Login wrapper ========== -->

        <div class="login-wrapper">
            @guest
                <form action="{{ route('page.login') }}" method="POST">
                    @csrf
                    <div class="h4">Sign in</div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <span class="checkbox checkbox-inline">
                        <input type="checkbox" name="remember" id="checkIDa3" checked="checked">
                        <label for="checkIDa3">Remember me!</label>
                    </span>
                    <div class="form-group">
                        <a href="#forgotpassword" class="open-popup">Forgot password?</a>
                        <a href="#createaccount" class="open-popup">Don't have an account?</a>
                    </div>
                    <button type="submit" class="btn btn-block btn-main">Submit</button>
                </form>
            @else
                <ul>
                    <li>Tai Khoan</li>
                    <li>Dang xuat</li>
                </ul>
            @endguest

        </div>

        <!-- ==========  Cart wrapper ========== -->

        <div class="cart-wrapper">
            <div class="checkout">
                <div class="clearfix" id="cart">
                </div>
            </div> <!--/checkout-->
        </div> <!--/cart-wrapper-->
        <!-- Alert -->
        <div class="alert alert-warning alert-dismissible" role="alert" style="position: absolute; right: 0; top: 20px; display: none;">
            Tài khoản hoặc mật khẩu không chính xác!
        </div>
        <div class="alert alert-danger alert-dismissible" role="alert" style="position: absolute; right: 0; top: 20px; display: none;">
            Thêm thành công vào giỏ hàng!
        </div>
    </div> <!--/container-->
</nav>

