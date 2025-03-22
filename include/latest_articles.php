<?php
include "connection.php";

$queryCategory = "SELECT CATEGORY FROM tbl_addnews where CATEGORY = 'Bussiness'  ";
$dataCategory = mysqli_query($conn, $queryCategory);

while ($row2 = mysqli_fetch_assoc($dataCategory)) {
    $category2 = $row2["CATEGORY"];
    // echo $category2;
}

?>

<link rel="stylesheet" href="../styles/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<div class="articles">
    <div class="container">
        <div class="p10 ">
            <div class="article-heading flex">
                <div class="p10">
                    <h1>Latest Bussiness</h1>
                </div>
                <div class="color p10">
                    <a href="/news/include/showmore.php?newsCategory=<?php echo $category2; ?>">Show More <span><i class="fa-solid fa-arrow-right"></i></span></a>
                </div>
            </div>
        

            <!-- card-section -->
            <div class="card">
                <!-- firstcard -->
                <?php

                $query = "SELECT * FROM tbl_addnews where CATEGORY ='Bussiness' ORDER BY NEWS_ID DESC LIMIT 4 ";
                $data = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($data)) {
                    $news_id = $row["NEWS_ID"];
                    $image = "/news/uploads/" . $row["IMAGE"];
                    $category = $row["CATEGORY"];
                    $title = substr($row["TITLE"],0,50)."<a href='/news/include/readmore.php?NEWS_ID2=$news_id;'>...Read More</a>";

                    ?>
                    <div class="fcard">

                        <div class="card-image"><img src="<?php echo $image; ?>" alt="image"></div>
                        <div class="flex article-author">
                            <div class="article-author-img flex"><img src="/news/img/author.jpeg" alt="author"></div>
                            <div>
                                <p class="ml-10">Lasseli Alexandar</p>
                            </div>
                        </div>
                        <h4 class="padd-3"><?php echo $title; ?></h4>
                        <div>
                            <h5 class="Olympics"><span><i class="fa-solid fa-filter"></i></span> <a href="/news/include/showmore.php?newsCategory=<?php echo $category; ?>"><?php echo $category; ?></a>
                            </h5>
                        </div>


                    </div>
                <?php } ?>


            </div>
        </div>
    </div>
</div>