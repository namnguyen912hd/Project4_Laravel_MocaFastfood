
@extends('layouts.admin')

@section('title')
  <title>Admin Mocafastfood</title>
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.admin.content-header', ['name' => 'Danh mục/', 'key'=>'danh sách'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            @can('category-add')
              <a href="{{ route('categories.create') }}" class="btn btn-success float-sm-right m-2">Thêm</a>
            @endcan           
          </div>
          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Tên loại</th>
                  <th scope="col">Thao tác</th>
                 
                </tr>
              </thead>
              <tbody>
                @php
                  $stt = 1
                @endphp
                @foreach ($categories as $category)
                  <tr>
                    <th scope="row">{{$stt++}}</th>
                    <td>{{ $category->name }}</td>
                    <td>
                      @can('category-edit')
                          <a href="{{ route('categories.edit', ['id'=> $category->id]) }}" class="btn btn-default">Sửa</a>
                      @endcan
                      @can('category-delete')
                        <a href="" data-url="{{ route('categories.delete', ['id'=> $category->id]) }}" class="btn btn-danger action_delete">Xóa</a>
                      @endcan
                      
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>        
          <div class="col-md-12">
             {{ $categories -> links() }}
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
