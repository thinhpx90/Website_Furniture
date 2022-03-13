@extends('admin.layout.default')

@section('title')
Quản lý danh mục
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Thêm danh mục</h2>
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
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('name') text-danger @enderror">Tên danh mục</label>
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
                                            @foreach($typeProduct as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('type_product_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('description') text-danger @enderror">Mô tả</label>
                                        <input type="text" class="form-control @error('description') border border-danger @enderror" name="description" id="basicInput">
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <input type="submit" class="btn btn-primary" value="Thêm">
                                    <a href="{{ route('category.index') }}" class="btn btn-danger">Hủy</a>
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

