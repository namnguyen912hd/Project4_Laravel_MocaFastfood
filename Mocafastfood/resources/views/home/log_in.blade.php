@extends('layouts.home')

@section('title')
<title>Log In</title>
@endsection

@section('css')
<link href="{{ asset('homepage/LogIn_SignIn/css/login_signup.css')}}" rel="stylesheet" />
@endsection

@section('content')

<div class="main">
 <!-- Sing in  Form -->
 <section class="sign-in">
  <div class="container_Login">
    <div class="signin-content">
      <div class="signin-image">
        <figure><img src="{{ asset('homepage/LogIn_SignIn/images/signin-image.jpg') }}" alt="sing up image"></figure>
        <a href="#" class="signup-image-link">Create an account</a>
      </div>

      <div class="signin-form">
        <h2 class="form-title">Log In</h2>
        <form  class="register-form" id="login-form" method="post">
          @csrf        
          <div class="form-group">
            <label for="your_name"><i class="fa fa-user-circle-o" aria-hidden="true"></i></label>
            <input type="text" name="your_name" id="your_name" placeholder="Your Name"/>
          </div>
          <div class="form-group">
            <label for="your_pass"><i class="fa fa-server" aria-hidden="true"></i></label>
            <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
          </div>
          
          <div class="form-group">
            <input style="float: left;width: 10%;" type="checkbox" name="" />&nbsp;<span>Rememeber me</span>
          </div>

          <div class="form-group form-button">
            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
          </div>
        </form>
        <div class="social-login">
          <span class="social-label">Or login with:&nbsp;
            <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>&nbsp;
           <i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i>&nbsp;
           <i class="fa fa-google fa-2x" aria-hidden="true"></i>
          </span>
    
        </div>
      </div>
    </div>
  </div>
</section>
</div>

@endsection

@section('js') 

@endsection