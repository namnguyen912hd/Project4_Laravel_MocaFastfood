
@extends('layouts.admin')
@section('title')
  <title>Admin Mocafastfood</title>
@endsection




@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.admin.content-header', ['name' => 'Product', 'key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('products.create') }}" class="btn btn-success float-sm-right m-2">Add</a>
          </div>
          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Tên sản phẩm</th>
                  <th scope="col">Giá</th>
                  <th scope="col">Hình ảnh </th>
                  <th scope="col">Danh mục</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
 
                @php
                  $stt = 1
                @endphp
                @foreach ($products as $product)
                  <tr>
                    <th scope="row">{{$stt++}}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price) }}</td>
                    <td>
                      <img style="width: 70px;height: 60px" src="{{$product->feature_image_path}}" alt="">
                    </td>
                    <td>{{ optional($product->category) ->name }}</td>
                   
                    <td>
                      <a href="{{ route('products.edit', ['id'=> $product->id]) }}" class="btn btn-default">Edit</a>
                      <a data-url="{{ route('products.delete', ['id'=> $product->id]) }}" 
                          href=""
                         class="btn btn-danger action_delete">Delete</a>
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>        
          <div class="col-md-12">
            {{ $products -> links() }}
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
  <script src="{{ asset('vendors/product/edit.js') }}"></script>
  <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
@endsection