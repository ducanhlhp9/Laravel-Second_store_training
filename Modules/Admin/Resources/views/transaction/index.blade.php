@extends('admin::layouts.master')

@section('content')
    <title>Quản lý Sản phẩm</title>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('Admin')}}">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active"><a>Danh sách Đơn hàng</a></li>

    </ol>


    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <h3>Danh sách đơn hàng</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên khách hàng</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Số tiền</th>
                                    <th>Ngày mua</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($transactions))
                                    <?php $i = 1?>
                                    @foreach($transactions as $transaction)
                                        <tr>
                                            <td>{{($i)}}</td>
                                            <td>
                                                {{isset($transaction->user->name)? $transaction->user->name:'[N\A]'}}
                                            </td>
                                            <td>{{$transaction->tr_address}}</td>
                                            <td>{{$transaction->tr_phone}}</td>
                                            <td>{{number_format($transaction->tr_total)}} VNĐ</td>
                                            <td>{{$transaction->created_at->format('d-m-y')}}</td>

                                            <td>
                                                @if($transaction->tr_status == 1)
                                                    <a href="" class="btn btn-danger">Đã xử lý</a>
                                                @else
                                                    <a href="{{route('admin.get.active.transaction',$transaction->id)}}" class ="btn btn-info">Chờ xử lý</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-xs btn-danger"
                                                   href="{{route('admin.get.action.transaction',['delete', $transaction->id])}}"><i
                                                        class="fa fa-times"></i>Xóa</a>
                                                <a class="btn btn-info js_order_item"
                                                   href="{{route('admin.get.view.order',$transaction->id)}}"><i
                                                        class="fa fa-eye"></i>View</a>
                                            </td>

                                        </tr>
                                        <?php $i++?>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{--                    //Phân trang--}}
                    <div class="row">
                        <div class="col-sm-12 col-md-3">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                {!! $transactions->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" role="dialog" id="myModalOrder">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 1000px; right: 200px">
                <div class="modal-header" style="text-align: center">
                    <h5 class="modal-title btn btn-info">Chi Tiết Đơn hàng<b class="transaction_id"></b></h5>
                </div>
                <div class="modal-body" id="md_content">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        $(function () {
            $(".js_order_item").click(function (event) {
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                $(".transaction_id").text('').text($this.attr('data-id'));
                $("#myModalOrder").modal('show');
                $.ajax({
                    url: url,
                }).done(function (result) {
                    console.log(result)
                    if (result) {
                        $("#md_content").html('').append(result)
                    }
                });

            });
        })
    </script>
@stop

