@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User
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
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $u)
                <tr class="odd gradeX" align="center">
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->full_name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->phone }}</td>
                    <td>{{ $u->address }}</td>
                    <td class="center"><a href="admin/user/xoa/{{ $u->id }}"><i class="far fa-trash-alt"></i></a></td>
                    <td class="center"><a href="admin/user/sua/{{ $u->id }}"><i class="fas fa-pencil-alt"></i></a></td>
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