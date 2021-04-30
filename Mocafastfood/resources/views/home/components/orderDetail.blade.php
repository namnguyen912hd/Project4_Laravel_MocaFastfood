  <div class="overlay" id="overlay"></div>
  <div class="inserted" id="insert" >
    <h3>Thêm món ăn</h3>
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">ID đơn hàng</th>
          <th scope="col">Tên sản phẩm</th>
          <th scope="col">Đơn giá</th>
          <th scope="col">Số lượng</th>
          <th scope="col">Thành tiền</th>
        </tr>
      </thead>
      <tbody>
        @if (isset($order))
          @foreach ($order->products as $product)
          <tr>
            <th scope="row">
              {{-- {{ $order->id }} --}}
            </th>
            <td>{{-- {{ $order->id }} --}}</td>
            {{-- <td>{{number_format(number)}}</td>
            <td>Otto</td>
            <td>{{number_format(number)}}</td>
          </tr> --}}
          @endforeach
        @endif
      </tbody>
    </table>
  </div>