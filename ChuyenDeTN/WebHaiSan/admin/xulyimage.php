<?php
    require_once ("header.php");
?>
<?php
 
        // TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($connect, 'SELECT COUNT(sanpham_id) AS total FROM tbl_product');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];

        // TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 4;

        // TÍNH TOÁN TOTAL_PAGE VÀ START
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
if(isset($_POST['capnhatsanpham'])) {
		$id_update = $_POST['id_update'];
        $hinhanh1 = $_FILES['hinhanh1']['name'];
        $hinhanh2 = $_FILES['hinhanh2']['name'];
        $hinhanh_tmp1 = $_FILES['hinhanh1']['tmp_name'];
        $hinhanh_tmp2 = $_FILES['hinhanh2']['tmp_name'];           
		$path = '../uploads/';
		if($hinhanh1==''|| $hinhanh2==''){
            echo "File bạn vừa upload gặp sự cố";
		}else{
            move_uploaded_file($hinhanh_tmp1,$path.$hinhanh1);
            move_uploaded_file($hinhanh_tmp2,$path.$hinhanh2);
			$sql_update_image_chitiet =mysqli_query($connect, "UPDATE tbl_product SET sanpham_image1='$hinhanh1', sanpham_image2='$hinhanh2' WHERE sanpham_id='$id_update'");		}
	    }
?>
<div class="content-wrapper" style="min-height: 365px;">
    <div class="container-fluid">
        <div class="row">    
            <div class="col-8" style="display: block;margin: auto;">
                <h4 style="text-align:center;margin-top:20px">TRANG HÌNH CHI TIẾT SẢN PHẨM</h4>
                <?php
                            $sql_img = mysqli_query($connect,"SELECT * FROM tbl_product ORDER BY sanpham_id DESC LIMIT $start, $limit");
                        ?>
                        <table class="table table-hover table-responsive-sm">
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh chính</th>
                                <th>Hình ảnh chi tiết 1</th>
                                <th>Hình ảnh chi tiết 2</th>
                                <th></th>
                            </tr>
                            <tbody>
                            <?php
                                    $i = 0;
                                    while($row_img = mysqli_fetch_array($sql_img)){
                                    $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td> <?php echo $row_img['sanpham_name']  ?></td>
                                    <td> 
                                        <img src="../uploads/<?php echo $row_img['sanpham_image']  ?>" alt="" height="70" width="150">
                                    </td>
                                    <td> 
                                        <img src="../uploads/<?php echo $row_img['sanpham_image1']  ?>" alt="" height="70" width="150">
                                    </td>
                                    <td> 
                                        <img src="../uploads/<?php echo $row_img['sanpham_image2']  ?>" alt="" height="70" width="150">
                                    </td>
                                    <td>
										<div class="navbar-1">
											<div class="dropdown-1">
												<button class="dropbtn-1"> 
													<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
												</button>
												<div class="dropdown-content-1">
												<a href="xulyimage.php?quanly=capnhat&capnhat_id=<?php echo $row_img['sanpham_id'] ?>">
													<i class="fa fa-edit"></i> 
                                                    Edit
												</a>
												</div>
											</div> 
										</div>
									</td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
            </div>
            <?php
                if(isset($_GET['quanly'])=='capnhat'){
                    $id_capnhat = $_GET['capnhat_id'];
                    $sql_capnhat_img_chitiet = mysqli_query($connect,"SELECT * FROM tbl_sanpham WHERE sanpham_id='$id_capnhat'");
                    $row_capnhat_img_chitiet = mysqli_fetch_array($sql_capnhat_img_chitiet);
                    ?>
                <!-- ./col -->    
                <div class="col-3" style="display: block;margin: auto;">
                    <h4 style="text-align:center;margin-top:20px">Cập Nhật Ảnh Chi Tiết Sản Phẩm</h4>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="tensanpham" value="<?php echo $row_capnhat_img_chitiet['sanpham_name'] ?>"><br>
                        <input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat_img_chitiet['sanpham_id'] ?>">
                        <label>Hình ảnh Chi Tiết 1</label>
                        <input type="file" class="form-control" name="hinhanh1"><br>
                        <img src="../uploads/<?php echo $row_capnhat_img_chitiet['sanpham_image1'] ?>" height="80" width="80"><br>
                        <label>Hình ảnh Chi Tiết 2</label>
                        <input type="file" class="form-control" name="hinhanh2"><br>
                        <img src="../uploads/<?php echo $row_capnhat_img_chitiet['sanpham_image2'] ?>" height="80" width="80"><br>
                        <input type="submit" name="capnhatsanpham" value="Cập nhật sản phẩm" class="btn btn-default">
                    </form>
                </div>
                <?php
                    }
                ?>  
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-6">
                <ul class="pagination">
                    <?php 
                    // PHẦN HIỂN THỊ PHÂN TRANG
                    
                    // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                    if ($current_page > 1 && $total_page > 1){
                    ?>
                    <li class="page-item"><?php echo '<a class="page-link" href="xulyimage.php?page='.($current_page-1).'">Previous</a>';?></li>
                    <?php	
                    }
                    ?>
                    <?php
                    // Lặp khoảng giữa
                    for ($i = 1; $i <= $total_page; $i++){
                        // Nếu là trang hiện tại thì hiển thị thẻ span
                        // ngược lại hiển thị thẻ a
                        if ($i == $current_page){
                            ?>
                        <li class="page-item"><a class="page-link" href="#"><?php  echo $i; ?></a></li>
                        <?php
                        }
                        else{
                        ?>
                        <li class="page-item">	<?php echo '<a  class="page-link" href="xulyimage.php?page='.$i.'">'.$i.'</a>'; ?></li>
                        <?php
                        }
                    }
        
                    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                    if ($current_page < $total_page && $total_page > 1){
                    ?>	
                        <li class="page-item"> <?php echo '<a class="page-link"  href="xulyimage.php?page='.($current_page+1).'">Next</a> '; ?> </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
    require_once ("footer.php");
?>