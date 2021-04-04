
@extends('layouts.admin')

@section('title')
  <title>Admin Mocafastfood</title>
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.admin.content-header', ['name' => 'Menu', 'key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('menus.create') }}" class="btn btn-success float-sm-right m-2">Add</a>
          </div>
          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Tên menu</th>
                  <th scope="col">Action</th>
                 
                </tr>
              </thead>
              <tbody>

                @foreach ($menus as $menu)
                  <tr>
                    <th scope="row">{{ $menu->id }}</th>
                    <td>{{ $menu->name }}</td>
                    <td>
                      <a href="{{ route('menus.edit', ['id'=> $menu->id]) }}" class="btn btn-default">Edit</a>
                      <a href="{{ route('menus.delete', ['id'=> $menu->id]) }}" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>        
          <div class="col-md-12">
             {{ $menus -> links() }}
          </div>
          
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


