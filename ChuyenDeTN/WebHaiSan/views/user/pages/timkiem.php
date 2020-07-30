<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
   <div class="container py-xl-4 py-lg-2">
      <div class="row">
         <!-- product left -->
         <div class="agileinfo-ads-display col-lg-9">
            <div class="wrapper">
               <!-- first section -->
               <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                  <div class="row">
                     <?php
                        // Nếu người dùng submit form thì thực hiện
                        if (isset($_POST["search_button"])) 
                            {
                                 // Gán hàm addslashes để chống sql injection
                                $search = addslashes($_POST['search']);
                        
                                // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
                                if (empty($search)) {
                                    echo "Yêu cầu nhập dữ liệu vào ô trống";
                                    } 
                                    else
                                    {
                                        // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                                    $sql= mysqli_query($connect,"SELECT * FROM tbl_product WHERE sanpham_name LIKE '%$search%'");
                                    // Đếm số đong trả về trong sql.
                                    $num = mysqli_num_rows($sql);
                                    // Nếu có kết quả thì hiển thị  , ngược lại thì thông báo không tìm thấy kết quả 
                                    if ($num > 0 && $search != "") {
                                        // Dùng $num để đếm số dòng trả về.
                                    ?>
                     <!-- tittle heading -->
                  </div>
                  <h4 style="text-align:center;font-weight:bold;color:red; font-family: Helvetica, Arial, sans-serif;">CÓ <?php echo $num ?> KẾT QUẢ TRẢ VỀ VỚI TỪ KHÓA: <?php echo $search ?></h4>
                  <!-- //tittle heading -->
                  <div class=row>
                     <?php
                        // echo "$num Kết quả trả về với từ khóa: <b> $search</b></br>";
                        // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                        while ($row_sanpham = mysqli_fetch_assoc($sql)) {
                        ?> 
                     <div class="col-md-4 product-men mt-5">
                        <div class="men-pro-item simpleCart_shelfItem">
                           <div class="men-thumb-item text-center">
                              <img src="./uploads/<?php echo $row_sanpham['sanpham_image'] ?>" alt="" height="350" width="200">
                              <div class="men-cart-pro">
                                 <div class="inner-men-cart-pro">
                                    <a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>" class="link-product-add-cart">Xem sản phẩm</a>
                                 </div>
                              </div>
                           </div>
                           <div class="item-info-product text-center border-top mt-4">
                              <h4 class="pt-1">
                                 <a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>"><?php echo $row_sanpham['sanpham_name'] ?></a>
                              </h4>
                              <div class="info-product-price my-2">
                                 <span class="item_price"><?php echo number_format($row_sanpham['sanpham_giakm']).'vnđ' ?></span></br>
                                 <del><?php echo number_format($row_sanpham['sanpham_gia']).'vnđ' ?></del>
                              </div>
                              <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                 <form action="?quanly=giohang" method="post">
                                    <fieldset>
                                       <input type="hidden" name="tensanpham" value="<?php echo $row_sanpham['sanpham_name'] ?>" />
                                       <input type="hidden" name="sanpham_id" value="<?php echo $row_sanpham['sanpham_id'] ?>" />
                                       <input type="hidden" name="giasanpham" value="<?php echo $row_sanpham['sanpham_gia'] ?>" />
                                       <input type="hidden" name="hinhanh" value="<?php echo $row_sanpham['sanpham_image'] ?>" />
                                       <input type="hidden" name="soluong" value="1" />			
                                       <input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" />
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php
                        }
                        }
                        
                        else {
                        ?>
                     <h6 style="text-align:center;font-weight:bold;color:red;font-size:20px;font-family: Helvetica, Arial, sans-serif;">Không Tìm Thấy Kết Quả!</h6>
                     <?php
                        }
                        }
                        }
                        ?>
                  </div>
               </div>
               <!-- first section -->
            </div>
         </div>
         <!--product left -->
         <!-- product right->
            <?php
               require_once ("./views/user/layouts/slidebar.php");      				
               ?>
            <!-- product right -->
      </div>
   </div>
</div>
<!-- //top products -->