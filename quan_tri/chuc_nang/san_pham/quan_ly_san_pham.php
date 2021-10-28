<?php
	if(!isset($bien_bao_mat)){exit();} //khai báo ở trang index.php buộc ng dùng phải truy cập index đầu tiên, không cho phép truy cập trái phép vào các chức năng
?>
<?php
	//lấy id menu đc truyền về
	// id_menu ở đây là id của thể loại trong csdl
	if(!isset($_GET['id_menu'])) // nếu k có biến 'id_menu' trên url
	{
		$id_menu="toan_bo_san_pham";
	}
	else
	{
		if($_GET['id_menu']!="" and $_GET['id_menu']!="toan_bo_san_pham")
		{
			$id_menu=$_GET['id_menu']; // thì biến $id_menu có giá trị ứng với 'id_menu' trên url
            // trường hợp này sẽ xuất sản phẩm theo danh mục
		}
		else
		{
			$id_menu="toan_bo_san_pham";
			//trường hợp này thì xuất toàn bộ sản phẩm
		}
	}
?>
<br>
<div style="width:990px;text-align:left" >
	Chọn : <select name="the_loai" onchange="window.location='?thamso=quan_ly_san_pham&id_menu='+this.value" > <!-- chọn và lọc thể loại -->
	<option value="" >Toàn bộ sản phẩm</option>
	<?php
		$tv="select * from menu_doc order by id "; //bảng menu_doc là bảng the_loai
		$tv_1=mysqli_query($conn, $tv);
		$a="";
		while($tv_2=mysqli_fetch_array($tv_1))
		{
			$ten=$tv_2['ten']; //tên thể loại
			$id=$tv_2['id']; // id thể loại

			//từ id menu đc truyền về và đc đọc ở đầu , chuyển thể loại đó sang trạng thái selected
			if($id_menu==$id)
			{
				$a="selected";
			}
			echo "<option value='$id' $a >";
				echo $ten;
			echo "</option>";
			$a="";
		}
	?>
	</select>
</div>
<br>
<?php
	$so_dong_tren_mot_trang=10; //số sp 1 trang
	if(!isset($_GET['trang'])){$_GET['trang']=1;}

	//đếm số sp thể loại
	if($id_menu=="toan_bo_san_pham")
	{
		$tv="select count(*) from san_pham";
	}
	else
	{
		$tv="select count(*) from san_pham where thuoc_the_loai='$id_menu' ";
	}
	$tv_1=mysqli_query($conn, $tv);
	$tv_2=mysqli_fetch_array($tv_1);
	$so_trang=ceil($tv_2[0]/$so_dong_tren_mot_trang); //tính số trang

	$vtbd=($_GET['trang']-1)*$so_dong_tren_mot_trang;

	//lấy dữ liệu của sp
	if($id_menu=="toan_bo_san_pham")
	{
		$tv="select id,ten,gia,hinh_anh from san_pham order by id desc limit $vtbd,$so_dong_tren_mot_trang";
	}
	else
	{
		$tv="select id,ten,gia,hinh_anh from san_pham where thuoc_the_loai='$id_menu' order by id desc limit $vtbd,$so_dong_tren_mot_trang";
	}
	$tv_1=mysqli_query($conn, $tv);
?>

<table width="990px" class="tb_a1" >
	<tr style="background:#CCFFFF;height:40px;" >
		<td width="120px" ><b>Hình ảnh</b></td>
		<td width="450px" ><b>Tên</b></td>
		<td align="center" width="140px" ><b>Giá</b></td>
		<td align="center" width="140px" ><b>Sửa</b></td>
		<td align="center" width="140px" ><b>Xóa</b></td>
	</tr>
	<?php
		while($tv_2=mysqli_fetch_array($tv_1))
		{
			//lấy dữ liệu từ csdl
			$id=$tv_2['id'];
			$ten=$tv_2['ten'];
			$gia=$tv_2['gia'];
			$gia=number_format($gia,0,",",".");
			$link_hinh="../hinh_anh/san_pham/".$tv_2['hinh_anh'];
			$link_sua="?thamso=sua_san_pham&id_menu=".$id_menu."&id=".$id."&trang=".$_GET['trang'];
			//biến id_menu và biến trang là để quay lại trang này từ trang sửa
			$link_xoa="?xoa_san_pham&id=".$id;
			?>
			<!-- show dữ liệu -->
				<tr class="a_1" >
					<td align="center" >
						<a href="<?php echo $link_sua; ?>" >
							<img src="<?php echo $link_hinh; ?>" style="width:100px;margin-top:10px;margin-bottom:10px;" border="0" >
						</a>
					</td>
					<td>
						<a href="<?php echo $link_sua; ?>" class="lk_a1" style="margin-left:10px" ><?php echo $ten; ?></a>
					</td>
					<td align="center" >
						<?php echo $gia; ?>
					</td>
					<td align="center" >
						<a href="<?php echo $link_sua; ?>" class="lk_a1" >Sửa</a>
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
					$link_phan_trang="?thamso=quan_ly_san_pham&id_menu=".$id_menu."&trang=".$i;
					echo "<a href='$link_phan_trang' class='phan_trang' >";
						echo $i;
					echo "</a> ";
				}
			?>
			<br><br>
		</td>
	</tr>
</table>
