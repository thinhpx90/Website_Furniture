@extends('admin.layout.default')

@section('title')
Quản lý sản phẩm
@endsection

@section('css')
    {{-- <link href="{{ asset('') }}dist/font/font-fileuploader.css" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('') }}dist/jquery.fileuploader.min.css" media="all" rel="stylesheet"> --}}
    <style>
        .fileuploader {
            max-width: 50%;
        }
    </style>
    <link href="{{ asset('') }}custom/css/upload-file.css" rel="stylesheet">
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Thêm sản phẩm</h2>
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
                        <form action="{{ route('product.store') }}" id="form-product" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('name') text-danger @enderror">Tên sản phẩm</label>
                                        <input type="text" class="form-control @error('name') border border-danger @enderror" name="name" id="basicInput">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('type_product_id') text-danger @enderror">Loại sản phẩm</label>
                                        <select name="type_product_id" class="form-control @error('type_product_id') border border-danger @enderror" id="basicInput">
                                            @foreach($types as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('type_product_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('category_id') text-danger @enderror">Danh mục</label>
                                        <select name="category_id" class="form-control @error('category_id') border border-danger @enderror" id="basicInput">
                                            @foreach($categorys as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('supplier_id') text-danger @enderror">Nhà cung cấp</label>
                                        <select name="supplier_id" class="form-control @error('supplier_id') border border-danger @enderror" id="basicInput">
                                            @foreach($suppliers as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('supplier_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('description') text-danger @enderror">Mô tả</label>
                                        <textarea class="form-control" id="summary-ckeditor" name="description"></textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('origin') text-danger @enderror">Nơi sản xuất</label>
                                        <input type="text" class="form-control @error('origin') border border-danger @enderror" name="origin" id="basicInput">
                                        @error('origin')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('material') text-danger @enderror">Vật liệu chế tạo</label>
                                        <input type="text" class="form-control @error('material') border border-danger @enderror" name="material" id="basicInput">
                                        @error('material')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('size') text-danger @enderror">Kích thước</label>
                                        <input type="text" class="form-control @error('size') border border-danger @enderror" name="size" id="basicInput">
                                        @error('size')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('unit_price') text-danger @enderror">Giá tiền</label>
                                        <input type="text" class="form-control @error('unit_price') border border-danger @enderror" name="unit_price" id="basicInput">
                                        @error('unit_price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('promotion_price') text-danger @enderror">Giá khuyến mại</label>
                                        <input type="text" class="form-control @error('promotion_price') border border-danger @enderror" name="promotion_price" id="basicInput">
                                        @error('promotion_price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('unit') text-danger @enderror">Đơn vị</label>
                                        <input type="text" class="form-control @error('unit') border border-danger @enderror" name="unit" id="basicInput">
                                        @error('unit')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('image') text-danger @enderror">Ảnh</label>
                                        <div class="images">
                                            <div class="pic">
                                                add
                                            </div>
                                        </div>
                                        {{-- <div class="custom-file">
                                            <input type="file" name="files">
                                        </div> --}}
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <input type="submit" class="btn btn-primary" id="send" value="Thêm">
                                    <a href="{{ route('product.index') }}" class="btn btn-danger">Hủy</a>
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

@section('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
    CKEDITOR.replace( 'summary-ckeditor', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form' 
    });
    $(document).ready(function() {
        
        // enable fileuploader plugin
        $('input[name="files"]').fileuploader({
            addMore: true
        });
        
    });
    </script>
    {{-- <script src="{{ asset('') }}dist/jquery.fileuploader.min.js"></script> --}}
    <script src="{{ asset('') }}custom/js/upload-file.js"></script>
@endsection
