<?php
    include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">

    <title>Login</title>
</head>
<body>
    <header>
        <div class="container">
            <a href="index.html"><img src="picture/logo/logo.png" alt="404"></a>
        </div>
    </header>
    <div class="login-container">
        <form class="login-form" name = "login" action="" method="POST">
            <h2>Đăng nhập</h2>
            <div class="input-group">
                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label class="form-label" for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Đăng nhập</button>
            <?php
                if($_POST){
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);
                    $sql = "select username, password from admin where username = '".$username."'";
                    $query = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($query);
                    $num_row = mysqli_num_rows($query);
                    $_SESSION['dangnhap']['username'] = $_POST['username'];
                    //$admin = 'admin';
                    //$quyen_admin = 2;
                    // echo $row['quyen'];
                    if($num_row==1){
                        if($row['password']==$password){
                                header('location:admin.php');
                        }else
                            echo '<span style = "color: red">Sai Mật Khẩu</span>';
                            //echo-e "\e[91mMật Khẩu Sai";
                            //echo "sai mật khẩu!!!";
                       }
                       else
                           echo '<span style = "color: red">Không Tồn Tại user</span>';
                   }
                ?>
        </form>
    </div>
</body>
</html>