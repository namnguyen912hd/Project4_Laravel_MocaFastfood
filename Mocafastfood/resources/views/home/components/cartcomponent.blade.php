<?php
 
if( $carts !=null){ 
 ?>
 <!--checkout-->
 <section class="checkout_wthree py-sm-5 py-3" style="padding-top: 3em">
  <div class="container">
    <div class="check_w3ls">
      <div class="d-sm-flex justify-content-between mb-4"  style="padding-bottom: 2em">
        <h4 class="mt-sm-0 mt-3">Giỏ hàng bạn có:
          @php
           echo count($carts); 
          @endphp
          <span> sản phẩm</span>
        </h4>
      </div>
      <div class="checkout-right " >
        <table class="timetable_sub updateCart_url" data-url='{{ route('Mocafastfood.updateCart') }}'>
          <thead>
            <tr>
              <th>STT</th>
              <th>Sản phẩm</th>
              <th>Đơn giá (vnd)</th>
              <th>Số lượng</th>
              <th>Thành tiền (vnd)</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody class="deleteCart_url" data-url='{{ route('Mocafastfood.deleteCart') }}'>
            @php
              $stt = 1
            @endphp
            @foreach ($carts as $cart)
            <tr class="rem1">
              <td class="invert">{{$stt++}}</td>
              <td class="invert-image" style="width: 35%">
                
                  <a href="{{ route('Mocafastfood.productdetail', ['id'=> $cart['productID'] ]) }}" >
                    <img style="    float: left;padding: 7px; margin-left: 32px; width: " src="{{$cart['image_path']}}"  />
                  </a>
                  <a style="float: left; padding-top: 48px; font-size: 19px" href="{{ route('Mocafastfood.productdetail', ['id'=> $cart['productID'] ]) }}">{{ $cart['name'] }}</a>
                  
                
                
              </td>
              <td class="invert">{{ $cart['price'] }}</td>
              <td class="invert">
                <div class="quantity">
                  <input type="number" class="quantity" name="" value="{{ $cart['quantity'] }}" min="1"  style="width: 45px">
                  <input type="text" class="productID" value="{{ $cart['productID'] }}" style="display: none;"> 
                </div>
              </td>
              <td class="invert">
                {{number_format($cart['price']*$cart['quantity'])}}
              </td>
              <td class="invert">
                <div class="rem">
                  <button style="width: 51px; height: 34px" type="button" class="btn btn-secondary btn-warning update_cart"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                 <a class="btn btn-danger delete_cart" href="#">
                  <i class="fa fa-times" aria-hidden="true"></i>
                </a> 
              </div>

            </td>
          </tr>
          @endforeach



        </tbody>
      </table>
    </div>
    <div class="row checkout-left mt-5" style="padding-top: 5em; padding-bottom: 4em">

      
      <div class="col-md-4 checkout-left-basket">
        <h4>Tiếp tục danh sách</h4>
        <ul>
          @foreach ($carts as $cart)
          <li>{{$cart['name']}} <i></i> <span>{{number_format($cart['price']*$cart['quantity'])}}&nbsp;đ</span></li>
          @endforeach
          <li>Phí ship <i></i> <span>17,000&nbsp;đ</span> </li>
          <li  style="color: #D8703F; font-size: 20px">Tổng tiền: <i></i> <span>{{number_format($total)}}&nbsp;đ</span></li>
        </ul>
      </div>


      <div class="col-md-8 address_form">
        <h4>Thông tin vận chuyện:</h4>
        <form action="{{ route('Mocafastfood.addOrder') }}" method="post" class="creditly-card-form shopf-sear-headinfo_form">
          @csrf       
          <div class="creditly-wrapper wrapper">
            <div class="information-wrapper">
              <div class="first-row form-group">
                <div class="controls">
                  <label class="control-label">Người nhận: </label>
                  <input class="billing-address-name form-control" type="text" name="receiver" placeholder="nhập tên">
                </div>
                <div class="card_number_grids">
                  <div class="card_number_grid_left">
                    <div class="controls">
                      <label class="control-label">Số điện thoại:</label>
                      <input class="form-control" type="text" name="telnumber" placeholder="nhập số điện thoại">
                    </div>
                  </div>
                  <div class="card_number_grid_right">
                    <div class="controls">
                      <label class="control-label">Địa chỉ nhận (Chỉ ship khu vực Gia Lộc): </label>
                      <input class="form-control" type="text" name="receivingAddress" placeholder="huyện Gia Lộc, tỉnh Hải Dương" style="width: 60%">

                    </div>
                  </div>
                  <div class="clear"> </div>
                </div>
                <div class="controls">
                  <label class="control-label">Thời gian giao hàng dự kiến: </label>&nbsp;&nbsp;
                  <?php
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $day=strtotime("+30 Minutes");
                    echo date("H", $day) . "  giờ  "  . date("i", $day) . "  phút  ";
                    echo " - ngày   " . date("d / m / Y", $day);
                    
                    
                  ?>
                </div><br>
                <div class="controls">
                  <label class="control-label">Ghi chú: </label><br>
                  <textarea id="w3review" name="note" rows="4" cols="50">

                  </textarea>
                </div>
              </div>
              <button class="submit check_out">Đặt hàng</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</section>
<!--//checkout-->

<?php
}else{
 ?>


 <div class="row">
  <div class="col-md-12">
    <h2 style="text-align: center; padding: 3em;">
      Bạn chưa có sản phẩn nào trong giỏ hàng !! tiếp tục 
      <a href="{{ route('Mocafastfood.shopping') }}" style="color: #EFA52C">mua sắm</a>
    </h2>
  </div>
</div>


<?php 
}
?>

