<?php
if(!defined('TEAMPLATE')){
    die ('Bạn không có quyền truy cập file này !');
}
?>

<link href="css/bootstrap-table.css" rel="stylesheet">

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách thành viên</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách thành viên</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="thanhvien-add.html" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
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
						        <th data-field="name"  data-sortable="true">Họ & Tên</th>
                                <th data-field="price" data-sortable="true">Email</th>
                                <th>Quyền</th>
                                <th>Hành động</th>
						    </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($_GET["page"])) {
                                            $page = $_GET["page"];
                                        } else {
                                            $page = 1;
                                        }
                                        $rows_per_page = 2;
                                        $per_rows = $page*$rows_per_page - $rows_per_page;

                                        $total_pages = ceil(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user"))/$rows_per_page);

                                        $list_page = "";

                                        $page_prev = $page - 1;
                                        if ($page_prev <=0) {
                                            $page_prev = 1;
                                        }
                                        $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=user&page='.$page_prev.'">&laquo;</a></li>';
                                        
                                        for($i=1;$i<=$total_pages;$i++){
                                            $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=user&page='.$i.'">'.$i.'</a></li>';

                                            }
                                        $page_next = $page + 1;
                                        if ($page_next > $total_pages) {
                                            $page_next = $total_pages;
                                        }
                                        $list_page .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=user&page='.$page_next.'">&raquo;</a></li>';

                                $sql = "SELECT * FROM user
                                        LIMIT $per_rows, $rows_per_page";
                                $query = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_array($query)){
                                   
                                ?>
                                <tr>
                                    <td style=""><?php echo $row["user_id"]; ?></td>
                                    <td style=""><?php echo $row["user_full"]; ?></td>
                                    <td style=""><?php echo $row["user_mail"]; ?></td>
                                    <td><span class="label label-<?php if($row["user_level"] == 1) {
                                            echo "success";
                                        } else {
                                            echo "danger";
                                        }
                                         ?>">
                                         <?php if($row["user_level"] == 1) {
                                            echo "Admin";
                                        } else {
                                            echo "User";
                                        }
                                         ?>
                                            </span></td>
                                    <td class="form-group">
                                        <a href="thanhvien-edit.html" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a href="/" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
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

