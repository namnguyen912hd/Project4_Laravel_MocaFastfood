@extends('layouts.home')

@section('title')
<title>Sign up</title>
@endsection

@section('css')
<link href="{{ asset('homepage/LogIn_SignIn/css/login_signup.css')}}" rel="stylesheet" />
@endsection

@section('content')

<div class="main">

 <!-- Sign up form -->
 <section class="signup">
  <div class="container">
    <div class="signup-content" >
      <div class="signup-form">
        <h2 class="form-title">Sign up</h2>
        <form method="post" class="register-form" id="register-form">
          @csrf
          <div class="form-group">
            <label for="your_name"><i class="fa fa-user-circle-o" aria-hidden="true"></i></label>
            <input type="text" name="name" id="your_name" placeholder="tên user"/>
          </div>
          <div class="form-group">
            <label for="your_pass"><i class="fa fa-envelope-open" aria-hidden="true"></i></label>
            <input type="text" name="email" id="your_pass" placeholder="email"/>
          </div>
          <div class="form-group">
            <label for="your_name"><i class="fa fa-phone-square" aria-hidden="true"></i></label>
            <input type="text" name="telnumber" id="your_name" placeholder="số điện thoại"/>
          </div>
          <div class="form-group">
            <label for="your_pass"><i class="fa fa-server" aria-hidden="true"></i></label>
            <input type="password" name="password" id="your_pass" placeholder="password"/>
          </div>
          <div class="form-group">
            <label for="your_name"><i class="fa fa-server" aria-hidden="true"></i></label>
            <input type="password" name="cfpassword" id="your_name" placeholder="confirm password"/>
          </div>
          <div class="form-group form-button">
            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
          </div>
        </form>
      </div>
      <div class="signup-image">
        <figure><img src="{{ asset('homepage/LogIn_SignIn/images/signup-image.jpg') }}" alt="sing up image"></figure>
        <a href="#" class="signup-image-link">I am already member</a>
      </div>
    </div>
  </div>
</section>


</div>

@endsection

@section('js') 

@endsection