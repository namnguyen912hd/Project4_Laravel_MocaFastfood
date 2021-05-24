<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DotNetTec - Invoice html template bootstrap</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <strong>Mocafastfood</strong>
                

            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h6 class="mb-3">Từ:</h6>
                        <div>
                            <strong>Cừa hàng Mocafastfood</strong>
                        </div>
                        <div>Đồng Mơ - thị trấn Gia Lộc - Gia Lộc - Hải Dương</div>
                        <div>Email: mocafastfoodgl@email.com</div>
                        <div>Phone: 0366882928</div>
                    </div>

                    <div class="col-sm-6">
                        <h6 class="mb-3">Tới:</h6>
                        <div>
                            <strong>{{ $order->receiver }}</strong>
                        </div>
                        <div>Địa chỉ nhận: {{ $order->receivingAddress }}</div>
                        <div>SDT: {{ $order->telnumber }}</div>
                        <div>Thời gian đặt hàng: {{ $order->created_at }}</div>
                        <div>Ghi chú: {{ $order->note }}</div>
                    </div>
                </div>

                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">STT</th>
                                <th>Sản phẩm</th>
                                <th class="right">Đơn giá(vnd)</th>
                                <th class="center">Số lượng</th>
                                <th class="right">Thành tiền(vnd)</th>
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
                                <td >{{ $orderitem->quantity }}</td>
                                <td >{{ number_format($orderitem->unitprice) }}</td>
                                <td >{{ number_format($orderitem->unitprice*$orderitem->quantity) }}</td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5">

                </div>

                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                            <tr>
                                <td class="left">
                                    <strong>Phí ship:</strong>
                                </td>
                                <td class="right">17,000 VND</td>
                            </tr>

                            <tr>
                                <td class="left">
                                    <strong>Tổng tiền</strong>
                                </td>
                                <td class="right">{{ number_format($total) }} VND</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong>VAT (0%)</strong>
                                </td>
                                <td class="right">0 VND</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong>Số tiền phải trả</strong>
                                </td>
                                <td class="right">
                                    <strong>{{ number_format($total) }} VND</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <h3 style="text-align: center;">Cảm ơn bạn đã mua sản phẩm từ cửa hàng chúng tôi !</h3>
            </div>
        </div>
    </div>
</div>
</body>
</html>
