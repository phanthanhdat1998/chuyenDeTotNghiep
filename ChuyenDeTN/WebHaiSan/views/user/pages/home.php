<div class="wrapper">
   <div class="header">
      <!-- Main menu -->
      <nav class="navbar-main">
         <div id="mb_mainnav">
            <div class="container">
               <div class="row">
                  <div class="col-md-3 col-sm-12 col-xs-12 vertical_menu">
                     <div id="mb_verticle_menu" class="menu-quick-select">
                        <div class="title_block">
                           <span>Danh mục sản phẩm</span>
                           <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                        <div id="menuverti" class="block_content navbar_menuvertical">
                           <ul class="nav_verticalmenu" style="margin:0 auto">
                              <?php  
                              $sql_cate_home = mysqli_query($connect,"SELECT * FROM tbl_category ORDER BY category_id ASC");
                              while($row_cate_home = mysqli_fetch_array($sql_cate_home)){ 
                              ?>
                              <li class="level0"><a class="" href="index.php?quanly=danhmuc&id=<?php echo $row_cate_home["category_id"] ?>"><img class="" src="" alt=""> <span style="padding-left:50px"><?php echo $row_cate_home["category_name"] ?></span></a></li>
                              <?php 
                              }
                              ?>
                              <li class="level0"><a class="" href=""><img class="" src="" alt=""> <span style="padding-left:45px">Sản phẩm khác</span></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <nav class="col-md-9 col-sm-12 col-xs-12 menu-header-10">
                     <ul class="menu-header-10-1">
                        <li>
                            <a href="?quanly=index"><span>Trang chủ</span></a>
                        </li>
                        <li>
                            <a href="?quanly=lienhe"><span>Giới thiệu</span></a>
                        </li>
                        <li>
                            <a href="#"><span>Sản phẩm</span></a>
                        </li>
                        <li>
                            <a href="?quanly=tintuc"><span>Tin tức</span></a>
                        </li>
                        <li>
                            <a href="?quanly=giohang"><span>Giỏ hàng</span></a>
                        </li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
      </nav>
   </div>
    <div class="slideshow">
      <div class="container">
         <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-9 ">
               <div class="homeslider">
               <div class="container" style=" padding-right: 0px;">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselId" data-slide-to="<?php $dem=0; ?>" class="active"></li>
                        <li data-target="#carouselId" data-slide-to="1"></li>
                        <li data-target="#carouselId" data-slide-to="2"></li>
                    </ol>
                    <div class="row banner">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width: 100%; ">
                            <div class="carousel-inner">
                            <?php
                                $sql_slider = mysqli_query($connect,"SELECT * FROM tbl_slider WHERE slider_active='1' ORDER BY slider_id");
                                while($row_slider = mysqli_fetch_array($sql_slider)){ 
                                ?>
                                <?php
                                    if($dem==0) {
                                        ?>
                                <div class="carousel-item active">    
                                <?php        
                                    }else{
                                ?>
                                    <div class="carousel-item">  
                                <?php
                                    }
                                ?>
                                <img class="d-block w-100" style="width: 100%" src="./uploads/<?php echo $row_slider["slider_image"] ?>" alt="First slide">
                                <?php $dem++; ?>
                                </div>
                                <?php
                                } 
                                ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="adv">
    <section id="service">
        <div class="container m-b-30">
            <div class="row">
                <div id="service_home" class="col-lg-12 clearfix" style="display:flex;margin:auto;margin-top:20px">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 col-xxs-12 text-center m-b-xs-10">
                    <div class="service_item">
                        <div class="icon icon_product">
                            <img src="http://seafoodtd.runtime.vn/assets/100004/images/icon_1.png?v=582" alt="">
                        </div>
                        <div class="description_icon">
                            <span class="large-text">
                            Miễn phí giao hàng
                            </span>
                            <span class="small-text">
                            Cho hóa đơn từ 450,000đ
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 col-xxs-12 text-center m-b-xs-10">
                    <div class="service_item">
                        <div class="icon icon_product">
                            <img src="http://seafoodtd.runtime.vn/assets/100004/images/icon_2.png?v=582" alt="">
                        </div>
                        <div class="description_icon">
                            <span class="large-text">
                            Giao hàng trong ngày
                            </span>
                            <span class="small-text">
                            Với tất cả đơn hàng
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center m-b-xs-10">
                    <div class="service_item">
                        <div class="icon icon_product">
                            <img src="http://seafoodtd.runtime.vn/assets/100004/images/icon_3.png?v=582" alt="">
                        </div>
                        <div class="description_icon">
                            <span class="large-text">
                            Sản phẩm an toàn
                            </span>
                            <span class="small-text">
                            Cam kết chất lượng
                            </span>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!--Begin-->
    <!--End-->
    </div>
</div>
<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
        HẢI SẢN BÁN CHẠY</h3>
        <!-- //tittle heading -->
        <div class="row">
            <!-- product left -->
            <div class="agileinfo-ads-display col-lg-9">
                <div class="wrapper">
                <?php
			        $sql_cate_home = mysqli_query($connect,"SELECT * FROM tbl_category ORDER BY category_id ASC");
			        while($row_cate_home = mysqli_fetch_array($sql_cate_home)){ 
                        $id_category = $row_cate_home['category_id'];
			        ?>
                    <!-- first section -->
                    <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                        <h3 class="heading-tittle text-center font-italic"><?php echo $row_cate_home["category_name"]; ?></h3>
                        <div class="row">
                            <?php
                                $sql_product = mysqli_query($connect,"SELECT * FROM tbl_product ORDER BY sanpham_id DESC");
                                 while($row_product = mysqli_fetch_array($sql_product)){
                                    if($row_product['category_id']==$id_category){ 
                             ?>
                            <div class="col-md-4 product-men mt-5">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item text-center">
                                        <img src="./uploads/<?php echo $row_product["sanpham_image"]; ?>" alt="" height="350" width="250">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="?quanly=chitietsp&id=<?php echo $row_product["sanpham_id"]?>"class="link-product-add-cart">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info-product text-center border-top mt-4">
                                        <h4 class="pt-1">
                                            <a href="?quanly=chitietsp&id=<?php echo $row_product["sanpham_id"]?>"> <?php echo $row_product["sanpham_name"]; ?></a>
                                        </h4>
                                        <div class="info-product-price my-2">
                                            <span class="item_price"><?php echo number_format($row_product['sanpham_giakm']).'vnđ' ?>/ 1Kg</span>
                                            <del><?php echo number_format($row_product['sanpham_gia']).'vnđ' ?></del>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                            <form action="?quanly=giohang" method="post">
                                                <fieldset>
									                <input type="hidden" name="sanpham_id" value="<?php echo $row_product['sanpham_id'] ?>" />
                                                    <input type="hidden" name="soluong" value="1" />
                                                    <button type="submit" name="themgiohang"  class="addtocart">Thêm Vào Giỏ <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>			
								                </fieldset>	
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    }    
                                }   
                             ?>
                        </div>
                    </div>
                    <!-- //first section -->
                <?php
                    }
                ?>
                </div>  
            </div>
            <!-- //product left -->
            <!-- product right -->
            <?php 
	            require_once "./views/user/layouts/slidebar.php";
                ?>
            <!-- //product right -->
        </div>
    </div>
</div>
<!-- //top products -->