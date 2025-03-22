<?php
    include "../include/connection.php";

    if(isset($_GET["news_id"]) && !empty($_GET["news_id"])){
        $update = $_GET["news_id"];


        $edit="SELECT * FROM tbl_addnews WHERE NEWS_ID = '$update'";
        $editdata = mysqli_query($conn, $edit);

        while($editrow = mysqli_fetch_assoc($editdata)){
            $editNewsId= $editrow["NEWS_ID"];
            $editTitle = $editrow["TITLE"];
            $editImage =$editrow["IMAGE"];
            $editCategory = $editrow["CATEGORY"];
            $editContent = $editrow["CONTENT"];
    
        }
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News - Admin Panel</title>
    <link rel="stylesheet" href="./styles/add_news.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

    <main class="main-content">
        <div class="form-container">
            <h2>Edit News Article</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?news_id=" . $update; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="<?php echo htmlspecialchars($editTitle); ?>" required>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category">
                        <option value="World" <?php if($editCategory=="World") echo "selected"; ?>>World</option>
                        <option value="Politics" <?php if($editCategory=="Politics") echo "selected"; ?>>Politics</option>
                        <option value="Business" <?php if($editCategory=="Business") echo "selected"; ?>>Business</option>
                        <option value="Sports" <?php if($editCategory=="Sports") echo "selected"; ?>>Sports</option>
                        <option value="Technology" <?php if($editCategory=="Technology") echo "selected"; ?>>Technology</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" required><?php echo htmlspecialchars($editContent); ?></textarea>
                </div>
                <div class="form-group">
                    <label>Current Image</label><br>
                    <img src="../uploads/<?php echo htmlspecialchars($editImage); ?>" width="150">
                </div>
                <div class="form-group">
                    <label>New Image (optional)</label>
                    <input type="file" name="image">
                </div>
                <div class="form-group">
                    <button type="submit" name="editNews" onclick="return confirm('Are you sure you want to edit this news?');">Save Edit</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>

<?php
if(isset($_POST["editNews"])){
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);

    // Check if a new image was uploaded
    if(!empty($_FILES["image"]["name"])){
        $imageName = $_FILES["image"]["name"];
        $imageTmpName = $_FILES["image"]["tmp_name"];
        $path = "../uploads/$imageName";

        if(move_uploaded_file($imageTmpName, $path)){
            $query = "UPDATE tbl_addnews SET TITLE='$title', CATEGORY='$category', CONTENT='$content', IMAGE='$imageName' WHERE NEWS_ID ='$update'";
        } else {
            echo "<script>alert('Image upload failed. Please try again.');</script>";
            exit();
        }
    } else {
        $query = "UPDATE tbl_addnews SET TITLE='$title', CATEGORY='$category', CONTENT='$content' WHERE NEWS_ID ='$update'";
    }

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "<script>alert('News Edited Successfully.'); window.location.href='manage_news.php';</script>";
    } else {
        echo "<script>alert('News Not Edited. Please check again.');</script>";
    }
}
?>