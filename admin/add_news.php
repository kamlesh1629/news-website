<?php
    include "../include/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add News - Admin Panel</title>
    <link rel="stylesheet" href="./styles/add_news.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  
</head>
<body>
    <aside class="sidebar">
        <h2>News Admin</h2>
        <ul>
            <li><a href="dashboard.php" style="color: white; text-decoration: none;"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="add_news.php" style="color: white; text-decoration: none;"><i class="fas fa-plus"></i> Add News</a></li>
            <li><a href="manage_news.php" style="color: white; text-decoration: none;"><i class="fas fa-tasks"></i> Manage News</a></li>
        </ul>
    </aside>
    <main class="main-content">
        <div class="form-container">
            <h2>Add News Article</h2>
            <form action="add_news.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" required>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category">
                        <option value="World">World</option>
                        <option value="Politics">Politics</option>
                        <option value="Bussiness">Bussiness</option>
                        <option value="Sports">Sports</option>
                        <option value="Technology">Technology</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" required></textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="addNews">Submit</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>


<?php

if(isset($_POST["addNews"])){

    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);

    $imageName = $_FILES["image"]["name"];
    $imageTmpName = $_FILES["image"]["tmp_name"];

    $path = "../uploads/$imageName";

    if(move_uploaded_file($imageTmpName,"$path")){
        $query = "INSERT INTO tbl_addnews (TITLE,CATEGORY,CONTENT,IMAGE) VALUES ('$title','$category','$content','$imageName')";
        $data = mysqli_query($conn,$query);

        if($data){
            echo"
                <script>
                    alert('News Added Successfully....');
                </script>
            ";
        }else{
            echo"
            <script>
                alert('News Not Added Please Check....!!');
            </script>
        ";
        }
    }
}

?>
