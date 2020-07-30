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
                     <li class="active"><a href="index.php?quanly=inforuser"><i class="glyphicon glyphicon-user"></i> Thông tin tài khoản</a></li>
                     <li><a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id'] ?> "><i class="glyphicon glyphicon-list-alt"></i> Đơn hàng của tôi</a></li>
                     <li><a href="#"><i class="glyphicon glyphicon-shopping-cart"></i> Sản phẩm yêu thích</a></li>
                     <li><a href="#"><i class="fa fa-key"></i> Thay đổi mật khẩu</a></li>
                     <li><a href="#"><i class="glyphicon glyphicon-log-out"></i> Thoát</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-md-9">
               <div class="comunication-content clearfix">
                  <h2 style=" border-bottom: 1px solid #333;padding-bottom: 5px;font-size: 24px;margin-bottom: 10px;margin-top:20px" class="title font-weight-bold">THÔNG TIN TÀI KHOẢN</h2>
                  <div class="col-md-12 col-md-offset-2 col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0">
                     <div class="row">
                        <?php
                           $lay_id_kh = $_SESSION['khachhang_id'];
                           $sql_select_khachhang = mysqli_query($connect,"SELECT * FROM tbl_customer WHERE khachhang_id='$lay_id_kh'"); 
                           ?>
                        <?php
                           while($row_lay_kh= mysqli_fetch_array($sql_select_khachhang)){
                           ?>
                        <div class="col-md-5">
                           <h2 style="color: #0f9ed8;font-size:25px">TÀI KHOẢN</h2>
                           <form action="">
                              <div class="form-group">
                                 <label for="">Tên Đăng Nhập: </label>
                                 <input type="email" class="form-control" value="<?php echo $row_lay_kh['name'];?>" disabled>
                              </div>
                              <div class="form-group">
                                 <label for="">Mật Khẩu: </label>
                                 <i class="fa fa-key"></i>
                                 <input type="password" class="form-control" value="<?php echo $row_lay_kh['name'];?>" disabled>
                                 </input>
                              </div>
                           </form>
                        </div>
                        <div class="col-md-7">
                           <h2>THÔNG TIN CÁ NHÂN</h2>
                           <form action="">
                              <div class="form-group">
                                 <label for="">Họ Tên: </label>
                                 <input type="email" class="form-control" id="email" value="<?php echo $row_lay_kh['name'];?>" name="email">
                              </div>
                              <div class="form-group">
                                 <label for="">Điện Thoại: </label>
                                 <input type="text" class="form-control" id="pwd" value="<?php echo $row_lay_kh['phone'];?>" name="pswd">
                              </div>
                              <div class="form-group">
                                 <label for="">Địa Chỉ: </label>
                                 <input type="text" class="form-control" value="<?php echo $row_lay_kh['address'];?>" name="pswd">
                              </div>
                              <div class="form-group">
                                 <label for="">Ghi Chú: </label>
                                 <input type="text" class="form-control" value="<?php echo $row_lay_kh['note'];?>" name="pswd">
                              </div>
                              <div class="form-group">
                                 <label for="">Hình thức thanh toán: </label>
                                 <select name="giaohang">
                                    <?php
                                       if($row_lay_kh['giaohang']==0){
                                       ?>
                                    <option value="0">Trực tiếp khi nhận hàng</option>
                                    <?php
                                       }else {
                                       ?>
                                    <option value="1">Qua thẻ ngân hàng</option>
                                    <?php
                                       }
                                       ?>
                                 </select>
                              </div>
                              <div class="form-group text-center">
                                 <button type="submit" class="btn btn-primary">LƯU THÔNG TIN</button>
                              </div>
                           </form>
                        </div>
                        <?php 
                           }
                           ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>