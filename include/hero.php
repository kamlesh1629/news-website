<?php
    // include "../include/connection.php";

    $query = "SELECT * FROM tbl_addnews  order by NEWS_ID desc LIMIT 1";
    $data = mysqli_query($conn,$query);

    while($row = mysqli_fetch_assoc($data)){
        $recenetNews_ID = $row["NEWS_ID"];
        $recentNewsTitle = $row["TITLE"];
        $recentNewsCategory = $row["CATEGORY"];
        $recentNewsContent = $row["CONTENT"];
        // $recentNewsImage = "<img src='/news/uploads/$row[IMAGE]' alt='recent image'/>";
        $recentNewsImage = "/news/uploads/" . $row["IMAGE"];
        $recentNewsTime = $row["TIME"];

    }

?>

<link rel="stylesheet" href="../styles/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<div class="bg-gray">
    <div class="container">
        <div class="flex gap-20">
            <div class="right-section">
                <div class="author flex">
                    <div class=""><img class="author-img" src="/news/img/admin.png" alt="author-img"></div>
                    <div>
                        <p class="author-name">Admin</p>
                        <!-- <p>Author</p> -->
                    </div>
                </div>

                <div class="first-news-heading">
                    <h1><?php echo "$recentNewsTitle"; ?></h1>
                </div>
                <div class="category flex padd-b">
                    <h4><span><i class="fa-solid fa-filter"></i></span> <?php echo "$recentNewsCategory"; ?> </h4>
                    <p class="padd"><span><i class="fa-solid fa-clock"></i></span> <?php echo "$recentNewsTime"; ?> </p>
                </div>

                <div class="first-news-img grid-2">
                    <!-- <img src="/news/img/first-news-photo.avif" alt=""> -->
                    <!-- <img src="<?php echo $recentNewsImage; ?>" alt="Recent News Image"> -->
                    <a href="/news/include/readmore.php?NEWS_ID2=<?php echo $recenetNews_ID ?>"><img src="<?php echo $recentNewsImage ?>" alt="image"></a>


                </div>
            </div>
            <div class="left-section">
                <div class="grid">
                    <!-- php code -->
                    <?php
                        $query2 = "SELECT * FROM tbl_addnews order by NEWS_ID DESC limit 3 offset 1";
                        $data2 =mysqli_query($conn,$query2);

                        while($row2 = mysqli_fetch_assoc($data2)){
                            $recentNewsTitle2 = substr($row2["TITLE"],0,100);
                            $recentNewsCategory2 = $row2["CATEGORY"];
                            $recenetNews_ID2 =$row2["NEWS_ID"];
                            $recentNewsContent2 = substr($row2["CONTENT"],0,100). "<a href='/news/include/readmore.php?NEWS_ID2=$row2[NEWS_ID]'>... Read more</a>";
                            // $recentNewsImage2 = "<img src='/news/uploads/$row[IMAGE]' alt='recent image'/>";
                            $recentNewsImage2 = "/news/uploads/" . $row2["IMAGE"];
                            $recentNewsTime2 = $row2["TIME"];

                    ?>
                    <!-- end php code -->


                    <!-- first row -->
                    <div class="f-col">
                        <h3><?php echo $recentNewsTitle2 ?></h3>
                        <p>  <?php echo  $recentNewsContent2 ?> </p>
                        <div class="category flex">
                            <h4><span><i class="fa-solid fa-filter"></i></span> <?php echo $recentNewsCategory2 ?></h4>
                            <p class="padd"><span><i class="fa-solid fa-clock"></i></span> <?php echo $recentNewsTime2 ?></p>
                        </div>
                    </div>
                    <div class="sec-col">
                        <!-- <img src="/news/img/boom boom image.avif" alt=""> -->
                        <!-- <img src="<?php echo $recentNewsImage2 ?>" alt="image"> -->
                        <!-- <img src="<?php echo $recentNewsImage2 ?>" alt="image"> -->
                        <a href="/news/include/readmore.php?NEWS_ID2=<?php echo $recenetNews_ID2;?>"><img src="<?php echo $recentNewsImage2 ?>" alt="image"></a>
                    </div>

                    <!-- 2nd row -->
                    <!-- <div class="f-col">
                        <h3>carlos nasar wins 89kg gold and breaks world record</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores nostrum veniam
                            dolorum....
                        </p>
                        <div class="category flex">
                            <h4><span><i class="fa-solid fa-filter"></i></span> Olympics</h4>
                            <p class="padd"><span><i class="fa-solid fa-clock"></i></span> 19-03-2025</p>
                        </div>
                    </div>
                    <div class="sec-col">
                        <img src="/news/img/carlous.avif" alt="">
                    </div> -->

                    <!-- 3rd row -->
                    <!-- <div class="f-col">
                        <h3>the people's republice of china reigns supreme in men's team</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores nostrum veniam
                            dolorum....
                        </p>
                        <div class="category flex">
                            <h4><span><i class="fa-solid fa-filter"></i></span> Olympics</h4>
                            <p class="padd"><span><i class="fa-solid fa-clock"></i></span> 19-03-2025</p>
                        </div>
                    </div>
                    <div class="sec-col">
                        <img src="/news/img/china image.avif" alt="">
                    </div> -->

<?php } ?>


                </div>
            </div>
        </div>
    </div>
</div>