
@extends('layouts.admin')

@section('title')
  <title>Admin Mocafastfood</title>
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.admin.content-header', ['name' => 'Menu/', 'key'=>'danh sách'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('menus.create') }}" class="btn btn-success float-sm-right m-2">Thêm</a>
          </div>
          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Tên menu</th>
                  <th scope="col">Thao tác</th>
                 
                </tr>
              </thead>
              <tbody>
                @php
                  $stt = 1
                @endphp
                @foreach ($menus as $menu)
                  <tr>
                    <th scope="row">{{$stt++}}</th>
                    <td>{{ $menu->name }}</td>
                    <td>
                      <a href="{{ route('menus.edit', ['id'=> $menu->id]) }}" class="btn btn-default">Sửa</a>
                      <a href="" data-url="{{ route('menus.delete', ['id'=> $menu->id]) }}" class="btn btn-danger action_delete">Xóa</a>
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

@section('js')
  <script src="{{ asset('vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
  <script src="{{ asset('vendors/adminDelete.js') }}"></script>
  <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
@endsection
