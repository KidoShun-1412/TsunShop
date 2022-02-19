<html>

<head>
    <title>TsunShop</title>
    <?php require_once "../application/views/_shared/css.php"; ?>
</head>

<body>

    <?php include "../application/views/_shared/nav.php" ?>

    <div class="container" >
        <br> 
        <div class="row">
              
                <h2 class="col-md-6 d-flex align-items-center font-weight-bold text-primary"></h2>
                <!-- Table Search -->
                <div class="col-md-6 d-flex justify-content-end form-inline find-input">
                    <!-- <input type="text" class="form-control find" 
                    placeholder="Nhập tên sản phẩm..." tb_id="order_table"> -->
                    
                    <div class="dropdown">
                        <button class="btn bg-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            --Chọn sản phẩm--
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" id="lastestbt" id_t="<?php echo $data[1] ?>" >Sản phẩm mới nhất</a>                          
                            <a class="dropdown-item" id="fastestbt" id_t="<?php echo $data[1] ?>" >Sản phẩm bán chạy nhất</a>
                            <a class="dropdown-item" id="depricebt" id_t="<?php echo $data[1] ?>" >Giá giảm dần</a>
                            <a class="dropdown-item" id="inpricebt" id_t="<?php echo $data[1] ?>" >Giá tăng dần</a>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-3 row-cols-md-5" id="bodyy">
            <?php 
                if(count($data[0])){
                    foreach($data[0] as $val){
                        echo $val;
                    }
                } else {
                    echo '<div class="alert alert-danger text-center mt-3">
                    <strong>Không có sản phẩm để hiển thị</strong></div>';
                }
            ?>
        </div>
    </div>
    <?php include "../application/views/_shared/footer.php" ?>
    <?php require_once "../application/views/_shared/js.php"; ?>
    <script>
        $(document).ready(function() {
            loadCategory()
            paging()
        })
    </script>
</body>

</html>