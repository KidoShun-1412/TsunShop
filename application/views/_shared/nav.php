<!-- <div class="container-md text-center">
<a href="<?php echo BASEURL ?>">
  <img class="img-fluid" src="<?php echo BASEURL; ?>/public/assets/img/logo.png" alt="banner">
</a>
</div> -->


<nav class="navbar navbar-expand-md site-nav sticky-top">
  <div class="container p-0">
  <a class="navbar-brand p-0 border-right" href="<?php echo BASEURL ?>">
    <img class="img-fluid" src="<?php echo BASEURL; ?>/public/assets/img/logo113.png" alt="banner">
  </a>

  
  <div class="navbar-collapse">
    <ul class="navbar-nav ml-auto">

      <li class="nav-item  pl-3">
        <a class="nav-link" href="<?php echo BASEURL ?>"  id_ca='3'>Trang chủ</a>
      </li>
  
      <li class="nav-item dropdown pl-3">
      
        <a class="nav-link"  data-toggle="dropdown" >Sản phẩm
          <i class="fa fa-angle-down d-inline" aria-hidden="true"></i>
        </a>
        <div class="dropdown-menu" id_ca='2' aria-labelledby="navbarDropdown">

        </div>
      </li>

      <li class="nav-item  pl-3">
        <a class="nav-link" href="<?php echo BASEURL; ?>/home/guide"  >Hướng dẫn
         
        </a>
      </li>

      <li class="nav-item pl-3">
        <a class="nav-link" href="<?php echo BASEURL; ?>/home/policy" >Chính sách
      
        </a>
      </li>
    </ul>


    <form class="form-inline pl-2 ml-5">
      <input class="form-control mr-1" id="sreach" type="text" placeholder="Nhập tên sản phẩm" aria-label="Tìm kiếm">
      <button id="sreach-product" class="btn btn-outline-secondary p-2" type="button">
        <i class="fa fa-search" aria-hidden="true"></i>
      </button>
    </form>

    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown pl-3">
        <a class=" nav-link " href="#" id="bd-versions" data-toggle="dropdown" > 
        <i class="fa fa-user" aria-hidden="true">
        <?php 
          if($this->getSession('Account'))
            echo "<strong class='account_user'>".$this->getSession('Account')."</strong>";
            else echo "Tài khoản";
          ?>
        </i>        
        </a>    
        <div class="dropdown-menu dropdown-menu-md-right" aria-labelledby="navbarDropdown">
          
          <?php
            if($this->getSession('Account')){
              echo '<a class="dropdown-item" href="'.BASEURL."/user/profile".'">';
              echo '<i class="far fa-id-card"></i>';
              echo '  Thông tin tài khoản';
              echo '</a>';
              echo '<div class="dropdown-divider"></div>';
              echo '<a class="dropdown-item" href="'.BASEURL."/user/logout".'">';
              echo '<i class="fas fa-sign-out-alt"></i> Đăng xuất</a>';
            } else {
              echo '<a class="dropdown-item" href="'.BASEURL."/user/login".'">';
              echo '<i class="fas fa-sign-in-alt"></i> Đăng nhập</a>';
            }
          ?>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="<?php echo BASEURL."/user/signup" ?>">
        <i class="fa fa-plus-square" aria-hidden="true"></i> Tạo tài khoản</a>
      

        </div>
      </li>
    </ul>

    <!-- <a class=" nav-link ml-auto p-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  
    <?php 
    if($this->getSession('Account'))
      echo "<strong class='account_user'>".$this->getSession('Account')."</strong>";
    else echo "Tài khoản"; ?>
  </a> -->

 

    <a class="nav-link pl-2" href="<?php echo BASEURL; ?>/cart/info" aria-label="Giỏ hàng">
      <i class="fa fa-shopping-cart d-inline" aria-hidden="true"></i> 
    </a>
  </div>
  </div>
</nav>
