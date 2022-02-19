<html>

<head>
    <title>TsunShop - Admin</title>
    <?php require_once "../application/views/_shared/css.php"; ?>
</head>

<body>
    <div id="wrapper">
        <ul class="navbar-nav my-bg-gradient-primary sidebar sidebar-dark accordion">

            <!-- Sidebar - Brand -->
            <div class="d-flex align-items-center justify-content-center">
                <!-- <a class="mt-2 mb-2" href="<?php echo BASEURL ?>">
        <img id="logo" class="w-100 pr-md-5 pl-md-5" src="<?php echo BASEURL; ?>/public/assets/img/favicon.png" alt="banner">
    </a> -->
                <!-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo BASEURL ?>">
                    <div class="sidebar-brand-icon">
                        <img id="logo" width="50px" src="<?php echo BASEURL; ?>/public/assets/img/favicon.png" alt="banner">
                    </div>
                    <div class="sidebar-brand-text mx-3">Home mate</div>
                </a> -->
            </div>

            <!-- Home - Admin -->
            <hr class="sidebar-divider my-0">
            <li id="homePage" class="nav-item active">
                <a class="nav-link  text-center" href="<?php echo BASEURL ?>/admin" aria-expanded="true">
                    <i class="fas fa-home"></i>
                    <span>Trang chủ Admin</span>
                </a>
            </li>

            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Quản lý dữ liệu
            </div>

            <!-- Khach hàng -->
            <li id="userPage" class="nav-item">
                <a class="nav-link" href="<?php echo BASEURL ?>/admin/info_user">
                    <i class="fas fa-users"></i>
                    <span>Khách hàng</span>
                </a>
            </li>

            <!-- Nhà kho -->
            <!-- <li id="warehousePage" class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#kho">
                    <i class="fas fa-warehouse"></i>
                    <span>Nhà kho</span>
                </a>
                <div id="kho" class="collapse">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Chỉnh sửa kho:</h6>
                        <a class="collapse-item" href="<?php echo BASEURL ?>/admin/info_warehouse">Thông tin kho</a>
                        <a class="collapse-item" href="<?php echo BASEURL ?>/admin/insert_warehouse">Thêm kho</a>
                    </div>
                </div>
            </li> -->

            <!-- Sản phẩm -->
            <li id="productPage" class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#sp">
                    <i class="fas fa-boxes"></i>
                    <span>Sản phẩm</span>
                </a>
                <div id="sp" class="collapse">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Chỉnh sửa loại sản phẩm:</h6>
                        <a class="collapse-item" href="<?php echo BASEURL ?>/admin/info_type_product">Thông tin loại sản phẩm</a>
                        <a class="collapse-item" href="<?php echo BASEURL ?>/admin/insert_type_product">Thêm loại sản phẩm</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Chỉnh sửa sản phẩm:</h6>
                        <a class="collapse-item" href="<?php echo BASEURL ?>/admin/info_product">Thông tin sản phẩm</a>
                        <a class="collapse-item" href="<?php echo BASEURL ?>/admin/insert_product">Thêm sản phẩm</a>
                    </div>
                </div>
            </li>
            

            <!-- Đơn đặt hàng -->
            <li id="orderPage" class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#hd">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>Đơn đặt hàng</span>
                </a>
                <div id="hd" class="collapse">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Chỉnh sửa đơn đặt hàng:</h6>
                        <a class="collapse-item" href="<?php echo BASEURL ?>/admin/info_order">Thông tin đơn đặt hàng</a>
                        <a class="collapse-item" href="<?php echo BASEURL ?>/admin/order_cancel">Thông tin đơn bị hủy</a>
                   
                    </div>
                </div>
            </li>
            <li id="shipperPage" class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#shp">
                    <i class="fa fa-truck"></i>
                    <span>Shipper</span>
                </a>
                <div id="shp" class="collapse">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Thông tin shipper:</h6>
                        <a class="collapse-item" href="<?php echo BASEURL ?>/admin/info_shipper">Thông tin shipper</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Thêm shipper</h6>
                        <a class="collapse-item" href="<?php echo BASEURL ?>/admin/insert_shipper">Thêm Shipper</a>
                    </div>
                </div>
            </li>
            <li id="orderPage" class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#tk">
                    <i class="fa fa-align-justify"></i>
                    <span>Thống kê</span>
                </a>
                <div id="tk" class="collapse">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sản phẩm:</h6>
                        <a class="collapse-item" href="<?php echo BASEURL ?>/admin/product_fast">Bán chạy nhất:</a>
                        <a class="collapse-item" href="<?php echo BASEURL ?>/admin/product_low">Bán ít nhất:</a>
                        <a class="collapse-item" href="<?php echo BASEURL ?>/admin/product_nohope">Không bán được:</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Khách hàng:</h6>
                        <a class="collapse-item" href="<?php echo BASEURL ?>/admin/info_TopUser">Top chi tiêu</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASEURL ?>/admin/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Thoát</span></a>
            </li>
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>


        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">