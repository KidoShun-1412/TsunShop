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
            Thông tin các sản phẩm
        </div>
    </nav>
</div>
<!-- Begin Page Content -->
<div class="container-fluid mt-4">

    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="row">
                <!-- <h6 class="col-md-6 d-flex align-items-center font-weight-bold text-primary">
                    Tất cả sản phẩm</h6>
   
                <div class="col-md-6 d-flex justify-content-end form-inline find-input">
                    <input type="text" class="form-control find" placeholder="Tìm kiếm theo cột..." tb_id="product_table">

                    <select class="form-control ml-2">
                        <option selected value="1">Tên loại sản phẩm</option>
                        <option value="2">Số lượng sản phẩm</option>
                        <option value="3">Danh mục</option>
                    </select>
                </div> -->
            </div>
        </div>
        <div class="card-body">

            <table id="product_table" class="display w-100">
                <thead>
                    <tr>
                        <!-- id, name, brand, color, price, img, short_dis, dis, type_name, quantity, date_created, date_modify -->
                        <th>STT</th>
                        <th>Tên Shipper</th>
                        <th>Số điện thoại</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                        <!-- <th>Thương hiệu</th>
                        <th>Màu</th> -->
                        <!-- <th>Giá bán</th>
                        <th>Số lượng</th>
                        <th>Trạng thái</th>
                        <th>Sửa</th>
                        <th>Mô tả ngắn</th>
                        <th>Mô tả chi tiết</th>
                        <th>Hình</th> -->
                        <!-- <th>Ngày tạo</th> -->
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modify-shipper" id_s="" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa thông tin Shipper</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Name">
                                <i class="fas fa-file-signature"></i>
                                <strong>Tên Shipper</strong>
                            </label>
                            <input type="text" id="Name" name="Name" class="form-control Name" 
                            placeholder="Tên Shipper" required>
                            <div class="NameError invalid-feedback">
                                Chưa nhập tên shipper!!
                            </div>
                        </div>

                                    
                        <div class="form-group">
                            <label for="Phone">
                                <i class="fas fa-info-circle"></i>
                                <strong>Phone</strong>
                            </label>
                            <input type="text" id="Phone" name="Phone" class="form-control Phone" 
                            placeholder="Số điện thoại" disabled required>
                            <div class="PhoneError invalid-feedback">
                                Chưa nhập số điện thoại!!
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button id="p-save_shipper" id_s="" type="button" class="btn btn-success">Lưu thông tin</button>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Modal modify product -->

<?php include "../application/views/admin/_assets/footer.php" ?>
<script>
    $(document).ready(function() {
        loadPage("#productPage")
        initTable("#product_table", "/admin/getAllShipper")
    })
</script>