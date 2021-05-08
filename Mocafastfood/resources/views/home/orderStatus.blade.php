@extends('layouts.home')

@section('title')
<title>Account</title>
@endsection

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@endsection

@section('content')

<div class="container" style=" min-height: 600px; margin-top: 2em; padding-bottom: 2em">
  <div class="row">
    <div class="col-md-12" >
      <div class="col-md-8">
        <div class="container mt-3">
          <h2>Đơn hàng của bạn</h2>
          <br>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#orders">Tất cả đơn hàng</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#confirmmingOrder">Chờ xác nhận</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#deliveringOrder">Đang giao</a>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div id="orders" class="container tab-pane active"><br>
              <h3>Tất cả đơn hàng</h3>
              <table class="table">
                <thead class="thead-light">
                 <tr>
                  <th scope="col" >STT</th>
                  <th scope="col" >Sản phẩm</th>
                  <th scope="col">Đơn giá (vnd)</th>
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
                      <span >{{$order->status}}</span>
                    </td>
                    <td>
                      <a class="btn btn-primary" href="{{ route('Mocafastfood.orderDetailHome', ['id'=> $order->id]) }}" role="button">Chi tiết</a>
                    </td>

                  </tr>

                  @endforeach
                  
                  @endforeach
                  @endif


                </tbody>
              </table>
          </div>
          <div id="confirmmingOrder" class="container tab-pane "><br>
            <h3>Đơn hàng chờ xác nhận</h3>
            <table class="table">
                <thead class="thead-light">
                 <tr>
                  <th scope="col" >STT</th>
                  <th scope="col" >Sản phẩm</th>
                  <th scope="col" style="width: 120px">Đơn giá (vnd)</th>
                  <th scope="col">Chi tiết</th>
                </tr>
                </thead>
                <tbody>
                  @if (isset($confirmingOrders))
                  @php
                    $t1 = 1
                  @endphp
                  @foreach ($confirmingOrders as $order)
                  
                  @foreach ($order->products as $product)
                  <tr>
                    <td>
                      {{$t1++}}
                    </td>
                    <td>
                      <img style="width: 100px;height: 110px" src="{{$product->feature_image_path}}" alt="">
                      <span>{{$product->name}}</span>
                    </td>
                    <td >
                      <span style="float: right;">{{number_format($product->price)}}</span>
                    </td>
                    <td>
                      <a class="btn btn-primary" href="{{ route('Mocafastfood.orderDetailHome', ['id'=> $order->id]) }}" role="button">Chi tiết</a>
                    </td>

                  </tr>

                  @endforeach
                  
                  @endforeach
                  @endif


                </tbody>
              </table>
          </div>
          <div id="deliveringOrder" class="container tab-pane "><br>
            <h3>Đơn hàng đang giao</h3>
            <table class="table">
                <thead class="thead-light">
                 <tr>
                  <th scope="col" >STT</th>
                  <th scope="col" >Sản phẩm</th>
                  <th scope="col" style="width: 120px">Đơn giá (vnd)</th>
                  <th scope="col">Chi tiết</th>
                </tr>
                </thead>
                <tbody>
                  @if (isset($deleveringOrders))
                  @php
                    $t2 = 1
                  @endphp
                  @foreach ($deleveringOrders as $order)
                  
                  @foreach ($order->products as $product)
                  <tr>
                    <td>
                      {{$t2++}}
                    </td>
                    <td>
                      <img style="width: 100px;height: 110px" src="{{$product->feature_image_path}}" alt="">
                      <span>{{$product->name}}</span>
                    </td>
                    <td>
                      <span style="float: right;">{{number_format($product->price)}}</span>
                    </td>
                    <td>
                      <a class="btn btn-primary" href="{{ route('Mocafastfood.orderDetailHome', ['id'=> $order->id]) }}" role="button">Chi tiết</a>
                    </td>

                  </tr>

                  @endforeach
                  
                  @endforeach
                  @endif


                </tbody>
              </table>
          </div>
        </div>
      </div>

    </div> 
    <div class="col-md-4">
      @include('home.components.sidebarAcc')
    </div>

  </div>

</div>
</div>


@endsection

@section('js') 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection