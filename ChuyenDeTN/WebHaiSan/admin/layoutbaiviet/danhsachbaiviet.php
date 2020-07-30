<div class="row">
 			<div class="col-md-8" style="text-align:center;display:block;margin:auto">
				<h4 style="margin-top:20px">LIỆT KÊ BÀI VIẾT</h4>
					<?php
					$sql_select_bv = mysqli_query($connect,"SELECT * FROM tbl_post ORDER BY baiviet_id DESC LIMIT $start, $limit"); 
					?> 
					<table class="table table-bordered table-responsive-sm">
						<tr>
							<th>Thứ tự</th>
							<th>Tên bài viết</th>
							<th>Hình ảnh</th>	
							<th>Tình Trạng</th>
							<th></th>
						</tr>
						<?php
						$i = 0;
						while($row_bv = mysqli_fetch_array($sql_select_bv)){ 
							$i++;
						?> 
						<tr>
							<td><?php echo $i ?></td>
							<td><?php echo $row_bv['tenbaiviet'] ?></td>
							<td><img src="../uploads/<?php echo $row_bv['baiviet_image'] ?>" height="100" width="80"></td>						
							<td><?php
                                        if($row_bv['tinhtrang']==0){
                                            ?>
                                            <div class="badge badge-success">active</div>
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <div class="badge badge-danger">inactive</div>
                                            <?php
                                                }
										?>
									<td>
										<div class="navbar-1">
											<div class="dropdown-1">
												<button class="dropbtn-1"> 
													<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
												</button>
												<div class="dropdown-content-1">
												<a href="xulybaiviet.php?quanly=capnhat&capnhat_id=<?php echo $row_bv['baiviet_id'] ?>">
													<i class="fa fa-edit"></i> 
												Edit
												</a>
												<a href="?xoa=<?php echo $row_bv['baiviet_id'] ?>">
													<i class="fa fa-trash" aria-hidden="true"></i>
													Delete</a>
												</div>
											</div> 
										</div>
									</td>
						</tr>
					<?php
						} 
						?> 
					</table>
			</div>
            <?php
			if(isset($_GET['quanly'])=='capnhat'){
				$id_capnhat = $_GET['capnhat_id'];
				$sql_capnhat = mysqli_query($connect,"SELECT * FROM tbl_post WHERE baiviet_id='$id_capnhat'");
				$row_capnhat = mysqli_fetch_array($sql_capnhat);

                ?>

        <div class="col-md-4 text-center" style="margin-top:10px">
				<h4>CẬP NHẬT BÀI VIẾT</h4>

				<form action="" method="POST" enctype="multipart/form-data">
					<label>Tên bài viết</label>
					<input type="text" class="form-control" name="tenbaiviet" value="<?php echo $row_capnhat['tenbaiviet'] ?>"><br>
					<input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['baiviet_id'] ?>">
					<label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<img src="../uploads/<?php echo $row_capnhat['baiviet_image'] ?>" height="80" width="80"><br>		
					<label>Mô tả</label>
					<textarea class="form-control" rows="10" name="mota"><?php echo $row_capnhat['tomtat'] ?></textarea><br>
					<label>Chi tiết</label>
					<textarea class="form-control" rows="10" name="chitiet" id="post_content"><?php echo $row_capnhat['noidung'] ?></textarea><br>
					<select class="form-control" name="xuly">
                            <option value="0">Active</option>
                            <option value="1">Inactive</option>
                    </select><br>
					<input type="submit" name="capnhatbaiviet" value="Cập nhật bài viết" class="btn btn-default">
				</form>
			</div>
            <?php
            }
            ?>
</div>	     