@extends('page.layout.default')

@section('content')

    <!-- ========================  Main header ======================== -->

    <section class="main-header" style="background-image:url(assets/images/gallery-2.jpg)">
        <header>
            <div class="container text-center">
                <h2 class="h2 title">Checkout</h2>
                <ol class="breadcrumb breadcrumb-inverted">
                    <li><a href="index.html"><span class="icon icon-home"></span></a></li>
                    <li><a href="checkout-1.html">Cart items</a></li>
                    <li><a href="checkout-2.html">Delivery</a></li>
                    <li><a href="checkout-3.html">Payment</a></li>
                    <li><a class="active" href="checkout-4.html">Receipt</a></li>
                </ol>
            </div>
        </header>
    </section>

    <!-- ========================  Step wrapper ======================== -->

    <div class="step-wrapper">
        <div class="container">

            <div class="stepper">
                <ul class="row">
                    <li class="col-md-4 active">
                        <span data-text="Cart items"></span>
                    </li>
                    <li class="col-md-4 active">
                        <span data-text="Delivery"></span>
                    </li>
                    <li class="col-md-4 active">
                        <span data-text="Receipt"></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- ========================  Checkout ======================== -->

    <section class="checkout">
        <div class="container">

            <header class="hidden">
                <h3 class="h3 title">Checkout - Step 4</h3>
            </header>

            <!-- ========================  Cart navigation ======================== -->

            <div class="clearfix">
                <div class="row">
                    <div class="col-xs-6">
                        <span class="h2 title">Your order is completed!</span>
                    </div>
                    <div class="col-xs-6 text-right">
                        <a onclick="window.print()" class="btn btn-main"><span class="icon icon-printer"></span> Print</a>
                    </div>
                </div>
            </div>

            <!-- ========================  Payment ======================== -->

            <div class="cart-wrapper">

                <div class="note-block">

                    <div class="row">
                        <!-- === left content === -->

                        <div class="col-md-6">

                            <div class="white-block">

                                <div class="h4">Order details</div>

                                <hr />

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Order no.</strong> <br />
                                            <span>{{ $bill_detail->order_no }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Order date</strong> <br />
                                            <span>{{ $bill_detail->created_at->format('d-m-y') }}</span>
                                        </div>
                                    </div>

                                </div>

                            </div> <!--/col-md-6-->

                        </div>

                        <!-- === right content === -->

                        <div class="col-md-6">
                            <div class="white-block">

                                <div class="h4">Shipping info</div>

                                <hr />

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Name</strong> <br />
                                            <span>{{ Auth::user()->name }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Email</strong><br />
                                            <span>{{ Auth::user()->email }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Phone</strong><br />
                                            <span>{{ Auth::user()->phone }}</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Address</strong><br />
                                            <span>{{ Auth::user()->address }}</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================  Cart wrapper ======================== -->

            <div class="cart-wrapper">
                <!--cart header -->

                <div class="cart-block cart-block-header clearfix">
                    <div>
                        <span>Product</span>
                    </div>
                    <div>
                        <span>&nbsp;</span>
                    </div>
                    <div>
                        <span>Quantity</span>
                    </div>
                    <div class="text-right">
                        <span>Price</span>
                    </div>
                </div>

                <!--cart items-->

                <div class="clearfix">
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($bill_detail->billDetail as $item)
                        <div class="cart-block cart-block-item clearfix">
                            <div class="image">
                                <a href="product.html"><img src="{{ asset('') }}page-assets/assets/images/product-1.png" alt="" /></a>
                            </div>
                            <div class="title">
                                <div class="h4"><a href="product.html">{{ $item->product->name }}</a></div>
                                <div>{{ $item->product->category->name }}</div>
                            </div>
                            <div class="quantity">
                                <strong>{{ $item->quantity }}</strong>
                            </div>
                            <div class="price">
                                <span class="final h3">{{ number_format($item->unit_price) }} VND</span>
                            </div>
                        </div>
                        @php
                            $total += $item->unit_price;
                        @endphp
                    @endforeach
                </div>

                <!--cart prices -->

                <div class="clearfix">

                    <div class="cart-block cart-block-footer clearfix">
                        <div>
                            <strong>VAT</strong>
                        </div>
                        <div>
                            <span>{{ number_format($total*0.05) }} VND</span>
                        </div>
                    </div>
                </div>

                <!--cart final price -->

                <div class="clearfix">
                    <div class="cart-block cart-block-footer clearfix">
                        <div>
                            <strong>Promo code included!</strong>
                        </div>
                        <div>
                            <div class="h2 title">{{ number_format($total) }} VND</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================  Cart navigation ======================== -->

            <div class="clearfix">
                <div class="row">
                    <div class="col-xs-6">
                        <span class="h2 title">Your order is completed!</span>
                    </div>
                    <div class="col-xs-6 text-right">
                        <a onclick="window.print()" class="btn btn-main"><span class="icon icon-printer"></span> Print</a>
                    </div>
                </div>
            </div>

        </div> <!--/container-->

    </section>

@endsection
