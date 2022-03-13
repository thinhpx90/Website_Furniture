$(function () {

    "use strict";

    // Main navigation & mega menu
    // ----------------------------------------------------------------

    // Global menu variables

    var objSearch = $('.search-wrapper'),
        objLogin = $('.login-wrapper'),
        objCart = $('.cart-wrapper'),
        objMenu = $('.floating-menu'),
        objMenuLink = $('.floating-menu a'),
        $search = $('.open-search'),
        $login = $('.open-login'),
        $cart = $('.open-cart'),
        $menu = $('.open-menu'),
        $openDropdown = $('.open-dropdown'),
        $settingsItem = $('.nav-settings .nav-settings-list li'),
        $close = $('.close-menu');

    // Open/close login

    $login.on('click', function () {
        toggleOpen($(this));
        objLogin.toggleClass('open');
        closeSearch();
        closeCart();
    });

    // Open/close search bar

    $search.on('click', function () {
        toggleOpen($(this));
        objSearch.toggleClass('open');
        objSearch.find('input').focus();
        closeLogin();
        closeCart();
    });

    // Open/close cart

    $cart.on('click', function () {
        loadCart()
        toggleOpen($(this));
        objCart.toggleClass('open');
        closeLogin();
        closeSearch();
    });

    function loadCart() {
        $.ajax({
            url: `/get_cart_content`,
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                var product = ``
                const data = result[0]
                Object.keys(data).forEach(key => {
                    var image = ``
                    var price = ``
                    if (validURL(data[key].options.image)) {
                        image += `<img src="${data[key].options.image}" alt="" />`
                    } else {
                        image += `<img src="http://localhost:8000/storage/uploads/${data[key].options.image}" alt="" />`
                    }
                    if (data[key].options.old_price != null) {
                        price += `<span class="final">${Intl.NumberFormat().format(data[key].price)} VND</span>
                        <span class="discount">${Intl.NumberFormat().format(data[key].options.old_price)} VND</span>`
                    } else {
                        price += `<span class="final">${Intl.NumberFormat().format(data[key].price)} VND</span>`
                    }
                    product += `
                        <div class="cart-block cart-block-item clearfix">
                            <div class="image">
                                <a href="product.html">`+ image +`</a>
                            </div>
                            <div class="title">
                                <div><a href="product.html">${data[key].name}</a></div>
                                <small>${data[key].options.category}</small>
                            </div>
                            <div class="quantity">
                                <input type="number" value="${data[key].qty}" class="form-control form-quantity" style="padding: 0"/>
                            </div>
                            <div class="price" style="padding: 0;">
                                ` + price + `
                            </div>
                            <!--delete-this-item-->
                            <span class="icon icon-cross icon-delete" data-id="${data[key].rowId}"></span>
                        </div>
                    `
                })
                var cart = `
                    <div class="clearfix">

                    <!--cart item-->

                    <div class="row">
                        ` + product + `
                    </div>

                    <hr />

                    <!--cart prices -->

                    <div class="clearfix">
                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>VAT</strong>
                            </div>
                            <div>
                                <span>${result[1]} VND</span>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <!--cart final price -->

                    <div class="clearfix">
                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>Total</strong>
                            </div>
                            <div>
                                <div class="h4 title">${result[2]} VND</div>
                            </div>
                        </div>
                    </div>


                    <!--cart navigation -->

                    <div class="cart-block-buttons clearfix">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="products-grid.html" class="btn btn-clean-dark">Continue shopping</a>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="/checkout" class="btn btn-main"><span class="icon icon-cart"></span> Thanh toan</a>
                            </div>
                        </div>
                    </div>

                </div>
                `
                $('#cart').html(cart)
            }
        })
    }

    $(".btn.btn-add").on('click', function () {
        var data = $(this).data('data')
        $.ajax({
            url: `/add_to_cart`,
            type: "POST",
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                var count = parseInt($('#count').text())
                $('#count').text(count+1)

                $(".alert-danger").show(400);
                setTimeout(function(){
                    $(".alert").hide(400)
                }, 1500)
            }
        })
    })

    $(document).on("click", ".icon-delete", function() {
        var id = $(this).data('id')
        $.ajax({
            url: `/remove/` + id,
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                loadCart()
            }
        })
    })

    // Mobile menu open/close

    $menu.on('click', function () {
        objMenu.addClass('expanded');
        closeSearch();
        closeLogin();
        closeCart();
    });

    // Settings language & currency dropdown

    $settingsItem.on('click', function () {
        var $value = $(this).closest('.nav-settings').find('.nav-settings-value');
        $value.text($(this).text());
    });

    // Floating menu hyperlink
    if ($('nav').hasClass('navbar-single-page')) {
        objMenuLink.on('click', function () {
            objMenu.removeClass('expanded');
        });
    }

    // Open dropdown/megamenu

    $openDropdown.on('click', function (e) {

        e.preventDefault();

        var liParent = $(this).parent().parent(),
            liDropdown = liParent.find('.navbar-dropdown');

        liParent.toggleClass('expanded');

        if (liParent.hasClass('expanded')) {
            liDropdown.slideDown();
        }
        else {
            liDropdown.slideUp();
        }
    });

    // Close menu (mobile)

    $close.on('click', function () {
        $('nav').find('.expanded').removeClass('expanded');
        $('nav').find('.navbar-dropdown').slideUp();
    });

    // Global functions

    function toggleOpen(el) {
        $(el).toggleClass('open');
    }

    function closeSearch() {
        objSearch.removeClass('open');
        $search.removeClass('open');
    }
    function closeLogin() {
        objLogin.removeClass('open');
        $login.removeClass('open');
    }
    function closeCart() {
        objCart.removeClass('open');
        $cart.removeClass('open');
    }

    // Sticky header
    // ----------------------------------------------------------------

    var navbarFixed = $('nav.navbar-fixed');

    // When reload page - check if page has offset
    if ($(document).scrollTop() > 94) {
        navbarFixed.addClass('navbar-sticked');
    }
    // Add sticky menu on scroll
    $(document).on('bind ready scroll', function () {
        var docScroll = $(document).scrollTop();
        if (docScroll >= 10) {
            navbarFixed.addClass('navbar-sticked');
        } else {
            navbarFixed.removeClass('navbar-sticked');
        }
    });

    // Tooltip
    // ----------------------------------------------------------------

    $('[data-toggle="tooltip"]').tooltip()

    // Main popup
    // ----------------------------------------------------------------

    let idPopup = null;
    $('.mfp-open').on('click', function(){
        idPopup = $(this).data('id')
    })

    $('.mfp-open').magnificPopup({
        type: 'inline',
        fixedContentPos: false,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in',
        callbacks: {
            open: function () {
                let id = idPopup;
                // wait on popup initalization
                // then load owl-carousel

                if (id) {
                    $.ajax({
                        url: `/api/get_product_detail/` + id,
                        type: "GET",
                        success: function(result) {
                            const body = $("#productid1")
                            var image = ``
                            for (let i = 0; i < result.images.length; i++) {
                                if (validURL(result.images[i].image)) {
                                    image += `<img src="${result.images[i].image}" alt="" width="640" />`
                                } else {
                                    image += `<img src="http://localhost:8000/storage/uploads/${result.images[i].image}" alt="" width="640" />`
                                }
                            }
                            var price = ``
                            if (result.promotion_price) {
                                price += `<span class="h3">${Intl.NumberFormat().format(result.unit_price - result.unit_price*result.promotion_price/100)} VND<small> ${Intl.NumberFormat().format(result.unit_price)} VND</small></span>`
                            } else {
                                price += `<span class="h3">${Intl.NumberFormat().format(result.unit_price)} VND</span>`
                            }
                            const template = `
                                <div class="product">
                                    <div class="popup-title">
                                        <div class="h1 title">${result.name} <small>${result.category.name}</small></div>
                                    </div>
                                    <button title="Close (Esc)" type="button" class="mfp-close">×</button>
                                    <div class="owl-product-gallery">
                                        ` + image + `
                                    </div>
                                    <div class="popup-content">
                                        <div class="product-info-wrapper">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="info-box">
                                                        <strong>Xuất xứ</strong>
                                                        <span>${result.origin}</span>
                                                    </div>
                                                    <div class="info-box">
                                                        <strong>Kích thước</strong>
                                                        <span>${result.size}</span>
                                                    </div>
                                                    <div class="info-box">
                                                        <strong>Chất liệu</strong>
                                                        <span>${result.material}</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="info-box">
                                                        <strong>Available Colors</strong>
                                                        <div class="product-colors clearfix">
                                                            <span class="color-btn color-btn-red"></span>
                                                            <span class="color-btn color-btn-blue checked"></span>
                                                            <span class="color-btn color-btn-green"></span>
                                                            <span class="color-btn color-btn-gray"></span>
                                                            <span class="color-btn color-btn-biege"></span>
                                                        </div>
                                                    </div>
                                                    <div class="info-box">
                                                        <strong>Choose size</strong>
                                                        <div class="product-colors clearfix">
                                                            <span class="color-btn color-btn-biege">S</span>
                                                            <span class="color-btn color-btn-biege checked">M</span>
                                                            <span class="color-btn color-btn-biege">XL</span>
                                                            <span class="color-btn color-btn-biege">XXL</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="popup-table">
                                        <div class="popup-cell">
                                            <div class="price">
                                                ` + price + `
                                            </div>
                                        </div>
                                        <div class="popup-cell">
                                            <div class="popup-buttons">
                                                <a href="http://localhost:8000/san-pham/${result.slug}"><span class="icon icon-eye"></span> <span class="hidden-xs">Xem chi tiết</span></a>
                                                <a href="javascript:void(0);"><span class="icon icon-cart"></span> <span class="hidden-xs">Mua</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `
                            body.html(template)
                            loadSlide()
                            $('.popup-main .owl-carousel').hide();
                            setTimeout(function () {
                                $('.popup-main .owl-carousel').slideDown();
                            }, 500);
                        }
                    })
                } else {
                    $('.popup-main .owl-carousel').hide();
                    setTimeout(function () {
                        $('.popup-main .owl-carousel').slideDown();
                    }, 500);
                }
            }
        }
    });



    // Check url

    function validURL(str) {
        var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
          '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
          '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
          '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
          '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
          '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
        return !!pattern.test(str);
      }

    // Main popup gallery
    // ----------------------------------------------------------------

    $('.open-popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        fixedContentPos: false,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
    });


    // Frontpage slider
    // ----------------------------------------------------------------

    var arrowIcons = [
        '<span class="icon icon-chevron-left"></span>',
        '<span class="icon icon-chevron-right"></span>'
    ];

    $.each($(".owl-slider"), function (i, n) {

        $(n).owlCarousel({
            autoHeight: false,
            navigation: true,
            navigationText: arrowIcons,
            items: 1,
            singleItem: true,
            addClassActive: true,
            transitionStyle: "fadeUp",
            afterMove: animatetCaptions,
            autoPlay: 8000,
            stopOnHover: false
        });

        animatetCaptions();

        function animatetCaptions(event) {
            "use strict";
            var activeItem = $(n).find('.owl-item.active'),
            timeDelay = 100;
            $.each(activeItem.find('.animated'), function (j, m) {
                var item = $(m);
                item.css('animation-delay', timeDelay + 'ms');
                timeDelay = timeDelay + 180;
                item.addClass(item.data('animation'));
                setTimeout(function () {
                    item.removeClass(item.data('animation'));
                }, 2000);
            });
        }

        if ($(n).hasClass('owl-slider-fullscreen')) {
            $('.header-content .item').height($(window).height());
        }
    });

    // Quote carousel
    // ----------------------------------------------------------------

    $.each($(".quote-carousel"), function (i, n) {
        $(n).owlCarousel({
            navigation: true, // Show next and prev buttons
            slideSpeed: 300,
            items: 3,
            paginationSpeed: 400,
            singleItem: false,
            navigationText: arrowIcons,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3],
            itemsTablet: [768, 1],
            itemsTabletSmall: false,
            itemsMobile: [479, 1],
            autoPlay: 3000,
            stopOnHover: true
        });
    });

    // Icon slider
    // ----------------------------------------------------------------


    $.each($(".owl-icons"), function (i, n) {
        $(n).owlCarousel({
            autoHeight: false,
            pagination: false,
            navigation: true,
            navigationText: arrowIcons,
            items: 6,
            itemsDesktop: [1199, 5],
            itemsDesktopSmall: [979, 5],
            itemsTablet: [768, 4],
            itemsTabletSmall: false,
            itemsMobile: [479, 3],
            addClassActive: true,
            autoPlay: 5500,
            stopOnHover: true
        });
    });

    //Product slider
    function loadSlide() {
        $.each($(".owl-product-gallery"), function (i, n) {
            $(n).owlCarousel({
                //transitionStyle: "fadeUp",
                autoHeight: true,
                slideSpeed: 800,
                navigation: true,
                navigationText: arrowIcons,
                pagination: true,
                items: 1,
                singleItem: true
            });
        });
    }

    $.each($(".owl-product-gallery"), function (i, n) {
        $(n).owlCarousel({
            //transitionStyle: "fadeUp",
            autoHeight: true,
            slideSpeed: 800,
            navigation: true,
            navigationText: arrowIcons,
            pagination: true,
            items: 1,
            singleItem: true
        });
    });


    // Scroll to top
    // ----------------------------------------------------------------

    var $wrapper = $('.wrapper');
    $wrapper.append($("<div class='scroll-top'><i class='icon icon-chevron-up'></i></div>"));

    var $scrollbtn = $('.scroll-top');

    $(document).on('ready scroll', function () {
        var docScrollTop = $(document).scrollTop(),
            docScrollBottom = $(window).scrollTop() + $(window).height() == $(document).height();

        if (docScrollTop >= 150) {
            $scrollbtn.addClass('visible');
        } else {
            $scrollbtn.removeClass('visible');
        }
        if (docScrollBottom) {
            $scrollbtn.addClass('active');
        }
        else {
            $scrollbtn.removeClass('active');
        }
    });

    $scrollbtn.on('click', function () {
        $('html,body').animate({
            scrollTop: $('body').offset().top
        }, 1000);
        return false;
    });

    // Product color var
    // ----------------------------------------------------------------

    $.each($('.product-colors'), function (i, n) {
        var $btn = $('.color-btn');
        $btn.on('click', function () {
            $(this).parent().find($btn).removeClass('checked');
            $(this).addClass('checked');
        });
    });

    // Tabsy images
    // ----------------------------------------------------------------

    var tabsyImg = $('.tabsy .tabsy-images > div'),
        tabsyLink = $('.tabsy .tabsy-links figure');

    // apply images to parent background
    tabsyImg.each(function (i, n) {
        $(n).css('background-image', 'url(' + $(n).find('img').attr('src') + ')');
    });

    tabsyLink.bind('mouseenter mouseleave', function () {
        var self = $(this),
            tabID = self.attr('data-image');
        tabsyLink.removeClass('current');
        tabsyImg.removeClass('current');
        self.addClass('current');
        self.closest('.tabsy').find("#" + tabID).addClass('current');
    });


    // Add to favorites list / product list
    // ----------------------------------------------------------------

    $('.add-favorite').on('click', function () {
        $(this).toggleClass("added");
    });

    $('.info-box-addto').on('click', function () {
        $(this).toggleClass('added');
    });

    // Filters toggle functions
    // ----------------------------------------------------------------

    // Check if some filter boxes has class active
    // then show hidden filters
    $('.filters .filter-box').each(function () {
        if ($(this).hasClass('active')) {
            $(this).find('.filter-content').show();
        }
    });

    var $filtersTitle = $('.filters .title');

    // Add emtpy span on title
    $filtersTitle.append('<span>' + '</span>');

    // Toggle filter function
    $filtersTitle.on('click', function (e) {
        var $this = $(this),
            $parent = $this.parent();
        $parent.toggleClass('active');

        if ($parent.hasClass('active')) {
            $parent.find('.filter-content').slideDown(300);
        }
        else {
            $parent.find('.filter-content').slideUp(200);
        }
    });

    // Update filter results - close dropdown filters
    // ----------------------------------------------------------------

    $('.filters .filter-update').on('click', function (e) {
        $(this).closest('.filter-box')
            .removeClass('active')
            .find('.filter-content').slideUp(200);
    });

    // Only for filters topbar
    // ----------------------------------------------------------------

    $('.filters input').on('change', function () {
        if ($(this).is(':checked')) {
            var $labelText = $(this).parent().find('label').text(),
                $title = $(this).closest('.filter-box').find('.title');

            $title.find('span').text($labelText);
        }
    });

    // Show hide filters (only for mobile)
    // ----------------------------------------------------------------

    $('.toggle-filters-mobile').on('click', function () {
        $('.filters').addClass('active');
    });
    $('.toggle-filters-close').on('click', function () {
        $('.filters').removeClass('active');
        $('html,body').animate({
            scrollTop: $('body').offset().top
        }, 800);
        return false;
    });


    // Strecher accordion
    // ----------------------------------------------------------------

    var $strecherItem = $('.stretcher-item');
    $strecherItem.bind({
        mouseenter: function (e) {
            $(this).addClass('active');
            $(this).siblings().addClass('inactive');
        },
        mouseleave: function (e) {
            $(this).removeClass('active');
            $(this).siblings().removeClass('inactive');
        }
    });

    // Blog image caption
    // ----------------------------------------------------------------

    var $blogImage = $('.blog-post-text img');
    $blogImage.each(function () {
        var $this = $(this);
        $this.wrap('<span class="blog-image"></span>');
        if ($this.attr("alt")) {
            var caption = this.alt;
            var link = $this.attr('data');
            $this.after('<span class="caption">' + caption + '</span>');
        }
    });

    // Coupon code
    // ----------------------------------------------------------------

    $(".form-coupon").hide();
    $("#couponCodeID").on('click', function () {
        if ($(this).is(":checked")) {
            $(".form-coupon").fadeIn();
        } else {
            $(".form-coupon").fadeOut();
        }
    });

    // Checkout login / register
    // ----------------------------------------------------------------

    var loginWrapper = $('.login-wrapper'),
        loginBtn = loginWrapper.find('.btn-login'),
        regBtn = loginWrapper.find('.btn-register'),
        signUp = loginWrapper.find('.login-block-signup'),
        signIn = loginWrapper.find('.login-block-signin');

    loginBtn.on('click', function () {
        signIn.slideDown();
        signUp.slideUp();
    });

    regBtn.on('click', function () {
        signIn.slideUp();
        signUp.slideDown();
    });

    // Isotope filter
    // ----------------------------------------------------------------

    $(function () {
        var price = 0;
        var $products = $("#products");
        var $checkboxes = $("#filters input");
        var $sortPrice = $("#sort-price");
        var filters = [];

        $(".item").addClass("show-me");
        filters.push(".show-me");

        // Sort products
        // --------------------------------------

        $products.isotope({
            itemSelector: '.item',
            getSortData: {
                number: '.price parseInt'
            },
            sortBy: 'number'
        });

        // Checkboxes & radiobuttons
        // --------------------------------------

        $sortPrice.on('change', function () {
            var order = $('option:selected', this).attr('data-option-value');
            var valAscending = (order == "asc");

            $products.isotope({
                itemSelector: '.item',
                getSortData: {
                    number: '.price parseInt'
                },
                sortBy: 'number',
                sortAscending: valAscending,
                filter: filters
            });

        });

        // Checkboxes & radiobuttons
        // --------------------------------------

        $checkboxes.on('change', function () {
            filters = [];
            filters.push(".show-me");
            $checkboxes.filter(':checked').each(function () {
                filters.push(this.value);
            });

            filters = filters.join('');
            $products.isotope({
                filter: filters
            });

        });

        // Range slider
        // --------------------------------------

        $("#range-price-slider").ionRangeSlider({
            type: "double",
            min: 0,
            max: 4000,
            from: 150,
            to: 3800,
            prefix: "$",
            onChange: function (data) {

                $(".item").each(function () {

                    price = parseInt($(this).find(".price").text(), 10);

                    if (data.from <= price && data.to >= price) {
                        $(this).addClass('show-me');
                    }
                    else {
                        $(this).removeClass('show-me');
                    }
                });

                $products.isotope({
                    itemSelector: '.item',
                    filter: filters
                });
            }
        });

    });

    // Single page - box filters
    // ----------------------------------------------------------------
    $(function () {

        // Filter buttons - toggle click event

        var $boxFilter = $('.box-filters figure');

        // init Isotope
        var $grid = $('#box-filters-results').isotope({
            itemSelector: '.item'
        });

        $boxFilter.on('click', function () {
            var $this = $(this);
            // Filter buttons - toggle click event
            if ($this.hasClass('active')) {
                $this.removeClass('active');

                $grid.isotope({ filter: "" });
            }
            else {
                $boxFilter.removeClass('active');
                $this.addClass('active');

                // Filter results
                var filterValue = $this.attr('data-filter');
                $grid.isotope({ filter: filterValue });
            }



        });


    });



    // Team members hover effect
    // ----------------------------------------------------------------

    var $member = $('.team article');
    $member.bind({
        mouseenter: function (e) {
            $member.addClass('inactive');
            $(this).addClass('active');
        },
        mouseleave: function (e) {
            $member.removeClass('inactive');
            $(this).removeClass('active');
        }
    });

    // Toggle contact form
    // ----------------------------------------------------------------

    $('.open-form').on('click', function () {
        var $this = $(this),
            parent = $this.parent();
        parent.toggleClass('active');
        if (parent.hasClass('active')) {
            $this.text($this.data('text-close'));
            $('.contact-form').slideDown();
        }
        else {
            $this.text($this.data('text-open'));
            $('.contact-form').slideUp();
        }

    });

    // Single page navigation (scroll to)
    // ----------------------------------------------------------------


    if ($('nav').hasClass('navbar-single-page')) {

        var $singleHyperlink = $('.navigation-main a');

        $singleHyperlink.on('click', function () {

            $singleHyperlink.removeClass('current');

            $(this).addClass('current');

            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top - $('.navigation-main').height()
            }, 500);
            return false;
        });

        // Magnific popup scroll to content
        // ----------------------------------------------------------------

        $('.mfp-open-scrollto').on('click', function () {
            $('html,body').animate({
                scrollTop: $('.mfp-content').offset().top - 200
            }, 300);
            return false;
        });
    }

});

$(window).bind('load', function () {
    setTimeout(function () {
        $('.page-loader').addClass('loaded');
    }, 1000);
});



