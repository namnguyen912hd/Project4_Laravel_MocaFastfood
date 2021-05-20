
@extends('layouts.admin')

@section('title')
  <title>Add user</title>
@endsection

@section('css')
  <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.admin.content-header', ['name' => 'Người dùng/', 'key'=>'thêm'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <form action="{{ route('users.store') }}" method="post">
              @csrf
              <div class="form-group">
                <label>Tên user:</label>
                <input type="text" name="name" class="form-control" placeholder="nhập tên user" value="{{old('name')}}">
              </div>
              <div class="form-group">
                <label>Mật khẩu:</label>
                <input type="password" name="password" class="form-control" placeholder="nhập mật khẩu" value="{{old('password')}}">
              </div>
              <div class="form-group">
                <label>Số điện thoại:</label>
                <input type="text" name="telnumber" class="form-control" placeholder="nhập sdt" value="{{old('telnumber')}}">
              </div>
              <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" class="form-control" placeholder="nhập email" value="{{old('email')}}">
              </div>
              <div class="form-group">
                <label>Chọn vai trò:</label>
                <select name="role_id[]" class="form-control select2_init" multiple="true">
                  <option value=""></option>
                  @foreach ($roles as $role)
                     <option value="{{$role->id}}">{{$role->name}}</option>
                  @endforeach
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

@section('js')
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script type="text/javascript">
  $('.select2_init').select2({
    'placeholder':'chọn vai trò'
  });
</script>
@endsection
