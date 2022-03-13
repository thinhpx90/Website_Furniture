    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-template/index.html">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">Vuexy</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="{{ Request::segment(2) === null ? 'active' : '' }} nav-item"><a href="{{ route('admin.index') }}"><i class="fal fa-home-lg"></i><span class="menu-title" data-i18n="Sweet Alert">Trang chủ</span></a>
                </li>
                <li class="{{ Request::segment(2) === 'product' ? 'active' : '' }} nav-item"><a href="{{ route('product.index') }}"><i class="fal fa-bags-shopping"></i><span class="menu-title" data-i18n="Sweet Alert">Sản phẩm</span></a>
                </li>
                <li class="{{ Request::segment(2) === 'type_product' ? 'active' : '' }} nav-item"><a href="{{ route('type_product.index') }}"><i class="fal fa-shopping-basket"></i><span class="menu-title" data-i18n="Toastr">Loại sản phẩm</span></a>
                </li>
                <li class="{{ Request::segment(2) === 'category' ? 'active' : '' }} nav-item"><a href="{{ route('category.index') }}"><i class="fal fa-cubes"></i><span class="menu-title" data-i18n="NoUi Slider">Danh mục</span></a>
                </li>
                <li class="{{ Request::segment(2) === 'slide' ? 'active' : '' }} nav-item"><a href="{{ route('slide.index') }}"><i class="fal fa-file-image"></i><span class="menu-title" data-i18n="File Uploader">Slide</span></a>
                </li>
                <li class="{{ Request::segment(2) === 'supplier' ? 'active' : '' }} nav-item"><a href="{{ route('supplier.index') }}"><i class="fal fa-truck"></i><span class="menu-title" data-i18n="Quill Editor">Nhà cung cấp</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-drag-drop.html"><i class="fal fa-users"></i><span class="menu-title" data-i18n="Drag &amp; Drop">Khách hàng</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-clipboard.html"><i class="fal fa-newspaper"></i><span class="menu-title" data-i18n="Clipboard">Tin tức</span></a>
                </li>
                <li class=" nav-item"><a href=" ext-component-plyr.html"><i class="fal fa-user-tie"></i><span class="menu-title" data-i18n="Media player">Người dùng</span></a>
                </li>
                <li class="{{ Request::segment(2) === 'order' ? 'active' : '' }} nav-item"><a href="{{ route('admin.order') }}"><i class="fal fa-file-invoice-dollar"></i><span class="menu-title" data-i18n="Context Menu">Đơn đặt hàng</span></a>
                </li>
                <li class=" nav-item"><a href="ext-component-swiper.html"><i class="fal fa-ballot-check"></i><span class="menu-title" data-i18n="swiper">Đơn nhập hàng</span></a>
                </li>
            </ul>
        </div>
    </div>
