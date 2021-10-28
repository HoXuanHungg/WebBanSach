<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	if(!isset($_GET['thamso'])){$thamso="";}else{$thamso=$_GET['thamso'];}
	
	switch($thamso)
	{
		case "the_loai":
			include("chuc_nang/the_loai/lien_ket_the_loai.php");
		break;
		case "them_the_loai":
			include("chuc_nang/the_loai/them_the_loai.php");
		break;
		case "quan_ly_the_loai":
			include("chuc_nang/the_loai/quan_ly_the_loai.php");
		break;
		case "sua_the_loai":
			include("chuc_nang/the_loai/sua_the_loai.php");
		break;
		case "san_pham":
			include("chuc_nang/san_pham/lien_ket_san_pham.php");
		break;
		case "them_san_pham":
			include("chuc_nang/san_pham/them_san_pham.php");
		break;
		case "quan_ly_san_pham":
			include("chuc_nang/san_pham/quan_ly_san_pham.php");
		break;
		case "sua_san_pham":
			include("chuc_nang/san_pham/sua_san_pham.php");
		break;
		case "hoa_don":
			include("chuc_nang/hoa_don/quan_ly_hoa_don.php");
		break;
		case "xem_hoa_don":
			include("chuc_nang/hoa_don/xem_hoa_don.php");
		break;
		case "san_pham_trang_chu":
			include("chuc_nang/san_pham_trang_chu/san_pham_trang_chu.php");
		break;
		case "san_pham_noi_bat":
			include("chuc_nang/san_pham_noi_bat/san_pham_noi_bat.php");
		break;
		case "thoat":
			include("chuc_nang/quan_tri_2/thoat.php");
		break;
		
	}
?>