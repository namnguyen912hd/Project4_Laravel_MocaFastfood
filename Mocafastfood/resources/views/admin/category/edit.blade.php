
@extends('layouts.admin')

@section('title')
  <title>Admin Mocafastfood</title>
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.admin.content-header', ['name' => 'category', 'key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <form action="{{ route('categories.update', ['id'=> $category->id]) }}" method="post">
              @csrf
              <div class="form-group">
                <label>Tên danh mục:</label>
                <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="nhập tên danh mục"
                >
                
              </div>
              <div class="form-group">
                <label >Nhập danh mục cha:</label>
                <select class="form-control" name="parentID" >
                  <option value="0">Chọn danh mục cha</option>
                  {!! $htmlOption !!}
                 
                </select>
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


