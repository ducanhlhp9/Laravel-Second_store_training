@extends('admin::layouts.master')

@section('content')
    <title>Quản lý danh mục</title>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('Admin')}}">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{route('admin.get.list.Product')}}">Danh sách Sản phẩm</a></li>
        <li class="breadcrumb-item active">Cập nhật</li>

    </ol>


    <div class="card mb-3">
        <div class="card-header">
            <h3>Cập nhật Danh mục</h3></div>
        @include("admin::Product.form")
    </div>
@stop

