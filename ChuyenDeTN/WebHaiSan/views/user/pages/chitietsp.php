<?php
   if(isset($_GET['id'])){
   	$id = $_GET['id'];
   }else{
   	$id = '';
   }
   $sql_chitiet = mysqli_query($connect,"SELECT * FROM tbl_product WHERE sanpham_id='$id' "); 
   ?>
<!-- page -->
<div class="services-breadcrumb">
   <div class="agile_inner_breadcrumb">
      <div class="container">
         <ul class="w3_short">
            <li>
               <a href="index.php">Trang Chủ</a>
               <i>|</i>
            </li>
            <li>
               <a href="#">Chi Tiết sản phẩm</a>
            </li>
         </ul>
      </div>
   </div>
</div>
<!-- //page -->
<!-- Trang Chi tiết Sản Phẩm -->
<?php
   while($row_chitiet = mysqli_fetch_array($sql_chitiet)){
   	$motasp = $row_chitiet['sanpham_mota'];
   	$productName = $row_chitiet['sanpham_name'];
   ?>
<!-- Trang mô tả sản phẩm -->
<div class="wrapper">
   <div id="product">
      <div class="main">
         <div class="container">
            <div class="row" style="margin-top:15px">
               <div class="col-md-9">
                  <div class="clearfix">
                     <h4 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3" style="font-weight:bold">
                        CHI TIẾT SẢN PHẨM
                     </h4>
                     <!-- //tittle heading -->
                     <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 product-image clearfix">
                           <div class="grid images_3_of_2">
                              <div class="flexslider">
                                 <ul class="slides">
                                    <li data-thumb="./uploads/<?php echo $row_chitiet['sanpham_image'] ?>">
                                       <div class="thumb-image">
                                          <img src="./uploads/<?php echo $row_chitiet['sanpham_image'] ?>" class="img-fluid" alt="ảnh main"> 
                                       </div>
                                    </li>
                                    <li data-thumb="./uploads/<?php echo $row_chitiet['sanpham_image1'] ?>">
                                       <div class="thumb-image">
                                          <img src="./uploads/<?php echo $row_chitiet['sanpham_image1'] ?>" class="img-fluid" alt="ảnh chi tiết 1">
                                       </div>
                                    </li>
                                    <li data-thumb="./uploads/<?php echo $row_chitiet['sanpham_image2'] ?>">
                                       <div class="thumb-image">
                                          <img src="./uploads/<?php echo $row_chitiet['sanpham_image2'] ?>" class="img-fluid" alt="ảnh chi tiết 2">
                                       </div>
                                    </li>
                                 </ul>
                                 <div class="clearfix"></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 clearfix">
                           <div class="promotion_text">GIẢM 5% TỔNG BILL ONLINE - Duy nhất ngày Hội thành viên - Ngày 25 hằng tháng</div>
                           <h3 class="mb-3"><?php echo $row_chitiet['sanpham_name'] ?></h3>
                           <p class="mb-3">
                              <span class="item_price"><?php echo number_format($row_chitiet['sanpham_giakm']).'vnđ'?>/ 1Kg</span>
                              <del class="mx-2 font-weight-light"><?php echo number_format($row_chitiet['sanpham_gia']).'vnđ' ?></del>
                              <label style="color:blue">Free Giao Hàng</label>
                           </p>
                           <div class="single-infoagile">
                              <ul>
                                 <li class="mb-3">
                                    <?php echo $row_chitiet['sanpham_tomtat'] ?>
                                 </li>
                              </ul>
                           </div>
                           <div class="product-single-luuy">
                              Tôm, Cua có giá trị cao và dễ chết khi ở môi trường lạ quá lâu nên Thành Đạt chỉ nhận thanh toán hoặc cọc trước để nhận hàng. Thời gian qua có nhiều bạn đặt hàng mình xong không nhận mình thật sự rất buồn và mất rất nhiều tiền. Kính mong quý khách hàng hiểu và thông cảm cho mình. Riêng khách hàng tại Nha Trang có thể cọc trước 200k -500k và thanh toán số còn lại khi nhận hàng
                           </div>
                           <?php if ($row_chitiet['sanpham_soluong']>0) {
                              ?>
                           <div class="occasion-cart">
                              <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                 <form action="?quanly=giohang" method="post">
                                    <fieldset>
                                       <input type="hidden" name="sanpham_id" value="<?php echo $row_chitiet['sanpham_id'] ?>"/>
                                       <div class="number">
                                          <span class="minus span-1"><i class="fa fa-minus"></i></span>
                                          <input class="clinput" min="1" max="5" type="number" name="soluong" value="1"/>
                                          <span class="plus span-1"><i class="fa fa-plus"></i></span>
                                       </div>
                                       <div class="btn-chitiet">
                                          <button type="submit" class="btn-addcard btn btn-danger" name="themgiohang"><span class="fas fa-shopping-cart" style="padding-right:10px"></span>chọn mua</button>
                                          <?php
                                          if(isset( $_SESSION['khachhang_id'] )){
                                          ?>
                                          <button class="like btn btn-default" type="submit"><span class="fa fa-heart"></span></button>  
                                          <?php
                                          }else{
                                             ?>
                                          <button class="like btn btn-default" type="button" onclick="canDanhNhap()"><span class="fa fa-heart"></span></button>

                                          <script>
                                          function canDanhNhap() {
                                          alert("Bạn cần đăng nhập để thích sản phẩm!");
                                          }
                                          </script> 
                                          <?php
                                          }
                                          ?>
                                          
                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                           <?php
                              }else{
                              ?>
                           <div class="occasion-cart">
                              <button class="btn btn-warning" type="submit" style="font-weight:bold;color:white" disabled="disabled"> SẢN PHẨM TẠM THỜI HẾT HÀNG</button>
                              </di>
                              <?php
                                 }
                                 ?>
                           </div>
                        </div>
                     </div>
                     <div role="tabpanel" class="product_description product-tabs panel-group" style="margin-top:10px">
                        <ul class="nav nav-tabs" role="tablist">
                           <!-- ngRepeat: item in ProductTabs -->
                           <li role="presentation" ng-class="{'active':$index==0}" ng-repeat="item in ProductTabs" class="ng-scope active">
                              <a data-toggle="tab" href="#tab1" role="tab" class="ng-binding">Chi tiết sản phẩm</a>
                           </li>
                           <!-- end ngRepeat: item in ProductTabs -->
                        </ul>
                        <div class="tab-content">
                           <!-- ngRepeat: item in ProductTabs -->
                           <div class="tab-pane active">
                              <div class="container-fluid">
                                 <p style="font-family: Roboto, sans-serif;color:black"><?php echo $row_chitiet['sanpham_mota'] ?></p>
                              </div>
                           </div>
                           <!-- end ngRepeat: item in ProductTabs -->
                        </div>
                     </div>
                     <?php
                        } 
                        $sql_laysp_lq = mysqli_query($connect,"SELECT * FROM tbl_product,tbl_category WHERE tbl_product.category_id = tbl_category.category_id ORDER BY tbl_product.category_id LIMIT 4");
                        ?>
                     <!--End-->
                     <div class="product-content product-other">
                        <h1 title="products" class="page_heading " style=" font-size: 24px;font-weight: 700;width:825px">
                           Sản phẩm liên quan
                        </h1>
                        <div class="product_list grid clearfix" style="display:flex;margin:auto">
                        <?php 
                        while ($row_laysp_hot = mysqli_fetch_assoc($sql_laysp_lq)) {
                           ?>
                           <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 product-wrapper zoomIn wow" style="visibility: visible; animation-name: zoomIn;">
                              <div class="product-block product-resize m-b-20 fixheight" style="height: 295px;">
                                 <div class="product-image image-resize" style="height: 208px;">
                                    <div class="sold-out">Hot</div>
                                    <a href="">
                                    <img class="first-img" src="./uploads/<?php echo $row_laysp_hot['sanpham_image'] ?>" width=100% alt="">
                                    </a>
                                    <div class="product-actions hidden-xs">
                                       <div class="btn-add-to-cart">
                                          <a href=""><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                       </div>
                                       <div class="btn_quickview">
                                          <a class="quickview" href="index.php?quanly=chitietsp&id=<?php echo $row_laysp_hot['sanpham_id'] ?>" title=""><i class="fa fa-eye"></i></a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="product-info text-center m-t-xxs-20">
                                    <h3 class="pro-name">
                                       <a href="index.php?quanly=chitietsp&id=<?php echo $row_laysp_hot['sanpham_id'] ?>" title=""><?php echo $row_laysp_hot['sanpham_name'] ?></a>
                                    </h3>
                                    <div class="pro-prices">
                                       <span class="pro-price"><?php echo $row_laysp_hot['sanpham_giakm'] ?>&nbsp;₫</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php
                           }
                           ?>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="menu-product">
                        <h3>
                           <span>
                           Sản phẩm
                           </span>
                        </h3>
                        <ul class="level0">
                           <?php
                              $sql_cate_home = mysqli_query($connect,"SELECT * FROM tbl_category ORDER BY category_id ASC");
                              while($row_cate_home = mysqli_fetch_array($sql_cate_home)){ 
                                       $id_category = $row_cate_home['category_id'];
                              ?>
                           <li class="child">
                              <span><a href="?quanly=danhmuc&id=<?php echo $row_cate_home["category_id"]?>"><i class="fa fa-arrow-circle-right"></i><?php echo $row_cate_home["category_name"]; ?></a></span><span class="open-close"><i class="fa fa-angle-down"></i></span>
                              <ul class="level1 hidden-xs">
                                 <?php
                                    $sql_product = mysqli_query($connect,"SELECT * FROM tbl_product ORDER BY sanpham_id DESC");
                                    while($row_product = mysqli_fetch_array($sql_product)){
                                       if($row_product['category_id']==$id_category){ 
                                    ?>
                                 <li><span><a href="?quanly=chitietsp&id=<?php echo $row_product["sanpham_id"]?>"><i class="fa fa-check"></i><?php echo $row_product["sanpham_name"]; ?></a></span></li>
                                 <?php
                                    }    
                                    }   
                                    ?>
                              </ul>
                           </li>
                           </li>
                           <?php
                              }
                              ?>
                        </ul>
                     </div>
                     <script type="text/javascript">
                        $(document).ready(function () {
                           $('.menu-product li.child .open-close').on('click', function () {
                              $(this).removeAttr('href');
                              var element = $(this).parent('li');
                              if (element.hasClass('open')) {
                                    element.removeClass('open');
                                    element.children('ul').slideUp();
                              }
                              else {
                                    element.addClass('open');
                                    element.children('ul').slideDown();
                              }
                           });
                        });
                     </script>
                     <!--Begin-->
                     <div class="box-sale-policy ng-scope" ng-controller="moduleController" ng-init="initSalePolicyController('Shop')">
                        <h3><span>Chính sách bán hàng</span></h3>
                        <div class="sale-policy-block">
                           <ul>
                              <li>Giao hàng TOÀN QUỐC</li>
                              <li>Thanh toán khi nhận hàng</li>
                              <li>Đổi trả trong <span>15 ngày</span></li>
                              <li>Hoàn ngay tiền mặt</li>
                              <li>Chất lượng đảm bảo</li>
                              <li>Miễn phí vận chuyển:<span>Đơn hàng từ 3 món trở lên</span></li>
                           </ul>
                        </div>
                        <div class="buy-guide">
                           <h3>Hướng Dẫn Mua Hàng</h3>
                           <ul>
                              <li>
                                 Mua hàng trực tiếp tại website
                                 <b class="ng-binding"> http://seafoodtd.vn</b>
                              </li>
                              <li>
                                 Gọi điện thoại <strong class="ng-binding">
                                 0369203094
                                 </strong> để mua hàng
                              </li>
                              <li>
                                 Mua tại Trung tâm CSKH:<br>
                                 <strong class="ng-binding">02 Hòn Chồng Nha Trang Khánh Hòa Việt Nam</strong>
                                 <a href="/ban-do.html" rel="nofollow" target="_blank">Xem Bản Đồ</a>
                              </li>
                              <li>
                                 Mua sỉ/buôn xin gọi <strong class="ng-binding">
                                 0369203094
                                 </strong> để được
                                 hỗ trợ.
                              </li>
                           </ul>
                        </div>
                     </div>
                     <!--End-->
                     <div class="box-product widget_block_sidebar" style="margin-top:10px">
                        <div class="title_product_related widget_title_sidebar">
                           <h3>
                              Sản phẩm Hot
                           </h3>
                        </div>
                        <ul class="list_product_related widget_list_sidebar clearfix">
                           <li class="pro-loop clearfix">
                              <div class="row">
                                 <?php
                                    $sql_product_slidebar = mysqli_query($connect,"SELECT * FROM tbl_product WHERE sanpham_hot='1' ORDER BY sanpham_id");
                                    while($row_product_slidebar= mysqli_fetch_array($sql_product_slidebar)){
                                    ?>
                                 <div class="col-md-5 col-sm-5 col-xs-5"  style="margin-bottom:9px">
                                    <a href="#" title="<?php echo $row_product_slidebar["sanpham_name"]?>">
                                    <img class="first-img" src="./uploads/<?php echo $row_product_slidebar["sanpham_image"]?>" alt="<?php echo $row_product_slidebar["sanpham_name"]?>">
                                    </a>
                                 </div>
                                 <div class="col-md-7 col-sm-7 col-xs-7">
                                    <a href="#" title="">
                                       <h3 class="product_related_name">
                                          <?php echo $row_product_slidebar["sanpham_name"]?>
                                       </h3>
                                       <p class="product_related_price">
                                          <span class="product_related_price"><?php echo number_format($row_product_slidebar["sanpham_giakm"]).'vnđ' ?></span>
                                       </p>
                                    </a>
                                 </div>
                                 <?php
                                    }
                                    ?>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Kết thúc trang mô tả sản phẩm -->
<?php
   if(isset($_POST['guibinhluan'])){
   	$noidungbl = $_POST['fRContent'];
   	$namebluan = $_POST['namebinhluan'];
   	$evaluate = $_POST['evaluate'];
   	$sql_insert_binhluan = mysqli_query($connect,"INSERT INTO `tbl_comment`(`binhluan_nd`, `khachhang_id`, `sanpham_id`, `binhluan_date`,`evaluate`) VALUES ('$noidungbl','$namebluan','$id','$evaluate')");
   }
   ?>
<!-- middle section -->
<?php 
   //Get All comment
   $getAllComment = mysqli_query($connect,"SELECT * FROM tbl_comment,tbl_product,tbl_customer WHERE tbl_comment.sanpham_id = tbl_product.sanpham_id AND tbl_comment.khachhang_id = tbl_customer.khachhang_id AND tbl_comment.sanpham_id='$id' ORDER BY tbl_comment.binhluan_id DESC");
   
   $row_get_sao = mysqli_fetch_assoc($getAllComment);
   
   if(!empty($row_get_sao)) {
   	$total_star = 0;
   	$soLuongComment = 0;
   	$namSaos = 0;
   	$bonSaos = 0;
   	$baSaos = 0;
   	$haiSaos = 0;
   	$motSaos = 0;
   	$medium = 0;
   }
   else{
   	$total_star = 0;
   	$soLuongComment = 0;
   	$namSaos = 0;
   	$bonSaos = 0;
   	$baSaos = 0;
   	$haiSaos = 0;
   	$motSaos = 0;
   	$medium = 0;
   	while ($result_comment = mysqli_fetch_assoc($getAllComment)) {
   	  $soLuongComment++;
   	  $total_star += $result_comment['evaluate'];
   	  if ($result_comment['evaluate'] == 1) {
   		$motSaos++;
   	  } else if ($result_comment['evaluate'] == 2) {
   		$haiSaos++;
   	  } else if ($result_comment['evaluate'] == 3) {
   		$baSaos++;
   	  } else if ($result_comment['evaluate'] == 4) {
   		$bonSaos++;
   	  } else {
   		$namSaos++;
   	  }
   	}
   	$medium = $total_star;
   }		  
   ?>
<?php
   if(isset($_SESSION['dangnhap_home'])){
   ?>
<div class="container">
   <div class="comment span_1_of_2">
      <div class="productNear">
         <h4 class="title_productNear" style="padding:20px">Đánh giá <?php echo $productName ?></h4>
      </div>
      <div class="toprt">
         <div class="crt">
            <div class="lcrt ">
               <b><?php echo $medium ?> <i class="fa fa-star"></i></b>
            </div>
            <div class="rcrt">
               <div class="r">
                  <span class="t">5 <i class="fa fa-star"></i></span>
                  <div class="bgb">
                     <div class="bgb-in" style="width: <?php echo $namSaos * 100 / $soLuongComment."%" ?>"></div>
                  </div>
                  <span class="c" onclick="ratingCmtList(1,5)" data-buy="26"><strong><?php echo $namSaos ?></strong> đánh giá</span>
               </div>
               <div class="r">
                  <span class="t">4 <i class="fa fa-star"></i></span>
                  <div class="bgb">
                     <div class="bgb-in" style="width: <?php echo $bonSaos * 100 / $soLuongComment."%" ?>"></div>
                  </div>
                  <span class="c" onclick="ratingCmtList(1,4)" data-buy="8"><strong><?php echo $bonSaos ?></strong> đánh giá</span>
               </div>
               <div class="r">
                  <span class="t">3 <i class="fa fa-star"></i></span>
                  <div class="bgb">
                     <div class="bgb-in" style="width: <?php echo $baSaos * 100 / $soLuongComment."%" ?>"></div>
                  </div>
                  <span class="c" onclick="ratingCmtList(1,3)" data-buy="3"><strong><?php echo $baSaos ?></strong> đánh giá</span>
               </div>
               <div class="r">
                  <span class="t">2 <i class="fa fa-star"></i></span>
                  <div class="bgb">
                     <div class="bgb-in" style="width: <?php echo $haiSaos * 100 / $soLuongComment."%" ?>"></div>
                  </div>
                  <span class="c" onclick="ratingCmtList(1,2)" data-buy="2">
                  <strong><?php echo $haiSaos ?></strong> đánh giá
                  </span>
               </div>
               <div class="r">
                  <span class="t">1 <i class="fa fa-star"></i></span>
                  <div class="bgb">
                     <div class="bgb-in" style="width: <?php echo $motSaos * 100 / $soLuongComment."%" ?>">
                     </div>
                  </div>
                  <span class="c" onclick="ratingCmtList(1,1)" data-buy="1"><strong><?php echo $motSaos ?></strong> đánh giá</span>
               </div>
            </div>
            <div class="bcrt">
               <a href="javascript:danhGia()">Gửi đánh giá của bạn</a>
            </div>
         </div>
         <div class="clr"></div>
         <form action="" method="POST" class="input hide" name="fRatingComment" enctype="multipart/form-data">
            <input type="hidden" name="hdfStar" id="hdfStar" value="5" />
            <input type="hidden" name="hdfProductID" id="hdfProductID" value="190321" />
            <input type="hidden" name="hdfRatingImg" class="hdfRatingImg" />
            <input type="hidden" name="namebinhluan" value="<?php echo $_SESSION['khachhang_id']; ?>"></br>
            <div class="ips">
               <span>Chọn đánh giá của bạn</span>
               <span class="lStar">
               <i id="i1" class="fa fa-star" onmouseover="content(1)"></i>
               <i id="i2" class="fa fa-star" onmouseover="content(2)"></i>
               <i id="i3" class="fa fa-star" onmouseover="content(3)"></i>
               <i id="i4" class="fa fa-star" onmouseover="content(4)"></i>
               <i id="i5" class="fa fa-star" onmouseover="content(5)"></i>
               </span>
               <input id="evaluate" type="number" name="evaluate" value="5" class="hide">
               <span id="content" class="rsStar hide"></span>
            </div>
            <div class="clr"></div>
            <div class="ipt ">
               <div class="ct">
                  <textarea name="fRContent" placeholder="Nhập đánh giá về sản phẩm"></textarea>
                  <div class="extCt">
                     <!-- <label onclick="javascript:void(0);" class="lnksimg btnRatingUpload"><i class="fa fa-camera"></i>Đính kèm ảnh</label> -->
                     <span class="ckt"></span>
                     <input id="hdFileRatingUpload" type="file" name="hinhanh" accept="image/x-png, image/gif, image/jpeg" />
                  </div>
               </div>
               <div class="if">
                  <input class="report" type="submit" name="guibinhluan" value="GỬI ĐÁNH GIÁ" />
               </div>
               <div class="clr"></div>
               <ul class="resImg hide">
               </ul>
               <span class="lbMsgRt"></span>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- middle section -->
<?php
   }else{
   ?>
<!-- middle section -->
<div class="container">
   <div style="display:block;margin:auto;text-align:center;">
      <div class="row">
         <div class="col-lg-12">
            <h4 style="font-family:Courier New">Vui lòng đăng nhập để viết bình luận <i class="fas fa-pencil" aria-hidden="true"></i></h4>
         </div>
      </div>
   </div>
</div>
<!-- middle section -->
<?php
   }
   ?>
<div class="container" style="display:block;margin:auto;margin-left:100px;font-family:Courier New">
   <?php 
      if(isset($_SESSION['khachhang_id'])){
      ?>
      <button type="submit" class="btn btn-info">
         <a href="#" data-toggle="modal" data-target="#dangnhap" class="text-white"> Nhấn vào đây để đăng nhập</a>
      </button>
   </br>
   <?php 
      }else {
      ?>
      <a href="#" style="color:black; "> Nhận xét về sản phẩm</a>
   </br>
   <?php
      }
      ?>

   <?php
      if(isset($_GET['id'])){
      	$id = $_GET['id'];
      	$sql_laybl = mysqli_query($connect,"SELECT * FROM tbl_comment,tbl_product,tbl_customer WHERE tbl_comment.sanpham_id = tbl_product.sanpham_id AND tbl_comment.khachhang_id = tbl_customer.khachhang_id AND tbl_comment.sanpham_id = '$id' ORDER BY tbl_comment.binhluan_id DESC");
      }else{
      	echo"sai rồi em iu";
      }
      
      ?>
   <?php
      while ($row_laybl = mysqli_fetch_array($sql_laybl)) {
      	$_SESSION['binhluan_id'] = $row_laybl["binhluan_id"];
      ?>
   <h6 style="font-weight:bold;color:black"><?php echo $row_laybl["name"] ?></h6>
   <!-- <i class="fa fa-check" aria-hidden="true"></i> đã mua sản phẩm -->
   <p> Ngày đăng: <?php echo $row_laybl["binhluan_date"] ?> </p>
   <br/>
   <h6><?php echo $row_laybl["binhluan_nd"] ?></h6>
   </br>
   <p><img src="./uploads/<?php echo $row_laybl["hinhanh"] ?>" alt="" height="100" weight="80"></p>
   <br/>
   <?php
      }
      ?>
</div>