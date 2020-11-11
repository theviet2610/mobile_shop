<?php
include_once("admin/connect.php");
include_once("lib/lib.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Home</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/home.css">
<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.js"></script>
<link rel="stylesheet" href="css/cart.css">
<link rel="stylesheet" href="css/category.css">
<link rel="stylesheet" href="css/product.css">
<link rel="stylesheet" href="css/search.css">
<link rel="stylesheet" href="css/success.css">
</head>

<body>

<!--	Header	-->
<div id="header">
	<div class="container">
    	<div class="row">
        	
            <?php
            include_once("modules/logos/logo_header.php");
            include_once("modules/search/search_header.php");
            include_once("modules/cart/cart_header.php");
            ?>
            
        </div>
    </div>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#menu">
    	<span class="navbar-toggler-icon"></span>
    </button>
</div>
<!--	End Header	-->

<!--	Body	-->
<div id="body">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
                <?php
            	 include_once("modules/menu/menu.php");

                 ?>
            </div>
        </div>
        <div class="row">
        	<div id="main" class="col-lg-8 col-md-12 col-sm-12">
            	<?php
                include_once("modules/slide/slide.php");
                ?>
                <?php
                if(isset($_GET["page_layout"])){
                    switch ($_GET["page_layout"]) {
                        case "cart": include_once("modules/cart/cart.php"); break;
                        case "category": include_once("modules/menu/category.php"); break;
                        case "product": include_once("modules/product/product.php"); break;
                        case "success": include_once("modules/cart/success.php"); break;
                        case "search": include_once("modules/search/search.php"); break;
                    }

                }
                else{
                    include_once("modules/product/feature.php"); 
                    include_once("modules/product/latest.php");
                    
                }
                ?>
                

            </div>
            
            <div id="sidebar" class="col-lg-4 col-md-12 col-sm-12">
            	<?php
                    include_once("modules/banner/banner.php");
                ?>
            </div>
        </div>
    </div>
</div>
<!--	End Body	-->

<div id="footer-top">
	<div class="container">
    	<div class="row">
        	<?php
            include_once("modules/logos/logo_footer.php");
            include_once("modules/address/address.php");
            include_once("modules/services/service.php");
            include_once("modules/hotline/hotline.php");
            ?>
            
            
        </div>
    </div>
</div>

<!--	Footer	-->
<?php 
include_once("modules/footer/footer.php");
?>
<!--	End Footer	-->













</body>
</html>
