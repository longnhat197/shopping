@extends('layouts.admin')
@section('content')
@section('title','Thêm sản phẩm')

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin1/product/add/add.css') }}" rel="stylesheet" />

@endsection


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('partials.content-header',['name' => 'Product','key'=>'Add','link'=>'admin/product'])

    <!-- Main content -->
    <form action="admin/product/create" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">

                        @csrf
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Nhập tên sản phẩm">
                        </div>

                        <div class="form-group">
                            <label for="price">Giá sản phẩm</label>
                            <input type="text" name="price" class="form-control" id="price"
                                placeholder="Nhập giá sản phẩm">
                        </div>

                        <p style="font-weight: bold">Ảnh đại diện</p>
                        <div class="custom-file mt-1 mb-3">

                            <label for="feature_image_path" class="custom-file-label">Chọn ảnh</label>
                            <input type="file" name="feature_image_path" class="custom-file-input"
                                id="feature_image_path">
                        </div>

                        <p style="font-weight: bold">Ảnh chi tiết</p>
                        <div class="custom-file mt-1 mb-3">
                            <label for="image_path" class="custom-file-label">Chọn ảnh</label>
                            <input type="file" name="image_path" class="custom-file-input" id="image_path" multiple>
                        </div>

                        <div class="form-group">
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control js-states select2_init" name="parent_id">
                                <option selected value="0">Danh mục cha</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tag">Select list:</label>
                            <select class="form-control tags_select" id="tag" name="tag" multiple="multiple">
                                <option selected="selected">orange</option>
                                <option>white</option>
                                <option selected="selected">purple</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="content">Content:</label>
                            <textarea class="form-control tinymce_editor_init" name="content" id="content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Submit</button>

                    </div>



                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
</form>
<!-- /.content-wrapper -->
@endsection

@section('js')
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/ht2q8shag22vyn89yaaa2xbmc0c9mg5bqppl375w2z6iz0qn/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
<script src="{{ asset('admin1/product/add/add.js') }}"></script>
@endsection
