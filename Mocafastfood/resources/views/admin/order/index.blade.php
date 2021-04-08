
@extends('layouts.admin')

@section('title')
  <title>Admin Mocafastfood</title>
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.admin.content-header', ['name' => 'Order', 'key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Tên khách hàng</th>
                  <th scope="col">Số điện thoại</th>
                  <th scope="col">Tình trạng</th>
                  <th scope="col">Action</th>
                 
                </tr>
              </thead>
              <tbody>

                @foreach ($orders as $order)
                  <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->receiver }}</td>
                    <td>{{ $order->telnumber }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                      <a href="{{ route('orders.getOrderDetail', ['id'=> $order->id]) }}" class="btn btn-default">Detail</a>
                      <a href="{{ route('orders.delete', ['id'=> $order->id]) }}" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>        
          <div class="col-md-12">
             {{ $orders -> links() }}
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


