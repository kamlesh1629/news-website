<?php
    include "./include/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Inter:wght@400;600&family=Montserrat:wght@500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="./styles/style.css">
    <title>News-home</title>
</head>

<body>
    <!-- navbar -->
    <?php include "./include/navbar.php"; ?>

    <!-- end navbar -->

    <!-- marquee -->
    <marquee>
        🔥 Breaking News: Latest updates on global events | Stock markets rise | New tech trends in AI...
    </marquee>
    <!-- end marquee -->

    <!-- hero -->
        <?php include "./include/hero.php"; ?>
    <!-- end hero -->

    <!-- two-news-sec -->
    <?php include "./include/two_news.php"; ?>
    <!--end two-news-sec -->

    <!-- latest articles -->
    <?php include "./include/latest_articles.php"; ?>
    <!--end	 latest articles -->

    <!-- latest articles -->
    <?php include "./include/video_news.php"; ?>
    <!--end	 latest articles -->

     <!-- latest articles -->
     <?php include "./include/basketballnews.php"; ?>
    <!--end	 latest articles -->

    <!-- footer -->
    <?php include "./include/footer.php"; ?>
     <!-- end footer -->

</body>

</html>