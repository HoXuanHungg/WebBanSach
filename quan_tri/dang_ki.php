<?php
require '../ket_noi.php';
?>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Trang đăng kí</title>
</head>
<style>
*{
    padding: 0px;
    margin: 0px;
    font-family: sans-serif;
    box-sizing: border-box;
}
.container{
    width: 100%;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
}
.col-6{
    float: left;
    width: 50%;
}
.margin_b{
    margin-bottom: 7.5px;
}
.clear{
    clear: both;
}
main{
    background-color: #dddddd;
    min-height: 300px;
    padding: 7.5px 15px;
}

h1{
    color: #009999;
    font-size: 20px;
    margin-bottom: 30px;
}

.register-form{
    width: 100%;
    max-width: 400px;
    margin: 20px auto;
    background-color: #ffffff;
    padding: 15px;
    border: 2px dotted #cccccc;
    border-radius: 10px;
}

.input-box{
    margin-bottom: 10px;
}
.input-box input[type='text'],
.input-box input[type='password'],
.input-box input[type='date']{
    padding: 7.5px 15px;
    width: 100%;
    border: 1px solid #cccccc;
    outline: none;
    font-size: 16px;
    display: inline-block;
    height: 40px;
    color: #666666;
}
.input-box select{
    padding: 7.5px 15px;
    width: 100%;
    border: 1px solid #cccccc;
    outline: none;
    font-size: 16px;
    display: inline-block;
    height: 40px;
    color: #666666;
}
.input-box option{
    font-size: 16px;
}
.input-box input[type='checkbox']{
    height: 1.5em;
    width: 1.5em;
    vertical-align: middle;
    line-height: 2em;
}
.input-box textarea{
    padding: 7.5px 15px;
    width: 100%;
    border: 1px solid #cccccc;
    outline: none;
    font-size: 16px;
    min-height: 120px;
    color: #666666;
}
.btn-box{
    text-align: center;
    margin-top: 30px;
}
.btn-box button{
    padding: 7.5px 15px;
    border-radius: 2px;
    background-color: #009999;
    color: #ffffff;
    border: none;
    outline: none;
}
.btn-box button>a{
    color: white!important;
    text-decoration: none;
}
</style>
<body>
<?php

    //Kiểm tra người dùng nhấn nút đăng kí
    if (isset($_POST['btn_dangki'])) {
        //lưu user pass vào 1 biến để kiểm tra
        $ky_danh = $_POST['ky_danh'];
        $mat_khau = $_POST['mat_khau']; 
        //kiểm tra rỗng 
        if ($ky_danh == '' || $mat_khau == '') {
            // header("location:login.php");
            echo 'BẠN CHƯA ĐIỀN THÔNG TIN !';
        } else {
           //không rỗng thì bắt đầu xử lí

           //kiểm tra đã tồn tại user đó chưa
            $sql="select * from thong_tin_quan_tri where ky_danh='$ky_danh'";
            $kt=mysqli_query($conn, $sql);

            if(mysqli_num_rows($kt)  > 0){
                echo "TÀI KHOẢN ĐÃ TỒN TẠI !";
            }else{
                //thực hiện việc lưu trữ dữ liệu vào db
                $sql = "INSERT INTO `thong_tin_quan_tri` (`id`, `ky_danh`, `mat_khau`) VALUES (NULL, '$ky_danh', '$mat_khau');";
                   mysqli_query($conn,$sql);
                   echo 'BẠN ĐÃ ĐĂNG KÍ THÀNH CÔNG !';
              
            }
        }
    } 

?>

<div class="container">
                <div class="register-form">
                    <form action="dang_ki.php" method="post">
                        <h1>Đăng ký tài khoản</h1>
                        <div class="input-box">
                            <input type="text" name="ky_danh" placeholder="Nhập username">
                        </div>
                        <div class="input-box">
                            <input type="password" name="mat_khau" placeholder="Nhập mật khẩu">
                        </div>                                             
                        <div class="btn-box">						
                            <button type="submit" name="btn_dangki"> 
                               Đăng Ký
                            </button>
													
                            <a href="../quan_tri/index.php">Quay về trang đăng nhập</a>
                            
                        </div>
                    </form>                   
                </div>
            </div>
</body>
</html>

