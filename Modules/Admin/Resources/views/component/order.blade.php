@if($orders)
    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Thao tác</th>

        </tr>
        </thead>
        <tbody>
        <?php $i = 1?>
        @foreach($orders as $key => $order)
            <tr>
                <td>{{($i)}}</td>
                <td>
                    <p>{{isset($order->product->pro_name)? $order->product->pro_name : ''}}</p>
                </td>
                <td >
                    <img style ="width:40px; height: 40px" src="{{isset($order->product->pro_avatar)? pare_url_file($order->product->pro_avatar):''}}">
                </td>
                <td>
                    {{isset($order->product->pro_price)? number_format($order->product->pro_price) : ''}}
                </td>
                <td>{{$order->or_qty}}</td>
                <td>{{isset($order->product->pro_sale)? number_format($order->product->pro_price -$order->product->pro_price*$order->product->pro_sale/100) : ''}}</td>
                <td><a href=" " class ="btn btn-danger">Xóa</a></td>
            </tr>
            <?php $i++?>
        @endforeach
        </tbody>
    </table>
@endif
