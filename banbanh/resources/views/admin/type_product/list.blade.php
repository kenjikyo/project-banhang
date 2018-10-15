@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Loại sản phẩm
                <small>Danh sách</small>
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
                    <th>Tên Nhóm</th>
                    <th>Mô Tả</th>
                    <th>Hình minh họa</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product_type as $pt)
                <tr class="odd gradeX" align="center">
                    <td>{{ $pt->id }}</td>
                    <td>{{ $pt->name }}</td>
                    <td>{{ $pt->description }}</td>
                    <td><img src="source/image/product/{{ $pt->image }}" alt="" height="100px"></td>
                    <td class="center"><a href="admin/type_product/xoa/{{ $pt->id }}"><i class="far fa-trash-alt"></i></a></td>
                    <td class="center"><a href="admin/type_product/sua/{{ $pt->id }}"><i class="fas fa-pencil-alt"></i></a></td>
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