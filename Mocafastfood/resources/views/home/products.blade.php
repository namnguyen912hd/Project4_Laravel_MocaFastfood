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
      <li><a href="{{ route('Mocafastfood.index') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
      <li class="active">Products</li>
    </ol>
  </div>
</div>
<div class="products">
  <div class="container">

    @include('home.components.sidebarCate')

    <div class="col-md-8 products-right">
      <div class="products-right-grids-bottom">
        <div class="row">
          <div class="col-md-12">
            <h4 style="color:#d8703f">Các sản phẩm của danh mục: {{$cateName}}</h4>
          </div>
        </div>
        @foreach ($products as $product)
        <div class="col-md-4 products-right-grids-bottom-grid">
          <div class="new-collections-grid1 products-right-grid1 animated wow " data-wow-delay=".5s">
            <div class="new-collections-grid1-image">
              <a href="single.html" class="product-image"><img src="{{$product->feature_image_path}}" alt=" " class="img-responsive" style="height: 260px"></a>
              <div class="new-collections-grid1-image-pos products-right-grids-pos">
                <a href="{{ route('Mocafastfood.productdetail', ['id'=> $product->id]) }}">Quick View</a>
              </div>

            </div>
            <h4><a href="{{ route('Mocafastfood.productdetail', ['id'=> $product->id]) }}">{{$product->name}}</a></h4>
            <p>--------</p>
            <div class="simpleCart_shelfItem products-right-grid1-add-cart">
              <p>
                <span class="item_price">{{ number_format($product->price) }} đ</span>

                <?php
                $user = Auth::user();
                if($user != NULL){
                 ?>
                 <a class="item_add add_to_cart"
                 href="#"
                 data-url = "{{ route('Mocafastfood.addToCart', ['id'=> $product->id] ) }}"
                 >add to cart </a>
                 <?php
               }else{
                 ?>
                 <a class="item_add"
                 {{-- href="{{ route('Mocafastfood.productdetail', ['id'=> $product->id]) }}" --}}
                 href="/" 
                 >
               add to cart </a>
               <?php 
             }
             ?>


           </p>
         </div>
       </div>
     </div>
     @endforeach

   </div>
   <div class="clearfix"> </div>
 </div>

</div>
<div class="clearfix"> </div>
</div>


@endsection

@section('js')
<script src="{{ asset('vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/cart/add_to_cart.js')}}"></script>

@endsection
