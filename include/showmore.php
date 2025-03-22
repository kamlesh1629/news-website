<?php
    include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports News</title>
    <link rel="stylesheet" href="../styles/showmore.css">
</head>

<body>

<?php
    include "navbar.php";
?>


    <header>
        <h1><?php echo $_GET["newsCategory"] ?> News</h1>
    </header>
    <main>
        <section class="news-container">

        <?php
            $query = "SELECT * FROM tbl_addnews WHERE CATEGORY ='$_GET[newsCategory]' ";
            $data = mysqli_query($conn,$query);

            while($row = mysqli_fetch_assoc($data)){
                $news_id = $row["NEWS_ID"];
                $title =$row["TITLE"];
                $category = $row["CATEGORY"];
                $content = substr($row["CONTENT"],0,150)."........";
                $image = "/news/uploads/".$row["IMAGE"];
        ?>
            <article class="news-item">
                <img src="<?php echo $image; ?>" alt="image">
                <h4 class="category"><?php echo $category; ?></h4>
                <h3><?php echo $title;  ?></h3>
                <p><?php echo $content; ?></p>
                <a href='/news/include/readmore.php?NEWS_ID2=<?php echo $news_id; ?>' class="read-more">Read More</a>
            </article>

            <?php } ?>

        </section>
    </main>
</body>

</html>

<!-- footer -->
<?php include "footer.php"; ?>
     <!-- end footer -->