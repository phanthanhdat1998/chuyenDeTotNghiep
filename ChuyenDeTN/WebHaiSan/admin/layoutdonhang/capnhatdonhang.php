<div class="row">
   <?php
      if(isset($_GET['quanlydonhang'])=='xemdonhang'){
          $madonhang = $_GET['madonhang'];
          $sql_chitiet_donhang = mysqli_query($connect,"SELECT * FROM tbl_order,tbl_product,tbl_customer WHERE tbl_order.sanpham_id = tbl_product.sanpham_id AND tbl_order.khachhang_id = tbl_customer.khachhang_id AND tbl_order.madonhang='$madonhang'");
          ?> 
   <div class="col-md-10 text-center" style="display:block;margin:auto">
      <form action="" method="POST">
         <h4>Xem Chi Tiết Đơn Hàng</h4>
         <table class="table table-hover table-responsive-sm">
            <tr>
               <th>Thứ tự</th>
               <th>Mã hàng</th>
               <th>Tên sản phẩm</th>
               <th>Số lượng</th>
               <th>Ghi Chú</th>
               <th>Giá sản phẩm</th>
               <th>Tổng tiền</th>
               <th>Ngày đặt hàng</th>
            </tr>
            <tbody>
               <?php
                  $i = 0;
                  $total=0;
                  while($row_chitiet_donhang = mysqli_fetch_array($sql_chitiet_donhang)){
                  $subtotal = $row_chitiet_donhang['soluong'] * $row_chitiet_donhang['sanpham_giakm'];
                  $i++;										
                  $total += $subtotal;
                  ?>
               <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row_chitiet_donhang['madonhang'] ?></td>
                  <td> <?php  echo $row_chitiet_donhang['sanpham_name']  ?></td>
                  <input type="hidden" name="idsp" value="<?php  echo $row_chitiet_donhang['sanpham_id']  ?>">
                  <input type="hidden" name="soluong" value="<?php  echo $row_chitiet_donhang['soluong']  ?>">
                  <td><?php echo $row_chitiet_donhang['soluong']  ?></td>
                  <td> <?php  echo $row_chitiet_donhang['note']  ?></td>
                  <td><?php echo number_format($row_chitiet_donhang['sanpham_giakm']).'vnđ' ?></td>
                  <td><?php echo number_format( $subtotal).'vnđ'?></td>
                  <td> <?php  echo $row_chitiet_donhang['ngaythang']  ?></td>
                  <input type="hidden" name="mahang_xuly" value="<?php echo $row_chitiet_donhang['madonhang'] ?>">                                    
               </tr>
               <?php
                  }
                  ?>
               <tr>
                  <td class="text-danger" colspan="8" style="font-weight:700;font-size:20px">Tổng Tiền Cần Thu Về: <?php echo number_format($total).' vnđ' ?>
                  </td>
               </tr>
            </tbody>
         </table>
         <label for="">XỬ LÝ ĐƠN HÀNG</label>
         <select class="form-control" name="xuly"  style="width:200px;margin:0 auto;margin-bottom:10px;">
            <?php
            $sql_xuly_donhang = mysqli_query($connect,"SELECT * from tbl_order where madonhang='$mahang'");
            $row_xulydh = mysqli_fetch_assoc($sql_xuly_donhang);
            if($row_xulydh["tinhtrang"]==0){
                ?>
            <option value="0" disabled>Chưa xử lý</option>
            <option value="1">Đã xử lý || Giao hàng</option>
            <?php
               }elseif($row_xulydh["tinhtrang"]==1) {
                   ?>
            <option value="1" disabled>Đã xử lý || Giao hàng</option>
            <option value="2">KH đã nhận</option>
            <?php
               }else{
                   ?>
            <option value="2" disabled>KH đã nhận</option>
            <?php
               }
               ?>
         </select>
         <label for="">CHỌN SHIPPER</label>
         <select name="shippe" class="form-control" style="width:200px;margin:0 auto">
            <?php
            $sql_layshipper = mysqli_query($connect,"SELECT * from tbl_shipper");
            while($row_layshipper = mysqli_fetch_assoc($sql_layshipper)){
            ?>
               <option value="<?php echo $row_layshipper['shipper_id'] ?>"><?php echo $row_layshipper['shipper_name'] ?></option>
            <?php
            }
            ?>
         </select>
         <br>
         <input type="submit" value="CẬP NHẬT ĐƠN HÀNG" name="capnhatdonhang" class="btn btn-success">
      </form>
   </div>
   <?php
      }
      ?>
</div>