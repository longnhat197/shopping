@extends('layouts.admin')
@section('content')
@section('title','Danh sách menu')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name' => 'Menu','key'=>'List','link'=>'menu'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="menu/create" class="btn btn-outline-success float-right mr-2 mb-3">+ Thêm mới</a>
                </div>
                @include('partials.notification')
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên menu</th>
                                <th class="text-center">Loại menu</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $menu)
                            <tr>
                                <th>{{ $menu->id }}</th>
                                <td>{{ $menu->name }}</td>
                                <td class="text-center">
                                    @if ($menu->parent_id == 0)
                                    Cha
                                    @else
                                    {{ $menu->parent_id }}
                                    @endif

                                </td>
                                <td class="d-flex">
                                    <a href="menu/edit/{{ $menu->id }}" data-toggle="tooltip" title="Edit"
                                        data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                        <span class="btn-icon-wrapper opacity-8">
                                            <i class="fa fa-edit fa-w-20"></i>
                                        </span>
                                    </a>
                                    <form action="menu/delete/{{ $menu->id }}" method="post">
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
                    {{ $menus->links() }}
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
