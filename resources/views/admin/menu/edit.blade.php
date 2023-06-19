@extends('layouts.admin')
@section('content')
@section('title','Sửa menu')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('partials.content-header',['name' => 'Menu','key'=>'Edit','link'=>'admin/menu'])

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <form action="admin/menu/edit/{{ $menu->id }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên menu</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $menu->name }}">
                        </div>
                        <div class="form-group">
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control" name="parent_id">
                              <option value="0">Menu cha</option>
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
