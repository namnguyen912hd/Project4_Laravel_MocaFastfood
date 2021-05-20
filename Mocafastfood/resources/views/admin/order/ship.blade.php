<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="container">
    <h2>Shipper</h2>
    <p>The .table-hover class enables a hover state on table rows:</p>            
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>Người nhận</th>
          <th>SDT</th>
          <th>Tình trạng</th>
          <th>Thao tác</th>
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
            {{-- <a href="{{ route('orders.getOrderDetail', ['id'=> $order->id]) }}" class="btn btn-default">Detail</a> --}}
            <a href="{{ route('orders.deliveredOrder', ['id'=> $order->id]) }}" class="btn btn-success">Done</a>
            <a href="{{ route('orders.boomOrder', ['id'=> $order->id]) }}" class="btn btn-danger">Boom</a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>

</body>
</html>