<?php
	if(isset($_POST['dangnhap_home'])) {
		$email = $_POST['email_login'];
		$matkhau = md5($_POST['password_login']);
        if($email==""||$matkhau=="")
        {
            echo "<script>alert('Làm ơn không để trống')</script>";
        }
        else{
        $sql_select_admin = mysqli_query($connect,"SELECT * FROM tbl_customer WHERE email='$email' AND password='$matkhau' LIMIT 1");
		$count = mysqli_num_rows($sql_select_admin);
		$row_dangnhap = mysqli_fetch_array($sql_select_admin);
		if($count>0){
            $_SESSION['dangnhap_home'] = $row_dangnhap['name'];
            $_SESSION['khachhang_id'] = $row_dangnhap['khachhang_id'];
            header("Refresh:0");
		}else{
			echo "<script>alert('Tài khoản or mật khẩu bị sai')</script>";
        }
    }
}
    if(isset($_POST['dangky_home'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $password1 = md5($_POST['password1']);
        $giaohang = $_POST['giaohang'];

        $lay_email_ra = mysqli_query ($connect,"SELECT * FROM tbl_customer WHERE email='$email' ");
        $row_get_email = mysqli_fetch_assoc ($lay_email_ra);
        if (strlen($password) < 6 ) {
            echo "<script>alert('Mật khẩu quá ngắn')</script>";
        }
        else if ($password != $password1) {
            echo "<script>alert('Mật khẩu không trùng nhau')</script>";
        }
        elseif($row_get_email > 0){  
            echo "<script>alert('Email đã này đã được sử dụng')</script>";
        }
        else {
            $sql_khachhang = mysqli_query($connect,"INSERT INTO tbl_customer(name,email,giaohang,password) values ('$name','$email','$giaohang','$password')");
            echo "<script>alert('ĐĂNG KÝ THÀNH CÔNG')</script>";
            header("Refresh:0");
        }
        $sql_select_khachhang = mysqli_query($connect,"SELECT * FROM tbl_customer ORDER BY khachhang_id DESC LIMIT 1");
        $row_khachhang = mysqli_fetch_array($sql_select_khachhang);
        $_SESSION['dangnhap_home'] = $name;
        $_SESSION['khachhang_id'] = $row_khachhang['khachhang_id'];
    }
?>
<?php
if(isset($_GET['dangxuat'])){
	$id = $_GET['dangxuat'];
	if($id==1){
        unset($_SESSION['dangnhap_home']);
	}
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Seafood TĐ</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
    />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link href="public/user/bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="public/user/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Main css -->
    <link rel="stylesheet" href="public/user/bootstrap/font-awesome/css/fontawesome-all.min.css">
    <!-- Font-Awesome-Icons-CSS -->
    <link href="public/user/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <!-- pop-up-box -->
    <link href="public/user/css/slider.css" rel="stylesheet" type="text/css" media="all" />
    <link href="public/user/css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <link href="public/user/css/basicslider.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="public/user/css/detailproduct.css" type="text/css" media="all" />
    <link rel="stylesheet" href="public/user/css/danhgia.css"type="text/css" media="all" />
    <link rel="stylesheet" href="public/user/css/userkh.css"type="text/css" media="all" />
    <link rel="stylesheet" href="public/user/css/header.css"type="text/css" media="all" />

    <link rel="stylesheet" href="public/user/css/footer.css"type="text/css" media="all" />
    <!-- menu style -->
    <!-- //Custom-Files -->

    <!-- web fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
    <!-- //web fonts -->

</head>

<body>	
    <!-- top-header -->
<div class="container-fluid">
   <div class="row main-top-header">
      <div class="col-lg-12">
         <div class="row con-top-header">
            <div class="col-md-3">
               <a href="index.php?quanly=danhmuc" class="text-white">
               <i class="fas fa-truck mr-2"></i>Đặt Hàng
               </a>
            </div>
            <div class="col-md-3">
               <i class="fas fa-phone mr-2"></i> 0929363719
            </div>
            <?php
               if(isset($_SESSION['dangnhap_home'])){
               ?>
            <div class="col-md-3">
               <a href="index.php?quanly=xemdonhang&khachhang=<?php echo  $_SESSION['khachhang_id']   ?>"  class="text-white">
               <i class="fas fa-shopping-cart mr-2"></i>Kiểm Tra Đơn Hàng
               </a>
            </div>
            <?php
               }
               ?>
            <?php
               if(!isset($_SESSION['dangnhap_home'])){ 
               ?>
            <div class="col-md-3">                
               <a href="#" data-toggle="modal" data-target="#dangnhap" class="text-white">
               <i class="fas fa-sign-in-alt mr-2"></i> Đăng Nhập 
               </a>
            </div>
            <div class="col-md-3">
               <a href="#" data-toggle="modal" data-target="#dangky" class="text-white">
               <i class="fas fa-sign-out-alt mr-2"></i>Đăng Ký
               </a>
            </div>
            <?php
               }
               ?>
            <?php 
               if(!isset($_SESSION['dangnhap_home'])){
                                     echo '';
                             ?>
            <?php
               }else{
               ?>
            <div class="col-md-3">
               <?php
                  $abc= $_SESSION['dangnhap_home'];
                  echo "<a href='index.php?quanly=inforuser'style='color:#fff;text-transform:uppercase'><i class='fa fa-user' aria-hidden='true'></i> $abc</a>".'<i> | </i> '."<a href='index.php?dangxuat=1' style='color:red'> <i class='fas fa-sign-out-alt mr-2'></i></a>"; 
                  ?>
            </div>
            <?php } ?>
         </div>
      </div>
   </div>
</div>
<!-- log in -->
<div class="modal fade" id="dangnhap" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-center">Đăng Nhập</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body" id="login">
            <form action="#" method="post">
               <div class="input-container">
                  <i class="fas fa-envelope icon"></i>
                  <input class="input-field" type="text" id="username" placeholder="Email" name="email_login" required="" autocomplete="off">
               </div>
               <div class="input-container">
                  <i class="fas fa-key icon"></i>
                  <input class="input-field" type="password" id="pass" placeholder="Password" name="password_login" required="" autocomplete="off">
               </div>
               <div class="sub-w3l">
                  <div class="custom-control custom-checkbox mr-sm-2">
                     <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                     <label class="custom-control-label" for="customControlAutosizing">Remember me?</label>
                  </div>
               </div>
               <button type="submit" class="btn" name="dangnhap_home" id="dangnhap" autocomplete="off">Login</button>
               <p class="text-center dont-do mt-3">Bạn chưa có tài khoản?
                  <a href="#" data-toggle="modal" data-target="#dangky">
                  Đăng Ký Tại Đây</a>
               </p>
               <div style="text-align:center">
                  <p>or sign in with:</p>
                  <a type="button" class="btn-floating btn-fb btn-sm">
                  <i class="fab fa-facebook-f"></i>
                  </a>
                  <a type="button" class="btn-floating btn-tw btn-sm">
                  <i class="fab fa-twitter"></i>
                  </a>
                  <a type="button" class="btn-floating btn-li btn-sm">
                  <i class="fab fa-linkedin-in"></i>
                  </a>
                  <a type="button" class="btn-floating btn-git btn-sm">
                  <i class="fab fa-github"></i>
                  </a>
                  <a type="button" class="btn-floating btn-google btn-sm">
                  <i class="fab fa-google-plus-g"></i>
                  </a>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- register -->
<div class="modal fade" id="dangky" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Đăng Ký</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="" method="post" id="formAddAcc">
               <div class="input-container">
                  <i class="fa fa-user icon"></i>
                  <input class="input-field" type="text" placeholder="Full name" name="name" required="" autocomplete="off">
               </div>
               <div class="input-container">
                  <i class="fa fa-envelope icon"></i>
                  <input class="input-field" type="email" placeholder="Email" name="email" required="" autocomplete="off">
               </div>
               <div class="input-container">
                  <i class="fa fa-key icon"></i>
                  <input class="input-field" type="password" placeholder="Password" name="password" required="" autocomplete="off">
               </div>
               <div class="input-container">
                  <i class="fa fa-key icon"></i>
                  <input class="input-field" type="password" placeholder="Enter the password" name="password1" required="" autocomplete="off">
                  <input type="hidden" class="form-control" placeholder="" name="giaohang"  value="0">
               </div>
               <button type="submit" name="dangky_home" class="btn">Register</button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- //modal -->
<!-- //top-header -->
<!-- header-bottom-->
<div class="header-bot" style="background-color:#129FD8">
   <div class="container">
      <div class="row header-bot_inner_wthreeinfo_header_mid">
         <!-- logo -->
         <div class="col-md-3 logo_agile">
            <h1 class="text-center">
               <a href="index.php" class="font-weight-bold font-italic">
               <img src="./uploads/logo.png" alt="" class="img-fluid" height="80" width="70">SeaFood TĐ
               </a>
            </h1>
         </div>
         <!-- //logo -->
         <!-- header-bot -->
         <div class="col-md-9 header-right">
            <div class="row">
               <!-- search -->
               <div class="agileits_search">
                  <form class="form-inline" action="index.php?quanly=timkiem" method="POST">
                     <input class="form-control" type="text" name="search" placeholder="Tìm kiếm sản phẩm" required=""/>
                     <button class="form-control" name="search_button" type="submit">
                     <i class=" fas fa-search "></i>
                     </button>
                  </form>
               </div>
               <!-- //search -->
               <div class="hotline-page">
                  <div class="hotline_number">
                     <a class="hotline-link" href="tel:19008198">1900 8198</a>
                     <p>
                        (8h-21h từ T2-T7; 17h Chủ Nhật)
                     </p>
                  </div>
                  <p class="hotline_shipping"><img src="https://file.hstatic.net/1000030244/file/asset_2_4x_8c58a3c81e8a4941b82cf48216907ccc.png" alt=""></p>
               </div>
               <!-- cart details -->
               <div class="header-cart">
                  <a href="index.php?quanly=giohang">
                     <img src="//theme.hstatic.net/1000030244/1000532904/14/cart.png?v=1818" alt="gio hang">
                     <span class="cart-count">
                        <?php
                           $idphien = session_id();
                           $sql_sl = mysqli_query($connect,"SELECT * FROM `tbl_orderdetail` WHERE session_id='$idphien' ORDER BY donhang_id DESC");
                           $row_sl = mysqli_fetch_array($sql_sl);
                           if(!$row_sl){
                               echo "0";
                           ?>
                        <div class="cart_header_top_box_empty">
                           <div class="cart_empty">Giỏ hàng của bạn chưa có sản phẩm nào.</div>
                        </div>
                        <?php
                           }else{
                               $sql_sl_sp = mysqli_query($connect,"SELECT soluong FROM `tbl_orderdetail` WHERE session_id='$idphien'");
                               $soluongsp = 0;
                               while($row_lay_sl= mysqli_fetch_assoc($sql_sl_sp)){
                                   $soluongsp += $row_lay_sl['soluong'];
                               }
                               echo $soluongsp;
                           ?>
                     </span>
                  </a>
                  <?php
                     $sql_lay_giohang = mysqli_query($connect,"SELECT * FROM tbl_orderdetail,tbl_product WHERE  tbl_orderdetail.sanpham_id =tbl_product.sanpham_id AND session_id='$idphien' ORDER BY donhang_id DESC");
                                   ?>
                  <div class="cart_header_top_box">
                     <div class="cart_box_wrap">
                        <?php
                           $i=0;
                           $total=0;
                           while($row_lay_giohang = mysqli_fetch_array($sql_lay_giohang)){
                           $subtotal = $row_lay_giohang['soluong'] * $row_lay_giohang['sanpham_giakm'];
                              $i++;										
                              $total += $subtotal;
                           ?>
                        <div class="cart_item clearfix">
                           <div class="cart_item_image"><img src="./uploads/<?php echo $row_lay_giohang["sanpham_image"] ?>" alt=""></div>
                           <div class="cart_item_info">
                              <p class="cart_item_title"><a href="index.php?quanly=chitietsp&id=<?php echo $row_lay_giohang['sanpham_id'] ?>" title=""><?php echo $row_lay_giohang['sanpham_name'] ?></a></p>
                              <span class="cart_item_price"><?php echo number_format($subtotal).'vnđ'?></span><span class="cart_item_qty">X<?php echo $row_lay_giohang['soluong'] ?></span>
                              <span class="remove"><a href="?quanly=giohang&xoa=<?php echo $row_lay_giohang['donhang_id'] ?>"><i class="fa fa-trash"></i></a></span>
                           </div>
                        </div>
                        <?php 
                           }
                           ?>
                     </div>
                     <div class="cart_box_bottom">
                        <div class="total_cart"><span>Tổng tiền: </span><span class="total_price"><?php echo number_format($total).'vnđ' ?></span></div>
                        <a href="index.php?quanly=giohang" class="btn-minicart">Xem giỏ hàng</a>
                     </div>
                  </div>
                  <?php
                     }
                     ?>
               </div>
               <!-- //cart details -->
            </div>
         </div>
      </div>
   </div>
</div>
<!-- shop locator (popup) -->
<!-- //header-bottom -->