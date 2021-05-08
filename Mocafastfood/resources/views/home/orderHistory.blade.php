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
            <th scope="col" >STT</th>
            <th scope="col">Sản phẩm</th>
            <th scope="col" style="width: 125px">Đơn giá (vnd)</th>
            <th scope="col">Tình trạng</th>
            <th scope="col">Chi tiết</th>
          </tr>
        </thead>
        <tbody>
          @if (isset($orders))
          @php
            $stt = 1
          @endphp
          @foreach ($orders as $order)

          @foreach ($order->products as $product)
          <tr>
            <td>
              {{$stt++}}
            </td>
            <td>
              <img style="width: 100px;height: 110px" src="{{$product->feature_image_path}}" alt="">
              <span>{{$product->name}}</span>
            </td>
            <td>
              <span style="float: right;">{{number_format($product->price)}}</span>
            </td>
            <td>
              <span>{{$order->status}}</span>
            </td>
            <td>
              <a class="btn btn-primary" href="{{ route('Mocafastfood.orderDetailHome', ['id'=> $order->id]) }}" role="button">chi tiết</a>
            </td>

          </tr>

          @endforeach

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

