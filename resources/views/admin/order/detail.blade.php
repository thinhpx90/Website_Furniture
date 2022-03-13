@extends('admin.layout.default')

@section('title')
Quản lý đơn hàng
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('') }}app-assets/css/pages/invoice.css">
@endsection

@section('script')
<script src="{{ asset('') }}app-assets/js/scripts/pages/invoice.js"></script>
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Chi Tiết đơn hàng</h2>
                <div class="breadcrumb-wrapper col-12">
                    {{-- <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Data List</a>
                        </li>
                        <li class="breadcrumb-item active">List View
                        </li>
                    </ol> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <!-- invoice functionality start -->
    <section class="invoice-print mb-1">
        <div class="row">

            <fieldset class="col-12 col-md-5 mb-1 mb-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Email" aria-describedby="button-addon2">
                    <div class="input-group-append" id="button-addon2">
                        <button class="btn btn-outline-primary" type="button">Send Invoice</button>
                    </div>
                </div>
            </fieldset>
            <div class="col-12 col-md-7 d-flex flex-column flex-md-row justify-content-end">
                <button class="btn btn-primary btn-print mb-1 mb-md-0"> <i class="feather icon-file-text"></i> Print</button>
                <button class="btn btn-outline-primary  ml-0 ml-md-1"> <i class="feather icon-download"></i> Download</button>
            </div>
        </div>
    </section>
    <!-- invoice functionality end -->
    <!-- invoice page -->
    <section class="card invoice-page">
        <div id="invoice-template" class="card-body">
            <!-- Invoice Company Details -->
            <div id="invoice-company-details" class="row">
                <div class="col-sm-6 col-12 text-left pt-1">
                    <div class="media pt-1">
                        <img src="../../../app-assets/images/logo/logo.png" alt="company logo" />
                    </div>
                </div>
                <div class="col-sm-6 col-12 text-right">
                    <h1>Hóa đơn</h1>
                    <div class="invoice-details mt-2">
                        <h6>Mã hóa đơn</h6>
                        <p>{{ $data->order_no }}</p>
                        <h6 class="mt-2">Ngày tạo</h6>
                        <p>{{ now()->format('d/m/y') }}</p>
                    </div>
                </div>
            </div>
            <!--/ Invoice Company Details -->

            <!-- Invoice Recipient Details -->
            <div id="invoice-customer-details" class="row pt-2">
                <div class="col-sm-6 col-12 text-left">
                    <h5>Người nhận</h5>
                    <div class="recipient-info my-2">
                        <p>{{ $data->user->name }}</p>
                        <p>{{ $data->user->address }}</p>
                    </div>
                    <div class="recipient-contact pb-2">
                        <p>
                            <i class="feather icon-mail"></i>
                            {{ $data->user->email }}
                        </p>
                        <p>
                            <i class="feather icon-phone"></i>
                            {{ $data->user->phone }}
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-12 text-right">
                    <h5>Công ty TNHH Hatech</h5>
                    <div class="company-info my-2">
                        <p>Tầng 4,tháp C tòa nhà Golden Palace</p>
                        <p>Mễ Trì, Nam Từ Niêm</p>
                        <p>Hà Nội</p>
                    </div>
                    <div class="company-contact">
                        <p>
                            <i class="feather icon-mail"></i>
                            hello@pixinvent.net
                        </p>
                        <p>
                            <i class="feather icon-phone"></i>
                            +91 999 999 9999
                        </p>
                    </div>
                </div>
            </div>
            <!--/ Invoice Recipient Details -->

            <!-- Invoice Items Details -->
            <div id="invoice-items-details" class="pt-1 invoice-items-table">
                <div class="row">
                    <div class="table-responsive col-12">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn vị</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($data->billDetail as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->product->unit }}</td>
                                        <td>{{ number_format($item->unit_price) }} VND</td>
                                    </tr>
                                    @php
                                        $total += $item->unit_price;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="invoice-total-details" class="invoice-total-table">
                <div class="row">
                    <div class="col-7 offset-5">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Cộng tiền hàng</th>
                                        <td>{{ number_format($total) }} VND</td>
                                    </tr>
                                    <tr>
                                        <th>Tiền thuế</th>
                                        <td>{{ number_format($total*0.05) }} VND</td>
                                    </tr>
                                    <tr>
                                        <th>Tổng tiền</th>
                                        <td>{{ number_format($total*1.05) }} VND</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Invoice Footer -->
            <div id="invoice-footer" class="text-right pt-3">
                <p>Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi.</p>
                    
            </div>
            <!--/ Invoice Footer -->

        </div>
    </section>
    <!-- invoice page end -->

</div>
@endsection