<?php
    require_once ("header.php");
    ?>
<?php
    if(isset($_POST["themdanhmuc"]) && empty(isset($_POST["themdanhmuc"])=="") ){
        $tendanhmuc = $_POST["danhmuc"];
        $sql_insert = mysqli_query($connect,"INSERT INTO tbl_category(category_name) value ('$tendanhmuc')");
    }
    elseif(isset($_POST['capnhatdanhmuc']))
    {
		$id_post = $_POST['id_danhmuc'];
		$tendanhmuc = $_POST['danhmuc'];
        $sql_update = mysqli_query($connect,"UPDATE `tbl_category` SET `category_name`='$tendanhmuc' WHERE category_id='$id_post'");
    }
?>
<?php
	if(isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        $sql_xoa = mysqli_query($connect,"DELETE FROM `tbl_category` WHERE category_id='$id'");
    }
?>
    <div class="content-wrapper" style="min-height: 365px;">
		<div class="container-fluid">
			<div class="row">
            <?php
                if(isset($_GET['quanlydanhmuc'])=='capnhat'){
                    $id_capnhat = $_GET['id'];
                    $sql_capnhat = mysqli_query($connect,"SELECT * FROM tbl_category WHERE category_id='$id_capnhat'");
                    $row_capnhat = mysqli_fetch_array($sql_capnhat);
                ?>
                    <!-- ./col -->
                    <div class="col-4" style="text-align:center;display:block;margin:auto;">
                        <h4>Cập Nhật Danh Mục</h4>
                        <label for="">Tên Danh Mục</label>
                        <form action="#" method="post">
                            <input type="text" class="form-control" name="danhmuc" value="<?php echo $row_capnhat["category_name"]?>"><br>
                            <input type="hidden" class="form-control" name="id_danhmuc" value="<?php echo $row_capnhat['category_id'] ?>">
                            <input type="submit" value="cập nhật danh mục" name="capnhatdanhmuc" class="btn btn-warning" style="text-align:center;margin-top:20px">
                        </form>         
                    </div>
			    <?php
			    }else{
				?>
                    <!-- ./col -->
                    <div class="col-4" style="text-align:center;display:block;margin:auto;">
                        <h4>Thêm Danh Mục</h4>
                        <label for="">Nhập Tên Danh Mục</label>
                        <form action="#" method="post">
                            <input type="text" class="form-control" name="danhmuc" placeholder="Tên danh mục"></br>
                            <input type="submit" value="Thêm danh mục" name="themdanhmuc" class="btn btn-warning">
                        </form>                    
                    </div>
                    <?php          
                        }
                    ?>

				<!-- ./col -->
				<div class="col-8">
                    <h4 style="text-align:center;margin-top:20px">LIỆT KÊ DANH MỤC</h4>
                    <?php
                        $sql_select_cate = mysqli_query($connect,"SELECT * FROM `tbl_category` ORDER BY category_id DESC");
                    ?>
                    <table class="table table-hover table-responsive-sm text-center">
                        <tr>
                            <th>Thứ tự</th>
                            <th>Tên danh mục</th>
                            <th>Mô tả</th>
                            <th>Hình ảnh</th>
                            <th>Quản lý</th>
                        </tr>
                        <tbody>
                        <?php
                            $i = 0;
                            while($row_category = mysqli_fetch_array($sql_select_cate)){
                                $i++;
                        ?>
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $row_category['category_name']  ?></td>
                                <td>
                                    <?php echo $row_category['Description']  ?>
                                </td>
                                <td class="text-center">
                                    <a href="?quanlydanhmuc=capnhat&id=<?php echo $row_category['category_id'] ?>" style="font-size: 25px;">
                                        <i class="fa fa-edit"></i>    
                                    </a>
                                    <span style="margin-bottom:20px">||</span>
                                    <a href="?xoa=<?php echo $row_category['category_id'] ?>" style="font-size: 25px;color:red">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td>1.jpg</td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
			    </div>
			</div>
		</div>
    </div>
<?php
    require_once ("footer.php");
?>