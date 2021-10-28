<?php 
	if(!isset($bien_bao_mat)){exit();}  //khai báo ở trang index.php buộc ng dùng phải truy cập index đầu tiên, không cho phép truy cập trái phép vào các chức năng
?>
<?php 
	$id=$_GET['id'];
	
	$tv="select * from san_pham where id='$id' ";
	$tv_1=mysqli_query($conn, $tv);
	$tv_2=mysqli_fetch_array($tv_1);

	$link_hinh="../hinh_anh/san_pham/".$tv_2['hinh_anh'];
	if(is_file($link_hinh))	 //ktra xem có phải tệp tin k
	{
		unlink($link_hinh); //xóa hình
	}
	
	$tv="DELETE FROM san_pham WHERE id = $id ";
	mysqli_query($conn, $tv);
	header('location:./index.php?thamso=quan_ly_san_pham');
?>