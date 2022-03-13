@extends('admin.layout.default')

@section('title')
Quản lý sản phẩm
@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('') }}custom/modal.css">
    <style>
        .text-long {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Quản lý sản phẩm</h2>
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
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('product.create') }}" class="btn btn-primary">Thêm mới</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('product.index') }}" method="GET">
                            <div class="row pb-2">
                                <div class="col-sm-6 col-12">
                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                        <input type="text" class="form-control" name="search" id="iconLeft3" placeholder="Tìm kiếm" value="{{ old('search') }}">
                                        <div class="form-control-position">
                                            <i class="fal fa-search"></i>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                        <select class="form-control" name="category" id="iconLeft3">
                                            <option value="" selected>Danh mục sản phẩm</option>
                                            @foreach($categorys as $key => $value)
                                                <option value="{{ $value->id }}" @if (request()->category == $value->id) selected @endif>{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-control-position">
                                            <i class="fad fa-tag"></i>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                        <select class="form-control" name="type" id="iconLeft3">
                                            <option value="" selected>Loại sản phẩn</option>
                                            @foreach($types as $key => $value)
                                                <option value="{{ $value->id }}" @if (request()->type == $value->id) selected @endif>{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-control-position">
                                            <i class="fad fa-typewriter"></i>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                        <select class="form-control" name="supplier" id="iconLeft3">
                                            <option value="" selected>Nhà cung cấp</option>
                                            @foreach($suppliers as $key => $value)
                                                <option value="{{ $value->id }}" @if (request()->supplier == $value->id) selected @endif>{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-control-position">
                                            <i class="fad fa-truck"></i>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-sm-5 col-12">
                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                        <input type="number" class="form-control" name="min" id="iconLeft3" placeholder="Giá trị nhỏ nhất" value="{{ old('min') }}">
                                        <div class="form-control-position">
                                            <i class="fad fa-file-invoice-dollar"></i>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-sm-5 col-12">
                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                        <input type="number" class="form-control" name="max" id="iconLeft3" placeholder="Gia trị lớn nhất" value="{{ old('max') }}">
                                        <div class="form-control-position">
                                            <i class="fad fa-file-invoice-dollar"></i>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-sm-2 col-12">
                                    <input type="submit" class="btn btn-success w-100" value="Tìm kiếm">
                                </div>
                            </div>
                        </form>
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>loại sản phẩm</th>
                                        <th>Danh mục</th>
                                        <th>Nhà cung cấp</th>
                                        <th>Mô tả</th>
                                        <th>Xuất xứ</th>
                                        <th>Chất liệu</th>
                                        <th>Size</th>
                                        <th>Giá bán</th>
                                        <th>Khuyến mại</th>
                                        <th>Đơn vị</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $key => $value)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->typeProduct->name }}</td>
                                            <td>{{ $value->category->name }}</td>
                                            <td>{{ $value->supplier->name }}</td>
                                            <td><div class="text-long">{!! $value->description !!}</div></td>
                                            <td>{{ $value->origin }}</td>
                                            <td>{{ $value->material }}</td>
                                            <td>{{ $value->size }}</td>
                                            <td>{{ $value->unit_price }}</td>
                                            <td>{{ $value->promotion_price }}</td>
                                            {{-- <td>
                                                <img src="{{ asset('storage/uploads/'.$value->image) }}" height="100" width="200">
                                                <img src="{{ $value->image }}" height="100" width="200">
                                            </td> --}}
                                            <td>{{ $value->unit }}</td>
                                            <td>
                                                <div class="custom-control custom-switch custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input" id="accountSwitch" @if ($value->status == 1) checked @endif >
                                                    <label class="custom-control-label mr-1" for="accountSwitch1"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('product.edit', $value->id) }}" class="text-dark">
                                                    <i class="fal fa-edit"></i>
                                                </a>
                                                <a data-toggle="modal" data-target="#exampleModal" data-whatever="{{ $value->id }}"><i class="fal fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="justify-content-center">
                                {{ $products->links(('pagination::bootstrap-4')) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-confirm" role="document">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="fal fa-times"></i>
                </div>
                <h4 class="modal-title w-100">Are you sure?</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có thực sự muốn xóa các bản ghi này không? Không thể hoàn tác quá trình này.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-danger" id="btn-delete">Xóa</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('whatever')
            $('#btn-delete').on('click', function(){
                $.ajax({
                    url: "{{ route('product.index') }}/" + id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result) {
                        location.reload()
                    }
                })
            })
        })
    </script>
@endsection
