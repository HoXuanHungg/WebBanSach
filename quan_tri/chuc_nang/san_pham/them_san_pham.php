<?php 
	if(!isset($bien_bao_mat)){exit();}  //khai báo ở trang index.php buộc ng dùng phải truy cập index đầu tiên, không cho phép truy cập trái phép vào các chức năng
?>
<form action="" method="post" enctype="multipart/form-data" >
	<table width="990px" >
		<tr>
			<td colspan="2" ><b style="color:blue;font-size:20px" >Thêm sản phẩm</b><br><br> </td>
			
		</tr>
		<tr>
			<td width="150px" >Tên : </td>
			<td width="840px">
				<input style="width:400px;margin-top:3px;margin-bottom:3px;" name="ten" value="" >
			</td>
		</tr>
		<tr>
			<td>Thể loại : </td>
			<td>
				<?php //kiểm tra sự tồn tại của ss thể loại(đc tạo ra từ lần thêm sp trc đó)
					if(!isset($_SESSION['the_loai']))
					{
						$_SESSION['the_loai']=""; //không tồn tại nên gán rỗng
					}
				?>
				<select name="the_loai" style="margin-top:3px;margin-bottom:3px;" >
					<?php 
						$tv="select * from menu_doc order by id ";
						$tv_1=mysqli_query($conn, $tv);
						$a="";
						while($tv_2=mysqli_fetch_array($tv_1))
						{
							//lấy giá trị
							$ten=$tv_2['ten'];
							$id_menu=$tv_2['id'];
							// nếu ss thể loại từ lần thêm trc đó tồn tại thì gán selected cho value đó,
							if($_SESSION['the_loai']==$id_menu)
							{
								$a="selected";
							}
							echo "<option value='$id_menu' $a >";
								echo $ten;
							echo "</option>";
							$a="";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td >Hình ảnh : </td>
			<td>
				<input type="file" name="hinh_anh" >
			</td>
		</tr>
		<tr>
			<td>Giá : </td>
			<td>
				<input style="width:400px;margin-top:3px;margin-bottom:3px;" name="gia" value="" >
			</td>
		</tr>
		<tr>
			<td>Trang chủ : </td>
			<td>
				<?php
					$a_1="";
					$a_2="";
					//ktra ss trang chủ tồn tại và = co thì selected value
					if(isset($_SESSION['tuy_chon_trang_chu']))
					{
						if($_SESSION['tuy_chon_trang_chu']=="co")
						{
							$a_2="selected";
						}
					}
				?>
				<select name="trang_chu" style="margin-top:3px;margin-bottom:3px;" >
					<option value="" <?php echo $a_1; ?> >Không</option>
					<option value="co" <?php echo $a_2; ?> >Có</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Nổi bật : </td>
			<td>
				<?php
					$a_1="";
					$a_2="";
					//ktra ss nổi bật tồn tại và = co thì selected value
					if(isset($_SESSION['tuy_chon_noi_bat']))
					{
						if($_SESSION['tuy_chon_noi_bat']=="co")
						{
							$a_2="selected";
						}
					}
				?>
				<select name="noi_bat" style="margin-top:3px;margin-bottom:3px;" >
					<option value="" <?php echo $a_1; ?> >Không</option>
					<option value="co" <?php echo $a_2; ?> >Có</option>
				</select>
			</td>
		</tr>
		<tr>
			<td valign="top" >Nội dung : </td>
			<td>		
			<!-- khung soạn thảo văn bản -->				
				  <textarea id="noi_dung" name="noi_dung" ></textarea>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<br>
				<input type="submit" name="bieu_mau_them_san_pham" value="Thêm sản phẩm" style="width:200px;height:50px;font-size:24px" >
			</td>
		</tr>
	</table>
</form>