

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="admin/trangchu"><i class="fa fa-tachometer-alt"></i> Trang Chủ</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-money-bill"></i> Sản Phẩm <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/products/danhsach">Danh Sách Sản Phẩm</a>
                                </li>
                                <li>
                                    <a href="admin/products/them">Thêm Sản Phẩm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-money-bill"></i>Loại Sản Phẩm <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/type_product/danhsach">Danh Sách Loại Sản Phẩm</a>
                                </li>
                                <li>
                                    <a href="admin/type_product/them">Thêm Loại Sản Phẩm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-money-bill"></i> Hóa Đơn <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/bills/danhsach">Danh Sách Hóa Đơn</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-money-bill"></i> Khách hàng <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/customer/danhsach">Danh Sách Khách Hàng</a>
                                </li>
                                <li>
                                    <a href="admin/customer/them">Thêm Khách Hàng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @if(\Auth::user()->is_admin == 1)
                        <li>
                            <a href="#"><i class="fa fa-money-bill"></i> Người Dùng <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/user/danhsach">Danh Sách Người Dùng</a>
                                </li>
                                <li>
                                    <a href="admin/user/them">Thêm Người Dùng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endif
                        <li>
                            <a href="#"><i class="fa fa-money-bill"></i> Slide <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/slide/danhsach">Danh Sách Slide</a>
                                </li>
                                <li>
                                    <a href="admin/slide/them">Thêm Slide</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->