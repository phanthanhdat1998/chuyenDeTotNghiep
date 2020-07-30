<?php
   if(isset($_GET['id_tin'])){
   	$id_nd_tintuc = $_GET['id_tin'];
   }else{
   	$id_nd_baiviet = '';
   }
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
            <li>Tin Tức</li>
         </ul>
      </div>
   </div>
</div>
<?php
   $sql_noidung_tintuc= mysqli_query($connect,"SELECT * FROM tbl_post WHERE baiviet_id='$id_nd_tintuc'");
   ?>
<div class="container">
   <div class="row">
      <?php
         while ($row_noidung_tintuc = mysqli_fetch_array($sql_noidung_tintuc)) {                
         ?>
      <div class="col-md-12" style="padding-top:40px">
         <h6 class="entry-category is-xsmall">
            <a href="" style="font-family: 'Roboto', sans-serif;line-height: 1.05;letter-spacing: .05em;text-transform: uppercase;text-align:center;">Blog Tin Tức</a>
         </h6>
         <h3 style="font-weight:bold;text-align:center;" ><?php echo $row_noidung_tintuc["tenbaiviet"]; ?></h3>
         <h6  style="width:1000px;line-height: 2;padding-left:60px;padding-top:20px" ><?php echo $row_noidung_tintuc["noidung"];?></h6>
      </div>
      <?php
         }
         ?>
   </div>
</div>