<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$ten_the_loai=trim($_POST['ten']);
	$ten_the_loai=str_replace("'","&#39;",$ten_the_loai);
	if($ten_the_loai!="")
	{
		$tv="
		INSERT INTO menu_doc (
		id ,
		ten 
		)
		VALUES (
		NULL ,
		'$ten_the_loai'
		);";
		mysqli_query($conn, $tv);
	}
	else 
	{
		thong_bao_html("Tên thể loại chưa được điền vào");
	}
	header('location:./index.php?thamso=quan_ly_the_loai');
?>