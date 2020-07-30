<div class="row">
    <div class="col-md-12" style="  display: flex;justify-content: center;">
        <ul class="pagination">
                        <?php 
                        // PHẦN HIỂN THỊ PHÂN TRANG
                        // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                        
                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                        if ($current_page > 1 && $total_page > 1){
                        ?>
                        <li class="page-item"><?php echo '<a class="page-link" href="xulybaiviet.php?page='.($current_page-1).'">Previous</a>';?></li>
                        <?php	
                        }
                        ?>
                        <?php
                        // Lặp khoảng giữa
                        for ($i = 1; $i <= $total_page; $i++){
                            // Nếu là trang hiện tại thì hiển thị thẻ span
                            // ngược lại hiển thị thẻ a
                            if ($i == $current_page){
                                ?>
                            <li class="page-item"><a class="page-link" href="#"><?php  echo $i; ?></a></li>
                            <?php
                            }
                            else{
                            ?>
                            <li class="page-item">	<?php echo '<a  class="page-link" href="xulybaiviet.php?page='.$i.'">'.$i.'</a>'; ?></li>
                            <?php
                            }
                        }
            
                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                        if ($current_page < $total_page && $total_page > 1){
                        ?>	
                            <li class="page-item"> <?php echo '<a class="page-link"  href="xulybaiviet.php?page='.($current_page+1).'">Next</a> '; ?> </li>
                        <?php
                        }
                        ?>
        </ul>
    </div>
</div>