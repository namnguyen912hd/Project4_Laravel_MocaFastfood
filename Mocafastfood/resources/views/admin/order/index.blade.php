
@extends('layouts.admin')

@section('title')
  <title>Admin Mocafastfood</title>
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partial.admin.content-header', ['name' => 'Đơn hàng/', 'key'=>'danh sách'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Tên khách hàng</th>
                  <th scope="col">Số điện thoại</th>
                  <th scope="col">Tình trạng</th>
                  <th scope="col">Thao tác</th>
                 
                </tr>
              </thead>
              <tbody>
                @php
                  $stt = 1
                @endphp
                @foreach ($orders as $order)
                  <tr>
                    <th scope="row">{{$stt++}}</th>
                    <td>{{ $order->receiver }}</td>
                    <td>{{ $order->telnumber }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                      <a href="{{ route('orders.getOrderDetail', ['id'=> $order->id]) }}" class="btn btn-default">Chi tiết</a>
                      <a href="" data-url="{{ route('orders.delete', ['id'=> $order->id]) }}" class="btn btn-danger action_delete">Xóa</a>
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

@section('js')
  <script src="{{ asset('vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
  <script src="{{ asset('vendors/adminDelete.js') }}"></script>
  <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
@endsection
