@extends('layouts.home')

@section('title')
<title>Order History</title>
@endsection

@section('css')


@endsection

@section('content')

<div class="container" style=" margin-top: 2em; padding-bottom: 2em">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-8">
        <table class="table">
          <thead class="thead-light">
           <tr>
            <th scope="col">ID đơn hàng</th>
            <th scope="col">Thông tin</th>
            <th scope="col">Danh sách sản phẩm</th>
          </tr>
        </thead>
        <tbody>
          @if (isset($orders))
            @foreach ($orders as $order)
            <tr>
              <th scope="row">{{ $order->id }}</th>
              <td>
                <div>
                  <label>Người nhận: {{ $order->receiver }}</label><br>
                  <label>Thời gian nhận hàng: {{ $order->receiver }}</label><br>
                </div>
              </td>
              <td>
                <div>
                  @foreach ($order->products as $product)
                    <img style="width: 70px;height: 60px" src="{{$product->feature_image_path}}" alt="">
                    <label>{{$product->name}}</label>
                    <label>{{number_format($product->price)}}</label>
                    <a href="">mua tiếp</a>
                  @endforeach
                </div>
              </td>

            </tr>
            @endforeach
          @endif

        </tbody>
      </table>


    </div> 
    <div class="col-md-4">
      @include('home.components.sidebarAcc')
    </div>

  </div>
  
</div>
</div>


@endsection

