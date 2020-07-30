<div class="row" style="display:block;margin:auto;text-align:center;padding-top:20px">  
   <div class="col-md-12">
      <h4>LIỆT KÊ ĐƠN HÀNG </h4>
      <?php
         $sql_select_donhang= mysqli_query($connect,"SELECT * from tbl_order,tbl_product,tbl_customer where tbl_order.sanpham_id = tbl_product.sanpham_id AND tbl_order.khachhang_id = tbl_customer.khachhang_id Group by tbl_order.madonhang DESC");
            ?>
      <table class="table table-hover table-responsive-sm">
            <tr>
               <th>Thứ tự</th>
               <th>Mã hàng</th>
               <th>Tình trạng đơn hàng</th>
               <th>Tên khách hàng</th>
               <th>Ngày đặt hàng</th>
               <th>Khách yêu cầu hủy</th>
               <th>Quản lý</th>
            </tr>
            <tbody>
               <?php
                  $i = 0;
                  while($row_donhang = mysqli_fetch_array($sql_select_donhang)){
                     $i++;
                  ?>
               <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row_donhang['madonhang'] ?></td>
                  <td>
                     <?php
                        if($row_donhang['tinhtrang']==0){
                           ?>
                     <div style="font-size:20px">                                                    <span class="badge badge-danger">Chưa xử lý</span>
                     </div>
                     <?php
                        }
                        elseif($row_donhang['tinhtrang']==1){
                        ?>
                     <div style="font-size:20px"> 
                        <span class="badge badge-warning">Đang giao hàng</span>
                     </div>
                     <?php
                        }else{
                        ?>
                     <div style="font-size:20px"> 
                        <span class="badge badge-success">KH đã nhận</span>
                     </div>
                     <?php
                        }
                        ?>
                  </td>
                  <td> <?php  echo $row_donhang['name']  ?></td>
                  <td> <?php  echo $row_donhang['ngaythang']  ?></td>
                  <td>
                     <?php 
                        if($row_donhang['huydonhang']==0)
                        {
                           echo "";
                        }
                        elseif($row_donhang['huydonhang']==1)
                        {
                        ?>
                           <button type="submit" class="btn btn-danger">
                           <span class="spinner-border spinner-border-sm"></span>
                           <?php
                           echo '<a class="text-white" href="xulydonhang.php?quanly=xemdonhang&madonhang='.$row_donhang['madonhang'].'&xacnhanhuy=2">XÁC NHẬN</a>';
                           ?>
                           </button>
                        <?php
                        }else{
                           ?>
                        <div style="font-family: 'Roboto Mono', monospace; color: red">
                           ĐÃ HỦY ĐƠN
                        </div>
                        <?php
                        } 
                        ?>
                  </td>
                  <td class="text-center">
                     <a href="?quanlydonhang=xemdonhang&madonhang=<?php echo $row_donhang['madonhang'] ?>" style="font-size: 25px;">
                     <i class="fa fa-edit"></i>    
                  </a>
                     <?php 
                        if($_SESSION["level"]==0)
                        {
                        ?>
                     <span>||</span>
                     <a href="?xoadonhang=<?php echo $row_donhang['madonhang']?>" style="font-size: 25px;color:red">
                     <i class="fa fa-trash" aria-hidden="true"></i>
                  </a>
                     <?php
                     }
                     ?>
               </td>
               </tr>
               <?php
                  }
                  ?>
            </tbody>
      </table>
   </div>
</div>