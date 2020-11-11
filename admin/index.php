<script src="ckeditor/ckeditor.js"></script>
<?php
session_start();
include_once("connect.php");
define("TEAMPLATE", true);
if (isset($_SESSION["mail"]) && isset($_SESSION["pass"])) {
	include_once("../lib/lib.php");
	include_once("admin.php");
	
}
else {
	include_once("login.php");
}

?>