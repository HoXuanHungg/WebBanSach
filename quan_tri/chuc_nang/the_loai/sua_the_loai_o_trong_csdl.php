<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$ten_the_loai=trim($_POST['ten']);
	$ten_the_loai=str_replace("'","&#39;",$ten_the_loai);
	$id=$_GET['id'];
	if($ten_the_loai!="")
	{
		$tv="
		UPDATE menu_doc SET 
		ten = '$ten_the_loai'
		WHERE id =$id;
		";
		mysqli_query($conn, $tv);
	}
	else 
	{
		thong_bao_html("Tên thể loại chưa được điền vào");
	}
	header('location:./index.php?thamso=quan_ly_the_loai');
?>