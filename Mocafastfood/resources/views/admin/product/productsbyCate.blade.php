
@extends('layouts.admin')
@section('title')
<title>Admin Mocafastfood</title>
@endsection




@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partial.admin.content-header', ['name' => 'Sản phẩm/', 'key'=>'danh sách'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content float-sm-left m-2">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form class="form-inline" style="float: left;margin-top: 13px" action="{{ route('products.searchProduct') }}" method="get">
            @csrf
            <input type="text" class="form-control mb-2 mr-sm-2" name="productName" id="inlineFormInputName2" placeholder="nhập tên sản phẩm">
            <button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
          </form>
          <form class="float-sm-left m-2" action="{{ route('products.getProductbyCate') }}" method="get" >
            @csrf
            <div class="form-row align-items-center ">
              <div class="col-auto my-1">
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="categoryID">
                  <option selected>Lọc theo loại</option>
                  {!! $htmlOption !!}
                </select>
              </div>
              <div class="col-auto my-1">
                <button type="submit" class="btn btn-primary">Lọc</button>
              </div>
            </div>
          </form>
          <a href="{{ route('products.create') }}" class="btn btn-success float-sm-right m-2">Thêm</a>
        </div>
        
        <div class="col-md-12">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Hình ảnh </th>
                <th scope="col">Danh mục</th>
                <th scope="col">Thao tác</th>
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
                  <a href="{{ route('products.edit', ['id'=> $product->id]) }}" class="btn btn-default">Sửa</a>
                  <a data-url="{{ route('products.delete', ['id'=> $product->id]) }}" 
                    href=""
                    class="btn btn-danger action_delete">Xóa</a>
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