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
        
        @if (Session('thongbao'))
        <div class="alert alert-success">{{ Session('thongbao') }}</div>
        @endif
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Mã khách hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Tổng tiền</th>
                    <th>Hình thức thanh toán</th>
                    <th>Ghi chú</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($bill as $key)
                <tr class="odd gradeX" align="center">
                    <td>{{ $key->id }}</td>
                    <td>{{ $key->customer->name }}</td>
                    <td>{{ $key->date_order }}</td>
                    <td>{{ $key->total }} VNĐ</td>
                    <td>{{ $key->payment }}</td>
                    <td><input type="placeholder" class="form-control" value="{{ $key->note }}" ></td>
                    <td class="center"><i class="far fa-trash-alt"></i><a href="admin/bills/xoa"> Delete</a></td>
                    <td class="center"><i class="fas fa-pencil-alt"></i> <a href="admin/bills/sua/{{ $key->id}}">Edit</a></td>
                </tr>
            </tbody>  
            @endforeach
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection