<?php

                    $sql = "SELECT * FROM product
                    		WHERE prd_featured = 1
                    		 ORDER BY prd_id DESC 
                    		 LIMIT 0,6";
                    $query = mysqli_query($conn, $sql);
?>
<div class="products">
                    <h3>Sản phẩm nổi bật</h3>
                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($query)){
                    if($i==0){
                    ?>
                    	<div class="product-list card-deck">
                    <?php
                    }
                    ?>
                    
                        <div class="product-item card text-center">
                            <a href="index.php?page_layout=product&prd_id=<?php echo $row["prd_id"]; ?>"><img src="admin/img/product/<?php echo $row["prd_image"] ;?>"></a>
                            <h4><a href="index.php?page_layout=product&prd_id=<?php echo $row["prd_id"]; ?>"><?php echo $row["prd_name"]; ?></a></h4>
                            <p>Giá Bán: <span><?php echo $row["prd_price"]; ?></span></p>
                        </div>
               		<?php
               		$i++;
               		if($i==3){
               			$i=0;
               			?>
               			</div>
               		<?php
               	}
               		?>
                    
                    <?php
	                   }
                    ?>
                </div>