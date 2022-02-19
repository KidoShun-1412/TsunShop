<?php include "../application/views/admin/_assets/header.php" ?>
<!-- Topbar -->
<div class="container-fluid bg-white mb-4 text-center shadow">
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4">
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <!-- Topbar info -->
        <div class="sidebar-heading">
            Thông tin các sản phẩm bán chạy nhất tháng này
        </div>
    </nav>
</div>
<!-- Begin Page Content -->
<div class="container-fluid mt-4">

    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="row">
                <h6 class="col-md-6 d-flex align-items-center font-weight-bold text-primary">
                    Sản phẩm bán ít nhất</h6>
                <!-- Table Search -->
                <div class="col-md-6 d-flex justify-content-end form-inline find-input">
                    <input type="text" class="form-control find" placeholder="Tìm kiếm theo cột..." tb_id="product_table">

                    <select class="form-control ml-2">
                        <option selected value="1">Tên sản phẩm</option>
                        <option value="2">Tên loại sản phẩm</option>               
                        <option value="3">Giá bán</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">

            <table id="product_table" class="display w-100">
                <thead>
                    <tr>
                        <!-- id, name, brand, color, price, img, short_dis, dis, type_name, quantity, date_created, date_modify -->
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Loại sản phẩm</th>
                        <!-- <th>Thương hiệu</th>
                        <th>Màu</th> -->
                        <th>Giá bán</th>
                        <th>Số lượng bán ra</th>                                        
                        <th>Mô tả ngắn</th>              
                        <th>Hình</th>
                        <th>Ngày tạo</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->


<?php include "../application/views/admin/_assets/footer.php" ?>
<script>
    $(document).ready(function() {
        loadPage("#productPage")
        initTable("#product_table", "/admin/getProductFast")
    })
</script>