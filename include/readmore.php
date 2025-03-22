<?php
include "./connection.php";
if (isset($_GET["NEWS_ID2"])) {
    $query = "SELECT * FROM tbl_addnews WHERE NEWS_ID ='$_GET[NEWS_ID2]' ";
    $data = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($data)) {
        $title = $row["TITLE"];
        $category = $row["CATEGORY"];
        $time = $row["TIME"];
        $content = $row["CONTENT"];
        $image = "/news/uploads/" . $row["IMAGE"];

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/readmore.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Inter:wght@400;600&family=Montserrat:wght@500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>News -Read More</title>
</head>

<body>


    <div class="container">
        <div class="news-item">
            <img src="<?php echo $image; ?>" alt="News Image">
            <div class="news-meta">
                <div class="news-category"><span><i class="fa-solid fa-filter"></i></span> <?php echo $category; ?> </div>
                <div><i class="fa-solid fa-clock"></i> <?php echo $time; ?> </div>
            </div>
            <h2 class="news-title"> <?php echo $title; ?> </h2>
            <p class="news-content"> <?php echo $content; ?> </p>
            <!-- <a href="/news/index.php" class="back-btn">Go Back</a> -->
        </div>
    </div>
</body>

</html>
