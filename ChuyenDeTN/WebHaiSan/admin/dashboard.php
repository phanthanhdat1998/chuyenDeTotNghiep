<!-- start -->
<?php
    require_once ("header.php");
?>
<?php
    $array_total = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    $sql_doanhthu = mysqli_query($connect,"SELECT * FROM tbl_order,tbl_product WHERE tbl_order.sanpham_id = tbl_product.sanpham_id AND tbl_order.tinhtrang=2");
    if($sql_doanhthu==TRUE){   
        $i = 0;
        $tongdoanhthu =0 ;    
        while($row_doanhthu = mysqli_fetch_array($sql_doanhthu)){
            $result_date_compele = preg_split("/[-]+/", substr($row_doanhthu['ngaythang'], 0, 10));

            if ($result_date_compele[1] == "01") {
                $array_total[0] += $row_doanhthu['soluong'] * $row_doanhthu['sanpham_giakm'];
            }
            elseif ($result_date_compele[1] == "02") {
                $array_total[1] += $row_doanhthu['soluong'] * $row_doanhthu['sanpham_giakm'];
            } 
            elseif ($result_date_compele[1] == "03") {
                $array_total[2] += $row_doanhthu['soluong'] * $row_doanhthu['sanpham_giakm'];
            }
             elseif ($result_date_compele[1] == "04") {
                $array_total[3] += $row_doanhthu['soluong'] * $row_doanhthu['sanpham_giakm'];
            } 
            elseif ($result_date_compele[1] == "05") {
                $array_total[4] += $row_doanhthu['soluong'] * $row_doanhthu['sanpham_giakm'];
            }
            elseif ($result_date_compele[1] == "06") {
                $array_total[5] += $row_doanhthu['soluong'] * $row_doanhthu['sanpham_giakm'];
            }
            elseif ($result_date_compele[1] == "07") {
                $array_total[6] += $row_doanhthu['soluong'] * $row_doanhthu['sanpham_giakm'];
            }
             elseif ($result_date_compele[1] == "08") {
                $array_total[7] += $row_doanhthu['soluong'] * $row_doanhthu['sanpham_giakm'];
            }
             elseif ($result_date_compele[1] == "09") {
                $array_total[8] += $row_doanhthu['soluong'] * $row_doanhthu['sanpham_giakm'];
            }
             elseif ($result_date_compele[1] == "10") {
                $array_total[9] += $row_doanhthu['soluong'] * $row_doanhthu['sanpham_giakm'];
            }
             elseif ($result_date_compele[1] == "11") {
                $array_total[10] += $row_doanhthu['soluong'] * $row_doanhthu['sanpham_giakm'];
            }
             else{
                $array_total[11] += $row_doanhthu['soluong'] * $row_doanhthu['sanpham_giakm'];
            }
        }
        $tongdoanhthu = $array_total[0]+$array_total[1]+$array_total[2]+$array_total[3]+$array_total[4]+$array_total[5]+$array_total[6]+$array_total[7]+$array_total[8]+$array_total[9]+$array_total[10]+$array_total[11];
    }
?>
<?php
		$array_total1 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
		$sql_donhang = mysqli_query($connect,"SELECT * FROM tbl_order GROUP BY madonhang");
		if($sql_donhang==TRUE){   

			while($row_donhang = mysqli_fetch_array($sql_donhang)){
				$result_date_compele = preg_split("/[-]+/", substr($row_donhang['ngaythang'], 0, 10));

            if ($result_date_compele[1] == "01") {
                $array_total1[0] = $row_donhang['soluong'];
            }
            elseif ($result_date_compele[1] == "02") {
                $array_total1[1] += $row_donhang['soluong'];
            } 
            elseif ($result_date_compele[1] == "03") {
                $array_total1[2] += $row_donhang['soluong'];
            }
             elseif ($result_date_compele[1] == "04") {
                $array_total1[3] += $row_doanhthu['soluong'];
            } 
            elseif ($result_date_compele[1] == "05") {
                $array_total1[4] += $row_donhang['soluong'];
            }
            elseif ($result_date_compele[1] == "06") {
                $array_total1[5] += $row_donhang['soluong'];
            }
            elseif ($result_date_compele[1] == "07") {
                $array_total1[6] += $row_donhang['soluong'];
            }
             elseif ($result_date_compele[1] == "08") {
                $array_total1[7] += $row_donhang['soluong'];
            }
             elseif ($result_date_compele[1] == "09") {
                $array_total1[8] += $row_donhang['soluong'];
            }
             elseif ($result_date_compele[1] == "10") {
                $array_total1[9] += $row_donhang['soluong'];
            }
             elseif ($result_date_compele[1] == "11") {
                $array_total1[10] += $row_donhang['soluong'];
            }
             else{
                $array_total1[10] += $row_donhang['soluong'];
            }
			}
		}

?>
<div class="content-wrapper" style="min-height: 365px">	
	<div class="container">
		<div class="row" style="margin-top:30px">
			<!-- /.col -->
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-danger elevation-1"><a href="xulydonhang.php"><i class="fas fa-shopping-cart"></i></a></span>

					<div class="info-box-content">
						<span class="info-box-text">Đơn Hàng Chưa Xử Lý</span>
						<?php
							$sql_cxl = mysqli_query($connect,"SELECT tinhtrang,count(DISTINCT madonhang) as madonhang FROM `tbl_order` WHERE tinhtrang='0' ");
							$row_cxl = mysqli_fetch_assoc($sql_cxl);
							$tinhtrang_cxl = $row_cxl['madonhang'];			    
						?>
						<span class="info-box-number"><?php echo $tinhtrang_cxl ?></span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box">
					<span class="info-box-icon bg-info elevation-1"><a href="xulydonhang.php"><i class="fas fa-shopping-cart"></i></a></span>
					<div class="info-box-content">
						<span class="info-box-text">ĐH Đang Vận Chuyển</span>
						<?php
							$sql_dxl = mysqli_query($connect,"SELECT tinhtrang,count(DISTINCT madonhang) as madonhang FROM `tbl_order` WHERE tinhtrang='1' ");
							$row_dxl = mysqli_fetch_assoc($sql_dxl);
							$tinhtrang_dxl = $row_dxl['madonhang'];		    
						?>
						<span class="info-box-number"><?php echo $tinhtrang_dxl ?></span>
					</div>
				<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>

			<!-- fix for small devices only -->
			<div class="clearfix hidden-md-up"></div>

			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-success elevation-1"><a href="xulydonhang.php"><i class="fas fa-shopping-cart"></i></a></span>

					<div class="info-box-content">
						<span class="info-box-text">Đơn Hàng Thành Công</span>
						<?php
							$sql_dnh = mysqli_query($connect,"SELECT tinhtrang,count(DISTINCT madonhang) as madonhang FROM `tbl_order` WHERE tinhtrang='2' ");
							$row_dnh = mysqli_fetch_assoc($sql_dnh);
							$tinhtrang_dnh = $row_dnh['madonhang'];		    
						?>
						<span class="info-box-number"><?php echo $tinhtrang_dnh ?></span>
					</div>
					<!-- /.info-box-content -->
					</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box mb-3">
				<span class="info-box-icon bg-warning elevation-1"><a href="xulykhachhang.php"><i class="fas fa-users"></i></a></span>

				<div class="info-box-content">
					<span class="info-box-text">Khách Hàng</span>
					<?php 
					$sql_lay_kh = mysqli_query($connect,"SELECT count(khachhang_id) as khachhang_id FROM tbl_customer");
					$row = mysqli_fetch_array($sql_lay_kh);
					$total = $row["khachhang_id"];
					?>
					<span class="info-box-number"><?php echo $total ?></span>
				</div>
				<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			</div>		
			<h4 id="header">
				<strong >DOANH THU TỪNG THÁNG</strong>
				<small class="text-muted">Tháng 1 2020 - Tháng 12 2020</small>
			</h4>
			
			<div class="row m-b-1">
				<div class="col-lg-12">
					<div class="card shadow">
						<h4 class="card-header">Tổng Doanh Thu: <span class="tag tag-success" id="revenue-tag"><?php  echo number_format($tongdoanhthu).' vnđ'; ?></span></h4>
						<div class="card-block">
							<div id="revenue-column-chart"></div>
						</div>
					</div>
				</div>
			</div> <!-- row -->

			<div class="row m-b-1">
				<div class="col-lg-12">
					<div class="card shadow">
						<h4 class="card-header">ĐƠN ĐẶT HÀNG</h4>
						<div class="card-block">
							<div id="orders-spline-chart"></div>
						</div>
					</div>
				</div>
			</div>


			<div class="col-lg-12">
				<div class="card">
					<div class="card-header border-0">
						<h3 class="card-title">SẢN PHẨM</h3>
						<div class="card-tools">
						<a href="#" class="btn btn-tool btn-sm">
							<i class="fas fa-download"></i>
						</a>
						<a href="#" class="btn btn-tool btn-sm">
							<i class="fas fa-bars"></i>
						</a>
						</div>
					</div>
					<div class="card-body table-responsive p-0">
						<table class="table table-striped table-valign-middle">
							<thead class="text-center">
								<tr>
									<th>Thứ tự</th>
									<th>Sản phẩm</th>
									<th>Số lượng còn trong kho( Còn Tươi)</th>
									<th>Số lượng đã bán</th>
									<th>Tiền thu</th>
								</tr>
							</thead>
							<tbody class="text-center">
							<?php
							$lay_sl_sp = mysqli_query($connect,"SELECT sum(soluong) as soluong,sanpham_name,sanpham_soluong,sanpham_giakm,tinhtrang FROM tbl_order,tbl_product WHERE tbl_order.sanpham_id = tbl_product.sanpham_id AND tbl_order.tinhtrang='2' GROUP BY tbl_product.sanpham_id");							
							$i=0;
							$pricesp = 0;
							$tongthu = 0;
							$tongslmua = 0;
							while ($row_sl_sp = mysqli_fetch_assoc($lay_sl_sp)) {
								$i++;
								$pricesp = $row_sl_sp["soluong"]* $row_sl_sp["sanpham_giakm"];
								$tongthu += $pricesp; 
								$tongslmua += $row_sl_sp["soluong"];
								?>
								<tr>
									<td>
										<?php echo $i;?>
									</td>
									<td>
										<?php echo $row_sl_sp["sanpham_name"]; ?>
									</td>
									<td>
										<?php echo $row_sl_sp["sanpham_soluong"]; ?>
									</td>
									<td>
										<?php echo $row_sl_sp["soluong"] ?>
									</td>
									<td><?php echo number_format($pricesp).' vnđ'; ?></td>
								<?php 
								}
								?>
								</tr>
								<tr>
									<td colspan="3">
									</td>
									<td colspan="1">
										Tổng số lượng đã bán: <?php echo $tongslmua?>
									</td>
									<td colspan="1">
										Tổng tiền thu: <?php echo number_format($tongthu).' vnđ'; ?>
									</td>
								</tr>
							</tbody>
							
						</table>
					</div>
				</div>
			</div>
			</div> <!-- row -->
		</div> 
		<!-- container -->

</div>
<?php
    require_once ("footer.php");
?>