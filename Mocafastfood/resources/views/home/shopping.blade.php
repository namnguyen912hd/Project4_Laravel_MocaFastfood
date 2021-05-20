@extends('layouts.home')

@section('title')
<title>get Products by CategoryID</title>
@endsection

@section('css')

<link href="{{ asset('homepage/Assets/css/products.css')}}" rel="stylesheet" />

@endsection

@section('content')

<div class="breadcrumbs">
  <div class="container">
    <ol class="breadcrumb breadcrumb1  " data-wow-delay=".5s">
      <li><a href="{{ route('Mocafastfood.index') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
      <li class="active">Sản phẩm</li>
    </ol>
  </div>
</div>
<div class="products">
  <div class="container">

    @include('home.components.sidebarCate')



</div>
<div class="clearfix"> </div>
</div>


@endsection

@section('js')
<script src="{{ asset('vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/cart/add_to_cart.js')}}"></script>

@endsection
