<!-- start -->
<?php
   require_once ("header.php");
   ?>
<?php
   if(isset($_POST['doipass'])) {
       $id_update = $_SESSION['admin_id'];
       $pass1 = md5($_POST['pass1']);
       $pass2 = md5($_POST['pass2']);
       $pass3 = md5($_POST['pass3']);
   
       $lay_pass_ra = mysqli_query($connect,"SELECT * FROM tbl_employee WHERE admin_id='$id_update' LIMIT 1");
       while($row_get_pass= mysqli_fetch_assoc($lay_pass_ra)){
       if($pass2 != $pass3 || $pass1 != $row_get_pass['password'])
       {
          echo "<script>alert('Mật khẩu không trùng nhau')</script>";
       }else {
           $sql_update_pass =  mysqli_query($connect,"UPDATE tbl_employee SET password='$pass2' WHERE admin_id='$id_update'");
           echo "<script>alert('Đổi mật khẩu thành công ')</script>";
       }}       
   }
   ?>
<?php
   if(isset($_POST['themtaikhoan'])) {
   
       $fullname_admin = $_POST['name_admin'];
       $pass_admin = md5($_POST['pass_admin']);
       $pass_admin1 = md5($_POST['pass_admin1']);
       $email_admin = $_POST['email_admin'];
       $level = $_POST['level'];
       $position = $_POST['position'];
   
       if ($pass_admin != $pass_admin1 ) {
           echo "<script>alert('Mật khẩu không trùng nhau')</script>";
       }
       $lay_email_ra = mysqli_query ($connect,"SELECT * FROM tbl_employee WHERE admin_email='$email_admin'");
       $row_get_email = mysqli_fetch_array ($lay_email_ra);
       if(mysqli_num_rows($row_get_email) > 0){   
           echo "<script>alert('Email đã này đã được sử dụng')</script>";
       }else {
           $sql_themtk = mysqli_query($connect,"INSERT INTO `tbl_employee`(`admin_email`, `password`, `admin_fullname`, `position`, `level`) VALUES ('$email_admin','$pass_admin','$fullname_admin','$position','$level')");
           echo "<script>alert('Đăng ký thành công')</script>";
       }
   }
   ?>
<div class="content-wrapper" style="min-height: 365px;">
   <div class="container-fluid">
      <div class="row">
          
		<?php 

        if(isset($_GET['quanlytaikhoan'])){
            $tam = $_GET['quanlytaikhoan'];
        }else{
            $tam = '';
        }		
        if($tam=='themtaikhoan' && $_SESSION["level"]==0){
            require_once ("./layouttaikhoan/themtaikhoan.php");
        }
        elseif($tam=='xemdanhsach' && $_SESSION["level"]==0){
            require_once ("./layouttaikhoan/xemdanhsach.php");
        }
        elseif($tam=='doimatkhau'){
            require_once ("./layouttaikhoan/doimatkhau.php");
        }
        else{
            require_once ("./layouttaikhoan/thongtinnguoidung.php");
        }
        ?>
      </div>
   </div>
</div>
<?php
   require_once ("footer.php");
   ?>