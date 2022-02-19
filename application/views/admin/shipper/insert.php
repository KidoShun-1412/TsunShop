<?php include "../application/views/admin/_assets/header.php" ?>
<!-- Topbar -->
<div class="container-fluid bg-white mb-4 text-center shadow" id="admin-navbar">
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top">
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <!-- Topbar info -->
        <div class="sidebar-heading">
            Thêm shipper mới
        </div>
    </nav>
</div>
<!-- Begin Page Content -->
<div class="container-fluid row m-0">
    <div class="col-md-1"></div>
    <div class="card shadow mb-4 col-md-10 p-0">
        <div class="card-header">
            <div class="row">
                <h6 class="col-md-6 d-flex align-items-center font-weight-bold text-primary">
                    Thêm shipper</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="mr-md-4 ml-md-4">
                <form class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Name">
                                <i class="fas fa-file-signature"></i>
                                <strong>Tên shipper</strong>
                            </label>
                            <input type="text" id="Name" name="Name" class="form-control Name" placeholder="Tên sản phẩm" required>
                            <div class="NameError invalid-feedback">
                                Chưa nhập tên shipper!!
                            </div>
                        </div>

                                            
                        <div class="form-group">
                            <label for="phone">
                                <i class="fas fa-info-circle"></i>
                                <strong>Số điện thoại</strong>
                            </label>
                            <input type="text" id="phone" name="phone" class="form-control Price" placeholder="Số điện thoại" required>
                            <div class="PhoneError invalid-feedback">
                                Chưa nhập số điện thoại!!
                            </div>
                        </div>
                                            
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button id="insertshipper" type="button" class="btn btn-primary">Lưu thông tin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
<?php include "../application/views/admin/_assets/footer.php" ?>
<script>
    $(document).ready(function() {
        loadPage("#productPage")
        loadInsertP();
    })
</script>