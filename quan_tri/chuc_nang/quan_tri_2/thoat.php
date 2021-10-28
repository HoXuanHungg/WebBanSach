<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	unset($_SESSION['ky_danh']);
	unset($_SESSION['mat_khau']);
	header('Location: ../quan_tri/index.php');
	exit();
?>
