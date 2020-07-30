<?php
   require_once ("header.php");
   ?>
<?php
   $iddangnhap = $_SESSION['admin_id'];

   if(isset($_POST['capnhatdonhang'])){
   $xuly = $_POST['xuly'];
   $shippe = $_POST['shippe'];
   $mahang = $_POST['mahang_xuly'];

   $sql_update_donhang = mysqli_query($connect,"UPDATE tbl_order SET tinhtrang='$xuly',admin_id='$iddangnhap',shipper_id='$shippe',ngaygiaohang = NOW() WHERE madonhang='$mahang'");
}
   ?>
<?php 
   // tru kho
   $sql_select_soluong = mysqli_query($connect,"SELECT * FROM `tbl_product`");
   $sql_donhang = mysqli_query($connect,"SELECT * FROM `tbl_order`");
   $row_dh = mysqli_fetch_assoc($sql_donhang);

   $tinhtrangdon = $row_dh["tinhtrang"];

   $row_select_soluong = mysqli_fetch_assoc($sql_select_soluong);

   $soluongtrongkho = $row_select_soluong["sanpham_soluong"];
   $soluongtru =0;
   if($tinhtrangdon>1 && isset($_POST['capnhatdonhang'])){
   $idsp = $_POST["idsp"];
   $soluongmua = $_POST["soluong"];
   $soluongtru = $soluongtrongkho - $soluongmua;  
   $sql_update_sl = mysqli_query($connect,"UPDATE `tbl_product` SET `sanpham_soluong`='$soluongtru' WHERE sanpham_id='$idsp'"); 
   }

   ?>
<?php
   if(isset($_GET['xoadonhang'])){
       $mahang = $_GET['xoadonhang'];
       $sql_delete = mysqli_query($connect,"DELETE FROM tbl_order WHERE madonhang='$mahang'");
   }
   if(isset($_GET['xacnhanhuy']) && isset($_GET['madonhang'])){
       $huydon = $_GET['xacnhanhuy'];
       $madonhang = $_GET['madonhang'];
   }else{
       $huydon = '';
       $madonhang = '';
   }
   $sql_update_donhang = mysqli_query($connect,"UPDATE tbl_order SET huydonhang='$huydon' WHERE mahdonhang='$madonhang'");
   ?>
<div class="content-wrapper" style="min-height:365px;">
   <div class="container-fluid">
      <?php 
         if(isset($_GET['quanlydonhang'])){
         	$tam = $_GET['quanlydonhang'];
         }else{
         	$tam = '';
         }		
         if($tam=='xemdonhang'){
            require_once ("./layoutdonhang/danhsachdonhang.php");
         	require_once ("./layoutdonhang/capnhatdonhang.php");
         }
         else{
         	require_once ("./layoutdonhang/danhsachdonhang.php");
         }
         ?>
   </div>
</div>
<?php
   require_once ("footer.php");
   ?>