<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php
	if(isset($_POST['bieu_mau_them_the_loai']))
	{
		include("chuc_nang/the_loai/them_the_loai_vao_csdl.php");
		trang_truoc_html();
	}
	if(isset($_POST['bieu_mau_sua_the_loai']))
	{
		include("chuc_nang/the_loai/sua_the_loai_o_trong_csdl.php");
		trang_truoc_html();
	}
	if(isset($_GET['xoa_the_loai']))
	{
		include("chuc_nang/the_loai/xoa_the_loai.php");
		trang_truoc_html();
	}
	if(isset($_POST['bieu_mau_them_san_pham']))
	{// xác định biễu mẫu thêm sản phẩm có được gửi hay không
    // nếu được gửi thì sẽ tồn tại biến $_POST['bieu_mau_them_san_pham']
    // một trong các thành phần của biểu mẫu thêm sản phẩm sẽ có name là 'bieu_mau_them_san_pham'
		include("chuc_nang/san_pham/them_san_pham_vao_csdl.php");
		// gọi file 'them_san_pham_vao_csdl.php' trong thư mục 'san_pham'
        // file này có chức năng thêm sản phẩm vào bảng 'san_pham'
		trang_truoc_html();
	}
	if(isset($_POST['bieu_mau_sua_san_pham']))
	{
		include("chuc_nang/san_pham/sua_san_pham_o_trong_csdl.php");
		trang_truoc_html();
	}
	if(isset($_GET['xoa_san_pham']))
	{
		include("chuc_nang/san_pham/xoa_san_pham.php");	
		trang_truoc_html();
	}
	if(isset($_GET['xoa_hoa_don']))
	{
		include("chuc_nang/hoa_don/xoa_hoa_don.php");
		
	}
	if(isset($_GET['xoa_hoa_don_o_trang_chi_tiet']))
	{
		include("chuc_nang/hoa_don/xoa_hoa_don_o_trang_chi_tiet.php");
		
	}
	if(isset($_POST['bieu_mau_san_pham_trang_chu']))
	{
		include("chuc_nang/san_pham_trang_chu/sua_san_pham_trang_chu.php");
		trang_truoc_html();
	}
	if(isset($_POST['bieu_mau_san_pham_noi_bat']))
	{
		include("chuc_nang/san_pham_noi_bat/sua_san_pham_noi_bat.php");
		trang_truoc_html();
	}	
	
?>