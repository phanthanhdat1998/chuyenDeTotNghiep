
<!-- product right -->
            <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
                <div class="side-bar p-sm-4 p-3">
                    <div class="agileits_search">
                        <h3 class="agileits-sear-head mb-3">Tìm Kiếm</h3>
                        <form class="form-inline" action="index.php?quanly=timkiem" method="POST">
                            <input class="form-control" type="text" name="search" placeholder="Tìm kiếm sản phẩm" required=""/>
                            <button class="form-control" name="search_button" type="submit">
                            <i class=" fas fa-search "></i>
                            </button>
                        </form>
                    </div>
                    <!-- price -->
                    <div class="range border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Giá</h3>
                        <div class="w3l-range">
                            <ul>
                                <li>
                                    <a href="#">Dưới 1 triệu</a>
                                </li>
                                <li>
                                    <a href="#">Dưới 2 triệu</a>
                                </li>
                                <li>
                                    <a href="#">Dưới 3 triệu</a>
                                </li>
                                <li>
                                    <a href="#">Trên 3 triệu</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- //price -->
                    <!-- reviews -->
                    <div class="customer-rev border-bottom left-side py-2">
                        <h3 class="agileits-sear-head mb-3">Khách hàng Reviews</h3>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>5.0</span><br>
                                </a>
                                <a href="#">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>4.0</span><br>
                                </a>
                                <a href="#">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>3.0</span><br>
                                </a>
                                <a href="#">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>2.0</span><br>
                                </a>
                                <a href="#">
                                    <i class="fas fa-star"></i>
                                    <span>1.0</span><br>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- //reviews -->
                    <!-- best seller -->
                    <div class="f-grid py-2" style="text-align:center">
                        <h3 class="agileits-sear-head mb-3">Hải Sản Bán Chạy</h3>
                        <div class="box-scroll">
                            <div class="scrosll">
                            <?php
                                $sql_product_slidebar = mysqli_query($connect,"SELECT * FROM tbl_product WHERE sanpham_hot='1' ORDER BY sanpham_id");
                                 while($row_product_slidebar= mysqli_fetch_array($sql_product_slidebar)){
                                ?>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12"><img src="./uploads/<?php echo $row_product_slidebar["sanpham_image"]?>" alt="" class="img-fluid"></div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a href="index.php?quanly=chitietsp&id=<?php echo $row_product_slidebar["sanpham_id"]?>" style="font-size:20px;font-weight:bold"><?php echo $row_product_slidebar["sanpham_name"]?></a>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a href="" class="price-mar mt-2"><?php echo number_format($row_product_slidebar["sanpham_giakm"]).'vnđ' ?> / 1kg</a>
                                            <del href="" class="price-mar mt-2"><?php echo number_format($row_product_slidebar["sanpham_gia"]).'vnđ' ?></del>
                                        </div>
                                    </div> 
                                </div>
                                <?php
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                    <!-- //best seller -->
                </div>
                <!-- //product right -->
            </div>