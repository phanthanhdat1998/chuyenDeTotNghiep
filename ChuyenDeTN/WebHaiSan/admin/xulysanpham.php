<?php
    require_once ("header.php");
?>
<?php
 
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($connect, 'SELECT COUNT(sanpham_id) AS total FROM tbl_product');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
 
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 9;
 
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
 
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
		
        // Tìm Start
        $start = ($current_page - 1) * $limit; 
?>
<?php 
	if(isset($_POST['themsanpham'])){
		$tensanpham = $_POST['tensanpham'];
		$hinhanh = $_FILES['hinhanh']['name'];
		
		$soluong = $_POST['soluong'];
		$gia = $_POST['giasanpham'];
		$giakhuyenmai = $_POST['giakhuyenmai'];
		$danhmuc = $_POST['danhmuc'];
		$chitiet = $_POST['chitiet'];
		$mota = $_POST['mota'];
		$path = '../uploads/';
		
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$sql_insert_product = mysqli_query($connect,"INSERT INTO tbl_product(sanpham_name,sanpham_tomtat,sanpham_mota,sanpham_gia,sanpham_giakm,sanpham_soluong,sanpham_image,category_id) values ('$tensanpham','$chitiet','$mota','$gia','$giakhuyenmai','$soluong','$hinhanh','$danhmuc')");
		move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
	}
	elseif(isset($_POST['capnhatsanpham'])) {
		$id_update = $_POST['id_update'];
		$tensanpham = $_POST['tensanpham'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$soluong = $_POST['soluong'];
		$gia = $_POST['giasanpham'];
		$giakhuyenmai = $_POST['giakhuyenmai'];
		$danhmuc = $_POST['danhmuc'];
		$chitiet = $_POST['chitiet'];
		$mota = $_POST['mota'];
		$path = '../uploads/';
		if($hinhanh==''){
			$sql_update_image = "UPDATE tbl_product SET sanpham_name='$tensanpham',sanpham_tomtat='$chitiet',sanpham_mota='$mota',sanpham_gia='$gia',sanpham_giakm='$giakhuyenmai',sanpham_soluong='$soluong',category_id='$danhmuc' WHERE sanpham_id='$id_update'";
		}else{
			move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
			$sql_update_image = "UPDATE tbl_product SET sanpham_name='$tensanpham',sanpham_tomtat='$chitiet',sanpham_mota='$mota',sanpham_gia='$gia',sanpham_giakm='$giakhuyenmai',sanpham_soluong='$soluong',sanpham_image='$hinhanh',category_id='$danhmuc' WHERE sanpham_id='$id_update'";
		}
		mysqli_query($connect,$sql_update_image);
	}
	
?> 
<?php
	if(isset($_GET['xoa'])){
		$id= $_GET['xoa'];
		$sql_xoa = mysqli_query($connect,"DELETE FROM tbl_product WHERE sanpham_id='$id'");
	} 
?>
<div class="content-wrapper" style="min-height: 365px;">
	<div class="container-fluid">
		<div class="row">

		<?php 

			if(isset($_GET['quanlysanpham'])){
				$tam = $_GET['quanlysanpham'];
			}else{
				$tam = '';
			}		
			if($tam=='themsanpham'){
				require_once ("./layoutsanpham/themsanpham.php");
			}
			else{
				require_once ("./layoutsanpham/danhsachsanpham.php");
				require_once ("./layoutsanpham/phantrang.php");
			}
		?>
		</div>
	</div>
</div>
<?php
    require_once ("footer.php");
?>