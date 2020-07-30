<?php
    require_once ("header.php");
?>
<?php
 
		// BƯỚC 2: TÌM TỔNG SỐ RECORDS
		$result = mysqli_query($connect, 'SELECT COUNT(baiviet_id) AS total FROM tbl_post');
		$row = mysqli_fetch_assoc($result);
		$total_records = $row['total'];

		// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
		$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
		$limit = 3;

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
	if(isset($_POST['thembaiviet'])){
		$tenbaiviet = $_POST['tenbaiviet'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$chitiet = $_POST['chitiet'];

		$xuly = $_POST['xuly'];
		$mota = $_POST['mota'];
		$path = '../uploads/';
		
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$sql_insert_product = mysqli_query($connect,"INSERT INTO tbl_post(tenbaiviet,tomtat,noidung,tinhtrang,baiviet_image) values ('$tenbaiviet','$mota','$chitiet','$xuly','$hinhanh')");
		move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
    }
    elseif(isset($_POST['capnhatbaiviet'])) {
		$id_update = $_POST['id_update'];
		$tenbaiviet = $_POST['tenbaiviet'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$xuly = $_POST['xuly'];
		$chitiet = $_POST['chitiet'];
		$mota = $_POST['mota'];
		$path = '../uploads/';
		if($hinhanh==''){
			$sql_update_image = "UPDATE tbl_post SET tenbaiviet='$tenbaiviet',noidung='$chitiet',tomtat='$mota',tinhtrang='$xuly' WHERE baiviet_id='$id_update'";
		}else{
			move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
			$sql_update_image = "UPDATE tbl_post SET tenbaiviet='$tenbaiviet',noidung='$chitiet',tomtat='$mota',tinhtrang='$xuly',baiviet_image='$hinhanh' WHERE baiviet_id='$id_update'";
		}
		mysqli_query($connect,$sql_update_image);
	}
	
?>
<?php
	if(isset($_GET['xoa'])){
		$id= $_GET['xoa'];
		$sql_xoa = mysqli_query($connect,"DELETE FROM tbl_post WHERE baiviet_id='$id'");
	} 
?>
<div class="content-wrapper" style="min-height: 365px;">
	<div class="container-fluid">
		<?php 
			if(isset($_GET['quanlybaiviet'])){
				$tam = $_GET['quanlybaiviet'];
			}else{
				$tam = '';
			}		
			if($tam=='thembaiviet'){
				require_once ("./layoutbaiviet/thembaiviet.php");
			}
			else{
				require_once ("./layoutbaiviet/danhsachbaiviet.php");
				require_once ("./layoutbaiviet/phantrangbaiviet.php");
			}
		?>
	</div>
</div>
<?php
    require_once ("footer.php");
?>