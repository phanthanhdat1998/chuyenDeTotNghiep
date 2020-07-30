<div class="col-8" style="display: block;margin: auto;">
   <h4 style="text-align:center;margin:20px">Thông Tin Người Dùng</h4>
   <?php
      $admin_id = $_SESSION['admin_id'];
      $sql_lay_admin = mysqli_query($connect,"SELECT * FROM tbl_employee WHERE admin_id='$admin_id' LIMIT 1");
      while($row_lay_admin= mysqli_fetch_array($sql_lay_admin)){
          ?>
   <!-- Widget: user widget style 1 -->
   <div class="card card-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-info">
         <h3 class="widget-user-username"><?php echo $row_lay_admin['admin_fullname']; ?></h3>
         <h5 class="widget-user-desc"><?php echo $row_lay_admin['position']; ?></h5>
      </div>
      <div class="widget-user-image">
         <img class="img-circle elevation-2" src="../uploads/<?php echo $row_lay_admin['hinh_admin']; ?> " alt="User Avatar">
      </div>
      <div class="card-footer">
         <div class="row">
            <div class="col-sm-4 border-right">
               <div class="description-block">
                  <h5 class="description-header"></h5>
                  <span class="description-text"></span>
               </div>
               <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 border-right">
               <div class="description-block">
                  <h5 class="description-header"></h5>
                  <span class="description-text"></span>
               </div>
               <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4">
               <div class="description-block">
                  <h5 class="description-header"></h5>
                  <span class="description-text"></span>
               </div>
               <!-- /.description-block -->
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <div class="row" style="display: block;margin: auto;margin-top:20px">
         <div class="row">
            <div class="col-sm-3">
               <a href="#"><i class="fab fa-google-plus-g"></i></a>
            </div>
            <div class="col-sm-3">
               <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
            <div class="col-sm-3">
               <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="col-sm-3">
               <a href="#"><i class="fab fa-facebook-f"></i></a>
            </div>
            <!-- /.description-block -->
         </div>
         <div class="col-sm-12">
            <p>
               <a class="doitt" href="xulytaikhoan.php?quanly=doipasss&doipass=<?php echo $row_lay_admin['admin_id'] ?>">CẬP NHẬT THÔNG TIN</a>
            </p>
         </div>
      </div>
   </div>
   <!-- /.widget-user -->
    <?php
    }
    ?>          
</div>