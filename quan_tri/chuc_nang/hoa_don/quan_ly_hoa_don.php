<?php 
	if(!isset($bien_bao_mat)){exit();}//khi dô thư mục hóa đơn thì sẽ ra trang trắng.
?>
<?php 
	$so_dong_tren_mot_trang=20;
	if(!isset($_GET['trang'])){$_GET['trang']=1;}
	// nếu không tồn tại biến 'trang' trên url thì biến này có giá trị là 1 , làm như vậy là để tính biến $vtbd
	$tv="select count(*) from hoa_don";//đếm số dòng trong hóa đơn
	$tv_1=mysqli_query($conn, $tv);// gửi truy vấn
	$tv_2=mysqli_fetch_array($tv_1);//gán cho biến $tv_2
	$so_trang=ceil($tv_2[0]/$so_dong_tren_mot_trang);//nếu lớn hơn 20 thì số trang lớn hơn 1.
													//tổng dữ liệu trong bảng hóa đơn chia cho số dòng lấy số tròn.
	
	$vtbd=($_GET['trang']-1)*$so_dong_tren_mot_trang;
	// tính vị trí bắt đầu giới hạn của bảng 'hoa_don' tùy theo trang hiện hành
    // ở đây , nếu là trang 1 thì $vtbd=0 , nếu là trang 2 thì $vtbd=20 , nếu là trang 3 thì $vtbd=40
	$tv="select * from hoa_don order by id desc limit $vtbd,$so_dong_tren_mot_trang";
	 // lệnh truy cập vào bảng 'hoa_don' sắp xếp theo 'id' tăng dần với giới hạn là tùy theo trang hiện tại
    // ban đầu thì vị trí bắt đầu giới hạn là 0
    // lưu ý là sắp xếp theo 'desc' , nghĩa là xuất hóa đơn mới ra trước
	$tv_1=mysqli_query($conn, $tv);
?>
<table width="990px" class="tb_a1" >
	<tr style="background:#CCFFFF;height:40px;" >
		<td width="370px" ><b>Tên</b></td>
		<td width="300px" ><b>Email</b></td>
		<td width="120px" ><b>Điện thoại</b></td>
		<td align="center" width="100px" ><b>Sửa</b></td>
		<td align="center" width="100px" ><b>Xóa</b></td>
	</tr>
	<?php 
		while($tv_2=mysqli_fetch_array($tv_1))//xuất dữ liệu từ bảng data hóa đơn,dữ liệu gắn cho $tv_2
		{
			$id=$tv_2['id'];//gán id từ data vào biến $id.
			$ten=$tv_2['ten_nguoi_mua'];
			$email=$tv_2['email'];
			$dien_thoai=$tv_2['dien_thoai'];
			$link_xem="?thamso=xem_hoa_don&id=".$id."&trang=".$_GET['trang'];
			// tạo link xem hóa đơn với biến 'thamso' trên url có giá trị là 'xem_hoa_don'
            // link xem hóa đơn cũng có biến 'id' trên url là cột 'id' của dòng dữ liệu đang được lấy
            // ở đây truyền thêm biến 'trang' trên url để tạo liên kết "Đóng" từ trang xem hóa đơn
            // (phải có biến này để biết vị trí trang trước đó mà trở về sau khi bấm nút "Đóng" )
			$link_xoa="?xoa_hoa_don=co&id=".$id;
			// tạo link xóa hóa đơn với biến 'xoa_hoa_don' trên url có giá trị là 'co'
            // link xóa cũng có biến 'id' trên url là cột 'id' của dòng dữ liệu đang được lấy
			?>
				<tr class="a_1" >
					<td>
						<a href="<?php echo $link_xem; ?>" class="lk_a1" ><?php echo $ten; ?></a>
					</td>
					<td>
						<?php echo $email; ?>
					</td>
					<td>
						<?php echo $dien_thoai; ?>
					</td>
					<td align="center" >
						<a href="<?php echo $link_xem; ?>" class="lk_a1" >Xem</a>
					</td>
					<td align="center" >
						<a href="<?php echo $link_xoa; ?>" class="lk_a1" >Xóa</a>
					</td>
				</tr>
			<?php 
		}
	?>
	<tr>
		<td colspan="5" align="center" >
			<br>
			<?php 
				for($i=1;$i<=$so_trang;$i++)
				{
					$link_phan_trang="?thamso=hoa_don&trang=".$i;
					// tạo liên kết phân trang , liên kết phân trang đến trang nào thì biến 'trang' trên url có giá trị là trang đó
					echo "<a href='$link_phan_trang' class='phan_trang' >";
					  // xuất liên kết phân trang với class là 'phan_trang'
					echo $i;
					echo "</a> ";
				}
			?>
			<br><br>
		</td>
	</tr>
</table>