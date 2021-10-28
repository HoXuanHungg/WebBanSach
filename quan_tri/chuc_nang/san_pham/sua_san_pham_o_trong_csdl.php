<?php
	if(!isset($bien_bao_mat)){exit();}  //khai báo ở trang index.php buộc ng dùng phải truy cập index đầu tiên, không cho phép truy cập trái phép vào các chức năng
?>
<?php
	//lấy dữ liệu từ trang sua_san_pham
	$ten=trim($_POST['ten']); //bỏ khoảng trống 2 bên
	$gia=trim($_POST['gia']);
	$trang_chu=$_POST['trang_chu'];
	$noi_bat=$_POST['noi_bat'];
	$noi_dung=$_POST['noi_dung'];
	$ten_file_anh_tai_len=$_FILES['hinh_anh']['name']; //lấy tên ảnh mới
	if($ten_file_anh_tai_len!="") //ktra ảnh mới
	{
		$ten_file_anh=$ten_file_anh_tai_len; //lấy tên mới
	}
	else
	{
		$ten_file_anh=$_POST['ten_anh']; //lấy lại tên ảnh cũ
	}
	$id=$_GET['id'];
	if($ten!="")
	{
		$tv_k="select count(*) from san_pham where hinh_anh='$ten_file_anh' "; //ktra xem tên ảnh có bị trùng k, trả về 0 nếu k trùng
		$tv_k_1=mysqli_query($conn, $tv_k);
		$tv_k_2=mysqli_fetch_array($tv_k_1);
		if($tv_k_2[0]==0 or $ten_file_anh_tai_len=="") //thực hiện khi ảnh mới k bị trùng or sử dụng lại tên ảnh cũ
		{
			$tv="
			UPDATE san_pham SET
			ten = '$ten',
			gia = '$gia',
			hinh_anh = '$ten_file_anh',
			noi_dung = '$noi_dung',
			trang_chu = '$trang_chu',
			noi_bat = '$noi_bat'
			WHERE id =$id;
			";
			mysqli_query($conn, $tv);

			if($ten_file_anh_tai_len!="") //nếu có tên ảnh mới thì upload
			{
				$duong_dan_anh="../hinh_anh/san_pham/".$ten_file_anh_tai_len;
				move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$duong_dan_anh); //upload ảnh mới
				$duong_dan_anh_cu="../hinh_anh/san_pham/".$_POST['ten_anh'];
				unlink($duong_dan_anh_cu); //xóa ảnh cũ
			}

		}
		else
		{
			thong_bao_html("Hình ảnh bị trùng tên");
		}
	}
	else
	{
		thong_bao_html("Tên sản phẩm chưa được điền vào");
	}

	header('location:./index.php?thamso=quan_ly_san_pham');
?>
