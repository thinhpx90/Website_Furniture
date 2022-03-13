@extends('admin.layout.default')

@section('title')
Quản lý danh mục
@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('') }}custom/modal.css">
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Quản lý danh mục</h2>
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
                    <a href="{{ route('category.create') }}" class="btn btn-primary">Thêm mới</a>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('category.index') }}" method="GET">
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                        <input type="text" class="form-control" name="search" id="iconLeft3" placeholder="Tìm kiếm" value="{{ old('search') }}">
                                        <div class="form-control-position">
                                            <i class="fal fa-search"></i>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <input type="submit" class="btn btn-success" value="Tìm kiếm">
                                </div>
                            </div>
                        </form>
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên danh mục</th>
                                        <th>Loại sản phẩm</th>
                                        <th>Mô tả</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $value)
                                        <tr>
                                            <th scope="row">{{ $key + ($data->currentPage() - 1) * $data->perPage() + 1 }}</th>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->type_product_id }}</td>
                                            <td>{{ $value->description }}</td>
                                            <td>
                                                <a href="{{ route('category.edit', $value->id) }}" class="btn btn-primary">
                                                    <i class="fal fa-edit"></i> Sửa
                                                </a>
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{{ $value->id }}">
                                                    <i class="fal fa-trash"></i> Xóa
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="justify-content-center">
                                {{ $data->links(('pagination::bootstrap-4')) }}
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
                    url: "{{ route('category.index') }}/" + id,
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
