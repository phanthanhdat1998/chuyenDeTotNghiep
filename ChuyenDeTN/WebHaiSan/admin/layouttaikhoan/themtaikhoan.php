<div class="col-5" style="display: block;margin: auto; text-align:center;">
   <form action="" method="POST">
      <h4 style="text-align:center;margin-top:20px">Thêm mới người dùng</h4>
      <div>
         <label>Nhập tên của bạn</label>
         <input type="text" class="form-control" name="name_admin" value=""  required=""><br>
         <label>Nhập Email</label>
         <input type="text" class="form-control" name="email_admin" value=""  required=""><br>
         <label>Nhập mật khẩu</label>
         <input type="password" class="form-control" name="pass_admin" value=""  required=""><br>
         <label>Nhập lại mật khẩu</label>
         <input type="password" class="form-control" name="pass_admin1" value=""  required=""><br>
         <input type="hidden" name="level" value="2">
         <input type="text" class="form-control" name="position" value="Staff"  required="" disabled><br>
         <input type="submit" name="themtaikhoan" value="Thêm Tài Khoản" class="btn btn-default">
      </div>
   </form>
</div>