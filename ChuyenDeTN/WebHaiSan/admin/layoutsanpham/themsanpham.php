<div class="col-2"></div>
<div class="col-8" style="text-align:center;margin-left:15px">
   <h4 style="text-align:center;margin-top:20px">THÊM SẢN PHẨM</h4>
   <form action="" method="POST" enctype="multipart/form-data">
      <label>Tên sản phẩm</label>
      <input type="text" class="form-control" name="tensanpham" placeholder="Tên sản phẩm"><br>
      <label>Hình ảnh</label>
      <input type="file" class="form-control" name="hinhanh"><br>
      <label>Giá</label>
      <input type="text" class="form-control" name="giasanpham" placeholder="Giá sản phẩm"><br>
      <label>Giá khuyến mãi</label>
      <input type="text" class="form-control" name="giakhuyenmai" placeholder="Giá khuyến mãi"><br>
      <label>Số lượng</label>
      <input type="text" class="form-control" name="soluong" placeholder="Số lượng"><br>
      <label>Tóm tắt</label>
      <textarea class="form-control" name="chitiet" id="post_content" rows="10" cols="150"></textarea>
      </br>
      <label>Mô tả</label>
      <textarea class="form-control" name="mota"></textarea>
      <br>
      <label>Danh mục</label>
      <?php
         $sql_danhmuc = mysqli_query($connect,"SELECT * FROM tbl_category ORDER BY category_id DESC"); 
         ?>
      <select name="danhmuc" class="form-control">
         <?php
            while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
            ?>
         <option value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
         <?php 
            }
            ?>
      </select>
      <br>
      <input type="submit" name="themsanpham" value="Thêm sản phẩm" class="btn btn-default">
   </form>
</div>
<div class="col-2"></div>