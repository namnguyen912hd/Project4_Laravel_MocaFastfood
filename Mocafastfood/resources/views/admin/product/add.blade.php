
@extends('layouts.admin')

@section('title')
<title>Add Product</title>
@endsection

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/product/add.css') }}">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partial.admin.content-header', ['name' => 'product', 'key'=>'Add'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label>Tên sản phẩm:</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="nhập tên sản phẩm" value="{{old('name')}}">
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label>Giá sản phẩm:</label>
              <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="nhập giá" value="{{old('price')}}">
              @error('price')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label>Ảnh đại diện:</label>
              <input type="file" multiple="" name="feature_image_path" accept="image/*" class="form-control-file">
            </div>

            <div class="form-group">
              <label>Ảnh chi tiết:</label>
              <input type="file" name="image_path[]" multiple="true" accept="image/*" class="form-control-file" >
            </div>

            <div class="form-group">
              <label >Nhập danh mục :</label>
              <select class="form-control select2_init @error('categoryID') is-invalid @enderror" name="categoryID" >
                <option value="">Chọn danh mục </option>
                {!! $htmlOption !!}
              </select>
              @error('categoryID')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label >Nhập Tag :</label>
              <select name="tags[]" multiple="true" class="form-control tags_select_choose" >
              </select>
            </div>

            <div class="form-group">
              <label >Mô tả</label>
              <textarea class="form-control @error('contentPro') is-invalid @enderror" name="contentPro" id="textEditor" rows="3">value="{{old('contentPro')}}"</textarea>
              @error('contentPro')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>    
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('js')
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('vendors/product/product.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/tinymce/init_tinymce.js') }}"></script>
@endsection

