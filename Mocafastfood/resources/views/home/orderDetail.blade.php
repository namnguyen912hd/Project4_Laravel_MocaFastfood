@extends('layouts.home')

@section('title')
<title>Order History</title>
@endsection

@section('css')


@endsection

@section('content')

<div class="container" style=" min-height: 600px; margin-top: 2em; padding-bottom: 2em">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-8">

          <h3>Chi tiết đơn hàng</h3><br>
          <table class="table table-hover">
            <tbody>
              <tr>
                <td scope="row">Mã đơn hàng:</td>
                <td>{{ $order->id }}</td>
              </tr>
              <tr>
                <td scope="row">Người nhận:</td>
                <td >{{ $order->receiver }}</td>
              </tr>
              <tr>
                <td scope="row">Số điện thoại:</td>
                <td >{{ $order->telnumber }}</td>
              </tr>
              <tr>
                <td scope="row">Tình trạng:</td>
                <td >{{ $order->status }}</td>
              </tr>
              <tr>
                <td scope="row">thời gian đặt hàng:</td>
                <td >{{ $order->created_at }}</td>
              </tr>
            </tbody>
          </table>
        

        
          <h4>- Danh sách sản phẩm</h4><br>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Đơn giá</th>

              </tr>
            </thead>
            <tbody>

              @foreach ($orderitems as $orderitem)
              <tr>
                <th scope="row">{{ $orderitem->id }}</th>
                <td>{{ $orderitem->quantity }}</td>
                <td>{{ number_format($orderitem->unitprice) }}</td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
          <br>
          <div>
            <label>Phí ship:</label>
            <label>17,000 VNĐ</label>
          </div>
          <br>
          <div>
            <h3 style="color: #EFA52C;">Tổng tiền:&nbsp&nbsp&nbsp  {{ number_format($total) }} VNĐ</h3>
            
          </div>
         


      </div> 
      <div class="col-md-4">
        @include('home.components.sidebarAcc')
      </div>

    </div>

  </div>
</div>


@endsection

