<?php
    require_once ("header.php");
?>
<?php
   if(isset($_GET['xoagiaodich'])){
    $mahang = $_GET['xoagiaodich'];
    $sql_delete = mysqli_query($connect,"DELETE FROM tbl_order WHERE madonhang='$mahang'");
}
?>
<div class="content-wrapper" style="min-height: 365px;">
    <div class="container-pluid">
        <div class="row text-center">     
            <div class="col-12">
                <h4 style="text-align:center;margin-top:20px;font-family:'Tahoma'">LIỆT KÊ LỊCH SỬ GIAO DỊCH</h4>
                <?php
                    $sql_select_khachhang = mysqli_query($connect,"SELECT * FROM tbl_customer,tbl_order,tbl_employee,tbl_shipper WHERE tbl_order.khachhang_id = tbl_customer.khachhang_id AND tbl_order.admin_id = tbl_employee.admin_id AND tbl_order.shipper_id = tbl_shipper.shipper_id AND tbl_order.tinhtrang=2 GROUP BY tbl_order.madonhang DESC"); 
                    ?>
                <table class="table table-hover table-responsive-sm">
                            <tr>
                                <th>Mã giao dịch</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Tình trạng</th>
                                <th>Nhân viên</th>
                                <th>Tên NV giao hàng</th>
                                <th>Quản lý</th>
                            </tr>
                            <tbody>
                            <?php
                                while($row_khachhang_gd = mysqli_fetch_array($sql_select_khachhang)){
                            ?>  <?php
                                if( ($row_khachhang_gd['huydonhang']=2)){
                                    ?>
                                <tr>
                                    <td><?php echo  $row_khachhang_gd['madonhang'] ?></td>
                                    <td> <?php  echo $row_khachhang_gd['name']  ?></td>
                                    <td>(+84) <?php echo $row_khachhang_gd['phone'] ?></td>
                                    <td> <?php  echo $row_khachhang_gd['address']  ?></td>
                                    <td> 
                                        <div class="badge badge-success">Đã Giao</div> 
                                    </td>
                                    <td><?php echo $row_khachhang_gd['admin_fullname'] ?></td>
                                    <td><?php echo $row_khachhang_gd['shipper_name'] ?></td>
                                    <td class="text-center">
                                    <a href="?quanlygiaodich=xemgiaodich&khachhang=<?php echo $row_khachhang_gd['madonhang']?>" style="font-size: 25px;">
                                        <i class="fa fa-edit"></i>    
                                    </a>
                                    <span style="margin-bottom:20px">||</span>
                                    <a href="?xoagiaodich=<?php echo $row_khachhang_gd['madonhang']; ?>" style="font-size: 25px;color:red">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    </td>
                                </tr>  
                            <?php
                                }
                            }
                            ?>
                            </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

            <?php
            if(isset($_GET['quanlygiaodich'])=='xemgiaodich'){
                ?>
                    <h4 style="text-align:center;margin-top:20px">CHI TIẾT GIAO DỊCH</h4>
                    <?php
                    if(isset($_GET['khachhang'])){
                        $magiaodich = $_GET['khachhang'];
                    }else{
                        $magiaodich = '';
                    }
                    $sql_select = mysqli_query($connect,"SELECT * FROM tbl_order,tbl_customer,tbl_product WHERE tbl_order.sanpham_id = tbl_product.sanpham_id AND tbl_order.khachhang_id = tbl_customer.khachhang_id AND tbl_order.madonhang='$magiaodich' ORDER BY tbl_order.donhang_id DESC"); 
                    ?>
                    <table class="table table-bordered ">
                        <tr>
                            <th>Thứ tự</th>
                            <th>Mã giao dịch</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Ngày giao hàng</th>
                        </tr>
                        <?php
                        $i = 0;
                        $total=0;
                        while($row_donhang = mysqli_fetch_array($sql_select)){ 
                            $subtotal = $row_donhang['soluong'] * $row_donhang['sanpham_giakm'];
                            $i++;										
                            $total += $subtotal;
                        ?> 
                        <tr>
                            <td><?php echo $i; ?></td>
                            
                            <td><?php echo $row_donhang['madonhang']; ?></td>
                        
                            <td><?php echo $row_donhang['sanpham_name']; ?></td>
                            
                            <td><?php echo $row_donhang['soluong']; ?></td>

                            <td><?php echo $row_donhang['ngaythang'] ?></td>

                            <td><?php echo $row_donhang['ngaygiaohang'] ?></td>                
                        </tr>
                        <?php
                        } 
                        ?>
                        <tr>
							<td class="text-danger text-center" colspan="7">Tiền Đã Thu: <?php echo number_format($total).' vnđ' ?>
							</td>
						</tr> 
                    </table>
                    <?php
            }
            ?>
            </div>
        </div>
    </div>
</div>
<?php
    require_once ("footer.php");
?>