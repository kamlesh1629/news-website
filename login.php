<?php
    include "./include/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - News Website</title>
    <link rel="stylesheet" href="./styles/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="login">Login</button>
            </div>
            <div class="form-group">
                <a href="#">Forgot password?</a>
                <a href="register.php">Don't have an account? Register here</a>
            </div>
        </form>
    </div>
</body>
</html>


<?php

if(isset($_POST["login"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    if($email!=""&& $password!=""){
        $query = "SELECT * FROM tbl_register  WHERE EMAIL='$email' AND  PASSWORD = '$password' ";
        $data = mysqli_query($conn,$query);

        if(mysqli_num_rows($data)>0){
            header("Location:./index.php");
        }else{
            echo "
            <script>
                alert('Please Check email or password..!');
            </script>
            ";
        }
    }
}

?>