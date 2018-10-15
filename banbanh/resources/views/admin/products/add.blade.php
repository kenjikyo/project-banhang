@extends('admin.layout.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm Sản Phẩm</h1>
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
                <form action="admin/products/them" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="txtName" placeholder="Nhập tên sản phẩn" />
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" name="txtUnit" placeholder="Nhập giá sản phẩm" />
                    </div>
                    <div class="form-group">
                            <label>Giá khuyến mãi</label>
                            <input class="form-control" name="txtPromotion" placeholder="Nhập giá khuyến mãi" value="0" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả sản phẩm</label>
                        <textarea class="form-control" rows="3" name="txtDescription"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="fImages">
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
                    <input type="hidden" value="1" name="txtNew" />

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