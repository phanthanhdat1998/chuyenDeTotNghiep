<?php
	if(isset($_GET['id_tin'])){
		$id_baiviet= $_GET['id_tin'];
	}else{
		$id_baiviet = '';
	}
?>
<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="index.php">Trang Chủ</a>
                    <i>|</i>
                </li>
                <li>Tin Tức</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!-- about -->
	<div class="welcome py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">Tin Tức Và Cách Chế Biến</h3>
			<!-- //tittle heading -->
			<div class="row">
				<div class="col-lg-6 welcome-left">
					<h3>Xin Chào</h3>
					<h4 class="my-sm-3 my-2">Việc thưởng thức các món ăn cao cấp hiện nay đang là nhu cầu thiết yếu của các thực khách. Hải sản là một trong những món ăn đó. Việc ăn hải sản tại nhà không còn là việc xa lạ bởi mức sống càng cao thì người dân càng tìm đến cho mình những thực phẩm chất lượng.</h4>
					<p>Hải sản hay đồ biển với nghĩa rộng, thủy hải sản là bất kỳ sinh vật biển được sử dụng làm thực phẩm cho con người. Hải sản bao gồm các loại cá biển, động vật thân mềm, động vật giáp xác, động vật da gai. Ngoài ra, các thực vật biển ăn được, chẳng hạn như một số loài rong biển và vi tảo. </p>
				</div>
				<div class="col-lg-6 welcome-right-top mt-lg-0 mt-sm-5 mt-4">
					<img src="./uploads/maintintuc.jpg" class="img-fluid" alt=" ">
				</div>
			</div>
		</div>
	</div>
<!-- //about -->
<?php
	$sql_baiviet = mysqli_query($connect,"SELECT * FROM `tbl_post` ORDER BY baiviet_id DESC"); 
?>
<div class="container">
         <h3 style="color:red;">Tin Tức Về Hải Sản</h3><br>
        <div class="row tintuc">
            <?php
                while ($row_baiviet = mysqli_fetch_array($sql_baiviet)) {
            ?>
            <div class="col-md-3">
                <a href="?quanly=noidungtintuc&id_tin=<?php echo $row_baiviet['baiviet_id'] ?>">
                <img src="./uploads/<?php echo $row_baiviet["baiviet_image"]; ?>" alt="" height="200" width="250"></a></br>

                <a href="?quanly=noidungtintuc&id_tin=<?php echo $row_baiviet['baiviet_id'] ?>" style="font-weight:bold;"><?php echo $row_baiviet["tenbaiviet"]; ?></a></br>
                <div class="badge absolute top post-date badge-outline">
					<div class="badge-inner">
						<span class="post-date-day">23</span><br>
						<span class="post-date-month is-xsmall">Th6</span>
					</div>
				</div>
                <p><?php echo $row_baiviet["tomtat"];?></p>
            </div>
            <?php
                 }
            ?>
        </div>
</div>