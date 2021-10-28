<?php 
	
	$tv="select id,ten,gia,hinh_anh,thuoc_the_loai from san_pham where trang_chu='co' order by sap_xep_trang_chu desc limit 0,15";
	$tv_1=mysqli_query($conn,$tv);
	echo "<table>";
	while($tv_2=mysqli_fetch_array($tv_1)) //ktra còn sp, và đọc dữ liệu cho sp đầu tiên 1 dòng
	{
		echo "<tr>";
			for($i=1;$i<=3;$i++)
			{
				echo "<td align='center' width='215px' valign='top' >";
					if($tv_2!=false)
					{
						//lấy dữ liệu
						$link_anh="hinh_anh/san_pham/".$tv_2['hinh_anh'];
						$link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$tv_2['id'];
						$gia=$tv_2['gia'];
						$gia=number_format($gia,0,",","."); //format giá
						//in ra thông tin
						echo "<a href='$link_chi_tiet' >";
							echo "<img src='$link_anh' width='150px' >";
						echo "</a>";
						echo "<br>";
						echo "<br>";
						echo "<a href='$link_chi_tiet' >";
							echo $tv_2['ten'];
						echo "</a>";
						echo "<div style='margin-top:5px' >";						
						echo $gia;
						echo "</div>";
						echo "<br>";
					}
					else 
					{
						echo "&nbsp;"; //in ra khoảng trắng
					}
				echo "</td>";
				//để tránh bỏ qua dữ liệu
				//ở 2 lần chạy đầu tiên( i = 1, 2), đọc dữ liệu cho lần chạy 2 3
				//ở lần chạy thứ 3( i = 3 ), không đọc dữ liệu mới, 
				if($i!=3)
				{
					$tv_2=mysqli_fetch_array($tv_1);
				}
			}
		echo "</tr>";
	}
	echo "</table>";
?>