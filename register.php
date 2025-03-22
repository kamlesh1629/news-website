<?php
    include "./include/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Website Registration</title>
    <link rel="stylesheet" href="./styles/register.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Create an Account</h2>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="first_name" name="fullname" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="" disabled selected>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" name="register">Register</button>
            </div>
            <div class="form-group">
                <a href="login.php">Already have an account? Login here</a>
            </div>
        </form>
    </div>
</body>
</html>


<?php

if(isset($_POST["register"])){

    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];

    if($fullname!="" &&$email!="" &&$password!="" &&$gender!="" ){

        $query = "INSERT INTO tbl_register (FULLNAME,EMAIL,PASSWORD,GENDER) VALUES ('$fullname','$email','$password','$gender')";
        $data = mysqli_query($conn,$query);

        if($data){
            echo "
            <script>
                alert('Registration Success . Now You Can Login...');
            </script>
            ";
        }else{
            echo "
            <script>
                alert('Not Register Because Email Id Alredy exist...');
            </script>
            ";
        }
    }

}

?>