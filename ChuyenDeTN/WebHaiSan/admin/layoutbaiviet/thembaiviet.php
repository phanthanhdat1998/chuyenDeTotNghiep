<div class="col-md-8" style="text-align:center;display:block;margin:auto;padding-top:10px">

		<h4>THÊM BÀI VIẾT</h4>					
		<form action="" method="POST" enctype="multipart/form-data">
			<label>Tên bài viết</label>
			<input type="text" class="form-control" name="tenbaiviet" placeholder="Tên bài viết"><br>
			<label>Hình ảnh</label>
			<input type="file" class="form-control" name="hinhanh"><br>
			<label>Mô tả</label>
			<textarea class="form-control" name="mota"></textarea><br>
			<label>Chi tiết</label>
			<textarea class="form-control" name="chitiet"></textarea><br>
			<select class="form-control" name="xuly">
                <option value="0">Active</option>
                <option value="1">Inactive</option>
            </select><br>
			<input type="submit" name="thembaiviet" value="Thêm bài viết" class="btn btn-default">
		</form>
</div>