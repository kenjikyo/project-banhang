@extends('admin.layout.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khách hàng
                    <small>Danh sách</small>
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
                <form action="admin/customer/them" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input class="form-control" name="name" required placeholder="Please Enter Name" />
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label>
                        <select name="gender" id="" class="form-control">
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" required name="email" placeholder="Please Enter Your Email">
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <textarea name="address" rows="3" required class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="phone" class="form-control" required name="phone_number" placeholder="Please Enter Your Phone">
                    </div>
                    <div class="form-group">
                        <label>Ghi chú</label>
                        <textarea name="note" rows="3" class="form-control"></textarea>
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