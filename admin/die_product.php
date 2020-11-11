<?php
session_start();
include_once("connect.php");
if (isset($_SESSION["mail"]) && isset($_SESSION["pass"])) {

	$prd_id = $_GET["prd_id"];
	$sql = "DELETE FROM product
			WHERE prd_id = $prd_id";
	mysqli_query($conn, $sql);
	header("location: index.php?page_layout=product");
	exit;
}
header("location: index.php");

?>