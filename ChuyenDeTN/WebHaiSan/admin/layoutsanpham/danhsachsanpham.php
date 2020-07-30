<?php
   if(isset($_GET['quanly'])=='capnhat'){
   	$id_capnhat = $_GET['capnhat_id'];
   	$sql_capnhat = mysqli_query($connect,"SELECT * FROM tbl_product WHERE sanpham_id='$id_capnhat'");
   	$row_capnhat = mysqli_fetch_array($sql_capnhat);
   	$id_category_1 = $row_capnhat['category_id'];
   	?>
<!-- ./col -->    
<div class="col-3" style="margin-left:5px">
   <h4 style="text-align:center;margin-top:20px">CẬP NHẬT SẢN PHẨM</h4>
   <form action="" method="POST" enctype="multipart/form-data">
      <label>Tên sản phẩm</label>
      <input type="text" class="form-control" name="tensanpham" value="<?php echo $row_capnhat['sanpham_name'] ?>"><br>
      <input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['sanpham_id'] ?>">
      <label>Hình ảnh</label>
      <input type="file" class="form-control" name="hinhanh"><br>
      <img src="../uploads/<?php echo $row_capnhat['sanpham_image'] ?>" height="80" width="80"><br>
      <label>Giá</label>
      <input type="text" class="form-control" name="giasanpham" value="<?php echo $row_capnhat['sanpham_gia'] ?>"><br>
      <label>Giá khuyến mãi</label>
      <input type="text" class="form-control" name="giakhuyenmai" value="<?php echo $row_capnhat['sanpham_giakm'] ?>"><br>
      <label>Số lượng</label>
      <input type="text" class="form-control" name="soluong" value="<?php echo $row_capnhat['sanpham_soluong'] ?>"><br>
      <label>Tóm tắt</label>
      <textarea class="form-control" name="chitiet" id="post_content" rows="10" cols="150"><?php echo $row_capnhat["sanpham_tomtat"] ?></textarea>
      </br>
      <label>Mô tả</label>
      <textarea class="form-control" name="mota" id="post_content" rows="10" cols="150"><?php echo $row_capnhat["sanpham_mota"] ?></textarea>
      </br>
      <label>Danh mục</label>
      <?php
         $sql_danhmuc = mysqli_query($connect,"SELECT * FROM tbl_category ORDER BY category_id DESC"); 
         ?>
      <select name="danhmuc" class="form-control">
         <option value="0">-----Chọn danh mục-----</option>
         <?php
            while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
            	if($id_category_1==$row_danhmuc['category_id']){
            ?>
         <option selected value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
         <?php 
            }else{
            ?>
         <option value="<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
         <?php
            }
            }
            ?>
      </select>
      <br>
      <input type="submit" name="capnhatsanpham" value="Cập nhật sản phẩm" class="btn btn-default">
   </form>
</div>
<?php
   }
   ?>
<!-- ./col -->					
<div class="col-12">
   <div class="card">
      <div class="card-header">
         <h3 class="card-title" style="font-weight:bold">DANH SÁCH SẢN PHẨM</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
         <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
               <div class="col-sm-12 col-md-6">
                  <div class="dataTables_length" id="example1_length">
                     <label>
                        Show 
                        <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
                           <option value="10">10</option>
                           <option value="25">25</option>
                           <option value="50">50</option>
                           <option value="100">100</option>
                        </select>
                        entries
                     </label>
                  </div>
               </div>
               <div class="col-sm-12 col-md-6">
                  <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12">
                  <?php
                     $sql_select_sanpham = mysqli_query($connect,"SELECT * FROM tbl_product,tbl_category WHERE tbl_product.category_id = tbl_category.category_id ORDER BY tbl_product.sanpham_id DESC LIMIT $start, $limit");
                     ?>
                  <table id="example1" class="table table-bordered table-striped" role="grid" aria-describedby="example1_info">
                     <thead>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Danh mục</th>
                        <th>Giá sản phẩm</th>
                        <th>Giá khuyến mãi</th>
                        <th></th>
                     </thead>
                     <tbody>
                        <?php
                           $i = 0;
                           while($row_sp = mysqli_fetch_array($sql_select_sanpham)){
                           	$i++;
                           ?>
                        <tr role="row" class="odd">
                           <td> <?php echo $row_sp['sanpham_name']  ?></td>
                           <td> <img src="../uploads/<?php echo $row_sp['sanpham_image']  ?>" alt="" height="60" width="40"></td>
                           <td><?php echo $row_sp['sanpham_soluong']  ?></td>
                           <td><?php echo $row_sp['category_name']  ?></td>
                           <td><?php echo number_format( $row_sp['sanpham_gia']).'vnđ' ?></td>
                           <td> <?php echo number_format( $row_sp['sanpham_giakm']).'vnđ' ?></td>
                           <?php
                              if($_SESSION["level"]==0){
                              ?>
                           <td class="text-center" style="padding-top:25px">
                              <a href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['sanpham_id'] ?>" style="font-size: 25px;">
                              <i class="fa fa-edit"></i>    
                              </a>
                              <span>||</span>
                              <a href="?xoa=<?php echo $row_sp['sanpham_id'] ?>"  style="font-size: 25px;color:red">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                              </a>
                           </td>
                           <?php
                              }else{
                              ?>
                           <td></td>
                           <?php
                              }
                              ?>
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- /.card-body -->
</div>
</div>