<html>

<head>
    <title>Tạo tài khoản</title>
    <?php require_once "../application/views/_shared/css.php"; ?>
</head>
<body>


<div class="container card mt-3 pt-4 col-6 container_s">

<form class="row" action="" method="POST">
  <div class="col-6 pr-5">
  <div class="form-group">
    <label for="Account"><strong>Tên tài khoản</strong></label>
    <input type="text" id="Account" class="form-control Account"  placeholder="Nhập tên tài khoản">
    <div class="AccountError invalid-feedback">
      Chưa nhập tên tài khoản!!
    </div>
  </div>
  

  <div class="form-group">
    <label for="Password"><strong>Mật khẩu</strong></label>
    <input type="password" id="Password" class="form-control Password" placeholder="Nhập mật khẩu">
    <div class="PasswordError invalid-feedback">
      Chưa nhập mật khẩu!!
    </div>
  </div>


  <div class="form-group">
    <label for="conPassword"><strong>Xác nhận mật khẩu</strong></label>
    <input type="password" id="conPassword" class="form-control conPassword" placeholder="Nhập lại mật khẩu">
    <div class="conPasswordError invalid-feedback">
      Chưa nhập xác nhận mật khẩu!!
    </div>
  </div>

  <div class="form-group">
    <label for="FullName"><strong>Họ và tên</strong></label>
    <input type="text" id="FullName" class="form-control FullName" placeholder="Nhập họ và tên">
    <div class="FullNameError invalid-feedback">
      Chưa nhập họ và tên!!
    </div>
  </div>


  <div class="form-group">
    <label for="Email"><strong>Địa chỉ email</strong></label>
    <input type="email" id="Email" class="form-control Email" placeholder="Nhập email">
    <div class="EmailError invalid-feedback">
      Chưa nhập email!!
    </div>
  </div>
  </div>


  <div class="col-5">
  <div class="form-group">
    <label for="Phone"><strong>Số điện thoại</strong></label>
    <input type="number" id="Phone" class="form-control Phone" placeholder="Nhập số điện thoại">
    <div class="PhoneError invalid-feedback">
      Chưa nhập số điện thoại!!
    </div>
  </div>


  <div class="form-group">
    <label for="Address"><strong>Địa chỉ</strong></label>
    <input type="text" id="Address" class="form-control Address" placeholder="Nhập địa chỉ">
    <div class="AddressError invalid-feedback">
      Chưa nhập địa chỉ!!
    </div>
  </div>


  <div class="form-group">
    <label for="City"><strong>Tỉnh/ thành phố</strong></label>
    <input type="text" id="City" class="form-control City" placeholder="Nhập tỉnh/ thành phố">
    <div class="CityError invalid-feedback">
      Chưa nhập tỉnh/ thành phố!!
    </div>
  </div>


  <div class="form-group">
    <label for="Province"><strong>Quận/ huyện/ thành phố</strong></label>
    <input type="text" id="Province" class="form-control Province" placeholder="Nhập quận/ huyện">
    <div class="ProvinceError invalid-feedback">
      Chưa nhập thành quận/ huyện!!
    </div>
  </div>


  <button type="button" id="signup" class="btn btn-primary">Tạo tài khoản</button>
  </div>
</form>
</div>


<?php include "../application/views/_shared/footer.php" ?>
<?php require_once "../application/views/_shared/js.php"; ?>
<!-- <script src="<?php echo BASEURL ?>/public/assets/js/user.js"></script> -->
</body>
</html>
