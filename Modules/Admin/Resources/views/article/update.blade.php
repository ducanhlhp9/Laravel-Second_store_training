@extends('admin::layouts.master')

@section('content')
    <title>Quản lý Bài viết</title>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('Admin')}}">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active"><a href="{{route('admin.get.list.article')}}">Danh sách Bài viết</a></li>
        <li class="breadcrumb-item active">Cập nhật</li>

    </ol>


    <div class="card mb-3">
        <div class="card-header">
            <h3>Cập nhật Bài viết</h3></div>
        @include("admin::article.form")
    </div>
@stop

