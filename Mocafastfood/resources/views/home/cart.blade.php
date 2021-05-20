@extends('layouts.home')

@section('title')
<title>Cart</title>
@endsection

@section('css')
<link href="{{ asset('homepage/Assets/css/cart.css')}}" rel="stylesheet" />
@endsection

@section('content')

<!-- breadcrumbs -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('Mocafastfood.index') }}">Trang chủ</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
  </ol>
</nav>
<!-- //breadcrumbs -->


<div class="cart_wrapper">
  @include('home.components.cartcomponent')
</div>



@endsection

@section('js') 

<script type="text/javascript">
  function update_cart(event){
    event.preventDefault();
    let updateCart_url = $('.updateCart_url').data('url');
    var updateQuantity = $(this).parents('tr').find('input.quantity').val();
    var idCart = $(this).parents('tr').find('input.productID').val();

    $.ajax({
      type: 'GET',
      url: updateCart_url,
      data: {id:idCart, quantity:updateQuantity},
      success: function(data){
        if (data.code === 200) {
          $('.cart_wrapper').html(data.cart_conponent);
        }
      },
      error:function(){
        alert('Fail !!');
      }
    });
  }

  function delete_cart(event){
    event.preventDefault();
    let deleteCart_url = $('.deleteCart_url').data('url');
    var idCart = $(this).parents('tr').find('input.productID').val();
    $.ajax({
      type: 'GET',
      url: deleteCart_url,
      data: {id:idCart},
      success: function(data){
        if (data.code === 200) {
          $('.cart_wrapper').html(data.cart_conponent);
        }
      },
      error:function(){
        alert('Fail !!');
      }
    });
  }


  $(function(){
    $(document).on('click','.update_cart', update_cart);
    $(document).on('click','.delete_cart', delete_cart);
  });
</script>

@endsection