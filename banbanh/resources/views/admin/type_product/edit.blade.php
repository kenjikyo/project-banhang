@extends('admin.layout.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại sản phẩm
                    <small>{{ $product_type->name }}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if (count($errors)>0)
                    <div class="alert alert-danger">@foreach ($errors->all() as $err)
                        {{ $err }} <br>
                    @endforeach</div>
                @endif
                @if (Session('thongbao'))
                    <div class="alert alert-success">{{ Session('thongbao') }}</div>
                @endif
                <form action="admin/type_product/sua/{{ $product_type->id }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Tên loại sản phẩm</label>
                        <input class="form-control" name="name" placeholder="Nhập tên loại sản phẩm" value="{{ $product_type->name }}" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="description" id=""  rows="3" placeholder="Mô tả loại sản phẩm" >{{ $product_type->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình minh họa</label>
                        <img src="source/image/product/{{$product_type->image}}" alt="" height="100px">
                        <input type="file" id="avatar" name="image" accept="image/png, image/jpeg" />
                    </div>
                   
                    <button type="submit" class="btn btn-default">Product Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection