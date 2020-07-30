<?php
   if(isset($_GET['huydonhang'])&& isset($_GET['mahang'])){
   	$huydon = $_GET['huydonhang'];
   	$mahang = $_GET['mahang'];
   }else{
   	$huydon = '';
   	$mahang = '';
   }
   $sql_update_donhang = mysqli_query($connect,"UPDATE tbl_order SET huydonhang='$huydon' WHERE madonhang='$mahang'");
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
            <li>Quản Lý Tài Khoản</li>
         </ul>
      </div>
   </div>
</div>
<!-- page -->
<div class="wrapper">
<div class="main">
   <div class="container">
      <div class="row">
         <div class="col-md-3">
            <div class="menu-account ng-scope" ng-controller="accountController">
               <h3>
                  <span>
                  Quản lý cá nhân
                  </span>
               </h3>
               <ul>
                  <li><a href="index.php?quanly=inforuser"><i class="glyphicon glyphicon-user"></i> Thông tin tài khoản</a></li>
                  <li class="active"><a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?> "><i class="glyphicon glyphicon-list-alt"></i> Đơn hàng của tôi</a></li>
                  <li><a href="#"><i class="glyphicon glyphicon-shopping-cart"></i> Sản phẩm yêu thích</a></li>
                  <li><a href="#"><i class="fa fa-key"></i> Thay đổi mật khẩu</a></li>
                  <li><a href="index.php?dangxuat=1"><i class="glyphicon glyphicon-log-out"></i> Thoát</a></li>
               </ul>
            </div>
         </div>
         <div class="col-md-9">
            <div class="comunication-content clearfix">
               <h2 style=" border-bottom: 1px solid #333;padding-bottom: 5px;font-size: 24px;margin-bottom: 10px;margin-top:20px" class="title font-weight-bold">ĐƠN HÀNG CỦA TÔI</h2>
               <div class="col-md-12 col-md-offset-2 col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0">
                  <div class="row">
                     <div class="col-md-12">
                        <?php
                           if(isset($_GET['khachhang'])){
                              $id_khachhang = $_GET['khachhang'];
                           }else{
                              $id_khachhang = '';
                           }
                           $sql_select = mysqli_query($connect,"SELECT * FROM tbl_order,tbl_customer WHERE tbl_order.khachhang_id='$id_khachhang' GROUP BY madonhang DESC"); 
                           ?> 
                        <table class="table table-bordered ">
                           <thead class="thead-light text-center" style="font-family: 'Roboto Mono', monospace;">
                              <tr>
                                 <th>Thứ tự</th>
                                 <th>Mã đơn hàng</th>
                                 <th>Ngày đặt</th>
                                 <th>Tình trạng</th>
                                 <th>Yêu cầu</th>
                                 <th>Quản lý</th>
                              </tr>
                              </thead class="text-center">
                              <?php
                                 $i = 0;
                                 while($row_donhang = mysqli_fetch_array($sql_select)){ 
                                    $i++;
                                 ?>
                           <tbody style="font-family: 'Roboto Mono', monospace;">
                              <tr>
                                 <td  class="text-center"><?php echo $i; ?></td>
                                 <td  class="text-center"><?php echo $row_donhang['madonhang']; ?></td>
                                 <td  class="text-center"><?php echo $row_donhang['ngaythang'] ?></td>
                                 <td  class="text-center"><?php 
                                    if($row_donhang['tinhtrang']==0){
                                       ?>
                                    <button type="button" class="btn btn-warning"  style="font-family: 'Roboto Mono', monospace;">  <span class="spinner-border spinner-border-sm"></span> ĐÃ ĐẶT HÀNG || CHỜ XỬ LÝ</button>
                                    <?php
                                       }elseif($row_donhang['tinhtrang']==1){
                                          ?>
                                    <button type="button" class="btn btn-primary" style="font-family: 'Roboto Mono', monospace;">Đang giao hàng</button>
                                    <?php 
                                       }else{
                                       ?>
                                    <button type="button" class="btn btn-success font-weight-bold" style="font-family: 'Roboto Mono', monospace;">ĐÃ NHẬN HÀNG</button>
                                    <?php
                                       }
                                       ?>
                                 </td>
                                 <td  class="text-center">
                                    <?php
                                       if($row_donhang['tinhtrang']==1 || $row_donhang['tinhtrang']==2){
                                          echo "";
                                       }else{
                                          if($row_donhang['huydonhang']==0){ 
                                             ?>
                                    <a style="font-family: 'Roboto Mono', monospace;" href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>&mahang=<?php echo $row_donhang['madonhang'] ?>&huydonhang=1">
                                    YÊU CẦU HỦY ĐƠN
                                    </a>
                                    <?php
                                       }elseif($row_donhang['huydonhang']==1){	
                                       ?>
                                    <div style="font-family: 'Roboto Mono', monospace; color: red">
                                       <span class="spinner-border spinner-border-sm"></span>
                                       ĐANG CHỜ HỦY ĐƠN...
                                    </div>
                                    <?php
                                       }else{
                                       ?>
                                    <div style="font-family: 'Roboto Mono', monospace; color: red">
                                       ĐÃ HỦY ĐƠN
                                    </div>
                                       <?php
                                          }
                                          }
                                          ?>
                                 </td>
                                 <td  class="text-center">
                                 <a class="text-info" href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?>&mahang=<?php echo $row_donhang['madonhang'] ?>">XEM CHI TIẾT</a>
                                 </td>
                              </tr>
                              <?php
                                 } 
                                 ?> 
                           </tbody>
                        </table>
                        </div>
                     </div>
                     <?php
                     if(isset($_GET['mahang'])){
                        $mahang = $_GET['mahang'];
                           }else{
                           $mahang = '';
                           }
                           $sql_select_dh = mysqli_query($connect,"SELECT * FROM tbl_order,tbl_customer,tbl_product WHERE tbl_order.sanpham_id = tbl_product.sanpham_id AND tbl_order.khachhang_id = tbl_customer.khachhang_id AND tbl_order.madonhang='$mahang' ORDER BY tbl_order.donhang_id DESC"); 
                           ?>
                     <div class="row">
                        <div class="col-md-12">
                           <h4 class=" text-center mb-lg-5 mb-sm-4 mb-3">Chi Tiết Đơn Hàng</h4>
                           <table class="table table-bordered ">
                              <thead class="thead-light" style="font-family: 'Roboto Mono', monospace;">
                                 <tr>
                                    <th>Thứ tự</th>
                                    <th>Mã hàng</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Ngày đặt</th>
                                 </tr>
                              </thead>
                              <?php
                                 $i = 0;
                                 $total=0;
                                 while($row_ctdh = mysqli_fetch_array($sql_select_dh)){ 
                                    $subtotal = $row_ctdh['soluong'] * $row_ctdh['sanpham_giakm'];
                                    $i++;										
                                    $total += $subtotal;
                                 ?> 
                              <tr style="font-family: 'Roboto Mono', monospace;">
                                 <td><?php echo $i; ?></td>
                                 <td><?php echo $row_ctdh['madonhang']; ?></td>
                                 <td><?php echo $row_ctdh['sanpham_name']; ?></td>
                                 <td><?php echo $row_ctdh['soluong']; ?></td>
                                 <td><?php echo $row_ctdh['ngaythang'] ?></td>
                              </tr>
                              <?php
                                 } 
                                 ?>
                              <tr>
                                 <td class="text-danger text-xl-center" colspan="7">Tổng Tiền Cần Thanh Toán Là: <?php echo number_format($total).' vnđ' ?>
                                 </td>
                              </tr>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>