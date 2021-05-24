@extends('layouts.admin')

@section('title')
<title>Admin Mocafastfood</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partial.admin.content-header', ['name' => 'Đơn hàng/', 'key'=>'Chi tiết'])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
          <div class="col-md-4">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th scope="row">Mã đơn hàng</th>
                  <th >{{ $order->id }}</th>
                </tr>
                <tr>
                  <th scope="row">Người nhận</th>
                  <th >{{ $order->receiver }}</th>
                </tr>
                <tr>
                  <th scope="row">Số điện thoại</th>
                  <th >{{ $order->telnumber }}</th>
                </tr>
                <tr>
                  <th scope="row">Tình trạng</th>
                  <th >{{ $order->status }}</th>
                </tr>
                <tr>
                  <th scope="row">Thời gian đặt hàng</th>
                  <th >{{ $order->created_at }}</th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        

        <div class="col-md-8">
          <h4>Danh sách sản phẩm</h4>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col" style="width: 250px; text-align: center;">Tên sản phẩm</th>
                <th scope="col"  style="width: 120px; text-align: center;" >Số lượng</th>
                <th scope="col" style="width: 165px; text-align: center;">Đơn giá (vnd)</th>
                <th scope="col" style="width: 330px; text-align: center;">Thành tiền (vnd)</th>
              </tr>
            </thead>
            <tbody>
              @php
                $stt =1
              @endphp
              @foreach ($orderitems as $orderitem)
              <tr>
                <td>{{$stt++}}</td>
                <td scope="row">{{ $orderitem->product->name }}</td>
                <td style="text-align: center;">{{ $orderitem->quantity }}</td>
                <td style="text-align: right; width: 119px">{{ number_format($orderitem->unitprice) }}</td>
                <td style="text-align: right; width: 145px">{{ number_format($orderitem->unitprice*$orderitem->quantity) }}</td>
              </tr>
              @endforeach
              <tr>
                <td scope="row"> Phí ship</td>
                <td>17,000</td>
              </tr>
              <tr>
                <td scope="row"> Tổng tiền</td>
                <td>{{ number_format($total) }}</td>
              </tr>
            </tbody>
          </table>
        </div> 
        <div class="col-md-12">
          <a class="btn btn-success" href="{{ route('orders.confirmOrder', ['id'=> $order->id]) }}" role="button">Xác nhận</a>
          <a class="btn btn-danger" href="{{ route('orders.delete', ['id'=> $order->id]) }}" role="button">Xóa</a>
          <a class="btn btn-primary" href="{{ route('orders.generateInvoice', ['id'=> $order->id]) }}" role="button">In hóa đơn</a>
        </div>       

        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection


