@extends('layouts.admin')
@section('content')
@section('title','Thêm sản phẩm')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('partials.content-header',['name' => 'Product','key'=>'Add','link'=>'admin/product'])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <form action="admin/product/create" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nhập tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control" name="parent_id">
                              <option selected value="0">Danh mục cha</option>
                              {!! $htmlOption !!}
                            </select>
                          </div>
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </form>
                </div>
                <div class="col-md-8"></div>


            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
