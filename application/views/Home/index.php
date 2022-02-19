<html>

<head>
    <title>TsunShop</title>
    <?php require_once "../application/views/_shared/css.php"; ?>
</head>

<body>
    <!-- <?php include "../application/views/_shared/header.php" ?> -->
    <?php include "../application/views/_shared/nav.php" ?>
    <?php include "../application/views/_shared/slide.php" ?>
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
                            <a class="dropdown-item sreach" id="lastest" >Sản phẩm mới nhất</a>
                            <!-- <a class="dropdown-item" id="lastest" href="/-website-mp/product/getLastestProduct">Sản phẩm mới nhất</a> -->
                            <a class="dropdown-item"id="fastest">Sản phẩm bán chạy nhất</a>
                            <a class="dropdown-item" id="deprice">Giá giảm dần</a>
                            <a class="dropdown-item" id="inprice">Giá tăng dần</a>
                        </div>
                    </div>
                </div>
        </div>
        <div id="heDiv"></div> 
        <br><br>
        <div class="row row-cols-1 row-cols-sm-3 row-cols-md-4" id="bodyy">
            <!-- <div style="text-align:center">
                <h1>Tất cả sản phẩm</h1>                 
            </div> -->
        </div>
    
    <?php include "../application/views/_shared/footer.php" ?>
    <?php require_once "../application/views/_shared/js.php"; ?>
    <script>
        $(document).ready(function() {
            loadCategory()
            loadProduct()
        })
    </script>
</body>

</html>