<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<style type="text/css" >
	a.lk_1{font-size:22px;text-decoration:none;color:blue;margin-right:30px}
	a.lk_1:hover {color:red}
</style>
<br>
<center>
<a href="index.php" style="font-size:72px;color:blue;text-decoration:none" >Administrator Website</a>
</center>
<br><br>
<table width="990px" >
	<tr>
		<td width="800px">
			<a href="?thamso=the_loai" class="lk_1" >Thể loại</a>
			<a href="?thamso=san_pham" class="lk_1" >Sản phẩm</a>
			<a href="?thamso=hoa_don" class="lk_1" >Hóa đơn</a>
			<a href="dang_ki.php" class="lk_1">Đăng ký</a>
		</td>
		<td align="right"  style="font-size:20px;color:blue;" >
			<?php echo $_SESSION['ky_danh'] ?> <!-- show QTV -->
			<a href="?thamso=thoat"   >(thoát)</a>
		</td>
	</tr>
	

</table>
<br><br>
<?php 
	include("chuc_nang/quan_tri_2/dieu_huong.php");
?>
<br><br>
<table width="990px" style="font-size:20px;color:blue;" >
	<tr>
		<td width="445px" align="right">
			Cửa hàng :
		</td>
		<td width="445px" >
			Nhóm 16
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center" >
			Hệ thống quản trị web bán sách
		</td>
	</tr>
</table>