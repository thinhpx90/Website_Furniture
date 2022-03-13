@extends('admin.layout.default')

@section('title')
Quản lý loại sản phẩm
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Sửa slide</h2>
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
                        <form action="{{ route('slide.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('name') text-danger @enderror">Tên danh mục</label>
                                        <input type="text" class="form-control @error('name') border border-danger @enderror" name="name" id="basicInput" value="{{ old('name', isset($slide) ? $slide->name : '') }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </fieldset>
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('link') text-danger @enderror">Tên danh mục</label>
                                        <input type="text" class="form-control @error('link') border border-danger @enderror" name="link" id="basicInput" value="{{ old('link', isset($slide) ? $slide->link : '') }}">
                                        @error('link')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </fieldset>
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('description') text-danger @enderror">Mô tả</label>
                                        <textarea class="form-control" id="summary-ckeditor" name="description">{{ $slide->description }}</textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput" class="@error('image') text-danger @enderror">Ảnh</label>
                                        <div class="custom-file">
                                            <input type="file" class="form-control @error('image') border border-danger @enderror" name="image" id="basicInput" onchange="previewFile(this);">
                                        </div>
                                        <p>
                                            <img id="image" src="{{ asset('storage/uploads/'.$slide->image) }}" height="300">
                                        </p>
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <input type="submit" class="btn btn-primary" value="Thêm">
                                    <a href="{{ route('slide.index') }}" class="btn btn-danger">Hủy</a>
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
    </script>
    <script>
        function previewFile(input){
            var file = $("input[type=file]").get(0).files[0];
    
            if(file){
                var reader = new FileReader();
    
                reader.onload = function(){
                    $("#image").attr("src", reader.result);
                }
    
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
