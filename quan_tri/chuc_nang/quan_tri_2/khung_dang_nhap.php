<?php 
	if(!isset($bien_bao_mat)){exit();}
	?>


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
<div class="container">
                <div class="register-form">
                    <form action="" method="post">
                        <h1>Đăng nhập tài khoản</h1>
                        <div class="input-box">

                            <input type="text" name="ky_danh" placeholder="Nhập username">
                        </div>
                        <div class="input-box">

                            <input type="password" name="mat_khau" placeholder="Nhập mật khẩu">
                        </div>                      
                        
                        <div class="btn-box">
						<input type="hidden" name="dang_nhap_quan_tri" value="dang_nhap_quan_tri" >
                            <button type="submit">
                                Đăng nhập
                            </button>
							
                        </div>
						<a href="../index.php">Quay về trang mua hàng</a>
                    </form>
                </div>
            </div>

