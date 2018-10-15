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
                    <th>Đường dẫn</th>
                    <th>Tên Hình</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($slide as $s)
                <tr class="odd gradeX" align="center">
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->link }}</td>
                    <td><img src="source/image/slide/{{ $s->image }}" alt="" height="100px"></td>
                    <td class="center"><a href="admin/slide/xoa/{{ $s->id }}"><i class="far fa-trash-alt"></i></a></td>
                    <td class="center"><a href="admin/slide/sua/{{ $s->id }}"><i class="fas fa-pencil-alt"></i></a></td>
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