<html>

<head>
    <title>Thông tin tài khoản</title>
    <?php require_once "../application/views/_shared/css.php"; ?>
</head>
<body>


<!--  -->
<div class="container container_s card col-8 mt-3 pt-4 ">
<form class="row" method="POST" enctype="multipart/form-data">
<div class="col-4 border-right ">
  <div class="hovereffect">
    <?php
      $img = $this->getImg();
      if($img != null){
        echo '<img id="img" class="img-fluid" src = "' . $img . '"/>';
      } else {
        echo '<img id="img" class="img-fluid" src="../public/assets/img/user.png">';
      }
    ?>
    <div class="overlay">  -->
      <h2>Đổi ảnh đại diện</h2>
      <label for="Img" class="info">Chọn file ảnh</label>
      <input id="Img" type="file" class="form-control Img" name="Img" accept="image/*" hidden> 
    </div>
  </div>

  <div class="form-group row pt-2">
    <label class="col-sm-7 col-form-label"><strong>Tên tài khoản:</strong></label>
    <div class="col-sm-5">
      <p  readonly id="Account" class="form-control-plaintext"><?php echo $this->getSession('Account')?></p>
    </div>
  </div>

  <!-- Button trigger modal -->
  <div class="d-flex justify-content-around">
  <button id="dmk" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#doimatkhau">
    Đổi mật khẩu
  </button>
  <button id="luu" type="button" class="btn btn-outline-success" hidden>
    Lưu ảnh
  </button>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="doimatkhau" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel">Đổi mật khẩu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="form-group row">
          <label for="oldPassword" class="col-sm-4 col-form-label"><strong>Mật khẩu cũ:</strong></label>
          <div class="col-sm-8">
            <input id="oldPassword" type="password" class="form-control oldPassword" name="oldPassword" 
            placeholder="Nhập mật khẩu cũ">
            <div class="oldPasswordError invalid-feedback">
              Chưa nhập mật khẩu!!
            </div>
          </div>
        </div>


        <div class="form-group row">
          <label for="Password" class="col-sm-4 col-form-label"><strong>Mật khẩu mới:</strong></label>
          <div class="col-sm-8">
            <input id="Password" type="password" class="form-control Password" name="Password" 
            placeholder="Nhập mật khẩu mới">
            <div class="PasswordError invalid-feedback">
              Mật khẩu mới không thể trống!!
            </div>
          </div>
        </div>


        <div class="form-group row">
          <label for="conPassword" class="col-sm-4 col-form-label"><strong>Xác nhận mật khẩu:</strong></label>
          <div class="col-sm-8">
            <input id="conPassword" type="password" class="form-control conPassword" name="conPassword" 
            placeholder="Nhập lại mật khẩu">
            <div class="conPasswordError invalid-feedback">
              Mật khẩu xác nhận không thể trống!!
            </div>
          </div>
        </div>
        </div>
        <div class="modal-footer lmk">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
          <button id="lmk" type="button" class="btn btn-primary">Lưu mật khẩu</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-8">
  <div class="form-group row">
    <label for="FullName" class="col-sm-4 col-form-label"><strong>Họ và tên:</strong></label>
    <div class="col-sm-8">
      <input id="FullName" type="text" readonly class="form-control FullName" name="FullName" 
      value="<?php echo $data['FullName']?>">
      <div class="FullNameError invalid-feedback">
        Tên tài khoản không được trống!!
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="Email" class="col-sm-4 col-form-label"><strong>Địa chỉ email:</strong></label>
    <div class="col-sm-8">
      <input id="Email" type="text" readonly class="form-control Email" name="Email" 
      value="<?php echo $data['Email']?>">
      <div class="EmailError invalid-feedback">
        Email không được trống!!
      </div>
    </div>
  </div>


  <div class="form-group row">
    <label for="Phone" class="col-sm-4 col-form-label"><strong>Số điện thoại:</strong></label>
    <div class="col-sm-8">
      <input id="Phone" type="text" readonly class="form-control Phone" name="Phone" 
      value="<?php echo $data['Phone']?>">
      <div class="PhoneError invalid-feedback">
        Số điện thoại không thể sửa!!
      </div>
    </div>
  </div>


  <div class="form-group row">
    <label for="Address" class="col-sm-4 col-form-label"><strong>Địa chỉ:</strong></label>
    <div class="col-sm-8">
      <input id="Address" type="text" readonly class="form-control Address" name="Address" 
      value="<?php echo $data['Address']?>">
      <div class="AddressError invalid-feedback">
        Địa chỉ không thể trống!!
      </div>
    </div>
  </div>


  <div class="form-group row">
    <label for="City" class="col-sm-4 col-form-label"><strong>Tỉnh/ thành phố:</strong></label>
    <div class="col-sm-8">
      <input id="City" type="text" readonly class="form-control City" name="City" 
      value="<?php echo $data['City']?>">
      <div class="CityError invalid-feedback">
        Tỉnh/ thành phố không thể trống!!
      </div>
    </div>
  </div>


  <div class="form-group row">
    <label for="Province" class="col-sm-4 col-form-label"><strong>Quận/ huyện/ thành phố:</strong></label>
    <div class="col-sm-8">
      <input id="Province" type="text" readonly class="form-control Province" name="Province" 
      value="<?php echo $data['Province']?>">
      <div class="ProvinceError invalid-feedback">
        Quận/ huyện không thể trống!!
      </div>
    </div>
  </div>

</div>
<div class="col-4 d-flex justify-content-around mt-3">
  <button id="stt" type="button" class="btn btn-primary">Sửa thông tin cá nhân</button>
</div>
<div class="col-8 d-flex justify-content-around mt-3">
  <button id="ltt" type="button" class="btn btn-success" hidden>Lưu thông tin cá nhân</button>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#con">
  Xóa tài khoản
</button>

<!-- Modal -->
<div class="modal fade" id="con" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Xác nhận xóa tài khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tài khoản sẽ bị vô hiệu hóa và không đăng nhập được ở bất kỳ đâu !!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
        <button id="xtk" type="button" class="btn btn-primary">Xác nhận xóa</button>
      </div>
    </div>
  </div>
</div>
</div>
</form>
<br><br>
<h2> Thông tin đơn hàng</h2>
<div class="card shadow mb-4">   
      <table id="order_table" class="display w-50">
          <thead>
              <tr>               
                  <th>Tên người nhận</th>
                  <th>Số điện thoại</th>
                  <!-- <th>Phí vận chuyển</th> -->
                  <th>Tổng tiền</th>          
                  <th>Trạng thái</th>        
                  <th>Địa chỉ </th>    
                  <th>Ngày đặt hàng: </th>            
              </tr>
          </thead>
          <tbody>
          </tbody>
      </table>

</div>
</div>


<?php include "../application/views/_shared/footer.php" ?>
<?php require_once "../application/views/_shared/js.php"; ?>
<!-- <script src="<?php echo BASEURL ?>/public/assets/js/user.js"></script> -->
</body>

</html>
<script>
    $(document).ready(function() {
      
        initTable1("#order_table", "/user/getOrderByAcc")
     
    })
</script>
