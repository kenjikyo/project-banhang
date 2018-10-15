@extends('admin.layout.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Edit</small>
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
                    <form action="admin/products/sua/{{ $product->id }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{{ $product->name }}"/>
                        </div>
                        <div class="form-group">
                                <label>Mô tả sản phẩm</label>
                                <textarea class="form-control" rows="3" name="txtDescription" {{ $product->description }}></textarea>
                            </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input class="form-control" name="txtUnit" placeholder="Please Enter Password" value="{{ $product->unit_price }}"/>
                        </div>
                        <div class="form-group">
                                <label>Giá khuyến mãi</label>
                                <input class="form-control" name="txtPromotion" placeholder="Please Enter Password" value="{{ $product->promotion_price }}" />
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="fImages" value="{{ $product->image }}">
                        </div>
                        <div class="form-group">
                                <label>Loại bánh</label>
                                <select name="type_product" id="">
                                    <option value="1">Bánh mặn</option>
                                    <option value="2">Bánh ngọt</option>
                                    <option value="3">Bánh trái cây</option>
                                    <option value="4">Bánh kem</option>
                                    <option value="5">Bánh crepe</option>
                                    <option value="6">Bánh Pizza</option>
                                    <option value="7">Bánh su kem</option>
                                </select>
                            </div>
                        <select class="form-group" name="txtNew" id="">
                            <option value="1">Sản phẩm mới</option>
                            <option value="0">Sản phẩm cũ</option>
                        </select>
                        <br>
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