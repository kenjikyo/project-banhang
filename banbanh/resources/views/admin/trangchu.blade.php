@extends('admin.layout.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                    <h1 class="page-header">Trang Chủ</h1>
            <div class="col-md-4 col-sm-6"> 
                <div class="serviceBox"> 
                    <div class="service-content"> 
                        <h4> <a href="admin/products/danhsach" title="Products"></i> Sản Phẩm</a></h4> 
                        <p class="description">Tổng số sản phẩm: {{ $product }} </p> 
                        <a href="admin/products/them"><i class="fa fa-money-bill"></i>Thêm Sản Phẩm </span></a>
                        </div> 
                    </div> 
                </div> 
                <div class="col-md-4 col-sm-6"> 
                    <div class="serviceBox"> 
                        <div class="service-content"> 
                            <h4> <a href="admin/type_product/danhsach" title="Type-product"></i> Loại Sản Phẩm</a></h4> 
                            <p class="description">Tổng số loại sản phẩm: {{ $product_type }} </p> 
                            <a href="admin/type_product/them"><i class="fa fa-money-bill"></i>Thêm Loại Sản Phẩm </span></a>
                        </div> 
                    </div> 
                </div> 
                <div class="col-md-4 col-sm-6"> 
                    <div class="serviceBox"> 
                        <div class="service-content"> 
                            <h4> <a href="admin/bills/danhsach" title="Bills"></i> Hóa Đơn</a></h4> 
                            <p class="description">Tổng số hóa đơn: {{ $bills }} </p> 
                                <a href="admin/bills/them"><i class="fa fa-money-bill"></i>Thêm Hóa Đơn </span></a>
                        </div> 
                    </div> 
                </div> 
                <div class="col-md-4 col-sm-6"> 
                    <div class="serviceBox"> 
                        <div class="service-content"> 
                            <h4> <a href="admin/customer/danhsach" title="Products"></i> Khách Hàng</a></h4> 
                            <p class="description">Tổng số khách hàng: {{ $customer }} </p> 
                            <a href="admin/customer/them"><i class="fa fa-money-bill"></i>Thêm Khách Hàng </span></a>
                        </div> 
                    </div> 
                </div> 
                <div class="col-md-4 col-sm-6"> 
                    <div class="serviceBox"> 
                        <div class="service-content"> 
                            <h4> <a href="admin/user/danhsach" title="Products"></i> Người Dùng</a></h4> 
                            <p class="description">Tổng số người dùng: {{ $user }} </p> 
                            <a href="admin/user/them"><i class="fa fa-money-bill"></i>Thêm Người Dùng </span></a>
                        </div> 
                    </div> 
                </div> 
                <div class="col-md-4 col-sm-6"> 
                    <div class="serviceBox"> 
                        <div class="service-content"> 
                            <h4> <a href="admin/slide/danhsach" title="Products"></i> Slide</a></h4> 
                            <p class="description">Tổng số slide: {{ $slide }} </p> 
                            <a href="admin/user/them"><i class="fa fa-money-bill"></i>Thêm Slide </span></a>
                        </div> 
                    </div> 
                </div> 
        </div> 
    </div> 
</div>
</div>
@endsection