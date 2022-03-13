@extends('page.layout.default')

@section('content')

    <section class="main-header" style="background-image:url(assets/images/gallery-2.jpg)">
            <header>
                <div class="container text-center">
                    <h2 class="h2 title">Checkout</h2>
                    <ol class="breadcrumb breadcrumb-inverted">
                        <li><a href="index.html"><span class="icon icon-home"></span></a></li>
                        <li><a href="checkout-1.html">Cart items</a></li>
                        <li><a class="active" href="checkout-2.html">Delivery</a></li>
                        <li><a href="checkout-4.html">Receipt</a></li>
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
                        <li class="col-md-4">
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
                    <h3 class="h3 title">Checkout - Step 2</h3>
                </header>

                <!-- ========================  Cart navigation ======================== -->
                @guest
                @else
                <form method="POST" action="{{ route('page.payment') }}">
                    @csrf
                @endguest
                <div class="clearfix">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{ route('page.index') }}" class="btn btn-clean-dark"><span class="icon icon-chevron-left"></span> Back to cart</a>
                        </div>
                        <div class="col-xs-6 text-right">
                            <button type="submit" class="btn btn-main">
                                <span class="icon icon-cart"></span> Payment
                            </button>
                        </div>
                    </div>
                </div>

                <!-- ========================  Delivery ======================== -->

                <div class="cart-wrapper">

                    <div class="note-block">
                        <div class="row">

                            <!-- === left content === -->
                            @guest
                                <div class="col-md-6">

                                    <!-- === login-wrapper === -->

                                    <div class="login-wrapper">

                                        <div class="white-block">

                                            <!--signin-->

                                            <div class="login-block login-block-signin">

                                                <div class="h4">Sign in <a href="javascript:void(0);" class="btn btn-main btn-xs btn-register pull-right">create an account</a></div>

                                                <hr />

                                                <form action="{{ route('page.login') }}" method="POST">
                                                    <div class="row">
                                                        @csrf
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="text" value="" name="email" class="form-control" placeholder="User ID">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="password" value="" name="password" class="form-control" placeholder="Password">
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-6">
                                                            <span class="checkbox">
                                                                <input type="checkbox" id="remember" name="remember">
                                                                <label for="remember">Remember me</label>
                                                            </span>
                                                        </div>

                                                        <div class="col-xs-6 text-right">
                                                            <input type="submit" class="btn btn-main" value="Login">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div> <!--/signin-->
                                            <!--signup-->

                                            <div class="login-block login-block-signup">

                                                <div class="h4">Register now <a href="javascript:void(0);" class="btn btn-main btn-xs btn-login pull-right">Log in</a></div>

                                                <hr />
                                                <form method="POST" action="{{ route('page.register') }}">
                                                    <div class="row">
                                                        @csrf
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="text" name="name" class="form-control" placeholder="Full name: *">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">

                                                            <div class="form-group">
                                                                <input type="date" name="birth" class="form-control" placeholder="Birth day: *">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <select name="gender" class="form-control">
                                                                    <option value="1">Nam</option>
                                                                    <option value="0">Nu</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <input type="text" name="address" class="form-control" placeholder="Address: *">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" name="email" class="form-control" placeholder="Email: *">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" name="phone" class="form-control" placeholder="Phone: *">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="password" name="password" class="form-control" placeholder="Password: *">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Password confirmation: *">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <input type="submit" class="btn btn-main btn-block" value="Create account">
                                                        </div>

                                                    </div>
                                                </form>
                                            </div> <!--/signup-->
                                        </div>
                                    </div> <!--/login-wrapper-->
                                </div>
                            @else
                                <div class="col-md-6">

                                    <div class="white-block">

                                        <div class="h4">Order details</div>

                                        <hr />

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <strong>Order no.</strong> <br />
                                                    <span>{{ $order_no }}</span>
                                                    <input type="hidden" value="{{ $order_no }}" name="order_no">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <strong>Order date</strong> <br />
                                                    <span>{{ now()->format('d-m-y') }}</span>
                                                </div>
                                            </div>

                                        </div>

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

                                    </div> <!--/col-md-6-->

                                </div>
                            @endguest
                            <!--/col-md-6-->
                            <!-- === right content === -->

                            <div class="col-md-6">

                                <div class="white-block">

                                    <div class="h4">Choose payment</div>

                                    <hr />

                                    <span class="checkbox">
                                        <input type="radio" id="paymentID1" name="payment" value="1" checked="checked">
                                        <label for="paymentID1">
                                            <strong>Pay via credit cart</strong> <br />
                                            <small>(MasterCard, Maestro, Visa, Visa Electron, JCB and American Express)</small>
                                        </label>
                                    </span>

                                    <span class="checkbox">
                                        <input type="radio" id="paymentID2" name="payment" value="2">
                                        <label for="paymentID2">
                                            <strong>PayPal</strong> <br />
                                            <small>Purchase with your fingertips. Look for us the next time you're paying from a mobile app, and checkout faster on thousands of mobile websites.</small>
                                        </label>
                                    </span>

                                    <span class="checkbox">
                                        <input type="radio" id="paymentID3" name="payment" value="3">
                                        <label for="paymentID3">
                                            <strong>Pay via bank transfer</strong> <br />
                                            <small>You can make payments directly into our bank account and email the bank wire transfer receipt to us. We recommend bank wire transfer for payments exceeding $500,00. </small>
                                        </label>
                                    </span>
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
                        @foreach ($data['cart'] as $item)
                            <div class="cart-block cart-block-item clearfix">
                                <div class="image">
                                    <a href="product.html"><img src="{{ asset('') }}page-assets/assets/images/product-1.png" alt="" /></a>
                                </div>
                                <div class="title">
                                    <div class="h4"><a href="product.html">{{ $item->name }}</a></div>
                                    <div>{{ $item->options['category'] }}</div>
                                </div>
                                <div class="quantity">
                                    {{ $item->qty }}
                                </div>
                                <div class="price">
                                    @if (isset($item->options['old_price']))
                                        <span class="final h3">{{ number_format($item->price) }} VND</span>
                                        <span class="discount">{{ number_format($item->options['old_price']) }} VND</span>
                                    @else
                                        <span class="final h3">{{ number_format($item->price) }} VND</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!--cart prices -->

                    <div class="clearfix">
                        {{-- <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>Discount 15%</strong>
                            </div>
                            <div>
                                <span>$ 159,00</span>
                            </div>
                        </div>

                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>Shipping</strong>
                            </div>
                            <div>
                                <span>$ 30,00</span>
                            </div>
                        </div> --}}

                        <div class="cart-block cart-block-footer clearfix">
                            <div>
                                <strong>VAT</strong>
                            </div>
                            <div>
                                <span>{{ $data['tax'] }} VND</span>
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
                                <div class="h2 title">{{ $data['total'] }} VND</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ========================  Cart navigation ======================== -->

                <div class="clearfix">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{ route('page.index') }}" class="btn btn-clean-dark"><span class="icon icon-chevron-left"></span> Back to cart</a>
                        </div>
                        <div class="col-xs-6 text-right">
                            <button type="submit" class="btn btn-main">
                                <span class="icon icon-cart"></span> Payment
                            </button>
                        </div>
                    </div>
                </div>
                @guest
                @else
                </form>
                @endguest

            </div> <!--/container-->

        </section>

@endsection
