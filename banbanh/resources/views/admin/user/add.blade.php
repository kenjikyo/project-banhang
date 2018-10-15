@extends('admin.layout.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Add</small>
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
                <form action="admin/user/them" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>UserName</label>
                        <input class="form-control" name="name" required placeholder="Please Enter Name" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" required name="email" placeholder="Please Enter Your Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" required name="password" placeholder="Please Enter Password" />
                    </div>
                    <div class="form-group">
                        <label>Password Confirm</label>
                        <input type="password" class="form-control" required name="password_confirmation" placeholder="Please ReType Password">
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <textarea name="address" rows="3" required class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="phone" class="form-control" required name="phone" placeholder="Please Enter Your Phone">
                    </div>
                    <div class="form-group">
                        <select name="is_admin" id="" class="form-control">
                            <option value="1">Admin</option>
                            <option value="0">User</option>
                        </select>
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
