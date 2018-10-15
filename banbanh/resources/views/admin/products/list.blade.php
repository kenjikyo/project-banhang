@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sản Phẩm
                <small>Danh Sách Sản Phẩm</small>
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
                    <th>Tên sản phẩm</th>
                    <th>Mô tả sản phẩm</th>
                    <th>Giá</th>
                    <th>Giá khuyến mãi</th>
                    <th>Hình ảnh</th>
                    <th>Sản phẩm mới</th>
                    <th>Loại bánh</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $pd)
                <tr class="odd gradeX" align="center">
                    <td>{{ $pd->id }}</td>
                    <td>{{ $pd->name }}</td>
                    <td>{{ $pd->description }}</td>
                    <td>{{ $pd->unit_price }}</td>
                    <td>{{ $pd->promotion_price }}</td>
                    <td><img src="source/image/product/{{$pd->image}}" alt="" height="100px"></td>
                    <td>@if ($pd->new == 1)
                        <i class="fas fa-check"></i>
                    @endif</td>
                    <td>{{ !empty($pd->product_type) ? $pd->product_type->name : '' }}</td>
                    <td class="center"><a href="admin/products/xoa/{{ $pd->id }}"><i class="far fa-trash-alt"></i></a></td>
                    <td class="center"><a href="admin/products/sua/{{ $pd->id }}"><i class="fas fa-pencil-alt"></i></a></td>
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

{{--  @push('ajax')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRD-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            }
        });

        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: 'https://datatables.yajrabox.com/eloquent/column-search-data',
                method: 'POST'
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
                {data: 'unit_price', name: 'unit_price'},
                {data: 'promotion_price', name: 'promotion_price'}
                {data: 'image', name:'image'},
                {data: 'new', name: 'new'},
            ],
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty())
                    .on('change', function () {
                        column.search($(this).val()).draw();
                    });
                });
            }
        });
    </script>
@endpush  --}}