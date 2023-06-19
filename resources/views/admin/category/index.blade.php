@extends('layouts.admin')
@section('content')
@section('title','Danh mục sản phẩm')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'Category','key'=>'List','link'=>'admin/category'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="admin/category/create" class="btn btn-outline-success float-right mr-2 mb-3">+ Thêm mới</a>
                </div>
                @include('partials.notification')
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên danh mục</th>
                                <th class="text-center">Loại danh mục</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <th>{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td class="text-center">
                                    @if ($category->parent_id == 0)
                                    Cha
                                    @else
                                    {{ $category->parent_id }}
                                    @endif

                                </td>
                                <td class="d-flex">
                                    <a href="admin/category/edit/{{ $category->id }}" data-toggle="tooltip" title="Edit"
                                        data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                        <span class="btn-icon-wrapper opacity-8">
                                            <i class="fa fa-edit fa-w-20"></i>
                                        </span>
                                    </a>
                                    <form action="admin/category/delete/{{ $category->id }}" method="post">
                                        @csrf
                                        <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                            type="submit" data-toggle="tooltip" title="Delete" data-placement="bottom"
                                            onclick="return confirm('Do you really want to delete this item?')">
                                            <span class="btn-icon-wrapper opacity-8">
                                                <i class="fa fa-trash fa-w-20"></i>
                                            </span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
