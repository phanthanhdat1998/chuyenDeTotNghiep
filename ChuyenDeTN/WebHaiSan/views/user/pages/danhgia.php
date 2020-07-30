<?php
   $getAllComment = mysqli_query($connect,"SELECT * FROM tbl_binhluan,tbl_sanpham,tbl_khachhang WHERE tbl_binhluan.sanpham_id = tbl_sanpham.sanpham_id ORDER BY tbl_binhluan.binhluan_id");
   if( $getAllComment > 0) {
       $total_star = 0;
       $soLuongComment = 0;
       $namSaos = 0;
       $bonSaos = 0;
       $baSaos = 0;
       $haiSaos = 0;
       $motSaos = 0;
       while ($result_comment = mysqli_fetch_array($getAllComment)) {
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
       $medium = round($total_star / $soLuongComment, 1);
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
   }
   ?>
<div class="comment span_1_of_2">
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
               <span class="c" onclick="ratingCmtList(1,2)" data-buy="2"><strong><?php echo $haiSaos ?></strong> đánh giá</span>
            </div>
            <div class="r">
               <span class="t">1 <i class="fa fa-star"></i></span>
               <div class="bgb">
                  <div class="bgb-in" style="width: <?php echo $motSaos * 100 / $soLuongComment."%" ?>"></div>
               </div>
               <span class="c" onclick="ratingCmtList(1,1)" data-buy="1"><strong><?php echo $motSaos ?></strong> đánh giá</span>
            </div>
         </div>
         <div class="bcrt">
            <a href="javascript:danhGia()">Gửi đánh giá của bạn</a>
         </div>
      </div>
      <div class="clr"></div>
      <form action="" method="post" class="input hide" name="fRatingComment">
         <input type="hidden" name="hdfStar" id="hdfStar" value="5" />
         <input type="hidden" name="hdfProductID" id="hdfProductID" value="190321" />
         <input type="hidden" name="hdfRatingImg" class="hdfRatingImg" />
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
                  <label onclick="javascript:void(0);" class="lnksimg btnRatingUpload"><i class="fa fa-camera"></i>Đính kèm ảnh</label>
                  <span class="ckt"></span>
                  <input id="hdFileRatingUpload" type="file" class="hide" accept="image/x-png, image/gif, image/jpeg" />
               </div>
            </div>
            <div class="if">
               <input class="report" type="submit" name="submit-report" value="GỬI ĐÁNH GIÁ" />
            </div>
            <div class="clr"></div>
            <ul class="resImg hide">
            </ul>
            <span class="lbMsgRt"></span>
         </div>
      </form>
   </div>
</div>