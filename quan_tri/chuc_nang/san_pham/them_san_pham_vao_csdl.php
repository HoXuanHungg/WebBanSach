<?php 
	if(!isset($bien_bao_mat)){exit();}//khai báo ở trang index.php buộc ng dùng phải truy cập index đầu tiên, không cho phép truy cập trái phép vào các chức năng
?>
<?php 
	//lấy dữ liệu từ form thêm sp
	$ten=trim($_POST['ten']); //loại bỏ khoảng trống 2 bên
	$the_loai=$_POST['the_loai'];
	$gia=trim($_POST['gia']);
	if($gia==""){$gia=0;}
	$ten_file_anh=$_FILES['hinh_anh']['name'];// lấy tên file ảnh
	$trang_chu=$_POST['trang_chu'];
	$noi_bat=$_POST['noi_bat'];
	$noi_dung=$_POST['noi_dung'];
	$tv_m="select max(sap_xep_trang_chu) from san_pham"; //vị trí thứ tự lớn nhất xuất hiện ở trang chủ
	$tv_m_1=mysqli_query($conn, $tv_m);
	$tv_m_2=mysqli_fetch_array($tv_m_1);
	$sap_xep_trang_chu=$tv_m_2[0]+1;
	if($ten!="") //thêm sp khi có tên sp
	{
		if($ten_file_anh!="") //thêm sp khi có tên hình
		{
			$tv_k="select count(*) from san_pham where hinh_anh='$ten_file_anh' ";
			$tv_k_1=mysqli_query($conn, $tv_k);
			$tv_k_2=mysqli_fetch_array($tv_k_1);
			if($tv_k_2[0]==0)
			{
				$tv="
				INSERT INTO san_pham (
				id ,
				ten ,
				gia ,
				hinh_anh ,
				noi_dung ,
				thuoc_the_loai ,
				noi_bat ,
				trang_chu ,
				sap_xep_trang_chu
				)
				VALUES (
				NULL ,
				'$ten',
				'$gia',
				'$ten_file_anh',
				'$noi_dung',
				'$the_loai',
				'$noi_bat',
				'$trang_chu',
				'$sap_xep_trang_chu'
				);";
				mysqli_query($conn, $tv);

				$duong_dan_anh="../hinh_anh/san_pham/".$ten_file_anh;
				move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$duong_dan_anh);
				//lưu các ss 
				$_SESSION['the_loai']=$the_loai;
				$_SESSION['tuy_chon_trang_chu']=$trang_chu;
				$_SESSION['tuy_chon_noi_bat']=$noi_bat;
			}
			else 
			{
				thong_bao_html("Hình ảnh bị trùng tên");
			}
		}
		else 
		{
			thong_bao_html("Chưa chọn ảnh");
		}
	}
	else 
	{
		thong_bao_html("Tên sản phẩm chưa được điền vào");
	}
	header('location:./index.php?thamso=quan_ly_san_pham');
?>