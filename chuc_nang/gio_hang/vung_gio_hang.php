<br>
Giỏ hàng <br><br>

<?php 
	$so_luong=0;
	if(isset($_SESSION['id_them_vao_gio'])) //kiểm tra xem có ss nào k
	{
		for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)  
		{
			$so_luong=$so_luong+$_SESSION['sl_them_vao_gio'][$i]; //cộng sl từng ss
		}
	}
?>

Số sản phẩm : <?php echo $so_luong; ?>
<br><br>
<a href="?thamso=gio_hang">Giỏ hàng</a>
