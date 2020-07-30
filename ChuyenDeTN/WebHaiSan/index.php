<?php
	session_start();
	ob_start();
    $connect  = mysqli_connect("localhost","root","","webhaisan");
 ?>
<?php
	require_once ("./views/user/layouts/header.php");

		
    if(isset($_GET['quanly'])){
		$tam = $_GET['quanly'];
	}else{
		$tam = '';
	}

	if($tam=='danhmuc'){
		require_once ("./views/user/layouts/menu.php");
		require_once ("./views/user/pages/danhmuc.php");	
	}
	elseif($tam=="chitietsp"){
		require_once ("./views/user/layouts/menu.php");
		require_once ("./views/user/pages/chitietsp.php");
		
	}
	elseif($tam=="giohang"){
		require_once ("./views/user/layouts/menu.php");
		require_once ("./views/user/pages/giohang.php");
	}
	elseif($tam=="timkiem"){
		require_once ("./views/user/layouts/menu.php");
		require_once ("./views/user/pages/timkiem.php");
	}
	elseif($tam=="tintuc"){
		require_once ("./views/user/layouts/menu.php");
		require_once ("./views/user/pages/tintuc.php");
	}
	elseif($tam=="noidungtintuc"){
		require_once ("./views/user/layouts/menu.php");
		require_once ("./views/user/pages/noidungtintuc.php");
	}
	elseif($tam=="lienhe"){
		require_once ("./views/user/layouts/menu.php");
		require_once ("./views/user/pages/lienhe.php");
	}
	elseif($tam=="xemdonhang"){
		require_once ("./views/user/layouts/menu.php");
		require_once ("./views/user/pages/xemdonhang.php");
	}
	elseif($tam=="danhgia"){
		require_once ("./views/user/layouts/menu.php");
		require_once ("./views/user/pages/danhgia.php");
	}
	elseif($tam=="inforuser"){
		require_once ("./views/user/layouts/menu.php");
		require_once ("./views/user/pages/inforUser.php");
	}
	elseif($tam=="timkiem"){
		require_once ("./views/user/layouts/menu.php");
		require_once ("./views/user/pages/timkiem.php");
	}
	else{
        require_once ("./views/user/pages/home.php");
	}
	require_once ("./views/user/layouts/footer.php");
    
?>