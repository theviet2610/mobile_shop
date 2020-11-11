<?php
if(!defined('TEAMPLATE')){
    die ('Bạn không có quyền truy cập file này !');
}
?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách sản phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách sản phẩm</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="index.php?page_layout=add_product" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
            </a>
        </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table 
                            data-toolbar="#toolbar"
                            data-toggle="table">

						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true">ID</th>
						        <th data-field="name"  data-sortable="true">Tên sản phẩm</th>
                                <th data-field="price" data-sortable="true">Giá</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Trạng thái</th>
                                <th>Danh mục</th>
                                <th>Hành động</th>
						    </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Giải thuật phân trang
                                if(isset($_GET["page"])){
                                $page = $_GET["page"];
                                }
                                else
                                {
                                $page = 1;
                                }
                                $rows_per_page = 5;
                                $per_row = $page*$rows_per_page- $rows_per_page;

                                //Giải thuật tạo trang phân trang
                                $total_pages = ceil(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM product"))/$rows_per_page);

                                $list_page = "";

                                // Page Preview
                                $page_prev = $page - 1;
                                if($page_prev <=0){
                                $page_prev = 1;
                                }
                                $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&page='.$page_prev.'">&laquo;</a></li>';

                                for($i=1;$i<=$total_pages;$i++){
                                    $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&page='.$i.'">'.$i.'</a></li>';

                                }

                                $page_next = $page + 1;
                                if($page_next > $total_pages){
                                $page_next = $total_pages;
                                }
                                $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&page='.$page_next.'">&raquo;</a></li>';

                                $sql = "SELECT * FROM product
                                        INNER JOIN category
                                        ON product.cat_id = category.cat_id
                                        ORDER BY prd_id DESC
                                        LIMIT $per_row, $rows_per_page";
                                $query = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_array($query)){
                                   
                                ?>
                                    <tr>
                                        <td style=""><?php echo $row["prd_id"]; ?></td>
                                        <td style=""><?php echo $row["prd_name"]; ?></td>
                                        <td style=""><?php echo formatPrice($row["prd_price"]); ?>vnd</td>
                                        <td style="text-align: center"><img width="130" height="180" src="img/product/<?php echo $row["prd_image"] ;?>" /></td>
                                        <td><span class="label label-<?php if($row["prd_status"] == 1) {
                                            echo "success";
                                        } else {
                                            echo "danger";
                                        }
                                         ?>">
                                         <?php if($row["prd_status"] == 1) {
                                            echo "Còn Hàng";
                                        } else {
                                            echo "Hết Hàng";
                                        }
                                         ?>
                                             
                                         </span></td>
                                        <td>Danh mục số 1</td>
                                        <td class="form-group">
                                            <a href="index.php?page_layout=edit_product&prd_id=<?php echo $row['prd_id']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a href="die_product.php?prd_id=<?php echo $row['prd_id']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                   
                                 </tbody>
						</table>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php
                                echo $list_page;
                                ?>
                            </ul>
                        </nav>
                    </div>
				</div>
			</div>
		</div><!--/.row-->	
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>	
