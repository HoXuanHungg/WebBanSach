<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$id=$_GET['id'];// lấy biến 'id' trên url , đây cũng là id trên hóa đơn mà người dùng bấm vào
	$tv="select * from hoa_don where id='$id' ";
	 // truy cập vào bảng 'hoa_don' với biến 'id' trên url (id hóa đơn mà người dùng bấm vào )
	$tv_1=mysqli_query($conn, $tv);// gửi truy vấn vào mysql
	$tv_2=mysqli_fetch_array($tv_1); // lấy dòng dữ liệu rồi đưa vào mảng $tv_2
	$ten_nguoi_mua=$tv_2['ten_nguoi_mua'];// lấy cột 'ten_nguoi_mua' của dòng dữ liệu nhận được rồi gán vào biến $ten_nguoi_mua
	$email=$tv_2['email'];
	$dien_thoai=$tv_2['dien_thoai'];
	$dia_chi=$tv_2['dia_chi'];
	$noi_dung=$tv_2['noi_dung'];
	$hang_duoc_mua=$tv_2['hang_duoc_mua'];
	  // lấy cột 'hang_duoc_mua' của dòng dữ liệu nhận được rồi gán vào biến $hang_duoc_mua
    // biến $hang_duoc_mua chứa id và số lượng của 1 hoặc nhiều sản phẩm trong đơn hàng đang được xem
	$link_dong="?thamso=hoa_don&&trang=".$_GET['trang'];
	// tạo link đóng để quay về trang quản lý hóa đơn
    // liên kết này sẽ dùng biến 'trang' trên url để về trang quản lý hóa đơn cùng với vị trí trang trước đó
	$link_xoa="?xoa_hoa_don_o_trang_chi_tiet=co&id=".$id."&trang=".$_GET['trang'];
	// tạo liên kết xóa hóa đơn , liên kết này truyền biến 'xoa_hoa_don_o_trang_chi_tiet' trên url có giá trị là 'co' để file 
    // 'xu_ly_post_get.php' nhận biết , biến 'id' trên url nhằm xác định id hóa đơn được xóa , còn biến 'trang' trên url là để
    // về trang quản lý hóa đơn cùng với  vị trí trang trước đó sau khi xóa đơn
?>

<table width="990px" >
	<tr>
		<td width="250px" ><b style="color:blue;font-size:20px" >Sản phẩm được đặt hàng </b><br><br> </td>	
		<td width="740px" align="right" >
			<a href="<?php echo $link_dong; ?>" class="lk_a1" style="margin-right:30px" >Đóng</a>
		</td>			
	</tr>
	<tr>
		<td align="left" colspan="2" >
			<table width="880px" >
				<tr>
					<td width="100px">STT</td>
					<td width="300px" >Tên</td>
					<td width="180px">Giá bán</td>
					<td width="100px" >Số lượng</td>
					<td width="200px">Tổng cộng</td>
				</tr>
				<?php 
					$m=explode("[|||||]",$hang_duoc_mua);
					// dữ liệu trong cột 'hang_duoc_mua' được mình quy định dùng ký hiệu [|||||] để phân phân biệt từng sản phẩm
                    // vì vậy mình dung hàm explode để phân tách cột 'hang_duoc_mua' ra thành từng sản phẩm
                    // (nếu chỉ có 1 sản phẩm thì phân tách ra được 1 sản phẩm)
                    // sản phẩm được phân tách sẽ chứa id và số lượng (được mua) của sản phẩm đó	
					$tong_lon=0;
					   // biến $tong_lon dùng để tính tổng giá trị của toàn đơn hàng , ban đầu sẽ có giá trị 0
                    // biến $tong_lon sẽ chạy qua 1 hoặc nhiều sản phẩm rồi cộng giá tiền lại
					for($i=0;$i<count($m);$i++)// vòng lặp for chạy qua 1 hoặc nhiều sản phẩm được mua trong đơn hàng
					{
						if(isset($m[$i]))// xác định có tồn tại sản phẩm hay không 
						{
							if($m[$i]!="")// xác định thông tin sản phẩm có khác rỗng hay không
							{
								$stt=$i+1; // tính số thứ tự xuất ra , vì $i chạy từ 0 nên số thứ tự phải cộng thêm cho 1
								$m_2=explode("[|||]",$m[$i]);
								// tách id sản phẩm và số lượng sản phẩm ra
                                // dữ liệu trong từng phần tử mảng $m được mình quy định dùng ký hiệu [|||] để phân phân biệt id và số lượng sản phẩm
                                // vì vậy mình dùng hàm explode để phân tách từng phần tử mảng $m ra thành id trêng , số lượng riêng
								$id_sp=$m_2[0];// lấy id sản phẩm (chính là thành phần đầu của phần tử mảng $m bị phân tách)
								$sl_sp=$m_2[1];
								$tv_sp="select id,ten,gia from san_pham where id='$id_sp' ";
								 // truy vấn đến bảng 'san_pham' ở nơi có cột 'id' là id sản phẩm trong cột 'hang_duoc_mua' trong bảng 'hoa_don'
								$tv_sp_1=mysqli_query($conn, $tv_sp);// gửi truy vấn vào mysql
								$tv_sp_2=mysqli_fetch_array($tv_sp_1); // tiến hành lấy dòng dữ liệu rồi gán vào mảng $tv_sp_2
								$ten=$tv_sp_2['ten']; // tiến hành lấy dòng dữ liệu rồi gán vào mảng $tv_sp_2
								$gia=$tv_sp_2['gia'];
								$gia_duoc_dinh_dang=number_format($gia,0,",","."); // định dạng lại giá cho dễ xem
								$tong=$gia*$sl_sp;  // tính tổng giá của sản phẩm hiện tại (tổng = giá sản phẩm * số lượng sản phẩm)
								$tong_duoc_dinh_dang=number_format($tong,0,",",".");
								$tong_lon=$tong_lon+$tong;
								  // cộng gộp cho tổng giá trị toàn bộ đơn hàng , sau khi chạy qua hết từng sản phẩm rồi cộng gộp
                                // thì sẽ tính được tổng giá của toàn đơn hàng
								if($sl_sp!=0)// chỉ xuất sản phẩm trong hóa đơn nếu như số lượng của sản phẩm đó khác không
								{
								?>
									<tr>
										<td><?php echo $stt; ?></td>
										<td><?php echo $ten; ?></td>
										<td><?php echo $gia_duoc_dinh_dang; ?></td>
										<td><?php echo $sl_sp; ?></td>
										<td><?php echo $tong_duoc_dinh_dang; ?></td>
									</tr>
								<?php
								}								
							}
						}
					}
				?>
				<tr>
					<td colspan="5">
						<br><br>
						Tổng tiền của đơn hàng là : 
						<?php 
							$tong_lon_duoc_dinh_dang=number_format($tong_lon,0,",",".");// định dạng lại giá của tổng giá trị đơn hàng cho dễ xem
							echo "<b>".$tong_lon_duoc_dinh_dang."</b>";// xuất tổng giá trị của đơn hàng ra
						?>
						<br><br>
					</td>
				</tr>
			</table>
		</td>		
	</tr>

</table>
<br><br>
<table width="990px" >
	<tr>
		<td width="180px" ><b style="color:blue;font-size:20px" >Thông tin người mua</b><br><br> </td>
		<td width="810px" align="right" >
			&nbsp;
		</td>
	</tr>
	<tr height="30px" >
		<td >Tên người mua : </td>
		<td >
			<?php echo $ten_nguoi_mua; ?>
		</td>
	</tr>
	<tr height="30px" >
		<td >Email : </td>
		<td >
			<?php echo $email; ?>
		</td>
	</tr>		
	<tr height="30px" >
		<td >Điện thoại : </td>
		<td >
			<?php echo $dien_thoai; ?>
		</td>
	</tr>
	<tr height="30px" >
		<td valign="top" >Địa chỉ : </td>
		<td >
			<?php echo $dia_chi; ?>
		</td>
	</tr>
	<tr height="30px" >
		<td valign="top" >Nội dung : </td>
		<td >
			<?php echo $noi_dung; ?>
		</td>
	</tr>
	
	<tr height="30px" >
		<td>&nbsp;</td>
		<td>
			<a href="<?php echo $link_xoa; ?>" class="lk_a1" >Xóa</a> 
		</td>
	</tr>
</table>
