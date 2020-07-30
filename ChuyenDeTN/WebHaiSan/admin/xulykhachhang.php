<?php
    require_once ("header.php");
?>
<?php
	if(isset($_GET['xoa'])){
		$id= $_GET['xoa'];
		$sql_xoa = mysqli_query($connect,"DELETE FROM `tbl_customer` WHERE khachhang_id='$id'");
	} 
?>
<div class="content-wrapper" style="min-height: 365px;">
    <div class="container-fluid">
        <div class="row" style="display:block;margin:auto;text-align:center;padding-top:20px">  
            <div class="col-md-12">
                <h4>DANH SÁCH KHÁCH HÀNG</h4>
                <?php
                    $sql_select_khachhang = mysqli_query($connect,"SELECT * FROM tbl_customer ORDER BY khachhang_id DESC"); 
                        ?>
                <table class="table table-responsive-sm">
                    <thead>
                        <tr>
                            <th>Thứ tự</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 0;
                    while($row_khachhang = mysqli_fetch_array($sql_select_khachhang)){
                        $i++;
                        ?>
                        <tr>
                            <td ><?php echo $i; ?> </td>
                            <td> <?php  echo $row_khachhang['name'];  ?> </td>
                            <td> (+84) <?php echo $row_khachhang['phone']; ?> </td>
                            <td> <?php  echo $row_khachhang['address'];  ?> </td>
                            <td> <?php echo $row_khachhang['email']; ?> </td>
                            <td>
								<a href="?xoa=<?php echo $row_khachhang['khachhang_id']; ?>" style="color:red;font-size: 25px;">
								    <i class="fa fa-trash" aria-hidden="true"></i>
								</a>
							</td>
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