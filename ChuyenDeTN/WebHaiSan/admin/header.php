<?php
    ob_start();
	session_start();
    $connect  = mysqli_connect("localhost","root","","webhaisan");
    
	if(!isset($_SESSION['dangnhap'])){
		header("location:index.php");
	} 
	if(isset($_GET['login'])){
 	    $dangxuat = $_GET['login'];
    }
    else{
	 	$dangxuat = '';
	}
	if($dangxuat=='dangxuat'){
	 	session_destroy();
	 	header('Location:index.php');
	 }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang Admin</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="../public/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <!-- iCheck -->
    <link rel="stylesheet" href="../public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../public/admin/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../public/admin/dist/css/styleadmin.css">
    <link rel="stylesheet" href="../public/admin/dist/css/dashboard.css">
    <link rel="stylesheet" href="../public/admin/dist/css/dropdown.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../public/admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../public/admin/plugins/summernote/summernote-bs4.css"> 
    <link rel="stylesheet" href="assets/bootstrap/bootstrap4-alpha3.min.css">   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="admin.php" class="nav-link">Trang Chủ</a>
                </li>
                <li class="dropdown-2">
                    <div class="dropbtn-2"><a href="xulytaikhoan.php" class="nav-link">Quản Lý Tài Khoản</a></div>
                    <div class="dropdown-content-2">
                        <a href="?quanlytaikhoan=themtaikhoan">Thêm Tài Khoản</a>
                        <a href="?quanlytaikhoan=doimatkhau">Đổi Mật Khẩu</a>
                        <a href="?quanlytaikhoan=xemdanhsach">Xem Danh Sách Nhân Viên</a>
                    </div>
            </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Right navbar links -->
            <div class="navbar-nav ml-auto"><a class="btn btn-success" href="http://localhost/www/WebHaiSan/index.php">Trang Người Dùng</a>
            </div>
            <!-- Right navbar links -->
            <div class="navbar-nav ml-auto"><a class="btn btn-danger" href="?login=dangxuat"><i class="fa fa-sign-out fa-lg"></i><strong>Đăng xuất</strong></a>
            </div>
        </nav>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="admin.php" class="brand-link">
                <img src="../public/admin/dist/img/Adminlogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../uploads/<?php echo $_SESSION["hinh_ad"]; ?>" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="admin.php" class="d-block">
                            <?php echo $_SESSION["dangnhap"] ?>
                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview ">
                        <a href="admin.php" class="nav-link active">
                            <i class="fas fa-home"></i>
                            <p>
                                Trang chủ
                            </p>
                        </a>
                    </li>
                        <?php
                            if( $_SESSION["level"]==0){
                        ?>
                        <li class="nav-item has-treeview">
                            <a href="xulyslider.php" class="nav-link">
                                <i class="fab fa-slideshare"></i>
                                    <p>
                                        Slider
                                    </p> 
                            </a>
                        </li>
                        <div class="nav-item has-treeview">
                            <a href="xulydanhmuc.php" class="nav-link">
                                <!-- <i class="nav-icon fas fa-copy"></i> -->
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                <p>
                                    Danh Mục
                                </p>
                            </a>
                        </div>
                        <li class="nav-item has-treeview">
                            <a href="xulysanpham.php" class="nav-link ">
                                <i class="fa fa-product-hunt" aria-hidden="true"></i>
                                <p>
                                    Sản Phẩm
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="xulysanpham.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh Sách sản phẩm</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?quanlysanpham=themsanpham" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm sản phẩm</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fa fa-sticky-note-o" aria-hidden="true"></i>
                                <p>
                                    Bài Viết
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="xulybaiviet.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh Sách bài viết</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?quanlybaiviet=thembaiviet" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm bài viết</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <div class="nav-item has-treeview">
                            <a href="xulykhachhang.php" class="nav-link">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <p>
                                    Khách Hàng
                                </p>
                            </a>
                        </div>
                        <div class="nav-item has-treeview">
                            <a href="xulygiaodich.php" class="nav-link">
                                <i class="fa fa-handshake-o" aria-hidden="true"></i>    
                                <p>
                                   Giao Dịch
                                </p>
                            </a>
                        </div>
                        <div class="nav-item has-treeview">
                            <a href="xulydonhang.php" class="nav-link">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <p>
                                    Đơn Hàng
                                </p>
                            </a>
                        </div>
                        <div class="nav-item has-treeview">
                            <a href="xulyimage.php" class="nav-link">
                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                                <p>
                                    Detail Product Photos
                                </p>
                            </a>
                        </div>
                <?php
                    }
                ?>  
                     <?php
                        if($_SESSION["level"]==1){
                    ?>  
                        <li class="nav-item has-treeview">
                            <a href="xulysanpham.php" class="nav-link ">
                                <i class="fa fa-product-hunt" aria-hidden="true"></i>
                                <p>
                                    Sản Phẩm
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="xulysanpham.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh Sách sản phẩm</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm sản phẩm</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <div class="nav-item has-treeview">
                            <a href="xulykhachhang.php" class="nav-link">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <p>
                                    Khách Hàng
                                </p>
                            </a>
                        </div>
                        <div class="nav-item has-treeview">
                            <a href="xulydonhang.php" class="nav-link">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <p>
                                    Đơn Hàng
                                </p>
                            </a>
                        </div>
                    <?php
                        }
                    ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>