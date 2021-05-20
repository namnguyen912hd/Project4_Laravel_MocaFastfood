
@extends('layouts.admin')

@section('title')
<title>edit Product</title>
@endsection

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partial.admin.content-header', ['name' => 'Sản phẩm/', 'key'=>'sửa'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <form action="{{ route('products.update', ['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label>Tên sản phẩm:</label>
              <input type="text" name="name" class="form-control" placeholder="nhập tên sản phẩm" value="{{$product->name}}">
            </div>

            <div class="form-group">
              <label>Giá sản phẩm:</label>
              <input type="text" name="price" class="form-control" placeholder="nhập giá" value="{{$product->price}}">
            </div>

            <div class="form-group">
              <label>Ảnh đại diện:</label>
              <input type="file" multiple="" name="feature_image_path" accept="image/*" class="form-control-file">
              <div class="col-md-4" style="margin-top: 3px">
                <div class="row">
                  <img style="width: 100%;height: 140px;object-fit: cover;" src="{{$product->feature_image_path}}" alt="">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Ảnh chi tiết:</label>
              <input type="file" name="image_path[]" multiple="true" accept="image/*" class="form-control-file" >
              <div class="col-md-12" style="margin-top: 3px">
                <div class="row">
                  @foreach ($product->productImages as $productImageItem)
                    <div class="col-md-3">
                    <img style="width: 100%;height: 120px;object-fit: cover; " src="{{$productImageItem->image_path}}" alt="">
                  </div>
                  @endforeach
                  
                </div>
              </div>
            </div>

            <div class="form-group">
              <label >Nhập danh mục :</label>
              <select class="form-control select2_init" name="categoryID" >
                <option value="">Chọn danh mục </option>
                {!! $htmlOption !!}
              </select>
            </div>

            <div class="form-group">
              <label >Nhập Tag :</label>
              <select name="tags[]" multiple="true" class="form-control tags_select_choose" >
                @foreach ($product->tags as $tagItem)
                  <option value="{{$tagItem->name}}" selected >{{$tagItem->name}}</option>
                @endforeach
                
              </select>
            </div>

            <div class="form-group">
              <label >Mô tả</label>
              <textarea class="form-control" id="textEditor" name="contentPro" rows="3" >
                {{$product->content}}
              </textarea>
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

