<?php
    require_once ("header.php");
?>
<?php
	if(isset($_POST['themslider'])){
		$tenslider = $_POST['capslider'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$tinhtrang = $_POST['tinhtrang'];
		$path = '../uploads/';
		
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$sql_insert_slider = mysqli_query($connect,"INSERT INTO tbl_slider(slider_image,slider_active,slider_caption) values ('$hinhanh','$tinhtrang','$tenslider')");
		move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
    }
    elseif(isset($_POST['capnhatslider'])) {
		    $id_update = $_POST['id_update'];
            $tenslider = $_POST['capslider'];
            $hinhanh = $_FILES['hinhanh']['name'];
            $tinhtrang = $_POST['tinhtrang'];
            $path = '../uploads/';
            $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		if($hinhanh==''){
			$sql_update_image_slider = "UPDATE tbl_slider SET slider_caption='$tenslider',slider_active='$tinhtrang' WHERE slider_id='$id_update'";
		}else{
            move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
			$sql_update_image_slider = "UPDATE tbl_slider SET slider_caption='$tenslider',slider_active='$tinhtrang',slider_image='$hinhanh' WHERE slider_id='$id_update'";
		}
		mysqli_query($connect,$sql_update_image_slider);
	}
?>
<?php
	if(isset($_GET['xoa'])){
		$id= $_GET['xoa'];
		$sql_xoa = mysqli_query($connect,"DELETE FROM tbl_slider WHERE slider_id='$id'");
	} 
?>
<div class="content-wrapper" style="min-height: 365px;">
    <div class="container-fluid">
        <div class="row">
            <?php
                if(isset($_GET['quanly'])=='capnhat'){
                    $id_capnhat = $_GET['capnhat_id'];
                    $sql_capnhat_slider = mysqli_query($connect,"SELECT * FROM tbl_slider WHERE slider_id='$id_capnhat'");
                    $row_capnhat_slider = mysqli_fetch_array($sql_capnhat_slider);
                    ?>
            <div class="col-3" style="margin-left:10px">
                <h4 style="text-align:center;margin-top:20px">Cập Nhật Slider</h4>
                <form action="" method="POST" enctype="multipart/form-data">
                        <label>Caption slider</label>
                        <input type="text" class="form-control" name="capslider" value="<?php echo $row_capnhat_slider['slider_caption'] ?>"> <br>
                        <input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat_slider['slider_id'] ?>">
                        <label>Hình ảnh</label>
                        <input type="file" class="form-control" name="hinhanh"><br>
                        <img src="../uploads/<?php echo $row_capnhat_slider['slider_image'] ?>" height="70" width="150"><br>			
                        <label>Chọn</label>
                        <select class="form-control" name="tinhtrang" value="<?php echo $row_capnhat_slider['slider_active'] ?>">
                            <option value="1">Hiện slider</option>
                            <option value="0">Ẩn slider</option>
                        </select><br>
                        <input type="submit" name="capnhatslider" value="Cập nhật slider" class="btn btn-default">
                </form>
            </div>
                <?php
                }
                else{
                    ?>         
            <div class="col-3"  style="margin-left:10px">
                <h4 style="text-align:center;margin-top:20px">Thêm Slider</h4>
                <form action="" method="POST" enctype="multipart/form-data">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="capslider" placeholder="Caption slider"><br>
                        <label>Hình ảnh</label>
                        <input type="file" class="form-control" name="hinhanh"><br>					
                        <label>Chọn</label>
                        <select class="form-control" name="tinhtrang">
                            <option value="1">Hiện slider</option>
                            <option value="0">Ẩn slier</option>
                        </select><br>
                        <input type="submit" name="themslider" value="Thêm slider" class="btn btn-default">
                </form>
            </div>
            <?php
                }
            ?>
            <div class="col-7" style="text-align:center;">
                        <h4 style="margin-top:20px">LIỆT KÊ SLIDER</h4>
                        <?php
                            $sql_lay_slider = mysqli_query($connect,"SELECT * FROM tbl_slider ORDER BY slider_id DESC");
                        ?>
                        <table class="table text-center">
                            <tr>
                                <th class="active">
                                    <input type="checkbox" class="select-all checkbox" name="select-all" />
                                </th>
                                <th>Caption Slider</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Quản lý</th>
                            </tr>
                            <?php
                                    $i = 0;
                                    while($row_lay_slider = mysqli_fetch_array($sql_lay_slider)){
                                    $i++;
                            ?>
                            <tr class="text-center">
                                <td class="active">
                                    <input type="checkbox" class="select-item checkbox" name="select-item" value="1000" />
                                </td>
                                <td> <?php echo $row_lay_slider['slider_caption']  ?></td>
                                    <td> <img src="../uploads/<?php echo $row_lay_slider['slider_image']  ?>" alt="" height="70" width="150"></td>
                                    <td><?php
                                        if($row_lay_slider['slider_active']==1){
                                            ?>
                                            <div class="badge badge-success">active</div>
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <div class="badge badge-danger">inactive</div>
                                            <?php
                                                }
                                        ?></td>
                                    <td class="text-center">
                                        <a href="xulyslider.php?quanly=capnhat&capnhat_id=<?php echo $row_lay_slider['slider_id'] ?>" style="font-size: 25px;">
                                            <i class="fa fa-edit"></i>    
                                        </a>
                                        <span style="margin-bottom:20px">||</span>
                                        <a href="?xoa=<?php echo $row_lay_slider['slider_id'] ?>" style="font-size: 25px;color:red">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                            </tr>
                            <?php
                                    } 
                            ?>
                        </table>
            </div>
        </div>
    </div>
</div>
<?php
    require_once ("footer.php");
?>