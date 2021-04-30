@extends('layouts.home')

@section('title')
<title>Account</title>
@endsection

@section('css')

@endsection

@section('content')

<div class="container" style=" margin-top: 2em; padding-bottom: 2em">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-8">
        <h3>Thông tin tài khoản của bạn:</h3>
        <form action="{{ route('Mocafastfood.updateAccount', ['id'=> $user->id]) }}" method="post">
          @csrf
          <div class="form-group">
            <label>Tên user:</label>
            <input type="text" name="name" class="form-control" placeholder="nhập tên user" value="{{$user->name}}">
          </div>
          <div class="form-group">
            <label>Mật khẩu:</label>
            <input type="password" name="password" class="form-control" placeholder="nhập mật khẩu" value="">
          </div>
          <div class="form-group">
            <label>Số điện thoại:</label>
            <input type="text" name="telnumber" class="form-control" placeholder="nhập sdt" value="{{$user->telnumber}}">
          </div>
          <div class="form-group">
            <label>Email:</label>
            <input type="text" name="email" class="form-control" placeholder="nhập email" value="{{$user->email}}">
          </div>

          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div> 
      <div class="col-md-4">
        @include('home.components.sidebarAcc')
      </div>

    </div>
  </div>
</div>


@endsection

@section('js') 

@endsection