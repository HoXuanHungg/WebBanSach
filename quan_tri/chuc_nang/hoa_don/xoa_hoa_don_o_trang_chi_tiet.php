<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$id=$_GET['id'];// lấy biến 'id' trên url (cũng là id hóa đơn cần xóa) , liên kết 'Xóa' được truyền biến id trong file 'xem_hoa_don.php'
	$tv="DELETE FROM hoa_don WHERE id = $id ";
	// câu truy vấn xóa dữ liệu thì dùng lệnh delete , bảng hoa_don sẽ được xóa dữ liệu
     // WHERE id = $id : dòng dữ liệu được xóa sẽ là dòng mà cột 'id' của dòng đó có giá trị là biến 'id' trên url
     // (tức là id của hóa đơn cần xóa)
	mysqli_query($conn, $tv);
	$link="?thamso=hoa_don&trang=".$_GET['trang'];
	 // tạo liên kết để quay về trang quản lý hóa đơn
    // liên kết này sẽ dùng biến 'trang' trên url để về trang quản lý hóa đơn cùng với vị trí trang trước đó
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Xóa hóa đơn</title>
	</head>
	<body>
		<script type="text/javascript" >
			window.location="<?php echo $link; ?>";
		</script>
	</body>
</html>
<?php 
	exit();
?>