<div class="col-12">
   <div class="card">
      <div class="card-header">
         <h3 class="card-title" style="font-weight:bold">DANH SÁCH NHÂN VIÊN</h3>
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
                     $sql_select_nhanvien = mysqli_query($connect,"SELECT * FROM tbl_employee  ORDER BY admin_id");
                     ?>
                  <table id="example1" class="table table-bordered table-striped" role="grid" aria-describedby="example1_info">
                     <thead>
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Mật khẩu</th>
                        <th>Chức vụ</th>
                        <th>Hình ảnh</th>
                        <th>Quản lý</th>
                     </thead>
                     <tbody>
                        <?php
                           $i = 0;
                           while($row_nv = mysqli_fetch_array($sql_select_nhanvien)){
                           	$i++;
                           ?>
                        <tr role="row" class="odd">
                            <td><?php echo $i; ?></td>
                           <td> <?php echo $row_nv['admin_fullname']  ?></td>
                           <td><?php echo $row_nv['admin_email']  ?></td>
                           <td><?php echo $row_nv['password']  ?></td>
                           <td><?php echo $row_nv['position']  ?></td>
                           <td> <img src="../uploads/<?php echo $row_nv['hinh_admin']  ?>" alt="" height="60" width="40"></td>
                           <td class="text-center" style="padding-top:25px">
                              <a href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_nv['admin_id'] ?>" style="font-size: 25px;">
                              <i class="fa fa-edit"></i>    
                              </a>
                              <span>||</span>
                              <a href="?xoa=<?php echo $row_nv['admin_id'] ?>"  style="font-size: 25px;color:red">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                              </a>
                           </td>
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