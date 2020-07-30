<!-- page -->
<div class="services-breadcrumb">
   <div class="agile_inner_breadcrumb">
      <div class="container">
         <ul class="w3_short">
            <li>
               <a href="index.php">TRANG CHỦ</a>
               <i>|</i>
            </li>
            <li>
               GIỎ HÀNG
            </li>
         </ul>
      </div>
   </div>
</div>
<!-- //page -->
<?php
   $idphien = session_id();
   //Them Gio Hang
   if(isset($_POST["themgiohang"])){
   	header("location:index.php?quanly=giohang");
   	$sanpham_id = $_POST["sanpham_id"];
   	$soluong = $_POST["soluong"];
   	$sql_select_giohang = mysqli_query($connect,"SELECT * FROM tbl_orderdetail WHERE sanpham_id='$sanpham_id' AND session_id='$idphien'");
   	$count = mysqli_num_rows($sql_select_giohang);
   	if($count>0){
   		$row_sanpham = mysqli_fetch_array($sql_select_giohang);
   		$soluong = $row_sanpham['soluong'] + 1;
   		$sql_giohang = mysqli_query($connect,"UPDATE tbl_orderdetail SET soluong='$soluong' WHERE sanpham_id='$sanpham_id' AND session_id='$idphien'");
   	}else{
   		$soluong = $soluong;
   		$sql_themdonhang = mysqli_query($connect,"INSERT INTO `tbl_orderdetail`( `sanpham_id`,`soluong`,`session_id`) VALUES ('$sanpham_id','$soluong','$idphien')");
   	}
   }
   // Cập nhật giỏ hàng
   elseif ( isset( $_POST["capnhatsoluong"])) {
   
   	for( $i=0; $i < count( $_POST['product_id']); $i++){
   		$sanpham_id = $_POST['product_id'][$i];
   		$soluong = $_POST['soluong'][$i];
   		if($soluong<=0){
   			$sql_delete = mysqli_query($connect,"DELETE FROM tbl_orderdetail WHERE sanpham_id='$sanpham_id' AND session_id='$idphien'");
   		}
   		else{
   			$sql_update = mysqli_query($connect,"UPDATE tbl_orderdetail SET soluong='$soluong' WHERE sanpham_id='$sanpham_id' AND session_id='$idphien'");
   			header("Location:index.php?quanly=giohang");
   		}
   	}
   }
   //Xóa sản phẩm trong giỏ hàng
   elseif(isset($_GET['xoa'])){
   	$id = $_GET['xoa'];
   	$sql_delete = mysqli_query($connect,"DELETE FROM tbl_orderdetail WHERE donhang_id='$id' AND session_id='$idphien' ");
   	header("Location:index.php?quanly=giohang");
   }
   elseif(isset($_POST['xoahet'])){
   	echo "<script>alert('Bạn chắn muốn xóa?') </script>";
   	$sql_delete_xoahet = mysqli_query($connect,"DELETE FROM `tbl_orderdetail` WHERE session_id='$idphien' ORDER BY donhang_id");
   	header("Location:index.php?quanly=giohang");
   }
   // Cap nhat thong tin don hang
   elseif(isset($_POST['capnhatthongtin'])){
   	$khachhang_id = $_POST["khachhang_id"];
   	$namenn = $_POST['tennguoinhan'];
   	$phonenn = $_POST['phonenn'];
   	// $emailnn = $_POST['emailnn'];
   	$addressnn = $_POST['addressnn'];
   	$notenn = $_POST["notenn"];
   	$giaohangnn = $_POST['giaohangnn'];
   
   	$sql_capnhat_khachhang ="UPDATE `tbl_customer` SET `name`='$namenn',`phone`='$phonenn',`address`='$addressnn',note='$notenn',`giaohang`='$giaohangnn' WHERE khachhang_id='$khachhang_id'";
   	mysqli_query($connect,$sql_capnhat_khachhang);
   }
   elseif(isset($_POST['thanhtoandangnhap'])){
   // thanh toan khi da dang nhap
   $khachhang_id = $_SESSION['khachhang_id'];
   $mahang = rand(0,9999);	
   for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
         $sanpham_id = $_POST['thanhtoan_product_id'][$i];
         $soluong = $_POST['thanhtoan_soluong'][$i];

         $sql_donhang = mysqli_query($connect,"INSERT INTO tbl_order(sanpham_id,khachhang_id,soluong,madonhang) values ('$sanpham_id','$khachhang_id','$soluong','$mahang')");
   
   		// $sql_giaodich = mysqli_query($connect,"INSERT INTO tbl_giaodich(sanpham_id,soluong,magiaodich,khachhang_id) values ('$sanpham_id','$soluong','$mahang','$khachhang_id')");
   
   	$sql_delete_thanhtoan = mysqli_query($connect,"DELETE FROM tbl_orderdetail WHERE sanpham_id='$sanpham_id'");
   	}
   	$xemdon = $_SESSION['khachhang_id'];			
   	header("Location:index.php?quanly=xemdonhang&khachhang=$xemdon");
   	}
   ?>
<?php
   $sql_lay_giohang = mysqli_query($connect,"SELECT * FROM tbl_orderdetail WHERE session_id='$idphien' ORDER BY donhang_id DESC");
   $row_hienthitrang = mysqli_fetch_assoc($sql_lay_giohang);
   if (!$row_hienthitrang) {
   ?>
<div class="privacy py-sm-5 py-4">
   <h4 class='tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3'>Chưa có sản phẩm nào trong giỏ hàng</h4>
   <button type="button" class="btn btn-default" style="display:block;margin:auto;"><a href="index.php?quanly=home">QUAY TRỞ LẠI CỬA HÀNG</a></button>
</div>
<?php
   }else{
   ?>
<!-- checkout page -->
<div class="privacy py-sm-5 py-4">
   <div class="container py-xl-4 py-lg-2">
      <!-- tittle heading -->
      <h4 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
         GIỎ HÀNG CỦA BẠN
      </h4>
      <h6 style="padding-bottom:20px"><i class="fa fa-shopping-bag"></i> MIỄN PHÍ giao hàng nội thành TP Nha Trang cho đơn hàng 500,000đ (Áp dụng nhận hàng giờ hành chính)</h6>
      <!-- //tittle heading -->
      <div class="checkout-right">
         <?php
            $sql_lay_giohang = mysqli_query($connect,"SELECT * FROM tbl_orderdetail,tbl_product WHERE tbl_orderdetail.sanpham_id = tbl_product.sanpham_id AND tbl_orderdetail.session_id='$idphien' ORDER BY tbl_orderdetail.donhang_id DESC");
            ?>
         <div class="table-responsive">
            <form action="" method="POST">
               <table class="listSanPham">
                  <tbody class="text-center">
                     <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Thành tiền</th>
                        <th>Quản lý</th>
                     </tr>
                     <?php
                        $total=0;
                        while($row_lay_giohang = mysqli_fetch_array($sql_lay_giohang)){
                        	$subtotal = $row_lay_giohang['soluong'] * $row_lay_giohang['sanpham_giakm'];				$total += $subtotal;
                        ?>
                     <tr>
                        <td class="noPadding">
                           <a href="single.html">
                           <img src="./uploads/<?php echo $row_lay_giohang["sanpham_image"] ?>" alt="" height="100px" width="70px" class="img-responsive">
                           </a></br>
                           <a href="index.php?quanly=chitietsp&id=<?php echo $row_lay_giohang['sanpham_id'] ?>"><?php echo $row_lay_giohang['sanpham_name'] ?></a>
                        </td>
                        <td class="soluong">
                           <div class="number">
                              <span class="minus span-1"><i class="fa fa-minus"></i></span>
                              <input class="clinput" min="1" type="number" name="soluong[]" value="<?php echo $row_lay_giohang['soluong'] ?>" autocomplete="off"/>
                              <span class="plus span-1"><i class="fa fa-plus"></i></span>
                           </div>
                        </td>
                        <td>
                           <input type="hidden" name="product_id[]" value="<?php echo $row_lay_giohang['sanpham_id'] ?>">
                           <?php echo number_format($row_lay_giohang['sanpham_giakm']).'vnđ' ?>
                        </td>
                        <td><?php echo number_format($subtotal).'vnđ' ?></td>
                        <td class="noPadding">
                           <a href="?quanly=giohang&xoa=<?php echo $row_lay_giohang['donhang_id'] ?>"><i class="fa fa-trash xoasanphamgiohang"></i></a>
                        </td>
                     </tr>
                     <?php
                        }
                        ?>
                     <tr>
                        <td class="text-center" style="font-weight:bold;font-size:20px" colspan="5">
                           Tổng Tiền Cần Thanh Toán: <span class="text-danger"><?php echo number_format($total).'vnđ' ?></span>
                        </td>
                     </tr>
                     <tr>
                        <td colspan="1" class="text-center">
                           <a href="index.php" class="btn btn-warning" style="color:white;text-decoration:none;"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                        </td>
                        <td colspan="3" class="text-center">
                           <button type="submit" class="btn btn-info" name="capnhatsoluong">CẬP NHẬT GIỎ HÀNG</button>
                           <button type="submit" style="margin-left:30px" class="btn btn-danger" name="xoahet">
                           <i class="fa fa-trash"></i> XÓA HẾT
                           </button>
                        </td>
                        <td colspan="1">
                           <a href="#" data-toggle="modal" data-target="#thanhtoan" class="btn btn-primary text-white" style="text-decoration:none">
                           <i class="fas fa-usd"></i> $ THANH TOÁN <i class="fa fa-angle-right"></i>
                           </a>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </form>
            <?php
               if(isset($_SESSION['dangnhap_home'])){
               ?>
            <div class="modal fade" id="thanhtoan" tabindex="-1" role="dialog" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nhập thông tin thanh toán</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                     </div>
                     <form action="" method="POST">
                        <?php 
                           $khachhang_id = $_SESSION['khachhang_id'];
                           $sql_lay_cart = mysqli_query($connect,"SELECT * FROM tbl_customer WHERE khachhang_id='$khachhang_id'");
                           while($row_lay_cart = mysqli_fetch_array($sql_lay_cart)){
                           ?>
                        <div class="modal-body">
                           <div class="form-group">
                              <p>Tổng tiền : </p>
                              <h2><?php echo number_format($total).'vnđ' ?></h2>
                              <p></p>
                           </div>
                           <div class="form-group">
                              <label for="">Tên người nhận</label>
                              <input type="hidden" class="form-control" name="khachhang_id" value="<?php echo $khachhang_id ?>">
                              <input class="form-control input-sm" required="" name="tennguoinhan" type="text" value="<?php echo $_SESSION['dangnhap_home'];?>" autocomplete="off">
                           </div>
                           <div class="form-group">
                              <label for="">SDT người nhận</label>
                              <input class="form-control input-sm" name="phonenn" required="" type="text" pattern="\d*" minlength="10" maxlength="13" value="<?php echo $row_lay_cart["phone"] ?>" autocomplete="off">
                           </div>
                           <div class="form-group">
                              <label for="inputDiaChi">Địa chỉ giao hàng</label>
                              <input class="form-control input-sm" name="addressnn" required="" type="text" value="<?php echo $row_lay_cart['address'] ?>" autocomplete="off">
                           </div>
                           <div class="form-group">
                              <label for="">Ghi Chú</label>
                              <input class="form-control input-sm" name="notenn" required="" type="text" value="<?php echo $row_lay_cart['note'] ?>" autocomplete="off">
                           </div>
                           <div class="form-group">
                              <label for="">Hình thức thanh toán</label>
                              <select class="browser-default custom-select" name="giaohangnn">
                                 <option value="0">Trực tiếp khi nhận hàng</option>
                                 <option value="1">Qua thẻ ngân hàng</option>
                              </select>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary"> Hủy </button>
                           <button type="submit" class="btn btn-secondary" name="capnhatthongtin"> Cập Nhật Thông Tin </button>
                           <?php
                              $sql_lay_giohang = mysqli_query($connect,"SELECT * FROM tbl_orderdetail ORDER BY donhang_id DESC");
                              while($row_thanhtoan = mysqli_fetch_array($sql_lay_giohang)){
                              ?>
                           <input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_thanhtoan['sanpham_id'] ?>">
                           <input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_thanhtoan['soluong'] ?>">
                           <?php
                              } 
                              ?>
                           <button type="submit" name="thanhtoandangnhap" class="btn btn-success">Xác nhận Thanh Toán</button>
                        </div>
                        <?php
                           } 
                           ?>
                     </form>
                  </div>
               </div>
            </div>
            <?php
               }else{
               	?>
            <div class="modal fade" id="thanhtoan" tabindex="-1" role="dialog" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5>Bạn cần đăng nhập để mua hàng</h5>
                        </br><br>
                        <button class="btn btn-outline-info"><a href="" href="#" data-toggle="modal" data-target="#dangnhap">Nhấn vào đây để đăng nhập</a></button>
                     </div>
                  </div>
               </div>
            </div>
            <?php
               }
               ?>
         </div>
      </div>
   </div>
</div>
<?php
   }
   ?>
<?php
   ob_end_flush();
   ?>