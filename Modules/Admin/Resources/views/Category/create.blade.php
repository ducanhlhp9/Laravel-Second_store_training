@extends('admin::layouts.master')

@section('content')
    <title>Quản lý danh mục</title>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('Admin')}}">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{route('admin.get.list.category')}}">Danh sách danh mục</a></li>
        <li class="breadcrumb-item active">Thêm mới</li>

    </ol>


    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <h3 class="fas fa-table">Thêm mới sản phẩm</h3></div>
        @include("admin::Category.form")
    </div>
@stop

