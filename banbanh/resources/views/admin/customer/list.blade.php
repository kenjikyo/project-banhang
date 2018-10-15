@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product
                <small>List</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        @if (count($errors)>0)
        <div class="alert alert-danger">@foreach ($errors->all() as $err)
            {{ $err }} <br>
        @endforeach</div>
        @endif
        @if (Session('thongbao'))
            <div class="alert alert-success">{{ Session('thongbao') }}</div>
        @endif
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Tên khách hàng</th>
                    <th>Giới tính</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Ghi chú</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer as $cm)
                <tr class="odd gradeX" align="center">
                    <td>{{ $cm->id }}</td>
                    <td>{{ $cm->name }}</td>
                    <td>{{ $cm->gender }}</td>
                    <td>{{ $cm->email }}</td>
                    <td>{{ $cm->address }}</td>
                    <td>{{ $cm->phone_number }}</td>
                    <td>{{ $cm->note }}</td>
                    <td class="center"><a href="admin/customer/xoa/{{ $cm->id }}"><i class="far fa-trash-alt"></i></a></td>
                    <td class="center"><a href="admin/customer/sua/{{ $cm->id }}"><i class="fas fa-pencil-alt"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection