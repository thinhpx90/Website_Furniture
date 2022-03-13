@extends('admin.layout.default')

@section('title')
Quản lý đơn hàng
@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('') }}custom/modal.css">
    <style>
        .modal-confirm .icon-box {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            z-index: 9;
            text-align: center;
            border: 0px;
        }
        .modal-confirm .icon-box i {
            color: #ffb701;
            font-size: 70px;
            display: inline-block;
            margin-top: 13px;
            margin-right: 6px;
        }
    </style>
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Quản lý đơn hàng</h2>
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
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('admin.order') }}" method="GET">
                            <div class="row pb-2">
                                <div class="col-sm-6 col-12">
                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                        <select class="form-control" name="status" id="iconLeft3">
                                            <option value="" selected>Tất cả trạng thái</option>
                                            <option value="0">Trạng thái chờ</option>
                                            <option value="1">Trạng thái hoàn thành</option>
                                            <option value="-1">Trạng thái Hủy</option>
                                        </select>
                                        <div class="form-control-position">
                                            <i class="fad fa-typewriter"></i>
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
                                        <th>Tên khách hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Hình thức thanh toán</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $value)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $value->user->name }}</td>
                                            <td>{{ $value->created_at }}</td>
                                            <td>
                                                @if($value->payment == 1)
                                                    Thanh toán bằng tài khoản ngân hàng
                                                @endif
                                                @if($value->payment == 2)
                                                    Thanh toán bằng ví điện tử
                                                @endif
                                                @if($value->payment == 3)
                                                    Thanh toán khi nhận hàng
                                                @endif
                                            </td>
                                            <td>
                                                @if($value->status == 0)
                                                    <div class="chip chip-warning">
                                                        <div class="chip-body">
                                                            <div class="chip-text">Chờ</div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($value->status == 1)
                                                    <div class="chip chip-success">
                                                        <div class="chip-body">
                                                            <div class="chip-text">Hoàn thành</div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($value->status == -1)
                                                    <div class="chip chip-danger">
                                                        <div class="chip-body">
                                                            <div class="chip-text">Hủy</div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($value->status == 0)
                                                    <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="{{ $value->id }}" data-update="1">
                                                        <i class="fad fa-box-check"></i> Thoàn thành
                                                    </button>
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="{{ $value->id }}" data-update="-1">
                                                        <i class="fad fa-file-minus"></i> Hủy
                                                    </button>
                                                @endif
                                                <a href="{{ route('admin.order.detail', $value->id) }}" class="btn btn-primary">Chi tiết</a>
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
                    <i class="fal fa-exclamation-triangle"></i>
                </div>						
                <h4 class="modal-title w-100">Are you sure?</h4>	
            </div>
            <div class="modal-body">
                <p>Bạn có muốn thực hiện hành động này không? Không thể hoàn tác quá trình này.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-primary" id="btn-delete">Xác nhận</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
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
            var data = new FormData()
            data.append('status', button.data('update'))
            $('#btn-delete').on('click', function(){
                $.ajax({
                    url: "order/update/" + id,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        location.reload()
                    }
                })
            })
        })
    </script>
@endsection