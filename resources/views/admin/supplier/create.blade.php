@extends('admin.layout.default')

@section('title')
Quản lý nhà cung cấp
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Thêm nhà cung cấp</h2>
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
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('supplier.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('name') text-danger @enderror">Tên nhà cung cấp</label>
                                        <input type="text" class="form-control @error('name') border border-danger @enderror" name="name" id="basicInput">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('address') text-danger @enderror">Địa chỉ</label>
                                        <input type="text" class="form-control @error('address') border border-danger @enderror" name="address" id="basicInput">
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('phone') text-danger @enderror">Số điện thoại</label>
                                        <input type="text" class="form-control @error('phone') border border-danger @enderror" name="phone" id="basicInput">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('email') text-danger @enderror">Email</label>
                                        <input type="text" class="form-control @error('email') border border-danger @enderror" name="email" id="basicInput">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <input type="submit" class="btn btn-primary" value="Thêm">
                                    <a href="{{ route('supplier.index') }}" class="btn btn-danger">Hủy</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

