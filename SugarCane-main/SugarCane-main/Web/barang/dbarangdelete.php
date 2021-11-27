<?php 

require ('../koneksi.php');
	$id = $_GET['id'];
	$query = "DELETE FROM detailbarang WHERE id_detailukuran='$id'";
	$result = mysqli_query($koneksi, $query);

	header('Location: detailbarang.php ');

?>